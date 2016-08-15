<?php

namespace models\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;

class ArticleRepository extends EntityRepository
{
    public function findTop10()
    {
        $query = $this->getEntityManager()->createQueryBuilder()
            ->select('a')
            ->from('models\Entity\Article', 'a')
            ->orderBy('a.id', 'DESC')
            ->setMaxResults(10)
            ->getQuery();

        return $query->getResult();
    }

    public function findAllByEmail($email) {
        $query = $this->getEntityManager()->createQueryBuilder()
            ->select('a')
            ->from('models\Entity\Article', 'a')
            ->where('a.user = :email')
            ->orderBy('a.id', 'DESC')
            ->setParameter('email', $email)
            ->getQuery();

        return $query->getResult();
    }
}