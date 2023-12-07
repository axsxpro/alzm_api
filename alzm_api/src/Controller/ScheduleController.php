<?php

namespace App\Controller;

use App\Entity\Schedule;
use App\Repository\AppointmentRepository;
use App\Repository\ScheduleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use OpenApi\Annotations as OA;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class ScheduleController extends AbstractController
{

    /**
     * Get all schedules
     *
     * @OA\Response(
     *     response=200,
     *     description="Ok",
     * )
     * 
     * @OA\Tag(name="Schedules")
     */
    #[Route('/api/schedules', name: 'app_schedules', methods: ['GET'])]
    public function getSchedules(ScheduleRepository $scheduleRepository, SerializerInterface $serializerInterface): JsonResponse
    {

        $schedules = $scheduleRepository->findAll();

        $schedulesJson = $serializerInterface->serialize($schedules, 'json');

        return new JsonResponse($schedulesJson, Response::HTTP_OK, [], true);
    }


    /**
     * Get schedules by id
     *
     * @OA\Response(
     *     response=200,
     *     description="OK",
     * )
     * 
     * @OA\Tag(name="Schedules")
     */
    #[Route('/api/schedules/{id}', name: 'schedule_id', methods: ['GET'])]
    public function getScheduleById(Schedule $schedule, SerializerInterface $serializerInterface): JsonResponse
    {
        $scheduleById = $serializerInterface->serialize($schedule, 'json');

        return new JsonResponse($scheduleById, Response::HTTP_OK, ['accept' => 'json'], true);
    }


    /**
     * Create new schedules
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
     *         @OA\Property(property="weekNumber", type="string", format="date-time", example="2023-12-28T10:00:00+00:00"),
     *         @OA\Property(property="yearDate", type="integer"),
     *         @OA\Property(property="hourStartDate", type="string", format="date-time", example="2023-12-28T10:00:00+00:00"),
     *         @OA\Property(property="hourEndDate", type="string", format="date-time", example="2023-12-28T10:00:00+00:00"),
     *     )
     * )
     * 
     * @OA\Tag(name="Schedules")
     */
    #[Route('/api/post/schedules', name: "app_schedules_post", methods: ['POST'])]
    public function createSchedules(Request $request, serializerInterface $serializerInterface, EntityManagerInterface $entityManager, ValidatorInterface $validatorInterface): JsonResponse
    {

        $schedules = $serializerInterface->deserialize($request->getContent(), Schedule::class, 'json');

        // On vérifie les erreurs
        $errors = $validatorInterface->validate($schedules);

        if ($errors->count() > 0) {
            return new JsonResponse($serializerInterface->serialize($errors, 'json'), JsonResponse::HTTP_BAD_REQUEST, [], true);
        }

        $entityManager->persist($schedules);

        $entityManager->flush();

        $schedulesJson = $serializerInterface->serialize($schedules, 'json');

        // created = code 201
        return new JsonResponse($schedulesJson, Response::HTTP_CREATED, [], true);
    }



    /**
     * Edit schedules
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
     *         @OA\Property(property="weekNumber", type="string", format="date-time", example="2023-12-28T10:00:00+00:00"),
     *         @OA\Property(property="yearDate", type="integer"),
     *         @OA\Property(property="hourStartDate", type="string", format="date-time", example="2023-12-28T10:00:00+00:00"),
     *         @OA\Property(property="hourEndDate", type="string", format="date-time", example="2023-12-28T10:00:00+00:00"),
     *     )
     * )
     * 
     * @OA\Tag(name="Schedules")
     */
    #[Route('/api/put/schedules/{id}', name: "app_schedules_put", methods: ['PUT'])]
    public function updateSchedules(Request $request, SerializerInterface $serializerInterface, Schedule $schedule, EntityManagerInterface $entityManager, ValidatorInterface $validatorInterface): JsonResponse
    {

        $updatedSchedule = $serializerInterface->deserialize($request->getContent(), Schedule::class, 'json', [AbstractNormalizer::OBJECT_TO_POPULATE => $schedule, 'ignored_attributes' => ['idSchedule']]);

        // On vérifie les erreurs
        $errors = $validatorInterface->validate($updatedSchedule);

        if ($errors->count() > 0) {
            return new JsonResponse($serializerInterface->serialize($errors, 'json'), JsonResponse::HTTP_BAD_REQUEST, [], true);
        }

        $entityManager->persist($updatedSchedule);

        $entityManager->flush();

        $jsonUpdatedSchedule = $serializerInterface->serialize($updatedSchedule, 'json');

        // accepted = code 202
        return new JsonResponse($jsonUpdatedSchedule, JsonResponse::HTTP_ACCEPTED, [], true);
    }


    /**
     * Delete schedules
     *
     * @OA\Response(
     *     response=204,
     *     description="No content",
     * )
     * 
     * @OA\Tag(name="Schedules")
     */
    #[Route('/api/delete/schedules/{id}', name: 'delete_schedules', methods: ['DELETE'])]
    public function deleteSchedules(int $id, Schedule $schedule, AppointmentRepository $appointmentRepository, EntityManagerInterface $entityManager): Response
    {

        // Supprimez la relation entre schedule  et appointment
        $appointments = $appointmentRepository->findBy(['idSchedule' => $id]);

        foreach ($appointments as $appointment) {

            $entityManager->remove($appointment);
        }

        $entityManager->remove($schedule);

        $entityManager->flush();

        return $this->redirectToRoute('app_schedules', [], Response::HTTP_SEE_OTHER, true);
        // return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }
    
}
