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
use OpenApi\Annotations as OA;


class PlanningRulesController extends AbstractController
{
    /**
     * Get all plannings
     *
     * @OA\Response(
     *     response=200,
     *     description="OK",
     * )
     * 
     * @OA\Tag(name="Plannings")
     */
    #[Route('/api/plannings', name: 'app_planning_rules', methods: ['GET'])]
    public function getPlanningsRules(PlanningRulesRepository $planningRulesRepository, SerializerInterface $serializerInterface): JsonResponse
    {

        $planningsRules = $planningRulesRepository->findAll();

        $planningsJson = $serializerInterface->serialize($planningsRules, 'json', ['groups' => 'planning']);

        // le code retour : ici Response::HTTP_OK  correspond au code 200 . Ce code est celui renvoyé par défaut lorsque rien n’est précisé ;
        // [] : les headers (qu’on laisse vides pour l’instant pour garder le comportement par défaut);
        // un true qui signifie que nous avons DÉJÀ sérialisé les données et qu’il n’y a donc plus de traitement à faire dessus. 
        return new JsonResponse($planningsJson, Response::HTTP_OK, [], true);
    }

    /**
     * Get plannings by id
     *
     * @OA\Response(
     *     response=200,
     *     description="OK",
     * )
     * 
     * @OA\Tag(name="Plannings")
     */
    #[Route('/api/plannings/{id}', name: 'planning_id', methods: ['GET'])]
    public function getPlanningById(PlanningRules $planningRules, SerializerInterface $serializer): JsonResponse
    {
        $planningById = $serializer->serialize($planningRules, 'json', ['groups' => 'planning']);

        return new JsonResponse($planningById, Response::HTTP_OK, ['accept' => 'json'], true);
    }


    /**
     * Create new plannings
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
     *         @OA\Property(property="minimalTimeSlot", type="string", format="date-time", example="2023-11-04T10:00:00+00:00"),
     *         @OA\Property(property="maximalTimeSlot", type="string", format="date-time", example="2023-11-04T10:00:00+00:00"),
     *         @OA\Property(property="workDays", type="string"),
     *         @OA\Property(property="workHoursStart", type="string", format="date-time", example="2023-11-04T09:00:00+00:00"),
     *         @OA\Property(property="workHoursEnd", type="string", format="date-time", example="2023-11-04T08:00:00+00:00"),
     *         @OA\Property(property="timeBetweenAppointments", type="string"),
     *         )
     *     )
     * ),
     * 
     * @OA\Tag(name="Plannings")
     */
    #[Route('/api/post/coachs/{id}/plannings', name: "app_plannings_post", methods: ['POST'])]
    public function createPlannings(int $id, Request $request, SerializerInterface $serializer, CoachRepository $coachRepository, EntityManagerInterface $entityManager): JsonResponse
    {
        // $request->getContent(): récupère le contenu de la requête HTTP POST reçue.
        // PlanningRules::class : C'est la classe cible dans laquelle on veut désérialiser les données JSON
        // json :  indique au composant de sérialisation que le contenu de la requête est au format JSON
        $planningRules = $serializer->deserialize($request->getContent(), PlanningRules::class, 'json');

        // On cherche l' id du coach et on l'assigne à l'objet PlanningsRules.
        // Si "find" ne trouve pas l'id, alors null sera retourné.
        $planningRules->setIdUser($coachRepository->find($id));

        $entityManager->persist($planningRules);

        $entityManager->flush();

        $jsonPlanningRules = $serializer->serialize($planningRules, 'json', ['groups' => 'planning']);

        // created = code 201
        return new JsonResponse($jsonPlanningRules, Response::HTTP_CREATED, [], true);
    }


    /**
     * Edit plannings
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
     *         @OA\Property(property="minimalTimeSlot", type="string", format="date-time", example="2023-11-04T10:00:00+00:00"),
     *         @OA\Property(property="maximalTimeSlot", type="string", format="date-time", example="2023-11-04T10:00:00+00:00"),
     *         @OA\Property(property="workDays", type="string"),
     *         @OA\Property(property="workHoursStart", type="string", format="date-time", example="2023-11-04T09:00:00+00:00"),
     *         @OA\Property(property="workHoursEnd", type="string", format="date-time", example="2023-11-04T08:00:00+00:00"),
     *         @OA\Property(property="timeBetweenAppointments", type="string"),
     *         )
     *     )
     * ),
     * 
     * @OA\Tag(name="Plannings")
     */
    #[Route('/api/put/coachs/{id}/plannings/{idPlanning}', name: "app_plannings_put", methods: ['PUT'])]
    public function updatePlannings(int $id, int $idPlanning, Request $request, SerializerInterface $serializer, PlanningRulesRepository $planningRulesRepository, EntityManagerInterface $entityManager): JsonResponse
    {
        $planningRules = $planningRulesRepository->findPlanningByCoachId($id, $idPlanning);

        // Les données JSON de la requête sont transformées en un objet 
        // [AbstractNormalizer::OBJECT_TO_POPULATE => $availability] :  permet de mettre à jour l'objet $availability existant avec les nouvelles données.
        $updatePlanning = $serializer->deserialize($request->getContent(), PlanningRules::class, 'json', [AbstractNormalizer::OBJECT_TO_POPULATE => $planningRules, 'ignored_attributes' => ['idPlanningRules', 'coach']]);

        $entityManager->persist($updatePlanning);

        $entityManager->flush();

        $jsonUpdatedPlanning = $serializer->serialize($updatePlanning, 'json', ['groups' => 'planning']);

        // accepted = code 202
        return new JsonResponse($jsonUpdatedPlanning, JsonResponse::HTTP_ACCEPTED, [], true);
    }


    /**
     * Delete plannings by coach id and planning id
     *
     * @OA\Response(
     *     response=204,
     *     description="No content",
     * )
     * 
     * @OA\Tag(name="Plannings")
     */
    #[Route('/api/delete/coachs/{id}/plannings/{idPlanning}', name: 'delete_plannings', methods: ['DELETE'])]
    public function deletePlannings(int $id, int $idPlanning, PlanningRulesRepository $planningRulesRepository,  EntityManagerInterface $entityManager): Response
    {
        $planningsRules = $planningRulesRepository->deletePlannings($id, $idPlanning);

        $entityManager->remove($planningsRules);

        $entityManager->flush();

        return $this->redirectToRoute('app_planning_rules', [], Response::HTTP_SEE_OTHER, true);
        // return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }
}
