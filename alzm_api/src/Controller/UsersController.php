<?php

namespace App\Controller;

use App\Entity\Appointment;
use App\Entity\AppUser;
use App\Entity\Availability;
use App\Entity\Coach;
use App\Entity\Course;
use App\Entity\Patient;
use App\Entity\PlanningRules;
use App\Repository\AppointmentRepository;
use App\Repository\AppUserRepository;
use App\Repository\AvailabilityRepository;
use App\Repository\CoachRepository;
use App\Repository\PatientRepository;
use App\Repository\PlanningRulesRepository;
use App\Repository\TransactionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Routing\Annotation\Route;

class UsersController extends AbstractController
{
    #[Route('/users', name: 'app_all_user')]
    public function allUser(AppUserRepository $AppUserRepository, SerializerInterface $serializerInterface): JsonResponse
    {

        // afficher tous les utilisateurs de la base de données
        $allUser = $AppUserRepository->findAll();

        $allUserJson = $serializerInterface->serialize($allUser, 'json');

        // le code retour : ici Response::HTTP_OK  correspond au code 200 . Ce code est celui renvoyé par défaut lorsque rien n’est précisé ;
        // [] : les headers (qu’on laisse vides pour l’instant pour garder le comportement par défaut);
        // un true qui signifie que nous avons DÉJÀ sérialisé les données et qu’il n’y a donc plus de traitement à faire dessus. 
        return new JsonResponse($allUserJson, Response::HTTP_OK, [], true);
    }



    //utilisation du ParamConverter
    #[Route('/users/{id}', name: 'alluser_id', methods: ['GET'])]
    public function getUserById(AppUser $appUser, SerializerInterface $serializer): JsonResponse
    {
        $userbyid = $serializer->serialize($appUser, 'json');

        return new JsonResponse($userbyid, Response::HTTP_OK, ['accept' => 'json'], true);
    }


    #[Route('/users/{id}/roles', name: 'alluser_id', methods: ['GET'])]
    public function getRoleById(int $id, AppUserRepository $appUserRepository, SerializerInterface $serializer): JsonResponse
    {

        $idUser = $appUserRepository->findUserRoleById($id);

        $roleUser = $serializer->serialize($idUser, 'json');

        return new JsonResponse($roleUser, Response::HTTP_OK, ['accept' => 'json'], true);
    }


    #[Route('/users/{id}/delete/coach', name: 'app_user_delete', methods: ['DELETE'])]
    public function deleteCoach(int $id, AppUser $appUser, Coach $coach, CoachRepository $coachRepository, AppointmentRepository $appointmentRepository, PlanningRulesRepository $planningRulesRepository, AvailabilityRepository $availabilityRepository, EntityManagerInterface $entityManager): Response
    {

        // Supprimez la relation entre PlanningRules et Coach
        $planningRules = $planningRulesRepository->findBy(['idUser' => $id]);

        foreach ($planningRules as $planningRule) {

            $entityManager->remove($planningRule);
        }

        // Supprimer la relation entre Availability et Coach
        $availabilities = $availabilityRepository->findBy(['idUser' => $id]);

        foreach ($availabilities as $availability){

            $entityManager->remove($availability);
        }

        // Supprimez la relation entre Appointment et Coach
        $appointments = $appointmentRepository->findBy(['idCoach' => $id]);

        foreach ($appointments as $appointment) {
            // Utilisez des composants de clé primaire séparément
            $idCoach = $appointment->getIdCoach();
            $idPatient = $appointment->getIdPatient();
            $idSchedule = $appointment->getIdSchedule();

            // Cherchez et supprimez l'entité Appointment par ses composants de clé primaire
            $appointmentToDelete = $appointmentRepository->findOneBy([
                'idCoach' => $idCoach,
                'idPatient' => $idPatient,
                'idSchedule' => $idSchedule
            ]);

            if ($appointmentToDelete) {
                $entityManager->remove($appointmentToDelete);
            }
        }

        // suprimer le coach de l'entité coach
        $coach = $coachRepository->findOneBy(['idUser' => $id]);

        if ($coach) {

            $entityManager->remove($coach);
        }

        // Supprimer l'utilisateur Coach de l'entité AppUser
        $entityManager->remove($appUser);

        $entityManager->flush();

        return $this->redirectToRoute('app_all_user', [], Response::HTTP_SEE_OTHER);
    }




    #[Route('/users/{id}/delete/patient', name: 'app_user_delete', methods: ['DELETE'])]
    public function deletePatient(int $id, AppUser $appUser, PatientRepository $patientRepository, AppointmentRepository $appointmentRepository, TransactionRepository $transactionRepository, EntityManagerInterface $entityManager): Response
    {

        // Supprimez la relation entre transaction et patient
        $transactions = $transactionRepository->findBy(['idUser' => $id]);

        foreach ($transactions as $transaction) {

            $entityManager->remove($transaction);
        }

        // Supprimez la relation entre Appointment et patient
        $appointments = $appointmentRepository->findBy(['idPatient' => $id]);

        foreach ($appointments as $appointment) {
            // Utilisez des composants de clé primaire séparément
            $idCoach = $appointment->getIdCoach();
            $idPatient = $appointment->getIdPatient();
            $idSchedule = $appointment->getIdSchedule();

            // Cherchez et supprimez l'entité Appointment par ses composants de clé primaire
            $appointmentToDelete = $appointmentRepository->findOneBy([
                'idCoach' => $idCoach,
                'idPatient' => $idPatient,
                'idSchedule' => $idSchedule
            ]);

            if ($appointmentToDelete) {
                $entityManager->remove($appointmentToDelete);
            }
        }

        // suprimer le patient de l'entité Patient
        $patient = $patientRepository->findOneBy(['idUser' => $id]);

        if ($patient) {

            $entityManager->remove($patient);
        }

        // Supprimer l'utilisateur patient de l'entité AppUser
        $entityManager->remove($appUser);

        $entityManager->flush();

        return $this->redirectToRoute('app_all_user', [], Response::HTTP_SEE_OTHER);
    }


    // #[Route('/users/{id}/delete', name: 'app_user_delete', methods: ['DELETE'])]
    // public function deleteUser(int $id, AppUser $appUser, Coach $coach, Patient $patient, CoachRepository $coachRepository, PatientRepository $patientRepository, PlanningRulesRepository $planningRulesRepository, AvailabilityRepository $availabilityRepository, AppointmentRepository $appointmentRepository, TransactionRepository $transactionRepository, EntityManagerInterface $entityManager): Response
    // {

    // // $coachRole = $coachRepository->findOneBy(['idUser' => $id]);
    // // $patient = $patientRepository->findOneBy(['idUser' => $id]);

    // $userRole = $appUser->getRoles();
    
    //     if ($userRole === 'ROLE_COACH') {

    //         // Supprimez la relation entre PlanningRules et Coach
    //         $planningRules = $planningRulesRepository->findBy(['idUser' => $id]);

    //         foreach ($planningRules as $planningRule) {

    //             $entityManager->remove($planningRule);
    //         }

    //         // Supprimer la relation entre Availability et Coach
    //         $availabilities = $availabilityRepository->findBy(['idUser' => $id]);

    //         foreach ($availabilities as $availability) {

    //             $entityManager->remove($availability);
    //         }

    //         // Supprimez la relation entre Appointment et Coach
    //         $appointments = $appointmentRepository->findBy(['idCoach' => $id]);

    //         foreach ($appointments as $appointment) {
    //             // Utilisez des composants de clé primaire séparément
    //             $idCoach = $appointment->getIdCoach();
    //             $idPatient = $appointment->getIdPatient();
    //             $idSchedule = $appointment->getIdSchedule();

    //             // Cherchez et supprimez l'entité Appointment par ses composants de clé primaire
    //             $appointmentToDelete = $appointmentRepository->findOneBy([
    //                 'idCoach' => $idCoach,
    //                 'idPatient' => $idPatient,
    //                 'idSchedule' => $idSchedule
    //             ]);

    //             if ($appointmentToDelete) {
    //                 $entityManager->remove($appointmentToDelete);
    //             }
    //         }

    //         // Supprimez le coach de l'entité coach
    //         $coach = $coachRepository->findOneBy(['idUser' => $id]);

    //         if ($coach) {
    //             $entityManager->remove($coach);
    //         }

    //         // // Supprimez l'utilisateur de l'entité AppUser
    //         // $entityManager->remove($appUser);

    //         // $entityManager->flush();

    //         // return $this->redirectToRoute('app_all_user', [], Response::HTTP_SEE_OTHER);

    //     } elseif ($userRole === 'ROLE_USER') {

    //         // Supprimez la relation entre transaction et patient
    //         $transactions = $transactionRepository->findBy(['idUser' => $id]);

    //         foreach ($transactions as $transaction) {

    //             $entityManager->remove($transaction);
    //         }

    //         // Supprimez la relation entre Appointment et patient
    //         $appointments = $appointmentRepository->findBy(['idPatient' => $id]);

    //         foreach ($appointments as $appointment) {
    //             // Utilisez des composants de clé primaire séparément
    //             $idCoach = $appointment->getIdCoach();
    //             $idPatient = $appointment->getIdPatient();
    //             $idSchedule = $appointment->getIdSchedule();

    //             // Cherchez et supprimez l'entité Appointment par ses composants de clé primaire
    //             $appointmentToDelete = $appointmentRepository->findOneBy([
    //                 'idCoach' => $idCoach,
    //                 'idPatient' => $idPatient,
    //                 'idSchedule' => $idSchedule
    //             ]);

    //             if ($appointmentToDelete) {
    //                 $entityManager->remove($appointmentToDelete);
    //             }
    //         }

    //         // Supprimez le patient de l'entité Patient
    //         $patient = $patientRepository->findOneBy(['idUser' => $id]);

    //         if ($patient) {

    //             $entityManager->remove($patient);
    //         }

    //         // // Supprimez l'utilisateur de l'entité AppUser
    //         // $entityManager->remove($appUser);

    //         // $entityManager->flush();

    //         // return $this->redirectToRoute('app_all_user', [], Response::HTTP_SEE_OTHER);

    //     } else {

    //         return new JsonResponse("The selected id is incorrect", Response::HTTP_BAD_REQUEST);
    //     }

    //     // Supprimez l'utilisateur de l'entité AppUser
    //     $entityManager->remove($appUser);

    //     $entityManager->flush();

    //     return $this->redirectToRoute('app_all_user', [], Response::HTTP_SEE_OTHER);
    // }

}
