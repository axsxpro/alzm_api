<?php

namespace App\Repository;

use App\Entity\PlanningRules;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PlanningRules>
 *
 * @method PlanningRules|null find($id, $lockMode = null, $lockVersion = null)
 * @method PlanningRules|null findOneBy(array $criteria, array $orderBy = null)
 * @method PlanningRules[]    findAll()
 * @method PlanningRules[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PlanningRulesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PlanningRules::class);
    }

//    /**
//     * @return PlanningRules[] Returns an array of PlanningRules objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?PlanningRules
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
