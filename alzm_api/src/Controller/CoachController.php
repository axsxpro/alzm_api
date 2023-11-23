<?php

namespace App\Controller;

use App\Entity\AppUser;
use App\Entity\Coach;
use App\Repository\AppointmentRepository;
use App\Repository\AvailabilityRepository;
use App\Repository\CoachRepository;
use App\Repository\PlanningRulesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use OpenApi\Annotations as OA;


class CoachController extends AbstractController
{

    /**
     * Get all coaches
     *
     * @OA\Response(
     *     response=200,
     *     description="OK",
     * )
     * 
     * @OA\Tag(name="Coaches")
     */
    #[Route('/api/coaches', name: 'app_all_coach', methods: ['GET'])]
    public function getCoachs(CoachRepository $coachRepository, SerializerInterface $serializerInterface): JsonResponse
    {

        // afficher tous les utilisateurs de la base de données
        $coaches = $coachRepository->findAll();

        $coachesJson = $serializerInterface->serialize($coaches, 'json', ['groups' => 'coach']);

        // le code retour : ici Response::HTTP_OK  correspond au code 200 . Ce code est celui renvoyé par défaut lorsque rien n’est précisé ;
        // [] : les headers (qu’on laisse vides pour l’instant pour garder le comportement par défaut);
        // un true qui signifie que nous avons DÉJÀ sérialisé les données et qu’il n’y a donc plus de traitement à faire dessus. 
        return new JsonResponse($coachesJson, Response::HTTP_OK, [], true);

    }


    /**
     * Get coaches by id
     *
     * @OA\Response(
     *     response=200,
     *     description="OK",
     * )
     * 
     * @OA\Tag(name="Coaches")
     */
    #[Route('/api/coaches/{id}', name: 'coach_id', methods: ['GET'])]
    public function getCoachById(Coach $coach, SerializerInterface $serializer): JsonResponse
    {
        $coachById = $serializer->serialize($coach, 'json', ['groups' => 'coach']);

        return new JsonResponse($coachById, Response::HTTP_OK, ['accept' => 'json'], true);
    }


    /**
     * Delete coaches
     *
     * @OA\Response(
     *     response=204,
     *     description="No content",
     * )
     * 
     * @OA\Tag(name="Coaches")
     */
    #[Route('/api/delete/coaches/{id}/', name: 'app_delete_coach', methods: ['DELETE'])]
    public function deleteCoach(int $id, AppUser $appUser, Coach $coach, CoachRepository $coachRepository, AppointmentRepository $appointmentRepository, PlanningRulesRepository $planningRulesRepository, AvailabilityRepository $availabilityRepository, EntityManagerInterface $entityManager): Response
    {
        // Supprimez la relation entre PlanningRules et Coach
        $planningRules = $planningRulesRepository->findBy(['idUser' => $id]);

        foreach ($planningRules as $planningRule) {

            $entityManager->remove($planningRule);
        }

        // Supprimer la relation entre Availability et Coach
        $availabilities = $availabilityRepository->findBy(['idUser' => $id]);

        foreach ($availabilities as $availability) {

            $entityManager->remove($availability);
        }

        // Supprimez la relation entre Appointment et Coach
        $appointments = $appointmentRepository->findBy(['idCoach' => $id]);

        foreach ($appointments as $appointment) {
            $entityManager->remove($appointment);
        }

        // suprimer le coach de l'entité coach
        $coach = $coachRepository->findOneBy(['idUser' => $id]);

        if ($coach) {

            $entityManager->remove($coach);
        }

        // Supprimer l'utilisateur Coach de l'entité AppUser
        $entityManager->remove($appUser);

        $entityManager->flush();

        // atention si c'est une redirection alors ce n'est pas un JsonResponse mais une Response que l'on attend 
        return $this->redirectToRoute('app_users', [], Response::HTTP_SEE_OTHER, true);
    }


}
