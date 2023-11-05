<?php

namespace App\Controller;

use App\Repository\AvailabilityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class AvailabilityController extends AbstractController
{
    #[Route('/availability/all', name: 'app_all_availability')]
    public function allAdvantages(AvailabilityRepository $availabilityRepository, SerializerInterface $serializerInterface): JsonResponse
    {

        // afficher tous les utilisateurs de la base de données
        $allAvailability = $availabilityRepository->findAll();

        $allAvailabilityJson = $serializerInterface->serialize($allAvailability, 'json',['groups' => 'availability'] );

        // le code retour : ici Response::HTTP_OK  correspond au code 200 . Ce code est celui renvoyé par défaut lorsque rien n’est précisé ;
        // [] : les headers (qu’on laisse vides pour l’instant pour garder le comportement par défaut);
        // un true qui signifie que nous avons DÉJÀ sérialisé les données et qu’il n’y a donc plus de traitement à faire dessus. 
        return new JsonResponse($allAvailabilityJson, Response::HTTP_OK, [], true);
    }
}
