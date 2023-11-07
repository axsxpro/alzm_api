<?php

namespace App\Controller;

use App\Entity\Availability;
use App\Repository\AvailabilityRepository;
use App\Repository\CoachRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\SerializerInterface;

class AvailabilityController extends AbstractController
{
    #[Route('/availabilities', name: 'app_availabilities')]
    public function allAvailabilities(AvailabilityRepository $availabilityRepository, SerializerInterface $serializerInterface): JsonResponse
    {

        // afficher tous les utilisateurs de la base de données
        $availabilities = $availabilityRepository->findAll();

        $availabilitiesJson = $serializerInterface->serialize($availabilities, 'json', ['groups' => 'availability']);

        // le code retour : ici Response::HTTP_OK  correspond au code 200 . Ce code est celui renvoyé par défaut lorsque rien n’est précisé ;
        // [] : les headers (qu’on laisse vides pour l’instant pour garder le comportement par défaut);
        // un true qui signifie que nous avons DÉJÀ sérialisé les données et qu’il n’y a donc plus de traitement à faire dessus. 
        return new JsonResponse($availabilitiesJson, Response::HTTP_OK, [], true);
    }


    // Récupérer les availabilities d'un coach
    #[Route('/coachs/{id}/availabilities', name: 'app_coach_availabilities', methods: ['GET'])]
    public function availabilitiesByCoachId(int $id, AvailabilityRepository $availabilityRepository, SerializerInterface $serializerInterface): JsonResponse
    {

        //rechercher un appointment en fonction de l'id d'un coach
        $availabilitiesByCoachId = $availabilityRepository->findAavailabilitiesByCoachId($id);

        $availabilitiesCoachJson = $serializerInterface->serialize($availabilitiesByCoachId, 'json', ['groups' => 'availability']);

        // le code retour : ici Response::HTTP_OK  correspond au code 200 . Ce code est celui renvoyé par défaut lorsque rien n’est précisé ;
        // [] : les headers (qu’on laisse vides pour l’instant pour garder le comportement par défaut);
        // un true qui signifie que nous avons DÉJÀ sérialisé les données et qu’il n’y a donc plus de traitement à faire dessus. 
        return new JsonResponse($availabilitiesCoachJson, Response::HTTP_OK, [], true);
    }


    // creation d'un rendez-vous
    #[Route('/post/coachs/{id}/availabilities', name: "app_availabilities_post", methods: ['POST'])]
    public function createUsers(int $id, Request $request, SerializerInterface $serializer, CoachRepository $coachRepository, EntityManagerInterface $entityManager): JsonResponse
    {
        // $request->getContent(): récupère le contenu de la requête HTTP POST reçue.
        // AppUser::class: C'est la classe cible dans laquelle on veut désérialiser les données JSON
        // json :  indique au composant de sérialisation que le contenu de la requête est au format JSON
        $availabilities = $serializer->deserialize($request->getContent(), Availability::class, 'json');

        // On cherche les id du coach et on l'assigne à l'objet availabilities.
        // Si "find" ne trouve pas les id, alors null sera retourné.
        $availabilities->setIdUser($coachRepository->find($id));

        // persistance des données dans la BDD
        $entityManager->persist($availabilities);

        $entityManager->flush();

        $jsonAvailabilities = $serializer->serialize($availabilities, 'json', ['groups' => 'availability']);

        // created = code 201
        return new JsonResponse($jsonAvailabilities, Response::HTTP_CREATED, [], true);
    }


    #[Route('/put/coachs/{id}/availabilities/{id_availability}', name: "app_availabilities_put", methods: ['PUT'])]
    public function updateAvailabilities(int $id, int $id_availability, Request $request, SerializerInterface $serializer, Availability $availability, CoachRepository $coachRepository, AvailabilityRepository $availabilityRepository, EntityManagerInterface $entityManager): JsonResponse
    {
        // Les données JSON de la requête sont transformées en un objet appUser
        // [AbstractNormalizer::OBJECT_TO_POPULATE => $appUser] :  permet de mettre à jour l'objet $appUser existant avec les nouvelles données.
        $updateAvailabilities = $serializer->deserialize($request->getContent(), Availability::class, 'json', [AbstractNormalizer::OBJECT_TO_POPULATE => $availability]);
        
        // $updateAvailabilities->getIdAvailability($availabilityRepository->find($id_availability));

        $updateAvailabilities->setIdUser($coachRepository->find($id));

        $entityManager->persist($updateAvailabilities);

        $entityManager->flush();

        $jsonUpdatedAvailabilities = $serializer->serialize($updateAvailabilities, 'json', ['groups' => 'availability']);

        // accepted = code 202
        return new JsonResponse($jsonUpdatedAvailabilities, JsonResponse::HTTP_ACCEPTED, [], true);
    }
}
