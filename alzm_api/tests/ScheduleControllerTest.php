<?php

namespace App\Tests;

use App\Entity\Schedule;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class ScheduleControllerTest extends WebTestCase
{

    public function testGetSchedules()
    {

        $client = static::createClient();

        $client->request('GET', '/api/schedules');

        $this->assertResponseStatusCodeSame(200);

        $this->assertJson($client->getResponse()->getContent());

        $responseData = json_decode($client->getResponse()->getContent(), true);

        $this->assertNotEmpty($responseData);

        foreach ($responseData as $schedule) {
            $this->assertArrayHasKey('idSchedule', $schedule);
        }
    
    }


    public function testGetScheduleById()
    {

        $client = static::createClient();

        $scheduleId = 8;

        // Le client fait une requête HTTP GET vers l'endpoint "/api/users/{id}"
        $client->request('GET', "/api/schedules/$scheduleId");

        $this->assertResponseStatusCodeSame(Response::HTTP_OK);

        $this->assertJson($client->getResponse()->getContent());

        $responseData = json_decode($client->getResponse()->getContent(), true);
        $this->assertNotEmpty($responseData);

        $this->assertEquals($scheduleId, $responseData['idSchedule']);
    }


    public function testCreateSchedules()
    {

        $client = static::createClient();

        // Données JSON pour la création d'un schedule
        $scheduleData = [
            'weekNumber' => '2023-11-06T00:00:00+00:00',
            'yearDate' => 2023,
            'hourStartDate' => '1970-01-01T17:35:36+00:00',
            'hourEndDate' => '1970-01-01T18:35:36+00:00',
        ];

        $jsonData = json_encode($scheduleData);

        // Exécuter une requête POST vers l'endpoint
        $client->request('POST', '/api/post/schedules', [], [], ['CONTENT_TYPE' => 'application/json'], $jsonData);

        $this->assertEquals(201, $client->getResponse()->getStatusCode());

        $responseData = json_decode($client->getResponse()->getContent(), true);

        // Vérifier que les données correspondent à celles envoyées dans la requête
        $this->assertEquals($scheduleData['weekNumber'], $responseData['weekNumber']);
        $this->assertEquals($scheduleData['yearDate'], $responseData['yearDate']);
        $this->assertEquals($scheduleData['hourStartDate'], $responseData['hourStartDate']);
        $this->assertEquals($scheduleData['hourEndDate'], $responseData['hourEndDate']);
    }


    public function testUpdateSchedules()
    {

        $client = static::createClient();

        $idSchedule = 13;

        $scheduleUpdatedData = [
            'weekNumber' => '2023-12-06T00:00:00+00:00',
            'yearDate' => 2040,
            'hourStartDate' => '1970-01-01T14:35:36+00:00',
            'hourEndDate' => '1970-01-01T20:35:36+00:00',
        ];

        $jsonData = json_encode($scheduleUpdatedData);

        // Exécuter une requête POST vers l'endpoint
        $client->request('PUT', "api/put/schedules/$idSchedule", [], [], ['CONTENT_TYPE' => 'application/json'], $jsonData);

        $this->assertEquals(Response::HTTP_ACCEPTED, $client->getResponse()->getStatusCode());

        $responseData = json_decode($client->getResponse()->getContent(), true);

        // Vérifier que les données correspondent à celles envoyées dans la requête
        $this->assertEquals($scheduleUpdatedData['weekNumber'], $responseData['weekNumber']);
        $this->assertEquals($scheduleUpdatedData['yearDate'], $responseData['yearDate']);
        $this->assertEquals($scheduleUpdatedData['hourStartDate'], $responseData['hourStartDate']);
        $this->assertEquals($scheduleUpdatedData['hourEndDate'], $responseData['hourEndDate']);
    }


    public function testDeleteSchedules()
    {
        $client = static::createClient();

        $scheduleId = 14;

        $client->request('DELETE', "/api/delete/schedules/$scheduleId");

        $this->assertEquals(Response::HTTP_NO_CONTENT, $client->getResponse()->getStatusCode());

        // Vérifier la suppression du schedule dans la base de données
        $entityManager = $client->getContainer()->get('doctrine.orm.entity_manager');
        $scheduleRepository = $entityManager->getRepository(Schedule::class);
        $deletedSchedule = $scheduleRepository->find($scheduleId);
        $this->assertNull($deletedSchedule);
    }


}
