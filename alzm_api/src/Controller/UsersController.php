<?php

namespace App\Controller;

use App\Entity\AppUser;
use App\Entity\Coach;
use App\Entity\Patient;
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
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
// use Nelmio\ApiDocBundle\Annotation\Model;
// use Nelmio\ApiDocBundle\Annotation\Security;
use OpenApi\Annotations as OA;



class UsersController extends AbstractController
{

    /**
     * Retrieve all users
     *
     * @OA\Response(
     *     response=200,
     *     description="OK",
     * )
     * 
     * @OA\Tag(name="Users")
     */
    #[Route('/api/users', name: 'app_users', methods: ['GET'])]
    #[IsGranted("ROLE_ADMIN")] //  seuls les utilisateurs ayant le rôle "ROLE_ADMIN" auront la permission d'accéder à la ressource
    public function getUsers(AppUserRepository $AppUserRepository, SerializerInterface $serializerInterface): JsonResponse
    {

        // afficher tous les utilisateurs de la base de données
        $users = $AppUserRepository->findAll();

        // serialisation : convertir  des objets en chaine de caractères
        $usersJson = $serializerInterface->serialize($users, 'json');

        // le code retour : Response::HTTP_OK :  correspond au code 200
        // [] : les headers (qu’on laisse vides pour l’instant pour garder le comportement par défaut);
        // true : indique que la réponse JSON doit être mise en forme en utilisant la mise en forme JSON "pretty"
        return new JsonResponse($usersJson, Response::HTTP_OK, [], true);
    }

    /**
     * Retrieve users by id
     *
     * @OA\Response(
     *     response=200,
     *     description="OK",
     * )
     * 
     * @OA\Tag(name="Users")
     */
    //récupération d'un user par son ID
    #[Route('/api/users/{id}', name: 'users_id', methods: ['GET'])]
    public function getUserById(AppUser $appUser, SerializerInterface $serializer): JsonResponse
    {
        $userbyid = $serializer->serialize($appUser, 'json');

        return new JsonResponse($userbyid, Response::HTTP_OK, ['accept' => 'json'], true);
    }


    /**
     * Retrieve users roles by id
     *
     * @OA\Response(
     *     response=200,
     *     description="OK",
     * )
     * 
     * @OA\Tag(name="Users")
     */
    #[Route('/api/users/{id}/roles', name: 'users_id_roles', methods: ['GET'])] // Récupération du role d'un user
    public function getRoleById(int $id, AppUserRepository $appUserRepository, SerializerInterface $serializer): JsonResponse
    {

        $idUser = $appUserRepository->findUserRoleById($id);

        $roleUser = $serializer->serialize($idUser, 'json');

        return new JsonResponse($roleUser, Response::HTTP_OK, ['accept' => 'json'], true);
    }

    /**
     * Create a new user
     *
     * @OA\Response(
     *     response=201,
     *     description="Created",
     * )
     * 
     * @OA\Tag(name="Users")
     */
    // creation d'un nouvel user
    #[Route('/api/post/users', name: "app_users_post", methods: ['POST'])]
    public function createUsers(Request $request, SerializerInterface $serializer, EntityManagerInterface $entityManager, UserPasswordHasherInterface $userPasswordHasherInterface): JsonResponse
    {

        // $request->getContent(): récupère le contenu de la requête HTTP POST reçue.
        // AppUser::class: C'est la classe cible dans laquelle on veut désérialiser les données JSON
        // json :  indique au composant de sérialisation que le contenu de la requête est au format JSON
        $users = $serializer->deserialize($request->getContent(), AppUser::class, 'json');

        // récupération de la date 
        $users->getDateRegistration();

        // mettre la date d'inscription à la date du jour 
        $users->setDateRegistration(new \DateTime('now'));

        // Récupération du mot de passe 
        $password = $users->getPassword();

        // Hachage du mot de passe
        $hashedPassword = $userPasswordHasherInterface->hashPassword($users, $password);

        // Affectez le mot de passe haché à l'utilisateur
        $users->setPassword($hashedPassword);

        // persistance des données dans la BDD
        $entityManager->persist($users);
        $entityManager->flush();

        // récupération du role de l'user crée
        $userRoles = $users->getRoles();

        // si l'user à le role'USER' alors persistance de l'id dans l'entité Patient
        if (in_array("ROLE_USER", $userRoles)) {

            $patient = new Patient();
            $patient->setIdUser($users);
            $entityManager->persist($patient);
            $entityManager->flush();

            // sinon persistante de l'id dans l'entité Coach
        } else {

            $coach = new Coach();
            $coach->setIdUser($users);
            $entityManager->persist($coach);
            $entityManager->flush();
        }

        $jsonUsers = $serializer->serialize($users, 'json');

        // created = code 201
        return new JsonResponse($jsonUsers, Response::HTTP_CREATED, [], true);
    }


    /**
     * Edit users informations
     *
     * @OA\Response(
     *     response=202,
     *     description="Accepted",
     * )
     * 
     * @OA\Tag(name="Users")
     */
    #[Route('/api/put/users/{id}', name: "app_users_put", methods: ['PUT'])]
    public function updateUsers(Request $request, SerializerInterface $serializer, AppUser $appUser, UserPasswordHasherInterface $userPasswordHasherInterface, EntityManagerInterface $entityManager): JsonResponse
    {
        // AppUser::class : C'est la classe PHP vers laquelle les données JSON seront désérialisées. Dans ce cas, c'est la classe AppUser.
        // [AbstractNormalizer::OBJECT_TO_POPULATE => $appUser] :  permet de mettre à jour l'objet $appUser existant avec les nouvelles données, les données du JSON seront intégrées dans cet objet existant au lieu de créer un nouvel objet
        // 'ignored_attributes' : ce sont les attribus que l'on ne va pas désérialiser donc non modifiable
        $updatedUsers = $serializer->deserialize($request->getContent(), AppUser::class, 'json', [AbstractNormalizer::OBJECT_TO_POPULATE => $appUser, 'ignored_attributes' => ['idUser', 'lastname', 'firstname', 'datebirth', 'dateRegistration']]);

        // Récupération du mot de passe 
        $password = $updatedUsers->getPassword();

        // Hachage du mot de passe
        $hashedPassword = $userPasswordHasherInterface->hashPassword($updatedUsers, $password);

        // Affectez le mot de passe haché à l'utilisateur
        $updatedUsers->setPassword($hashedPassword);

        $entityManager->persist($updatedUsers);

        $entityManager->flush();

        $jsonupdatedUsers = $serializer->serialize($updatedUsers, 'json');

        // accepted = code 202
        return new JsonResponse($jsonupdatedUsers, JsonResponse::HTTP_ACCEPTED, [], true);
    }



    /**
     * Delete users
     *
     * @OA\Response(
     *     response=204,
     *     description="No content",
     * )
     * 
     * @OA\Tag(name="Users")
     */
    #[Route('/api/users/{id}/delete', name: 'app_users_delete', methods: ['DELETE'])]
    public function deleteUser(int $id, AppUser $appUser, CoachRepository $coachRepository, PatientRepository $patientRepository, PlanningRulesRepository $planningRulesRepository, AvailabilityRepository $availabilityRepository, AppointmentRepository $appointmentRepository, TransactionRepository $transactionRepository, EntityManagerInterface $entityManager): Response 
    {
        // récupération du role
        $userRoles = $appUser->getRoles();

        if (in_array("ROLE_COACH", $userRoles)) {

            // apelle de la methode qui va supprimer le coach
            $this->deleteCoach($id, $coachRepository, $appointmentRepository, $planningRulesRepository, $availabilityRepository, $entityManager);
            

        } elseif (in_array("ROLE_USER", $userRoles)) {

            // apelle de la methode qui va supprimer le patient
            $this->deletePatient($id, $patientRepository, $appointmentRepository, $transactionRepository, $entityManager);

        } else {

            return new JsonResponse("The selected id is incorrect", Response::HTTP_BAD_REQUEST);
        }

        //supression de l'user
        $entityManager->remove($appUser);

        $entityManager->flush();

        return $this->redirectToRoute('app_users', [], Response::HTTP_SEE_OTHER, true);
    }


    private function deleteCoach(int $id, CoachRepository $coachRepository, AppointmentRepository $appointmentRepository, PlanningRulesRepository $planningRulesRepository, AvailabilityRepository $availabilityRepository, EntityManagerInterface $entityManager): void 
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

        $entityManager->flush();

    }

    private function deletePatient(int $id, PatientRepository $patientRepository, AppointmentRepository $appointmentRepository, TransactionRepository $transactionRepository, EntityManagerInterface $entityManager): void 
    {
        // Supprimez la relation entre transaction et patient
        $transactions = $transactionRepository->findBy(['idUser' => $id]);

        foreach ($transactions as $transaction) {
            $entityManager->remove($transaction);
        }

        // Supprimez la relation entre Appointment et patient
        $appointments = $appointmentRepository->findBy(['idPatient' => $id]);

        foreach ($appointments as $appointment) {
            $entityManager->remove($appointment);
        }

        // supprimer le patient de l'entité Patient
        $patient = $patientRepository->findOneBy(['idUser' => $id]);

        if ($patient) {
            $entityManager->remove($patient);
        }

        $entityManager->flush();

    }


}
