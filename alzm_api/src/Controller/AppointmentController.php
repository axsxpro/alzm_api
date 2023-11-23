<?php

namespace App\Controller;

use App\Entity\Appointment;
use App\Repository\AppointmentRepository;
use App\Repository\CoachRepository;
use App\Repository\PatientRepository;
use App\Repository\ScheduleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use OpenApi\Annotations as OA;

class AppointmentController extends AbstractController
{


    /**
     * Get all appointments 
     *
     * @OA\Response(
     *     response=200,
     *     description="Ok",
     * )
     * 
     * @OA\Tag(name="Appointment")
     */
    #[Route('/api/appointments', name: 'app_all_appointments', methods: ['GET'])]
    public function getAppointments(AppointmentRepository $appointmentRepository, SerializerInterface $serializerInterface): JsonResponse
    {

        // afficher tous les utilisateurs de la base de données
        $appointments = $appointmentRepository->findAll();

        $appointmentsJson = $serializerInterface->serialize($appointments, 'json', ['groups' => 'appointment']);

        // le code retour : ici Response::HTTP_OK  correspond au code 200 . Ce code est celui renvoyé par défaut lorsque rien n’est précisé ;
        // [] : les headers (qu’on laisse vides pour l’instant pour garder le comportement par défaut);
        // un true qui signifie que nous avons DÉJÀ sérialisé les données et qu’il n’y a donc plus de traitement à faire dessus. 
        return new JsonResponse($appointmentsJson, Response::HTTP_OK, [], true);
    }


    /**
     * Create new appointment 
     *
     * @OA\Response(
     *     response=201,
     *     description="Created",
     * )
     * 
     * @OA\Tag(name="Appointment")
     */
    #[Route('/api/post/appointments', name: "app_appointments_post", methods: ['POST'])]
    public function createAppointment(Request $request, SerializerInterface $serializer, CoachRepository $coachRepository, PatientRepository $patientRepository, ScheduleRepository $scheduleRepository, EntityManagerInterface $entityManager): JsonResponse
    {

        // $request->getContent(): récupère le contenu de la requête HTTP POST reçue.
        // AppUser::class: C'est la classe cible dans laquelle on veut désérialiser les données JSON
        // json :  indique au composant de sérialisation que le contenu de la requête est au format JSON
        $appointments = $serializer->deserialize($request->getContent(), Appointment::class, 'json');

        // Récupération de l'ensemble des données envoyées sous forme de tableau
        $content = $request->toArray();

        // Récupération des id de la requete
        $idCoach = $content['coach']['coachInformation']['idUser'];
        $idPatient = $content['patient']['patientInformation']['idUser'];
        $idSchedule = $content['schedule']['idSchedule'];

        // On cherche les id de patient, coach et schedule  et on l'assigne à appointment.
        // Si "find" ne trouve pas les id, alors null sera retourné.
        $appointments->setIdCoach($coachRepository->find($idCoach));
        $appointments->setIdPatient($patientRepository->find($idPatient));
        $appointments->setIdSchedule($scheduleRepository->find($idSchedule));

        // persistance des données dans la BDD
        $entityManager->persist($appointments);

        $entityManager->flush();

        $jsonAppointments = $serializer->serialize($appointments, 'json', ['groups' => 'appointment']);

        // created = code 201
        return new JsonResponse($jsonAppointments, Response::HTTP_CREATED, [], true);
    }


    /**
     * Get appointment by coach id
     *
     * @OA\Response(
     *     response=200,
     *     description="Ok",
     * )
     * 
     * @OA\Tag(name="Appointment")
     */
    #[Route('/api/coachs/{id}/appointments', name: 'app_coach_appointment', methods: ['GET'])]
    public function getAppointmentByCoachId(int $id, AppointmentRepository $appointmentRepository, SerializerInterface $serializerInterface): JsonResponse
    {

        //rechercher un appointment en fonction de l'id d'un coach
        $appointmentByCoachId = $appointmentRepository->findAppointmentsByCoachId($id);

        $appointmentCoachJson = $serializerInterface->serialize($appointmentByCoachId, 'json', ['groups' => 'appointment']);

        // le code retour : ici Response::HTTP_OK  correspond au code 200 . Ce code est celui renvoyé par défaut lorsque rien n’est précisé ;
        // [] : les headers (qu’on laisse vides pour l’instant pour garder le comportement par défaut);
        // un true qui signifie que nous avons DÉJÀ sérialisé les données et qu’il n’y a donc plus de traitement à faire dessus. 
        return new JsonResponse($appointmentCoachJson, Response::HTTP_OK, [], true);
    }


    /**
     * Delete appointments
     *
     * @OA\Response(
     *     response=204,
     *     description="No content",
     * )
     * 
     * @OA\Tag(name="Appointment")
     */
    #[Route('/api/delete/appointments/{id}', name: 'delete_appointment', methods: ['DELETE'])]
    public function deleteAppointment(Appointment $appointment, EntityManagerInterface $entityManager): Response
    {
        $entityManager->remove($appointment);

        $entityManager->flush();

        return $this->redirectToRoute('app_all_appointments', [], Response::HTTP_SEE_OTHER, true);
        // return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }



}
