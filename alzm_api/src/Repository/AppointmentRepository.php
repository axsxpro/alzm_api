<?php

namespace App\Repository;

use App\Entity\Appointment;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Appointment>
 *
 * @method Appointment|null find($id, $lockMode = null, $lockVersion = null)
 * @method Appointment|null findOneBy(array $criteria, array $orderBy = null)
 * @method Appointment[]    findAll()
 * @method Appointment[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AppointmentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Appointment::class);
    }


    // fonction qui récupère le role d'un user en fonction de son id
    public function findAppointmentsByCoachId($id)
    {
        return $this->createQueryBuilder('appointment')
            ->select('appointment')
            ->where('appointment.idCoach = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getResult();
    }


    // on supprime un appointment en fonction de son id et l'id du coach
    public function deleteAppointments($id, $idAppointment)
    {
        return $this->createQueryBuilder('appointment')
            ->select('appointment')
            ->where('appointment.idCoach = :id')
            ->andWhere('appointment.idAppointment = :idAppointment')
            ->setParameters([
                'id' => $id,
                'idAppointment' => $idAppointment,
            ])
            ->getQuery()
            ->getOneOrNullResult(); //récupérer un seul résultat d'une requête Doctrine
    }


    // Mettre à jour un rendez-vous en fonction du coach id et de l'id appointment
    public function updateAppointments($id, $idAppointment)
    {
        return $this->createQueryBuilder('appointment')
            ->select('appointment')
            ->where('appointment.idCoach = :id')
            ->andWhere('appointment.idAppointment = :idAppointment')
            ->setParameters([
                'id' => $id,
                'idAppointment' => $idAppointment,
            ])
            ->getQuery()
            ->getOneOrNullResult(); //récupérer un seul résultat d'une requête Doctrine
    }


}
