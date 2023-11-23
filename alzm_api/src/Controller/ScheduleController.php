<?php

namespace App\Controller;

use App\Repository\ScheduleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use OpenApi\Annotations as OA;


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

        // serialisation : convertir  des objets en chaine de caractères
        $schedulesJson = $serializerInterface->serialize($schedules, 'json');

        // le code retour : Response::HTTP_OK :  correspond au code 200
        // [] : les headers (qu’on laisse vides pour l’instant pour garder le comportement par défaut);
        // true : indique que la réponse JSON doit être mise en forme en utilisant la mise en forme JSON "pretty"
        return new JsonResponse($schedulesJson, Response::HTTP_OK, [], true);
    }


}
