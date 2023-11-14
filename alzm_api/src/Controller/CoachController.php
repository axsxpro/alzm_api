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

class CoachController extends AbstractController
{

    #[Route('/coachs', name: 'app_all_coach')]
    
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
    #[Route('/coachs/{id}', name: 'patient_id', methods: ['GET'])]
    public function getallPatients(Coach $coach, SerializerInterface $serializer): JsonResponse
    {
        $coachById = $serializer->serialize($coach, 'json', ['groups' => 'coach']);

        return new JsonResponse($coachById, Response::HTTP_OK, ['accept' => 'json'], true);
    }


    #[Route('/delete/coachs/{id}/', name: 'app_delete_coach', methods: ['DELETE'])]
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
