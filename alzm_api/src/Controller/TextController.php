<?php

namespace App\Controller;

use App\Entity\Text;
use App\Repository\TextRepository;
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

class TextController extends AbstractController
{


    /**
     * Get all text
     *
     * @OA\Response(
     *     response=200,
     *     description="Ok",
     * )
     * 
     * @OA\Tag(name="Text")
     */
    #[Route('/api/text', name: 'app_text', methods: ['GET'])]
    public function getText(TextRepository $textRepository, SerializerInterface $serializerInterface): JsonResponse
    {

        $text = $textRepository->findAll();

        $textJson = $serializerInterface->serialize($text, 'json', ['groups' => 'text']);

        return new JsonResponse($textJson, Response::HTTP_OK, [], true);
    }



    /**
     * Get text by id
     *
     * @OA\Response(
     *     response=200,
     *     description="Ok",
     * )
     * 
     * @OA\Tag(name="Text")
     */
    #[Route('/api/text/{id}', name: 'app_text_id', methods: ['GET'])]
    public function getTextbyId(Text $text, SerializerInterface $serializerInterface): JsonResponse
    {

        $textById = $serializerInterface->serialize($text, 'json', ['groups' => 'text']);

        return new JsonResponse($textById, Response::HTTP_OK, ['accept' => 'json'], true);
    }


    /**
     * Create new text
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
     *         @OA\Property(property="text", type="string"),
     *     )
     * ),
     * 
     * @OA\Tag(name="Text")
     */
    #[Route('/api/post/text', name: "app_text_post", methods: ['POST'])]
    public function createText(Request $request, serializerInterface $serializerInterface, EntityManagerInterface $entityManager, ValidatorInterface $validatorInterface): JsonResponse
    {

        $text = $serializerInterface->deserialize($request->getContent(), Text::class, 'json');

        // On vérifie les erreurs
        $errors = $validatorInterface->validate($text);

        if ($errors->count() > 0) {
            return new JsonResponse($serializerInterface->serialize($errors, 'json'), JsonResponse::HTTP_BAD_REQUEST, [], true);
        }

        $entityManager->persist($text);

        $entityManager->flush();

        $textJson = $serializerInterface->serialize($text, 'json', ['groups' => 'text']);

        // created = code 201
        return new JsonResponse($textJson, Response::HTTP_CREATED, [], true);
    }


    /**
     * Edit new text
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
     *         @OA\Property(property="text", type="string"),
     *     )
     * ),
     * 
     * @OA\Tag(name="Text")
     */
    #[Route('/api/put/text/{id}', name: "app_text_put", methods: ['PUT'])]
    public function updateText(Request $request, Text $text, serializerInterface $serializerInterface, EntityManagerInterface $entityManager, ValidatorInterface $validatorInterface): JsonResponse
    {

        $textContent = $serializerInterface->deserialize($request->getContent(), Text::class, 'json', [AbstractNormalizer::OBJECT_TO_POPULATE => $text, 'ignored_attributes' => ['idText']]);

        // On vérifie les erreurs
        $errors = $validatorInterface->validate($textContent);

        if ($errors->count() > 0) {
            return new JsonResponse($serializerInterface->serialize($errors, 'json'), JsonResponse::HTTP_BAD_REQUEST, [], true);
        }

        $entityManager->persist($textContent);

        $entityManager->flush();

        $textJson = $serializerInterface->serialize($textContent, 'json', ['groups' => 'text']);

        // created = code 201
        return new JsonResponse($textJson, Response::HTTP_CREATED, [], true);
    }


    /**
     * Delete text
     *
     * @OA\Response(
     *     response=204,
     *     description="No content",
     * )
     * 
     * @OA\Tag(name="Text")
     */
    #[Route('/api/delete/text/{id}', name: 'delete_text', methods: ['DELETE'])]
    public function deleteText(Text $text, EntityManagerInterface $entityManager): Response
    {

        $entityManager->remove($text);

        $entityManager->flush();

        return $this->redirectToRoute('app_text', [], Response::HTTP_SEE_OTHER, true);
        // return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }
}
