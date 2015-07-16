<?php
namespace Mtg\Model\Repository;

use Doctrine\ORM\EntityRepository;

class GlossaryEntryRepository extends EntityRepository
{
    /**
     * @param string $fulltext
     * @param integer $offset
     * @return array
     */
    public function findByFulltextSearch($fulltext, $offset = null)
    {
        $queryBuilder = $this->createQueryBuilder('glossary');
        $queryBuilder->select('glossary')
            ->addSelect('MATCH(glossary.id, glossary.glossarytext) AGAINST(:fulltext1 BOOLEAN) AS HIDDEN relevancy')
            ->andWhere('MATCH(glossary.id, glossary.glossarytext) AGAINST(:fulltext2 BOOLEAN) > 1')
            ->addOrderBy('relevancy', 'DESC')
            ->addOrderBy('glossary.id', 'ASC')
            ->setParameter('fulltext1', $fulltext)
            ->setParameter('fulltext2', $fulltext)
            ->setMaxResults(5)
            ->setFirstResult($offset);

        return $queryBuilder->getQuery()->getResult();
    }
}
