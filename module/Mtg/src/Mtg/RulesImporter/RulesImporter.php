<?php
namespace Mtg\RulesImporter;

use Doctrine\Common\Persistence\ObjectManager;
use Mtg\Model\Rule;

class RulesImporter
{
    /**
     * @var array
     */
    protected $sections = array();

    /**
     * @var ObjectManager
     */
    protected $objectManager;

    public function __construct(ObjectManager $objectManager)
    {
        $this->objectManager = $objectManager;
    }

    /**
     * @return array
     */
    public function getSections()
    {
        return $this->sections;
    }

    /**
     * @param array $sections
     * @return RulesImporter
     */
    public function setSections($sections)
    {
        $this->sections = $sections;
        return $this;
    }

    /**
     * @param string $filePath
     */
    public function import($filePath)
    {
        $lineArray = array_map(array($this, 'prepareLine'), file($filePath));
        $sections = $this->parseSections($lineArray);

        $this->parseRules($sections['rules']);
        $this->objectManager->flush();
        return true;
    }

    /**
     * @param string $ruleLine
     * @return string
     */
    protected function prepareLine($ruleLine)
    {
        return mb_convert_encoding(trim($ruleLine), 'UTF-8', 'CP1252');
    }

    /**
     * @param array $lineArray
     * @return array
     */
    protected function parseSections($lineArray)
    {
        $sections = array();
        $previousSectionName = null;
        foreach ($this->sections as $section) {
            $sectionName = !empty($section['name']) ? $section['name'] : null;
            $startLine = $section['start'];
            $startIndex = array_search($startLine, $lineArray);
            if (null !== $previousSectionName) {
                $sections[$previousSectionName] = array_slice($lineArray, 0, $startIndex);
            }
            $lineArray = array_slice($lineArray, $startIndex + 1);
            $previousSectionName = $sectionName;
        }
        return $sections;
    }

    /**
     * @param array $rulesArray
     */
    protected function parseRules($rulesArray)
    {
        $rules = array();
        $currentRule = new Rule;
        foreach ($rulesArray as $ruleLine) {
            if ('' === $ruleLine) {
                continue;
            }

            $matches = array();
            $isMatch = preg_match('/^(?P<chapter>[0-9])(?P<major>[0-9]{2})?\.(?P<minor>[0-9]+)?(?:(?P<paragraph>[a-z])|\.)?\s*/S', $ruleLine, $matches);
            if (!$isMatch) {
                $currentRule->addRuletextLine($ruleLine);
                continue;
            }

            $currentRule = new Rule;
            $currentRule->setId(trim($matches[0]))
                ->setSubId(end($matches))
                ->setRuletext(substr($ruleLine, strlen($matches[0])));
            $this->objectManager->persist($currentRule);

            if (empty($matches['major'])) {
                $rules[$matches['chapter']] = $currentRule;
                continue;
            }

            $parentRule = $rules[$matches['chapter']];
            if (!empty($matches['minor'])) {
                $parentRule = $parentRule->getChildRule($matches['major']);
            }

            if (!empty($matches['paragraph'])) {
                $parentRule = $parentRule->getChildRule($matches['minor']);
            }
            $parentRule->addChildRule($currentRule);
        }
    }
}