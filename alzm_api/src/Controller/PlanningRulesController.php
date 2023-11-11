<?php

namespace App\Controller;

use App\Entity\PlanningRules;
use App\Repository\CoachRepository;
use App\Repository\PlanningRulesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class PlanningRulesController extends AbstractController
{
    #[Route('/planningrules', name: 'app_all_planning_rules')]
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
    #[Route('/planningrules/{id}', name: 'planning_id', methods: ['GET'])]
    public function getPlanningById(PlanningRules $planningRules, SerializerInterface $serializer): JsonResponse
    {
        $planningById = $serializer->serialize($planningRules, 'json', ['groups' => 'planning']);

        return new JsonResponse($planningById, Response::HTTP_OK, ['accept' => 'json'], true);
    }


    // creation d'une disponibilités
    #[Route('/post/coachs/{id}/plannings-rules', name: "app_plannings_post", methods: ['POST'])]
    public function createUsers(int $id, Request $request, SerializerInterface $serializer, CoachRepository $coachRepository, EntityManagerInterface $entityManager): JsonResponse
    {
        // $request->getContent(): récupère le contenu de la requête HTTP POST reçue.
        // AppUser::class: C'est la classe cible dans laquelle on veut désérialiser les données JSON
        // json :  indique au composant de sérialisation que le contenu de la requête est au format JSON
        $availabilities = $serializer->deserialize($request->getContent(), Availability::class, 'json');

        // On cherche les id du coach et on l'assigne à l'objet availabilities.
        // Si "find" ne trouve pas les id, alors null sera retourné.
        $availabilities->setIdUser($coachRepository->find($id));

        // persistance des données dans la BDD
        $entityManager->persist($availabilities);

        $entityManager->flush();

        $jsonAvailabilities = $serializer->serialize($availabilities, 'json', ['groups' => 'availability']);

        // created = code 201
        return new JsonResponse($jsonAvailabilities, Response::HTTP_CREATED, [], true);
    }

}
