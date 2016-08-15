<?php
namespace models\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;

class UserRepository extends EntityRepository
{
    public function isDisable(\models\Entity\User $user)
    {
        $query = $this->getEntityManager()->createQueryBuilder()
            ->select('u')
            ->from('models\Entity\User', 'u')
            ->where('u.email = :email')
            ->andWhere('u.confirmed = 0')
            ->setParameter('email', $user->getEmail())
            ->getQuery();

        if (count($query->getResult()) > 0) {
            return true;
        }

        return false;
    }

    public function findByEmailAndPassword($email, $password)
    {
        $query = $this->getEntityManager()->createQueryBuilder()
            ->select('u')
            ->from('models\Entity\User', 'u')
            ->where('u.email = :email')
            ->andWhere('u.password = :password')
            ->setParameter('email', $email)
            ->setParameter('password', sha1($password))
            ->getQuery();

        return $query->getSingleResult();
    }
}