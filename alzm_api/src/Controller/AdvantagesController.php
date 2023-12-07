<?php

namespace App\Controller;

use App\Entity\Advantage;
use App\Repository\AdvantageRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use OpenApi\Annotations as OA;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;



class AdvantagesController extends AbstractController
{

    /**
     * Get all advantages
     *
     * @OA\Response(
     *     response=200,
     *     description="Ok",
     * )
     * 
     * @OA\Tag(name="Advantages")
     */
    #[Route('/api/advantages/', name: 'app_advantages', methods: ['GET'])]
    public function getAdvantages(AdvantageRepository $advantageRepository, SerializerInterface $serializerInterface): JsonResponse
    {
        $advantages = $advantageRepository->findAll();

        $advantagesJson = $serializerInterface->serialize($advantages, 'json', ['groups' => 'advantages']);

        return new JsonResponse($advantagesJson, Response::HTTP_OK, [], true);
    }


    /**
     * Get advantages by id
     *
     * @OA\Response(
     *     response=200,
     *     description="Ok",
     * )
     * 
     * @OA\Tag(name="Advantages")
     */
    #[Route('/api/advantages/{id}', name: 'app_advantages_id', methods: ['GET'])]
    public function getAdvantagebyId(Advantage $advantage, SerializerInterface $serializerInterface): JsonResponse
    {
        $advantageById = $serializerInterface->serialize($advantage, 'json', ['groups' => 'advantages']);

        return new JsonResponse($advantageById, Response::HTTP_OK, ['accept' => 'json'], true);
    }



    /**
     * Create new advantages
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
     *         @OA\Property(property="description", type="string"),
     *     )
     * ),
     * 
     * @OA\Tag(name="Advantages")
     */
    #[Route('/api/post/advantages', name: "app_advantages_post", methods: ['POST'])]
    public function createAdvantages(Request $request, serializerInterface $serializerInterface, EntityManagerInterface $entityManager, ValidatorInterface $validatorInterface): JsonResponse
    {
        $advantages = $serializerInterface->deserialize($request->getContent(), Advantage::class, 'json');

        // On vérifie les erreurs
        $errors = $validatorInterface->validate($advantages);

        if ($errors->count() > 0) {
            return new JsonResponse($serializerInterface->serialize($errors, 'json'), JsonResponse::HTTP_BAD_REQUEST, [], true);
        }

        $entityManager->persist($advantages);

        $entityManager->flush();

        $advantagesJson = $serializerInterface->serialize($advantages, 'json', ['groups' => 'advantages']);

        // created = code 201
        return new JsonResponse($advantagesJson, Response::HTTP_CREATED, [], true);
    }



    /**
     * Edit advantages
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
     *         @OA\Property(property="description", type="string"),
     *     )
     * ),
     * 
     * @OA\Tag(name="Advantages")
     */
    #[Route('/api/put/advantages/{id}', name: "app_advantages_put", methods: ['PUT'])]
    public function updateAdvantages(Request $request, Advantage $advantage,  serializerInterface $serializerInterface, EntityManagerInterface $entityManager, ValidatorInterface $validatorInterface): JsonResponse
    {
        $advantages = $serializerInterface->deserialize($request->getContent(), Advantage::class, 'json', [AbstractNormalizer::OBJECT_TO_POPULATE => $advantage, 'ignored_attributes' => ['idAdvantage']]);

        // On vérifie les erreurs
        $errors = $validatorInterface->validate($advantages);

        if ($errors->count() > 0) {
            return new JsonResponse($serializerInterface->serialize($errors, 'json'), JsonResponse::HTTP_BAD_REQUEST, [], true);
        }

        $entityManager->persist($advantages);

        $entityManager->flush();

        $advantagesJson = $serializerInterface->serialize($advantages, 'json', ['groups' => 'advantages']);

        return new JsonResponse($advantagesJson, JsonResponse::HTTP_ACCEPTED, [], true);

    }


    /**
     * Delete advantages
     *
     * @OA\Response(
     *     response=204,
     *     description="No content",
     * )
     * 
     * @OA\Tag(name="Advantages")
     */
    #[Route('/api/delete/advantages/{id}', name: 'delete_advantages', methods: ['DELETE'])]
    public function deleteAdvantages( Advantage $advantage, EntityManagerInterface $entityManager): Response
    {
        $entityManager->remove($advantage);

        $entityManager->flush();

        return $this->redirectToRoute('app_advantages', [], Response::HTTP_SEE_OTHER, true);
        // return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }


}
