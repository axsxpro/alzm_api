<?php

namespace App\Controller;

use App\Entity\PlanningRules;
use App\Repository\PlanningRulesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class PlanningRulesController extends AbstractController
{
    #[Route('/planningrules/all', name: 'app_all_planning_rules')]
    public function allPlan(PlanningRulesRepository $planningRulesRepository, SerializerInterface $serializerInterface): JsonResponse
    {

        // afficher tous les utilisateurs de la base de données
        $allPlanningsRules = $planningRulesRepository->findAll();

        $allPlanningsJson = $serializerInterface->serialize($allPlanningsRules, 'json', ['groups' => 'planning']);

        // le code retour : ici Response::HTTP_OK  correspond au code 200 . Ce code est celui renvoyé par défaut lorsque rien n’est précisé ;
        // [] : les headers (qu’on laisse vides pour l’instant pour garder le comportement par défaut);
        // un true qui signifie que nous avons DÉJÀ sérialisé les données et qu’il n’y a donc plus de traitement à faire dessus. 
        return new JsonResponse($allPlanningsJson, Response::HTTP_OK, [], true);
    }


    // //utilisation du ParamConverter
    #[Route('/planningrules/all/{idPlanningRules}', name: 'planning_id', methods: ['GET'])]
    public function getPlanningById(PlanningRules $planningRules, SerializerInterface $serializer): JsonResponse
    {
        $planningById = $serializer->serialize($planningRules, 'json', ['groups' => 'planning'] );
    
        return new JsonResponse($planningById, Response::HTTP_OK, ['accept' => 'json'], true);
    }



}
