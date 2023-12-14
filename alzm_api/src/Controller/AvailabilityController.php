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
use OpenApi\Annotations as OA;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class AvailabilityController extends AbstractController
{

    /**
     * Get all availabilities 
     *
     * @OA\Response(
     *     response=200,
     *     description="Ok",
     * )
     * 
     * @OA\Tag(name="Availabilities")
     */
    #[Route('/api/availabilities', name: 'app_availabilities', methods: ['GET'])]
    public function getAvailabilities(AvailabilityRepository $availabilityRepository, SerializerInterface $serializerInterface): JsonResponse
    {

        $availabilities = $availabilityRepository->findAll();

        $availabilitiesJson = $serializerInterface->serialize($availabilities, 'json', ['groups' => 'availability']);

        return new JsonResponse($availabilitiesJson, Response::HTTP_OK, [], true);
    }


    /**
     * Get availabilities by coach id
     *
     * @OA\Response(
     *     response=200,
     *     description="Ok",
     * )
     * 
     * @OA\Tag(name="Availabilities")
     */
    #[Route('/api/coachs/{id}/availabilities', name: 'app_coach_availabilities', methods: ['GET'])]
    public function getAvailabilitiesByCoachId(int $id, AvailabilityRepository $availabilityRepository, SerializerInterface $serializerInterface): JsonResponse
    {

        //rechercher un appointment en fonction de l'id d'un coach
        $availabilitiesByCoachId = $availabilityRepository->findAavailabilitiesByCoachId($id);

        $availabilitiesCoachJson = $serializerInterface->serialize($availabilitiesByCoachId, 'json', ['groups' => 'availability']);

        // le code retour : ici Response::HTTP_OK  correspond au code 200 . Ce code est celui renvoyé par défaut lorsque rien n’est précisé ;
        // [] : les headers (qu’on laisse vides pour l’instant pour garder le comportement par défaut);
        // un true qui signifie que nous avons DÉJÀ sérialisé les données et qu’il n’y a donc plus de traitement à faire dessus. 
        return new JsonResponse($availabilitiesCoachJson, Response::HTTP_OK, [], true);
    }


    /**
     * Create new availabilities by coach id
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
     *         @OA\Property(property="dateAvailability", type="string", format="date-time", example="2023-12-28T10:00:00+00:00"),
     *         @OA\Property(property="hourStartSlot", type="string", format="date-time", example="2023-12-28T10:00:00+00:00"),
     *         @OA\Property(property="hourEndSlot", type="string", format="date-time", example="2023-12-28T10:00:00+00:00"),
     *   )
     * ),
     * 
     * @OA\Tag(name="Availabilities")
     */
    #[Route('/api/post/coachs/{id}/availabilities', name: "app_availabilities_post", methods: ['POST'])]
    public function createAvailabilities(int $id, Request $request, SerializerInterface $serializerInterface, CoachRepository $coachRepository, ValidatorInterface $validatorInterface, EntityManagerInterface $entityManager): JsonResponse
    {
    
        $availabilities = $serializerInterface->deserialize($request->getContent(), Availability::class, 'json');

        // On vérifie les erreurs
        $errors = $validatorInterface->validate($availabilities);

        if ($errors->count() > 0) {
            return new JsonResponse($serializerInterface->serialize($errors, 'json'), JsonResponse::HTTP_BAD_REQUEST, [], true);
        }

        // On cherche l' id du coach et on l'assigne à l'objet availabilities.
        // Si "find" ne trouve pas l' id, alors null sera retourné.
        $availabilities->setIdUser($coachRepository->find($id));

        // persistance des données dans la BDD
        $entityManager->persist($availabilities);

        $entityManager->flush();

        $jsonAvailabilities = $serializerInterface->serialize($availabilities, 'json', ['groups' => 'availability']);

        // created = code 201
        return new JsonResponse($jsonAvailabilities, Response::HTTP_CREATED, [], true);
    }



    /**
     * Edit availabilities by coach id and by availability id
     *
     * @OA\Response(
     *     response=202,
     *     description="Accepted",
     * )
     * 
     *   * @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(
     *         type="object",
     *         @OA\Property(property="dateAvailability", type="string", format="date-time", example="2023-12-28T10:00:00+00:00"),
     *         @OA\Property(property="hourStartSlot", type="string", format="date-time", example="2023-12-28T10:00:00+00:00"),
     *         @OA\Property(property="hourEndSlot", type="string", format="date-time", example="2023-12-28T10:00:00+00:00"),
     *   )
     * ),
     * 
     * @OA\Tag(name="Availabilities")
     */
    #[Route('/api/put/coachs/{id}/availabilities/{idAvailability}', name: "app_availabilities_put", methods: ['PUT'])]
    public function updateAvailabilities(int $id, int $idAvailability, Request $request, SerializerInterface $serializerInterface, AvailabilityRepository $availabilityRepository, ValidatorInterface $validatorInterface, EntityManagerInterface $entityManager): JsonResponse
    {
        $availability = $availabilityRepository->findAvailabilityCoachById($id, $idAvailability);

        // Les données JSON de la requête sont transformées en un objet 
        // [AbstractNormalizer::OBJECT_TO_POPULATE => $availability] :  permet de mettre à jour l'objet $availability existant avec les nouvelles données.
        $updateAvailability = $serializerInterface->deserialize($request->getContent(), Availability::class, 'json', [AbstractNormalizer::OBJECT_TO_POPULATE => $availability, 'ignored_attributes' => ['idAvailability', 'coach']]);

        // On vérifie les erreurs
        $errors = $validatorInterface->validate($availability);

        if ($errors->count() > 0) {
            return new JsonResponse($serializerInterface->serialize($errors, 'json'), JsonResponse::HTTP_BAD_REQUEST, [], true);
        }

        $entityManager->persist($updateAvailability);

        $entityManager->flush();

        $jsonUpdatedAvailabilities = $serializerInterface->serialize($updateAvailability, 'json', ['groups' => 'availability']);

        // accepted = code 202
        return new JsonResponse($jsonUpdatedAvailabilities, JsonResponse::HTTP_ACCEPTED, [], true);
    }


    /**
     * Delete availabilities by coach id and by availability id
     *
     * @OA\Response(
     *     response=204,
     *     description="No content",
     * )
     * 
     * @OA\Tag(name="Availabilities")
     */
    #[Route('/api/delete/coachs/{id}/availabilities/{idAvailability}', name: "app_availabilities_delete", methods: ['DELETE'])]
    public function deleteAvailabilities(int $id, int $idAvailability, AvailabilityRepository $availabilityRepository,  EntityManagerInterface $entityManager): Response
    {
        $availability = $availabilityRepository->deleteAvailability($id, $idAvailability);

        $entityManager->remove($availability);

        $entityManager->flush();

        // return $this->redirectToRoute('app_availabilities', [], Response::HTTP_SEE_OTHER, true);
        return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }


    /**
     * Delete availabilities 
     *
     * @OA\Response(
     *     response=204,
     *     description="No content",
     * )
     * 
     * @OA\Tag(name="Availabilities")
     */
    #[Route('/api/delete/availabilities/{id}', name: 'delete_availability_id', methods: ['DELETE'])]
    public function deleteAvailabilityById(Availability $availability, EntityManagerInterface $entityManager): Response
    {
        $entityManager->remove($availability);

        $entityManager->flush();

        // return $this->redirectToRoute('app_availabilities', [], Response::HTTP_SEE_OTHER, true);
        return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }
    
}
