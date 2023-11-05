<?php

namespace App\Controller;

use App\Repository\AdvantageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class AdvantagesController extends AbstractController
{
    #[Route('/advantages/all', name: 'app_all_advantages')]
    public function allAdvantages(AdvantageRepository $advantageRepository, SerializerInterface $serializerInterface): JsonResponse
    {

        // afficher tous les utilisateurs de la base de données
        $allAdvantages = $advantageRepository->findAll();

        $allAdvantagesJson = $serializerInterface->serialize($allAdvantages, 'json',['groups' => 'advantages'] );

        // le code retour : ici Response::HTTP_OK  correspond au code 200 . Ce code est celui renvoyé par défaut lorsque rien n’est précisé ;
        // [] : les headers (qu’on laisse vides pour l’instant pour garder le comportement par défaut);
        // un true qui signifie que nous avons DÉJÀ sérialisé les données et qu’il n’y a donc plus de traitement à faire dessus. 
        return new JsonResponse($allAdvantagesJson, Response::HTTP_OK, [], true);
    }
}
