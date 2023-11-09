<?php

namespace App\Repository;

use App\Entity\Availability;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Availability>
 *
 * @method Availability|null find($id, $lockMode = null, $lockVersion = null)
 * @method Availability|null findOneBy(array $criteria, array $orderBy = null)
 * @method Availability[]    findAll()
 * @method Availability[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AvailabilityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Availability::class);
    }

    // fonction qui récupère les disponibilités d'un coach en fonction de son ID
    public function findAavailabilitiesByCoachId($id)
    {
        return $this->createQueryBuilder('availability')
            ->select('availability')
            ->where('availability.idUser = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getResult(); //récupérer plusieurs résultats sous forme de tableau.
    }

    // on supprime une availability en fonction de son id et l'id du coach
    public function deleteAvailability($id, $idAvailability)
    {
        return $this->createQueryBuilder('availability')
            ->select('availability')
            ->where('availability.idUser = :id')
            ->andWhere('availability.idAvailability = :idAvailability')
            ->setParameters([
                'id' => $id,
                'idAvailability' => $idAvailability,
            ])
            ->getQuery()
            ->getOneOrNullResult(); //récupérer un seul résultat d'une requête Doctrine
    }


    // on supprime une availability en fonction de son id et l'id du coach
    public function findAvailabilityCoachById($id, $idAvailability)
    {
        return $this->createQueryBuilder('availability')
            ->select('availability')
            ->where('availability.idUser = :id')
            ->andWhere('availability.idAvailability = :idAvailability')
            ->setParameters([
                'id' => $id,
                'idAvailability' => $idAvailability,
            ])
            ->getQuery()
            ->getOneOrNullResult(); //récupérer un seul résultat d'une requête Doctrine
    }

}
