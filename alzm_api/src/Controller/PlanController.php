<?php

namespace App\Controller;

use App\Repository\PlanRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use OpenApi\Annotations as OA;


class PlanController extends AbstractController
{

    /**
     * Get all plans
     *
     * @OA\Response(
     *     response=200,
     *     description="Ok",
     * )
     * 
     * @OA\Tag(name="Plans")
     */
    #[Route('/api/plans', name: 'app_plans', methods: ['GET'])]
    public function getPlans(PlanRepository $planRepository, SerializerInterface $serializerInterface): JsonResponse
    {

        $plans = $planRepository->findAll();

        $plansJson = $serializerInterface->serialize($plans, 'json',['groups' => 'plans']);

        // le code retour : ici Response::HTTP_OK  correspond au code 200 . Ce code est celui renvoyé par défaut lorsque rien n’est précisé ;
        // [] : les headers (qu’on laisse vides pour l’instant pour garder le comportement par défaut);
        // un true qui signifie que nous avons DÉJÀ sérialisé les données et qu’il n’y a donc plus de traitement à faire dessus. 
        return new JsonResponse($plansJson, Response::HTTP_OK, [], true);
    }


}
