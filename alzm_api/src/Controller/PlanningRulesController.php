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
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\SerializerInterface;

class PlanningRulesController extends AbstractController
{
    #[Route('/planningrules', name: 'app_planning_rules', methods: ['GET'])]
    public function getPlanningsRules(PlanningRulesRepository $planningRulesRepository, SerializerInterface $serializerInterface): JsonResponse
    {

        // afficher tous les utilisateurs de la base de données
        $allPlanningsRules = $planningRulesRepository->findAll();

        $allPlanningsJson = $serializerInterface->serialize($allPlanningsRules, 'json', ['groups' => 'planning']);

        // le code retour : ici Response::HTTP_OK  correspond au code 200 . Ce code est celui renvoyé par défaut lorsque rien n’est précisé ;
        // [] : les headers (qu’on laisse vides pour l’instant pour garder le comportement par défaut);
        // un true qui signifie que nous avons DÉJÀ sérialisé les données et qu’il n’y a donc plus de traitement à faire dessus. 
        return new JsonResponse($allPlanningsJson, Response::HTTP_OK, [], true);
    }



    #[Route('/planningrules/{id}', name: 'planning_id', methods: ['GET'])]
    public function getPlanningById(PlanningRules $planningRules, SerializerInterface $serializer): JsonResponse
    {
        $planningById = $serializer->serialize($planningRules, 'json', ['groups' => 'planning']);

        return new JsonResponse($planningById, Response::HTTP_OK, ['accept' => 'json'], true);
    }


    // creation d'un planning
    #[Route('/post/coachs/{id}/plannings-rules', name: "app_plannings_post", methods: ['POST'])]
    public function createPlannings(int $id, Request $request, SerializerInterface $serializer, CoachRepository $coachRepository, EntityManagerInterface $entityManager): JsonResponse
    {
        // $request->getContent(): récupère le contenu de la requête HTTP POST reçue.
        // PlanningRules::class : C'est la classe cible dans laquelle on veut désérialiser les données JSON
        // json :  indique au composant de sérialisation que le contenu de la requête est au format JSON
        $planningRules = $serializer->deserialize($request->getContent(), PlanningRules::class, 'json');

        // On cherche l' id du coach et on l'assigne à l'objet PlanningsRules.
        // Si "find" ne trouve pas l'id, alors null sera retourné.
        $planningRules->setIdUser($coachRepository->find($id));

        // persistance des données dans la BDD
        $entityManager->persist($planningRules);

        $entityManager->flush();

        $jsonPlanningRules = $serializer->serialize($planningRules, 'json', ['groups' => 'planning']);

        // created = code 201
        return new JsonResponse($jsonPlanningRules, Response::HTTP_CREATED, [], true);
    }


    // modifier le planning d'un coach
    #[Route('/put/coachs/{id}/plannings/{idPlanning}', name: "app_plannings_put", methods: ['PUT'])]
    public function updatePlannings(int $id, int $idPlanning, Request $request, SerializerInterface $serializer, PlanningRulesRepository $planningRulesRepository, EntityManagerInterface $entityManager): JsonResponse
    {
        $planningRules = $planningRulesRepository->findPlanningByCoachId($id, $idPlanning);

        // Les données JSON de la requête sont transformées en un objet 
        // [AbstractNormalizer::OBJECT_TO_POPULATE => $availability] :  permet de mettre à jour l'objet $availability existant avec les nouvelles données.
        $updatePlanning = $serializer->deserialize($request->getContent(), PlanningRules::class, 'json', [AbstractNormalizer::OBJECT_TO_POPULATE => $planningRules, 'ignored_attributes' => ['idUser', 'lastname', 'firstname', 'datebirth']]);

        $entityManager->persist($updatePlanning);

        $entityManager->flush();

        $jsonUpdatedPlanning = $serializer->serialize($updatePlanning, 'json', ['groups' => 'planning']);

        // accepted = code 202
        return new JsonResponse($jsonUpdatedPlanning, JsonResponse::HTTP_ACCEPTED, [], true);
    }


    // Les Coachs suppriment leurs plannings
    #[Route('delete/coachs/{id}/plannings/{idPlanning}', name: 'delete_availabilities', methods: ['DELETE'])]
    public function deletePlannings(int $id, int $idPlanning, PlanningRulesRepository $planningRulesRepository,  EntityManagerInterface $entityManager): Response
    {
        $planningsRules = $planningRulesRepository->deletePlannings($id, $idPlanning);

        $entityManager->remove($planningsRules);

        $entityManager->flush();

        return $this->redirectToRoute('app_planning_rules', [], Response::HTTP_SEE_OTHER, true);
        // return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }


}
