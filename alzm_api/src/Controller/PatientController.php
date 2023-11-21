<?php

namespace App\Controller;

use App\Entity\AppUser;
use App\Entity\Patient;
use App\Repository\AppointmentRepository;
use App\Repository\PatientRepository;
use App\Repository\TransactionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class PatientController extends AbstractController
{
    #[Route('/patients', name: 'app_all_patient', methods: ['GET'])]
    public function allPatient(PatientRepository $patientRepository, SerializerInterface $serializerInterface): JsonResponse
    {

        // afficher tous les utilisateurs de la base de données
        $allPatient = $patientRepository->findAll();

        $allPatientJson = $serializerInterface->serialize($allPatient, 'json', ['groups' => 'patients']);

        // le code retour : ici Response::HTTP_OK  correspond au code 200 . Ce code est celui renvoyé par défaut lorsque rien n’est précisé ;
        // [] : les headers (qu’on laisse vides pour l’instant pour garder le comportement par défaut);
        // un true qui signifie que nous avons DÉJÀ sérialisé les données et qu’il n’y a donc plus de traitement à faire dessus. 
        return new JsonResponse($allPatientJson, Response::HTTP_OK, [], true);
    }


    //utilisation du ParamConverter
    #[Route('/patients/{id}', name: 'patient_id', methods: ['GET'])]
    public function getallPatients(Patient $patient, SerializerInterface $serializer): JsonResponse
    {
        $patientById = $serializer->serialize($patient, 'json', ['groups' => 'patients']);

        return new JsonResponse($patientById, Response::HTTP_OK, ['accept' => 'json'], true);
    }


    #[Route('/delete/patients/{id}', name: 'app_delete_patient', methods: ['DELETE'])]
    public function deletePatient(int $id, AppUser $appUser, PatientRepository $patientRepository, AppointmentRepository $appointmentRepository, TransactionRepository $transactionRepository, EntityManagerInterface $entityManager): Response
    {

        // Supprimez la relation entre transaction et patient
        $transactions = $transactionRepository->findBy(['idUser' => $id]);

        foreach ($transactions as $transaction) {

            $entityManager->remove($transaction);
        }

        // Supprimez la relation entre Appointment et Coach
        $appointments = $appointmentRepository->findBy(['idPatient' => $id]);

        foreach ($appointments as $appointment) {
            $entityManager->remove($appointment);
        }

        // suprimer le patient de l'entité Patient
        $patient = $patientRepository->findOneBy(['idUser' => $id]);

        if ($patient) {

            $entityManager->remove($patient);
        }

        // Supprimer l'utilisateur patient de l'entité AppUser
        $entityManager->remove($appUser);

        $entityManager->flush();

        // SEE_OTHER = code 200 ok
        return $this->redirectToRoute('app_users', [], Response::HTTP_SEE_OTHER, true);
    }
}
