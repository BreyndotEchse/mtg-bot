<?php
namespace Mtg\Controller;

use Mtg\Model\Repository\RuleRepository;
use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;

class RuleController extends AbstractRestfulController
{
    /**
     * @var RuleRepository
     */
    protected $ruleRepository;

    /**
     * @param RuleRepository $ruleRepository
     */
    public function __construct(RuleRepository $ruleRepository)
    {
        $this->ruleRepository = $ruleRepository;
    }

    public function get($id)
    {
        /* @var $rule \Mtg\Model\Rule */
        $rule = $this->ruleRepository->find($id);
        if (!$rule) {
            return new JsonModel(array(
                'error' => sprintf('Can\'t find rule "%s"', $id),
            ));
        }

        $childIdList = array();
        foreach ($rule->getChildRules() as $childRule) {
            $childIdList[] = $childRule->getId();
        }

        return new JsonModel(array(
            'id' => $rule->getId(),
            'parent_id' => $rule->getParentRule()->getId(),
            'sub_id' => $rule->getSubId(),
            'child_rules' => $childIdList,
            'ruletext' => $rule->getRuletext(),
        ));
    }

}
