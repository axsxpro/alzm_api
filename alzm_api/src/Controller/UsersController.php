<?php

namespace App\Controller;

use App\Entity\Admin;
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
use Symfony\Component\Validator\Validator\ValidatorInterface;



class UsersController extends AbstractController
{

    /**
     * Get all users
     *
     * @OA\Response(
     *     response=200,
     *     description="OK",
     * )
     * 
     * @OA\Tag(name="Users")
     */
    #[Route('/api/users', name: 'app_users', methods: ['GET'])]
    // #[IsGranted("ROLE_ADMIN")] //  seuls les utilisateurs ayant le rôle "ROLE_ADMIN" auront la permission d'accéder à la ressource
    public function getUsers(AppUserRepository $AppUserRepository, SerializerInterface $serializerInterface): JsonResponse
    {
        // afficher tous les utilisateurs de la base de données
        $users = $AppUserRepository->findAll();

        // serialisation : convertir  des objets en chaine de caractères
        $usersJson = $serializerInterface->serialize($users, 'json');

        // code 200
        return new JsonResponse($usersJson, Response::HTTP_OK, [], true);
        
    }


    /**
     * Get users by id
     *
     * @OA\Response(
     *     response=200,
     *     description="OK",
     * )
     * 
     * @OA\Tag(name="Users")
     */
    #[Route('/api/users/{id}', name: 'users_id', methods: ['GET'])]
    public function getUserById(AppUser $appUser, SerializerInterface $serializerInterface): JsonResponse
    {
        $userbyid = $serializerInterface->serialize($appUser, 'json');

        return new JsonResponse($userbyid, Response::HTTP_OK, ['accept' => 'json'], true);
    }



    /**
     * Get users roles by id
     *
     * @OA\Response(
     *     response=200,
     *     description="OK",
     * )
     * 
     * @OA\Tag(name="Users")
     */
    #[Route('/api/users/{id}/roles', name: 'users_id_roles', methods: ['GET'])] // Récupération du role d'un user
    public function getRoleById(int $id, AppUserRepository $appUserRepository, SerializerInterface $serializerInterface): JsonResponse
    {

        $idUser = $appUserRepository->findUserRoleById($id);

        $roleUser = $serializerInterface->serialize($idUser, 'json');

        return new JsonResponse($roleUser, Response::HTTP_OK, ['accept' => 'json'], true);
    }



    /**
     * Create a new user
     *
     * @OA\Response(
     *     response=201,
     *     description="Created",
     * )
     * @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(
     *         type="object",
     *         @OA\Property(property="lastname", type="string"),
     *         @OA\Property(property="firstname", type="string"),
     *         @OA\Property(property="datebirth", type="string", format="date-time", example="2023-11-04T00:00:00+00:00"),
     *         @OA\Property(property="email", type="string", format="email"),
     *         @OA\Property(property="roles", type="array", @OA\Items(type="string", enum={"ROLE_COACH", "ROLE_PATIENT", "ROLE_ADMIN"}), example={"ROLE_COACH or ROLE_PATIENT"}),
     *         @OA\Property(property="password", type="string"),
     *     )
     * ),
     * @OA\Tag(name="Users")
     */
    #[Route('/api/post/users', name: "app_users_post", methods: ['POST'])]
    public function createUsers(Request $request, SerializerInterface $serializerInterface, EntityManagerInterface $entityManager, UserPasswordHasherInterface $userPasswordHasherInterface, ValidatorInterface $validatorInterface): JsonResponse
    {

        // $request->getContent(): récupère le contenu de la requête HTTP POST reçue.
        // AppUser::class: C'est la classe cible dans laquelle on veut désérialiser les données JSON
        // json :  indique au composant de sérialisation que le contenu de la requête est au format JSON
        $users = $serializerInterface->deserialize($request->getContent(), AppUser::class, 'json');

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

        // On vérifie les erreurs
        $errors = $validatorInterface->validate($users);

        if ($errors->count() > 0) {
            return new JsonResponse($serializerInterface->serialize($errors, 'json'), JsonResponse::HTTP_BAD_REQUEST, [], true);
        }

        // récupération du role de l'user crée
        $userRoles = $users->getRoles();

        // si l'user à le role'PATIENT' alors persistance de l'id dans l'entité Patient et persistance des données de l'user dans AppUser
        if (in_array("ROLE_PATIENT", $userRoles)) {

            // persistance des données dans l'entité AppUser
            $entityManager->persist($users);
            $entityManager->flush();

            // persistance de l'id  dans l'entité patient
            $patient = new Patient();
            $patient->setIdUser($users);
            $entityManager->persist($patient);
            $entityManager->flush();

            // sinon persistante de l'id dans l'entité Coach
        } elseif (in_array("ROLE_COACH", $userRoles)) {


            $entityManager->persist($users);
            $entityManager->flush();

            $coach = new Coach();
            $coach->setIdUser($users);
            $entityManager->persist($coach);
            $entityManager->flush();

        } elseif (in_array("ROLE_ADMIN", $userRoles)) {

            $entityManager->persist($users);
            $entityManager->flush();

            $admin = new Admin();
            $admin->setIdUser($users);
            $entityManager->persist($admin);
            $entityManager->flush();
            
        } else {

            $responseContent = ["error" => "The selected role is incorrect"];

            return new JsonResponse($responseContent, Response::HTTP_BAD_REQUEST);
        }

        $jsonUsers = $serializerInterface->serialize($users, 'json');

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
     * @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(
     *         type="object",
     *         @OA\Property(property="email", type="string", format="email"),
     *         @OA\Property(property="password", type="string"),
     *     )
     * ),
     * 
     * @OA\Tag(name="Users")
     */
    #[Route('/api/put/users/{id}', name: "app_users_put", methods: ['PUT'])]
    public function updateUsers(Request $request, SerializerInterface $serializerInterface, AppUser $appUser, UserPasswordHasherInterface $userPasswordHasherInterface, EntityManagerInterface $entityManager, ValidatorInterface $validatorInterface): JsonResponse
    {
        // AppUser::class : C'est la classe PHP vers laquelle les données JSON seront désérialisées. Dans ce cas, c'est la classe AppUser.
        // [AbstractNormalizer::OBJECT_TO_POPULATE => $appUser] :  permet de mettre à jour l'objet $appUser existant avec les nouvelles données, les données du JSON seront intégrées dans cet objet existant au lieu de créer un nouvel objet
        // 'ignored_attributes' : ce sont les attribus que l'on ne va pas désérialiser donc non modifiable
        $updatedUsers = $serializerInterface->deserialize($request->getContent(), AppUser::class, 'json', [AbstractNormalizer::OBJECT_TO_POPULATE => $appUser, 'ignored_attributes' => ['idUser', 'lastname', 'firstname', 'datebirth', 'dateRegistration', 'roles']]);

        // On vérifie les erreurs
        $errors = $validatorInterface->validate($updatedUsers);

        if ($errors->count() > 0) {

            return new JsonResponse($serializerInterface->serialize($errors, 'json'), JsonResponse::HTTP_BAD_REQUEST, [], true);
        }

        // Récupération du mot de passe 
        $password = $updatedUsers->getPassword();

        // Hachage du mot de passe
        $hashedPassword = $userPasswordHasherInterface->hashPassword($updatedUsers, $password);

        // Affectez le mot de passe haché à l'utilisateur
        $updatedUsers->setPassword($hashedPassword);
        

        $entityManager->persist($updatedUsers);
        $entityManager->flush();

        $jsonupdatedUsers = $serializerInterface->serialize($updatedUsers, 'json');

        // accepted = code 202
        return new JsonResponse($jsonupdatedUsers, JsonResponse::HTTP_ACCEPTED, [], true);
    }



    /**
     * Delete users coach or patient
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

        } elseif (in_array("ROLE_PATIENT", $userRoles)) {

            // apelle de la methode qui va supprimer le patient
            $this->deletePatient($id, $patientRepository, $appointmentRepository, $transactionRepository, $entityManager);

        } else {

            $responseContent = ["error" => "The selected id is incorrect"];

            return new JsonResponse($responseContent, Response::HTTP_BAD_REQUEST);
        }

        //supression de l'user
        $entityManager->remove($appUser);

        $entityManager->flush();

        // code 303
        // return $this->redirectToRoute('app_users', [], Response::HTTP_SEE_OTHER, true);
        
        // code 204
        return new JsonResponse(null, Response::HTTP_NO_CONTENT);
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
