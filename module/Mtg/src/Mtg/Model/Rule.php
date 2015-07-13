<?php
namespace Mtg\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="rule", indexes={
 *      @ORM\Index(name="ruletext", columns={"ruletext"}, flags={"fulltext"}),
 *      @ORM\Index(name="sub_id", columns={"sub_id"})
 * })
 */
class Rule
{
    /**
     * @ORM\Id
     * @ORM\Column(type="string", length=6, options={"fixed"=true})
     * @var string
     */
    protected $id;

    /**
     * @ORM\Column(name="sub_id", type="string", length=6, options={"fixed"=true})
     * @var string
     */
    protected $subId;

    /**
     * @ORM\ManyToOne(targetEntity="Rule", inversedBy="childRules")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id", nullable=true)
     * @var Rule
     */
    protected $parentRule;

    /**
     * @ORM\OneToMany(targetEntity="Rule", mappedBy="parentRule", indexBy="subId")
     * @var Rule[]
     */
    protected $childRules;

    /**
     * @ORM\Column(type="text")
     * @var string
     */
    protected $ruletext = '';

    public function __construct()
    {
        $this->childRules = new ArrayCollection;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return Rule
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getSubId()
    {
        return $this->subId;
    }

    /**
     * @param string $subId
     * @return Rule
     */
    public function setSubId($subId)
    {
        $this->subId = $subId;
        return $this;
    }

    /**
     * @return Rule
     */
    public function getParentRule()
    {
        return $this->parentRule;
    }

    /**
     * @param Rule $parentRule
     * @return Rule
     */
    public function setParentRule(Rule $parentRule)
    {
        $this->parentRule = $parentRule;
        return $this;
    }

    /**
     * @return Rule[]
     */
    public function getChildRules()
    {
        return $this->childRules;
    }

    /**
     * @param Rule[] $childRules
     * @return Rule
     */
    public function setChildRules($childRules)
    {
        $this->childRules = $childRules;
        return $this;
    }

    /**
     * @param string $id
     * @return Rule
     */
    public function getChildRule($id)
    {
        if (empty($this->childRules[$id])) {
            return null;
        }
        return $this->childRules[$id];
    }

    /**
     * @param Rule $rule
     * @return Rule
     */
    public function addChildRule(Rule $rule)
    {
        $this->childRules[$rule->getId()] = $rule;
        return $this;
    }

    /**
     * @return string
     */
    public function getRuletext()
    {
        return $this->ruletext;
    }

    /**
     * @param string $ruletext
     * @return Rule
     */
    public function setRuletext($ruletext)
    {
        $this->ruletext = $ruletext;
        return $this;
    }

    /**
     * @param string $ruletextLine
     * @return Rule
     */
    public function addRuletextLine($ruletextLine)
    {
        $ruletextArray = explode("\n", $this->ruletext);
        $ruletextArray[] = $ruletextLine;
        $this->ruletext = implode("\n", $ruletextArray);
        return $this;
    }

}
