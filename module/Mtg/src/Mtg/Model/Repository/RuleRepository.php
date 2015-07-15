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
            ->addSelect('HIDDEN FLOOR(MATCH(ruletext) AGAINST(:fulltext1 BOOLEAN) / 10 + (10 - rule.depth)) AS relevancy')
            ->andWhere('MATCH(ruletext) AGAINST(:fulltext2 BOOLEAN)')
            ->addOrderBy('relevancy', 'DESC')
            ->addOrderBy('depth', 'ASC')
            ->addOrderBy('ruletext', 'ASC')
            ->setParameter('fulltext1', $fulltext)
            ->setParameter('fulltext2', $fulltext)
            ->setMaxResults(5)
            ->setFirstResult($offset);

        return $queryBuilder->getQuery()->getResult();
    }
}
