<?php

namespace App\Controller;

use App\Entity\Files;
use App\Repository\FilesRepository;
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

class FilesController extends AbstractController
{

    /**
     * Get all files
     *
     * @OA\Response(
     *     response=200,
     *     description="Ok",
     * )
     * 
     * @OA\Tag(name="Files")
     */
    #[Route('/api/files', name: 'app_files', methods: ['GET'])]
    public function getFiles(FilesRepository $filesRepository, SerializerInterface $serializerInterface): JsonResponse
    {

        $files = $filesRepository->findAll();

        $filesJson = $serializerInterface->serialize($files, 'json', ['groups' => 'files']);

        return new JsonResponse($filesJson, Response::HTTP_OK, [], true);
    }

    /**
     * Get files by id
     *
     * @OA\Response(
     *     response=200,
     *     description="Ok",
     * )
     * 
     * @OA\Tag(name="Files")
     */
    #[Route('/api/files/{id}', name: 'app_files_id', methods: ['GET'])]
    public function getFilesbyId(Files $files, SerializerInterface $serializerInterface): JsonResponse
    {

        $filesById = $serializerInterface->serialize($files, 'json', ['groups' => 'files']);

        return new JsonResponse($filesById, Response::HTTP_OK, ['accept' => 'json'], true);
    }


    /**
     * Create new files
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
     *         @OA\Property(property="link", type="string"),
     *         @OA\Property(property="type", type="string"),
     *     )
     * ),
     * 
     * @OA\Tag(name="Files")
     */
    #[Route('/api/post/files', name: "app_files_post", methods: ['POST'])]
    public function createFiles(Request $request, serializerInterface $serializerInterface, EntityManagerInterface $entityManager, ValidatorInterface $validatorInterface): JsonResponse
    {

        $files = $serializerInterface->deserialize($request->getContent(), Files::class, 'json');

        // On vérifie les erreurs
        $errors = $validatorInterface->validate($files);

        if ($errors->count() > 0) {
            return new JsonResponse($serializerInterface->serialize($errors, 'json'), JsonResponse::HTTP_BAD_REQUEST, [], true);
        }

        $entityManager->persist($files);

        $entityManager->flush();

        $filesJson = $serializerInterface->serialize($files, 'json', ['groups' => 'files']);

        // created = code 201
        return new JsonResponse($filesJson, Response::HTTP_CREATED, [], true);
    }


    /**
     * edit new files
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
     *         @OA\Property(property="link", type="string"),
     *         @OA\Property(property="type", type="string"),
     *     )
     * ),
     * 
     * @OA\Tag(name="Files")
     */
    #[Route('/api/put/files/{id}', name: "app_files_put", methods: ['PUT'])]
    public function updateFiles(Request $request, Files $files, serializerInterface $serializerInterface, EntityManagerInterface $entityManager, ValidatorInterface $validatorInterface): JsonResponse
    {

        $filesContent = $serializerInterface->deserialize($request->getContent(), Files::class, 'json', [AbstractNormalizer::OBJECT_TO_POPULATE => $files, 'ignored_attributes' => ['idFiles']]);

        // On vérifie les erreurs
        $errors = $validatorInterface->validate($filesContent);

        if ($errors->count() > 0) {
            return new JsonResponse($serializerInterface->serialize($errors, 'json'), JsonResponse::HTTP_BAD_REQUEST, [], true);
        }

        $entityManager->persist($filesContent);

        $entityManager->flush();

        $filesJson = $serializerInterface->serialize($filesContent, 'json', ['groups' => 'files']);

        // created = code 201
        return new JsonResponse($filesJson, Response::HTTP_CREATED, [], true);
    }


    /**
     * Delete files
     *
     * @OA\Response(
     *     response=204,
     *     description="No content",
     * )
     * 
     * @OA\Tag(name="Files")
     */
    #[Route('/api/delete/files/{id}', name: 'delete_files', methods: ['DELETE'])]
    public function deleteFiles( Files $files, EntityManagerInterface $entityManager): Response
    {

        $entityManager->remove($files);

        $entityManager->flush();

        return $this->redirectToRoute('app_files', [], Response::HTTP_SEE_OTHER, true);
        // return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }


}
