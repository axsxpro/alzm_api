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


    public function findPlanningByCoachId($id, $idPlanning)
    {
        return $this->createQueryBuilder('planningRules')
            ->select('planningRules')
            ->where('planningRules.idUser = :id')
            ->andWhere('planningRules.idPlanningRules = :idPlanning')
            ->setParameters([
                'id' => $id,
                'idPlanning' => $idPlanning,
            ])
            ->getQuery()
            ->getOneOrNullResult(); //récupérer un seul résultat d'une requête Doctrine
    }


    public function deletePlannings($id, $idPlanning)
    {
        return $this->createQueryBuilder('planningRules')
            ->select('planningRules')
            ->where('planningRules.idUser = :id')
            ->andWhere('planningRules.idPlanningRules = :idPlanning')
            ->setParameters([
                'id' => $id,
                'idPlanning' => $idPlanning,
            ])
            ->getQuery()
            ->getOneOrNullResult(); //récupérer un seul résultat d'une requête Doctrine
    }



}
