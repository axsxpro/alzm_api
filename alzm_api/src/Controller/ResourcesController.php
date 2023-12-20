<?php

namespace App\Controller;

use App\Entity\Resources;
use App\Repository\FilesRepository;
use App\Repository\ResourcesRepository;
use App\Repository\TextRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use OpenApi\Annotations as OA;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class ResourcesController extends AbstractController
{

    /**
     * Get all resources
     *
     * @OA\Response(
     *     response=200,
     *     description="OK",
     * )
     * 
     * @OA\Tag(name="Resources")
     */
    #[Route('/api/resources', name: 'app_resources', methods: ['GET'])]
    public function getRessources(ResourcesRepository $resourcesRepository, SerializerInterface $serializerInterface): JsonResponse
    {
        $resources = $resourcesRepository->findAll();

        $resourcesJson = $serializerInterface->serialize($resources, 'json', ['groups' => 'resources']);

        return new JsonResponse($resourcesJson, Response::HTTP_OK, [], true);
    }


    /**
     * Get resources by id
     *
     * @OA\Response(
     *     response=200,
     *     description="OK",
     * )
     * 
     * @OA\Tag(name="Resources")
     */
    #[Route('/api/resources/{id}', name: 'resources_id', methods: ['GET'])]
    public function getResourcesById(Resources $resources, SerializerInterface $serializerInterface): JsonResponse
    {
        $resourcesById = $serializerInterface->serialize($resources, 'json', ['groups' => 'resources']);

        return new JsonResponse($resourcesById, Response::HTTP_OK, ['accept' => 'json'], true);
    }


    /**
     * Create new resources
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
     *         @OA\Property(property="text", type="array", @OA\Items(
     *             type="object",
     *             @OA\Property(property="idText", type="integer"),
     *         )),
     *         @OA\Property(property="files", type="array", @OA\Items(
     *             type="object",
     *             @OA\Property(property="idFiles", type="integer"),
     *         )),
     *     )
     * )
     * 
     * @OA\Tag(name="Resources")
     */
    #[Route('/api/post/resources', name: "app_resources_post", methods: ['POST'])]
    public function createResources(Request $request, FilesRepository $filesRepository, TextRepository $textRepository, serializerInterface $serializerInterface, ValidatorInterface $validatorInterface, EntityManagerInterface $entityManager): JsonResponse
    {

        $resource = $serializerInterface->deserialize($request->getContent(), Resources::class, 'json');


        // Récupération de l'ensemble des données envoyées sous forme de tableau
        $content = $request->toArray();

        // Récupération de la liste des texts dans le tableau 'text'
        $texts = $content['text'];

        // Pour chaque texts
        foreach ($texts as $text) {

            // Récupération de l'idAdvantage
            $idText = $text['idText'];

            // Recherche de l'avantage par son ID dans la base de données
            $textData = $textRepository->find($idText);

            // Si l'avantage est trouvé, l'ajouter au plan
            if ($textData) {

                $resource->addIdText($textData);
            }
        }

        // Récupération de la liste des files dans le tableau 'files'
        $files = $content['files'];

        foreach ($files as $file) {

            $idFile = $file['idFiles'];

            $resource->addIdFile($filesRepository->find($idFile));
        }

        // On vérifie les erreurs
        $errors = $validatorInterface->validate($resource);

        if ($errors->count() > 0) {
            return new JsonResponse($serializerInterface->serialize($errors, 'json'), JsonResponse::HTTP_BAD_REQUEST, [], true);
        }

        $entityManager->persist($resource);
        $entityManager->flush();

        $jsonResource = $serializerInterface->serialize($resource, 'json', ['groups' => 'resources']);

        return new JsonResponse($jsonResource, Response::HTTP_CREATED, [], true);
    }


    /**
     * Edit resources
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
     *         @OA\Property(property="text", type="array", @OA\Items(
     *             type="object",
     *             @OA\Property(property="idText", type="integer"),
     *         )),
     *         @OA\Property(property="files", type="array", @OA\Items(
     *             type="object",
     *             @OA\Property(property="idFiles", type="integer"),
     *         )),
     *     )
     * )
     * 
     * @OA\Tag(name="Resources")
     */
    #[Route('/api/put/resources/{id}', name: "app_resources_put", methods: ['PUT'])]
    public function updateResources(Request $request, Resources $resources, FilesRepository $filesRepository, TextRepository $textRepository, serializerInterface $serializerInterface, ValidatorInterface $validatorInterface, EntityManagerInterface $entityManager): JsonResponse
    {
        $resource = $serializerInterface->deserialize($request->getContent(), Resources::class, 'json', [AbstractNormalizer::OBJECT_TO_POPULATE => $resources, 'ignored_attributes' => ['idResources']]);

        // Récupération de l'ensemble des données envoyées sous forme de tableau
        $content = $request->toArray();

        // Récupération de la liste des texts dans le tableau 'text'
        $texts = $content['text'];

        // Supprimer les textes existants pour éventuellement les remplacer par d'autres texts
        // va récupérer le tableau 'idText' (nommé text) et effacer le contenu à l'intérieur
        $resource->getIdText()->clear();

        // Pour chaque texts
        foreach ($texts as $text) {

            // Récupération de l'idAdvantage
            $idText = $text['idText'];

            // Recherche de l'avantage par son ID dans la base de données
            $textData = $textRepository->find($idText);

            // Si l'avantage est trouvé, l'ajouter au plan
            if ($textData) {

                $resource->addIdText($textData);
            }
        }


        // Récupération de la liste des files dans le tableau 'files'
        $files = $content['files'];

        // Supprimer les files existants pour éventuellement les remplacer par d'autres files
        $resource->getIdFiles()->clear();

        foreach ($files as $file) {

            $idFile = $file['idFiles'];

            $resource->addIdFile($filesRepository->find($idFile));
        }

        // On vérifie les erreurs
        $errors = $validatorInterface->validate($resource);

        if ($errors->count() > 0) {
            return new JsonResponse($serializerInterface->serialize($errors, 'json'), JsonResponse::HTTP_BAD_REQUEST, [], true);
        }

        $entityManager->persist($resource);
        $entityManager->flush();

        $jsonResource = $serializerInterface->serialize($resource, 'json', ['groups' => 'resources']);

        return new JsonResponse($jsonResource, JsonResponse::HTTP_ACCEPTED, [], true);
    }



    /**
     * Delete resources
     *
     * @OA\Response(
     *     response=204,
     *     description="No content",
     * )
     * 
     * @OA\Tag(name="Resources")
     */
    #[Route('/api/delete/resources/{id}', name: 'delete_resources', methods: ['DELETE'])]
    public function deleteResources(Resources $resources, EntityManagerInterface $entityManager): Response
    {
        $entityManager->remove($resources);

        $entityManager->flush();

        // return $this->redirectToRoute('app_resources', [], Response::HTTP_SEE_OTHER, true);
        return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }
}
