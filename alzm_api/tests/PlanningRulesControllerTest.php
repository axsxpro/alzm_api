<?php

namespace App\Tests;

use App\Entity\PlanningRules;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class PlanningRulesControllerTest extends WebTestCase
{

    public function testGetPlannings()
    {

        $client = static::createClient();

        $client->request('GET', '/api/plannings');

        $this->assertResponseStatusCodeSame(200);

        $this->assertJson($client->getResponse()->getContent());

        $responseData = json_decode($client->getResponse()->getContent(), true);

        $this->assertNotEmpty($responseData);

        foreach ($responseData as $planning) {
            $this->assertArrayHasKey('idPlanningRules', $planning);
        }
    }


    public function testGetPlanningsById()
    {

        $client = static::createClient();

        // déclaration d'une variable av comme valeur l'id 20
        $planningId = 8;

        // Le client fait une requête HTTP GET vers l'endpoint "/api/users/{id}"
        $client->request('GET', "/api/plannings/$planningId");

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $this->assertJson($client->getResponse()->getContent());

        // Vérifie que le contenu de la réponse JSON n'est pas vide
        $responseData = json_decode($client->getResponse()->getContent(), true);
        $this->assertNotEmpty($responseData);

        // Facultatif : Vérifie que l'ID planning  dans la réponse correspond à l'ID attendu
        $this->assertEquals($planningId, $responseData['idPlanningRules']);
    }


    public function testCreatePlannings()
    {
        $client = static::createClient();


        $planningData = [

            'minimalTimeSlot' => '1970-01-01T09:00:00+00:00',
            'maximalTimeSlot' => '1970-01-01T18:00:00+00:00',
            'workDays' => '5',
            'workHoursStart' => '1970-01-01T08:00:00+00:00',
            'workHoursEnd' => '1970-01-01T18:00:00+00:00',
            'timeBetweenAppointments' => '30',
        ];


        $idCoach = 25;

        $jsonData = json_encode($planningData);

        // Exécuter une requête POST vers l'endpoint
        $client->request('POST', "/api/post/coachs/$idCoach/plannings", [], [], ['CONTENT_TYPE' => 'application/json'], $jsonData);

        // Vérifier que la réponse a un code HTTP 201 (Created)
        $this->assertEquals(201, $client->getResponse()->getStatusCode());


        $this->assertJson($client->getResponse()->getContent());

        // Convertir la réponse JSON en tableau associatif
        $responseData = json_decode($client->getResponse()->getContent(), true);


        // Vérifier que les données correspondent à celle envoyée dans la requête
        $this->assertEquals($planningData['minimalTimeSlot'], $responseData['minimalTimeSlot']);
        $this->assertEquals($planningData['maximalTimeSlot'], $responseData['maximalTimeSlot']);
        $this->assertEquals($planningData['workDays'], $responseData['workDays']);
        $this->assertEquals($planningData['workHoursStart'], $responseData['workHoursStart']);
        $this->assertEquals($planningData['workHoursEnd'], $responseData['workHoursEnd']);
        $this->assertEquals($planningData['timeBetweenAppointments'], $responseData['timeBetweenAppointments']);
        $this->assertEquals($idCoach, $responseData['coach']['coachInformation']['idUser']);

    }


    public function testUpdatePlannings()
    {
        $client = static::createClient();

        $idCoach = 25;
        $idPlanning = 13;

        $updatePlanningsData = [
            'timeBetweenAppointments' => '45',
        ];

        $jsonData = json_encode($updatePlanningsData);

        // Exécuter une requête PUT vers l'endpoint
        $client->request('PUT', "/api/put/coachs/$idCoach/plannings/$idPlanning", [], [], ['CONTENT_TYPE' => 'application/json'], $jsonData);

        $this->assertEquals(Response::HTTP_ACCEPTED, $client->getResponse()->getStatusCode());

        $this->assertJson($client->getResponse()->getContent());


        $responseData = json_decode($client->getResponse()->getContent(), true);

        $this->assertEquals($updatePlanningsData['timeBetweenAppointments'], $responseData['timeBetweenAppointments']);
    }


    public function testDeletePlannings()
    {
        $client = static::createClient();

        $idCoach = 25;
        $idPlanning = 13;

        // Exécuter une requête DELETE vers l'endpoint
        $client->request('DELETE', "/api/delete/coachs/$idCoach/plannings/$idPlanning");

        $this->assertEquals(Response::HTTP_NO_CONTENT, $client->getResponse()->getStatusCode());

        // Vérifier la supression de planning dans la base de données
        $entityManager = $client->getContainer()->get('doctrine.orm.entity_manager');
        $planningsRepository = $entityManager->getRepository(PlanningRules::class);
        $deletedPlannings = $planningsRepository->find($idPlanning);
        $this->assertNull($deletedPlannings);

    }


}
