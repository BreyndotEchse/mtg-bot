<?php
namespace Mtg\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Mtg\Model\Repository\RuleRepository")
 * @ORM\Table(name="rule", indexes={
 *      @ORM\Index(name="ruletext", columns={"ruletext"}, flags={"fulltext"}),
 *      @ORM\Index(name="sub_id", columns={"sub_id"})
 * })
 */
class Rule
{
    /**
     * @ORM\Id
     * @ORM\Column(type="string", length=8, options={"fixed"=true})
     * @var string
     */
    protected $id;

    /**
     * @ORM\Column(name="sub_id", type="string", length=8, options={"fixed"=true})
     * @var string
     */
    protected $subId;

    /**
     * @ORM\Column(type="smallint", options={"unsigned"=true})
     * @var integer
     */
    protected $depth;

    /**
     * @ORM\ManyToOne(targetEntity="Rule", inversedBy="childRules", fetch="EAGER")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id", nullable=true)
     * @var Rule
     */
    protected $parentRule;

    /**
     * @ORM\OneToMany(targetEntity="Rule", mappedBy="parentRule", indexBy="subId", fetch="EAGER")
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
     * @return integer
     */
    public function getDepth()
    {
        return $this->depth;
    }

    /**
     * @param integer $depth
     * @return Rule
     */
    public function setDepth($depth)
    {
        $this->depth = $depth;
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
     * @param string $subId
     * @return Rule
     */
    public function getChildRule($subId)
    {
        if (empty($this->childRules[$subId])) {
            return null;
        }
        return $this->childRules[$subId];
    }

    /**
     * @param Rule $rule
     * @return Rule
     */
    public function addChildRule(Rule $rule)
    {
        if ($this !== $rule->getParentRule()) {
            $rule->setParentRule($this);
        }
        $this->childRules[$rule->getSubId()] = $rule;
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
