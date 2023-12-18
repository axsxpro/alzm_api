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
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Validator\Validator\ValidatorInterface;

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
    #[Route('/api/appointments', name: 'app_appointments', methods: ['GET'])]
    public function getAppointments(AppointmentRepository $appointmentRepository, SerializerInterface $serializerInterface): JsonResponse
    {

        $appointments = $appointmentRepository->findAll();

        $appointmentsJson = $serializerInterface->serialize($appointments, 'json', ['groups' => 'appointment']);

        return new JsonResponse($appointmentsJson, Response::HTTP_OK, [], true);
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

        return new JsonResponse($appointmentCoachJson, Response::HTTP_OK, [], true);
    }


    /**
     * Create new appointments 
     *
     * @OA\Response(
     *     response=201,
     *     description="Created",
     * )
     * 
     * @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(
     *         type="object",
     *         @OA\Property(property="coach", type="object",
     *             @OA\Property(property="coachInformation", type="object",
     *                 @OA\Property(property="idUser", type="integer")
     *             )
     *         ),
     *         @OA\Property(property="patient", type="object",
     *             @OA\Property(property="patientInformation", type="object",
     *                 @OA\Property(property="idUser", type="integer")
     *             )
     *         ),
     *         @OA\Property(property="schedule", type="object",
     *             @OA\Property(property="idSchedule", type="integer")
     *         )
     *     )
     * ),
     * 
     * @OA\Tag(name="Appointment")
     */
    #[Route('/api/post/appointments', name: "app_appointments_post", methods: ['POST'])]
    public function createAppointment(Request $request, SerializerInterface $serializerInterface, CoachRepository $coachRepository, PatientRepository $patientRepository, ScheduleRepository $scheduleRepository, ValidatorInterface $validatorInterface, EntityManagerInterface $entityManager): JsonResponse
    {

        $appointments = $serializerInterface->deserialize($request->getContent(), Appointment::class, 'json');

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

        // On vérifie les erreurs
        $errors = $validatorInterface->validate($appointments);

        if ($errors->count() > 0) {
            return new JsonResponse($serializerInterface->serialize($errors, 'json'), JsonResponse::HTTP_BAD_REQUEST, [], true);
        }

        // persistance des données dans la BDD
        $entityManager->persist($appointments);

        $entityManager->flush();

        $jsonAppointments = $serializerInterface->serialize($appointments, 'json', ['groups' => 'appointment']);

        // created = code 201
        return new JsonResponse($jsonAppointments, Response::HTTP_CREATED, [], true);
    }


    /**
     * Edit appointments by coach id and appointment id
     *
     * @OA\Response(
     *     response=202,
     *     description="Accepted",
     * )
     * 
     * @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(
     *         type="object",
     *         @OA\Property(property="patient", type="object",
     *             @OA\Property(property="patientInformation", type="object",
     *                 @OA\Property(property="idUser", type="integer")
     *             )
     *         ),
     *         @OA\Property(property="schedule", type="object",
     *             @OA\Property(property="idSchedule", type="integer")
     *         )
     *     )
     * ),
     * 
     * @OA\Tag(name="Appointment")
     */
    #[Route('/api/put/coachs/{id}/appointments/{idAppointment}', name: "app_appointments_put", methods: ['PUT'])]
    public function updateAppointment(int $id, int $idAppointment, Request $request, SerializerInterface $serializerInterface, AppointmentRepository $appointmentRepository, PatientRepository $patientRepository, ScheduleRepository $scheduleRepository, ValidatorInterface $validatorInterface, EntityManagerInterface $entityManager): JsonResponse
    {

        $appointment = $appointmentRepository->updateAppointments($id, $idAppointment);

        $updateAppointment = $serializerInterface->deserialize($request->getContent(), Appointment::class, 'json', [AbstractNormalizer::OBJECT_TO_POPULATE => $appointment, 'ignored_attributes' => ['idApppointment', 'coach']]);

        // Récupération de l'ensemble des données envoyées sous forme de tableau
        $content = $request->toArray();

        // Récupération des id de la requete
        $idPatient = $content['patient']['patientInformation']['idUser'];
        $idSchedule = $content['schedule']['idSchedule'];

        // On cherche les id de patient et schedule  et on l'assigne à appointment.
        // Si "find" ne trouve pas les id, alors null sera retourné.
        $updateAppointment->setIdPatient($patientRepository->find($idPatient));
        $updateAppointment->setIdSchedule($scheduleRepository->find($idSchedule));

        // On vérifie les erreurs
        $errors = $validatorInterface->validate($appointment);

        if ($errors->count() > 0) {
            return new JsonResponse($serializerInterface->serialize($errors, 'json'), JsonResponse::HTTP_BAD_REQUEST, [], true);
        }

        $entityManager->persist($updateAppointment);

        $entityManager->flush();

        $jsonAppointment = $serializerInterface->serialize($updateAppointment, 'json', ['groups' => 'appointment']);

        // created = code 201
        return new JsonResponse($jsonAppointment, Response::HTTP_CREATED, [], true);
    }



    /**
     * Delete appointments by coach id and by availability id
     *
     * @OA\Response(
     *     response=204,
     *     description="No content",
     * )
     * 
     * @OA\Tag(name="Appointment")
     */
    #[Route('/api/delete/coachs/{id}/appointments/{idAppointment}', name: "app_appointments_delete", methods: ['DELETE'])]
    public function deleteAppointments(int $id, int $idAppointment, AppointmentRepository $appointmentRepository,  EntityManagerInterface $entityManager): Response
    {
        $appointment = $appointmentRepository->deleteAppointments($id, $idAppointment);

        $entityManager->remove($appointment);

        $entityManager->flush();

        return $this->redirectToRoute('app_appointments', [], Response::HTTP_SEE_OTHER, true);
        // return new JsonResponse(null, Response::HTTP_NO_CONTENT);
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

        return $this->redirectToRoute('app_appointments', [], Response::HTTP_SEE_OTHER, true);
        // return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }
}
