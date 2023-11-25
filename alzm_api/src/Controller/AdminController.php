<?php

namespace App\Controller;

use App\Repository\AdminRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use OpenApi\Annotations as OA;


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

}
