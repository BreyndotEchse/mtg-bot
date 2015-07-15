<?php
namespace Mtg\Model\Repository;

use Doctrine\ORM\EntityRepository;

class RuleRepository extends EntityRepository
{
    /**
     * @param string $fulltext
     * @param integer $offset
     * @return array
     */
    public function findByFulltextSearch($fulltext, $offset = null)
    {
        $queryBuilder = $this->createQueryBuilder('rule');
        $queryBuilder->select('rule')
            ->addSelect('FLOOR(MATCH(rule.ruletext) AGAINST(:fulltext1 BOOLEAN) / 10 + (10 - rule.depth)) AS HIDDEN relevancy')
            ->andWhere('MATCH(rule.ruletext) AGAINST(:fulltext2 BOOLEAN) > 1')
            ->addOrderBy('relevancy', 'DESC')
            ->addOrderBy('rule.depth', 'ASC')
            ->addOrderBy('rule.ruletext', 'ASC')
            ->setParameter('fulltext1', $fulltext)
            ->setParameter('fulltext2', $fulltext)
            ->setMaxResults(5)
            ->setFirstResult($offset);

        return $queryBuilder->getQuery()->getResult();
    }
}
