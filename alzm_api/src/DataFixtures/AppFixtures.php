<?php

namespace App\DataFixtures;

use App\Entity\Admin;
use App\Entity\Advantage;
use App\Entity\Appointment;
use App\Entity\AppUser;
use App\Entity\Availability;
use App\Entity\Coach;
use App\Entity\Course;
use App\Entity\Files;
use App\Entity\Patient;
use App\Entity\Plan;
use App\Entity\PlanningRules;
use App\Entity\Resources;
use App\Entity\Schedule;
use App\Entity\Text;
use App\Entity\Transaction;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{

    private $userPasswordHasher;

    public function __construct(UserPasswordHasherInterface $userPasswordHasher)
    {
        $this->userPasswordHasher = $userPasswordHasher;
    }

    public function load(ObjectManager $manager): void
    {

        $dateOfBirth = new \DateTime('1990-01-15');
        $datejour = new \DateTime();


        // initialisation d'un tableau vide
        $patients = [];

        for ($i = 1; $i <= 5; $i++) {

            // Création d'un user avec le role user
            $user = new AppUser();
            $user->setFirstname("User" . $i);
            $user->setLastname("LastnameUser" . $i);
            $user->setEmail("user" . $i . "@gmail.com");
            $user->setDatebirth($dateOfBirth);
            $user->setRoles(["ROLE_USER"]);
            $user->setPassword($this->userPasswordHasher->hashPassword($user, "password"));
            $user->setDateRegistration($datejour);
            $manager->persist($user);

            // Créez une entité Patient et associez l'utilisateur avec la clé étrangère
            $patient = new Patient();
            $patient->setIdUser($user);
            $manager->persist($patient);

            $patients[] = $patient;
        }


        // Création d'un user avec le role admin
        $userAdmin = new AppUser();
        $userAdmin->setFirstname("Lanos");
        $userAdmin->setLastname("Olivier");
        $userAdmin->setEmail("olivierlanos@gmail.com");
        $userAdmin->setDatebirth($dateOfBirth);
        $userAdmin->setRoles(["ROLE_ADMIN"]);
        $userAdmin->setPassword($this->userPasswordHasher->hashPassword($userAdmin, "password"));
        $userAdmin->setDateRegistration($datejour);

        $manager->persist($userAdmin);

        // Créez une entité Admin et associez l'utilisateur avec la clé étrangère
        $admin = new Admin();
        $admin->setIdUser($userAdmin);
        $manager->persist($admin);



        $coaches = [];

        for ($i = 1; $i <= 5; $i++) {

            // Création d'un user avec le rôle Coach
            $userCoach = new AppUser();
            $userCoach->setFirstname("Coach" . $i);
            $userCoach->setLastname("LastnameCoach" . $i);
            $userCoach->setEmail("coach" . $i . "@gmail.com");
            $userCoach->setDatebirth($dateOfBirth);
            $userCoach->setRoles(["ROLE_COACH"]);
            $userCoach->setPassword($this->userPasswordHasher->hashPassword($userCoach, "password"));
            $userCoach->setDateRegistration($datejour);

            $manager->persist($userCoach);

            // Créer un Coach et associer l'utilisateur avec la clé étrangère
            $coach = new Coach();
            $coach->setIdUser($userCoach);
            $manager->persist($coach);

            $coaches[] = $coach;
        }


        $schedules = [];
        // creation de rendez-vous disponible 
        for ($i = 1; $i <= 5; $i++) {

            $schedule = new Schedule();

            $schedule->setWeekNumber(new \DateTime());
            $year = (new \DateTime())->format('Y');

            $schedule->setYearDate($year);
            $currentTime = new \DateTime(); //obtenir date du jour

            $currentHour = $currentTime->format('H:i:s'); // convertir au format heure (attention string)
            $hourStartDate = \DateTime::createFromFormat('H:i:s', $currentHour); // Convertir la chaîne de caractères en objet DateTimeInterface
            $schedule->setHourStartDate($hourStartDate);

            $oneHourLater = $currentTime->add(new \DateInterval('PT1H')); // ajout de 1h en plus à l'heure du jour
            $endHours = $oneHourLater->format('H:i:s'); // convertir au format heure/mn/s
            $hourEndDate = \DateTime::createFromFormat('H:i:s', $endHours); // Convertir la chaîne de caractères en objet DateTimeInterface
            $schedule->setHourEndDate($hourEndDate);
            $schedule->setHourEndDate($hourEndDate);

            // ajout de tous les schdules dans un tableau 
            $schedules[] = $schedule;

            $manager->persist($schedule);
        }

        // creation de rendez-vous
        foreach ($coaches as $coach) {
            foreach ($patients as $patient) {
                foreach ($schedules as $schedule) {
                    $appointment = new Appointment();
                    $appointment->setIdCoach($coach);
                    $appointment->setIdPatient($patient);
                    $appointment->setIdSchedule($schedule);
                    $manager->persist($appointment);
                }
            }
        }


        // Créez des disponibilités pour chaque coach
        foreach ($coaches as $coach) {

            $availability = new Availability();
            $availability->setDateAvailability(new \DateTime()); 
            $availability->setHourStartSlot(\DateTime::createFromFormat('H:i', '09:00')); //heure de début
            $availability->setHourEndSlot(\DateTime::createFromFormat('H:i', '10:00')); //heeure de fin
            // assigner une disponibilité à un coach
            $availability->setIdUser($coach);
            // Persistez la disponibilité
            $manager->persist($availability);
        }


        // creation du planning
        foreach ($coaches as $coach) {

            $rules = new PlanningRules();
            // Configurez les règles du planning
            $rules->setMinimalTimeSlot(\DateTime::createFromFormat('H:i', '08:00'));
            $rules->setMaximalTimeSlot(\DateTime::createFromFormat('H:i', '18:00'));
            $rules->setWorkDays('5'); // Exemple pour les jours de travail (du lundi au vendredi)
            $rules->setWorkHoursStart(\DateTime::createFromFormat('H:i', '08:00')); // Heure de début de travail
            $rules->setWorkHoursEnd(\DateTime::createFromFormat('H:i', '18:00')); // Heure de fin de travail
            $rules->setTimeBetweenAppointments('30'); // Exemple pour 30 minutes entre les rendez-vous
            $rules->setIdUser($coach);
            // Persistez les règles de planning
            $manager->persist($rules);
        }


        // creation des cours 
        foreach ($coaches as $coach) {

            $course = new Course();
            $course->setName('Methode Alzm');
            $course->setDescription('Cours Alzami');
            $course->setDuration(60);
            $course->setCost('20.99'); // Remplacez par le coût

            // Associez le cours au coach
            $course->addIdUser($coach);
            // Persistez le cours
            $manager->persist($course);
        }


        // creation des plans(abonnements)
        $abonnements = [
            'premium',
            'freemium'
        ];

        foreach ($abonnements as $abonnement) {

            $plan = new Plan();
            // Configurez les détails du plan
            $plan->setName($abonnement);
            $plan->setDescription('Voici le plan' . ' ' . $abonnement);
            $plan->setCost(100.00);

            // à revoir car les patients auronts 2 plans à chaque tour de boucle
            foreach ($patients as $patient) {
                // Associer le plan au patient
                $plan->addIdUser($patient);
            }

            $plans[] = $plan;

            $manager->persist($plan);
        }


        // creation des avantages
        $avantagesPremium = [
            'Suivi personnalisé par un coach certifié',
            'Accès illimité aux fonctionnalités',
            'Programmes de coaching personnalisés',
        ];

        $avantagesFreemium = [
            'Suivi par nos coach certifiés',
            'Accès à 3 cours gratuits',
            'avantage freemium',
        ];

        foreach ($plans as $plan) {

            if ($plan->getName() === 'premium') {

                foreach ($avantagesPremium as $avantagePremium) {
                    // Création avantage pour chaque plan
                    $avantage = new Advantage();
                    $avantage->setDescription($avantagePremium);

                    // Associez l'avantage à un plan
                    $avantage->addIdPlan($plan);

                    $manager->persist($avantage);
                }
                
            } elseif ($plan->getName() === 'freemium') {

                foreach ($avantagesFreemium as $avantageFreemium) {
                    // Création avantage pour chaque plan
                    $avantage = new Advantage();
                    $avantage->setDescription($avantageFreemium);

                    // Associez l'avantage à un plan
                    $avantage->addIdPlan($plan);

                    $manager->persist($avantage);
                }
            }
        }


        // creation de transactions 
        foreach ($patients as $patient) {

            $transaction = new Transaction();
            $transaction->setDateTransaction(new \DateTime());
            $transaction->setAmount('50.00');
            $transaction->setPaymentMethod('Carte de crédit');
            $transaction->setIdUser($patient);

            $manager->persist($transaction);
        }


        $ressources = [];

        foreach ($plans as $plan) {

            // Création  de Resources
            $ressource = new Resources();
            $ressource->addIdPlan($plan);
            $manager->persist($ressource);

            $ressources[] = $ressource;
        }


        $texts = [];
        $i = 1;

        $files = [];
        $i = 1;

        foreach ($ressources as $ressource) {

            // creation texte
            $text = new Text();
            $text->setText('Text n°' . $i);
            $text->addIdResource($ressource);
            $manager->persist($text);

            $texts[] = $text;

            // creation files
            $file = new Files();
            $file->setLink('Link n°' . $i);
            $file->setType('TP' . $i);
            $file->addIdResource($ressource);

            $manager->persist($file);

            $files[] = $file;

            // incrémentation à chaque tour de boucle
            $i++;
        }

        $manager->flush();
    }
}
