<?php

namespace App\Controller;

use App\Entity\Coach;
use App\Repository\CoachRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class CoachController extends AbstractController
{

    #[Route('/coach/all', name: 'app_all_coach')]
    public function allCoach(CoachRepository $coachRepository, SerializerInterface $serializerInterface): JsonResponse
    {

        // afficher tous les utilisateurs de la base de données
        $allCoach = $coachRepository->findAll();

        $allCoachJson = $serializerInterface->serialize($allCoach, 'json', ['groups' => 'coach']);

        // le code retour : ici Response::HTTP_OK  correspond au code 200 . Ce code est celui renvoyé par défaut lorsque rien n’est précisé ;
        // [] : les headers (qu’on laisse vides pour l’instant pour garder le comportement par défaut);
        // un true qui signifie que nous avons DÉJÀ sérialisé les données et qu’il n’y a donc plus de traitement à faire dessus. 
        return new JsonResponse($allCoachJson, Response::HTTP_OK, [], true);
    }


    //utilisation du ParamConverter
    #[Route('/coach/all/{id}', name: 'patient_id', methods: ['GET'])]
    public function getallPatients(Coach $coach, SerializerInterface $serializer): JsonResponse
    {
        $coachById = $serializer->serialize($coach, 'json', ['groups' => 'coach']);

        return new JsonResponse($coachById, Response::HTTP_OK, ['accept' => 'json'], true);
    }


}
