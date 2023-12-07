<?php

namespace App\Controller;

use App\Entity\Admin;
use App\Repository\AdminRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use OpenApi\Annotations as OA;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;

class AdminController extends AbstractController
{

    /**
     * Get admin
     *
     * @OA\Response(
     *     response=200,
     *     description="OK",
     * )
     * 
     * @OA\Tag(name="Admin")
     */
    #[Route('/api/admin', name: 'app_admin', methods:['GET'])]
    public function allAdmin(AdminRepository $adminRepository, SerializerInterface $serializerInterface): JsonResponse
    {

        $admin = $adminRepository->findAll();

        $adminJson = $serializerInterface->serialize($admin, 'json');

        return new JsonResponse($adminJson, Response::HTTP_OK, [], true);
    }


    /**
     * Edit Admin informations
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
     *         @OA\Property(property="email", type="string", format="email"),
     *         @OA\Property(property="password", type="string"),
     *     )
     * ),
     * 
     * @OA\Tag(name="Admin")
     */
    #[Route('/api/put/admin/{id}', name: "app_admin_put", methods: ['PUT'])]
    public function updateAdmin(Request $request, SerializerInterface $serializerInterface, Admin $admin, EntityManagerInterface $entityManager): JsonResponse
    {

        $updatedAdmin = $serializerInterface->deserialize($request->getContent(), Admin::class, 'json', [AbstractNormalizer::OBJECT_TO_POPULATE => $admin, 'ignored_attributes' => ['idUser', 'lastname', 'firstname', 'datebirth', 'dateRegistration', 'roles']]);

        $entityManager->persist($updatedAdmin);

        $entityManager->flush();

        $jsonUpdatedAdmin = $serializerInterface->serialize($updatedAdmin, 'json');

        // accepted = code 202
        return new JsonResponse($jsonUpdatedAdmin, JsonResponse::HTTP_ACCEPTED, [], true);
    }


    /**
     * Delete admin
     *
     * @OA\Response(
     *     response=204,
     *     description="No content",
     * )
     * 
     * @OA\Tag(name="Admin")
     */
    #[Route('/api/delete/admin/{id}', name: 'delete_admin', methods: ['DELETE'])]
    public function deleteAdmin(Admin $admin, EntityManagerInterface $entityManager): Response
    {

        $entityManager->remove($admin);

        $entityManager->flush();

        return $this->redirectToRoute('app_admin', [], Response::HTTP_SEE_OTHER, true);
        // return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }

}
