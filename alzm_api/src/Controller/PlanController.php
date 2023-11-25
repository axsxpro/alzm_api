<?php

namespace App\Controller;

use App\Entity\Plan;
use App\Repository\AdvantageRepository;
use App\Repository\PlanRepository;
use App\Repository\ResourcesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use OpenApi\Annotations as OA;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;

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

        $plansJson = $serializerInterface->serialize($plans, 'json', ['groups' => 'plans']);

        return new JsonResponse($plansJson, Response::HTTP_OK, [], true);
    }


    /**
     * Get plans by id
     *
     * @OA\Response(
     *     response=200,
     *     description="OK",
     * )
     * 
     * @OA\Tag(name="Plans")
     */
    #[Route('/api/plans/{id}', name: 'plans_id', methods: ['GET'])]
    public function getPlanById(Plan $plan, SerializerInterface $serializer): JsonResponse
    {
        $planById = $serializer->serialize($plan, 'json', ['groups' => 'plans']);

        return new JsonResponse($planById, Response::HTTP_OK, ['accept' => 'json'], true);
    }


    /**
     * Create new plans
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
     *         @OA\Property(property="name", type="string",),
     *         @OA\Property(property="description", type="string"),
     *         @OA\Property(property="cost", type="string", format="float"),
     *         @OA\Property(
     *             property="advantages",
     *             type="array",
     *             @OA\Items(
     *                 type="object",
     *                 @OA\Property(property="idAdvantage", type="integer"),
     *             )
     *         ),
     *         @OA\Property(
     *             property="resources",
     *             type="array",
     *             @OA\Items(
     *                 type="object",
     *                 @OA\Property(property="idResources", type="integer"),
     *                
     *             )
     *         )
     *     )
     * ),
     * 
     * @OA\Tag(name="Plans")
     */
    #[Route('/api/post/plans', name: "app_plans_post", methods: ['POST'])]
    public function createPlans(Request $request, AdvantageRepository $advantageRepository, ResourcesRepository $resourcesRepository, serializerInterface $serializerInterface, EntityManagerInterface $entityManager): JsonResponse
    {

        $plan = $serializerInterface->deserialize($request->getContent(), Plan::class, 'json');

        // Récupération de l'ensemble des données envoyées sous forme de tableau
        $content = $request->toArray();

        // Récupération de la liste des avantages dans le tableau 'advantages'
        $advantages = $content['advantages'];

        // Pour chaque avantages
        foreach ($advantages as $advantage) {

            // Récupération de l'idAdvantage
            $idAdvantage = $advantage['idAdvantage'];

            // Recherche de l'avantage par son ID dans la base de données
            $advantageData = $advantageRepository->find($idAdvantage);

            // Si l'avantage est trouvé, l'ajouter au plan
            if ($advantageData) {
                $plan->addIdAdvantage($advantageData);
            }
        }

        // Récupération de la liste des ressources dans le tableau 'ressources'
        $resources = $content['resources'];

        foreach ($resources as $resource) {

            $idResource = $resource['idResources'];

            $plan->addIdResource($resourcesRepository->find($idResource));
        }

        $entityManager->persist($plan);
        $entityManager->flush();

        $jsonPlan = $serializerInterface->serialize($plan, 'json', ['groups' => 'plans']);

        return new JsonResponse($jsonPlan, Response::HTTP_CREATED, [], true);
    }



    /**
     * Edit plans
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
     *         @OA\Property(property="name", type="string",),
     *         @OA\Property(property="description", type="string"),
     *         @OA\Property(property="cost", type="string", format="float"),
     *         @OA\Property(
     *             property="advantages",
     *             type="array",
     *             @OA\Items(
     *                 type="object",
     *                 @OA\Property(property="idAdvantage", type="integer"),
     *             )
     *         ),
     *         @OA\Property(
     *             property="resources",
     *             type="array",
     *             @OA\Items(
     *                 type="object",
     *                 @OA\Property(property="idResources", type="integer"),
     *                
     *             )
     *         )
     *     )
     * ),
     * 
     * @OA\Tag(name="Plans")
     */
    #[Route('/api/put/plans/{id}', name: "app_plans_put", methods: ['PUT'])]
    public function updatePlans(Request $request, Plan $plan, AdvantageRepository $advantageRepository, ResourcesRepository $resourcesRepository, serializerInterface $serializerInterface, EntityManagerInterface $entityManager): JsonResponse
    {

        $plan = $serializerInterface->deserialize($request->getContent(), Plan::class, 'json', [AbstractNormalizer::OBJECT_TO_POPULATE => $plan, 'ignored_attributes' => ['idPlan']]);

        // Récupération de l'ensemble des données envoyées sous forme de tableau
        $content = $request->toArray();

        // Récupération de la liste des avantages dans le tableau 'advantages'
        $advantages = $content['advantages'];

        // Pour chaque avantages
        foreach ($advantages as $advantage) {

            // Récupération de l'idAdvantage
            $idAdvantage = $advantage['idAdvantage'];

            // Recherche de l'avantage par son ID dans la base de données
            $advantageData = $advantageRepository->find($idAdvantage);

            // Si l'avantage est trouvé, l'ajouter au plan
            if ($advantageData) {
                $plan->addIdAdvantage($advantageData);
            }
        }

        // Récupération de la liste des ressources dans le tableau 'ressources'
        $resources = $content['resources'];

        foreach ($resources as $resource) {

            $idResource = $resource['idResources'];

            $plan->addIdResource($resourcesRepository->find($idResource));
        }

        $entityManager->persist($plan);
        $entityManager->flush();

        $jsonPlan = $serializerInterface->serialize($plan, 'json', ['groups' => 'plans']);

        return new JsonResponse($jsonPlan, JsonResponse::HTTP_ACCEPTED, [], true);
    }


    /**
     * Delete plans
     *
     * @OA\Response(
     *     response=204,
     *     description="No content",
     * )
     * 
     * @OA\Tag(name="Plans")
     */
    #[Route('/api/delete/plans/{id}', name: 'delete_plans', methods: ['DELETE'])]
    public function deleteCourses(Plan $plan, EntityManagerInterface $entityManager): Response
    {
        $entityManager->remove($plan);

        $entityManager->flush();

        return $this->redirectToRoute('app_plans', [], Response::HTTP_SEE_OTHER, true);
        // return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }


}
