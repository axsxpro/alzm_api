<?php

namespace App\Tests;

use App\Entity\Appointment;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class AppointmentControllerTest extends WebTestCase
{
    
    public function testGetAppointments()
    {

        $client = static::createClient();

        $client->request('GET', '/api/appointments');

        $this->assertResponseStatusCodeSame(200);

        $this->assertJson($client->getResponse()->getContent());

        $responseData = json_decode($client->getResponse()->getContent(), true);

        $this->assertNotEmpty($responseData);

        foreach ($responseData as $appointment) {
            $this->assertArrayHasKey('idAppointment', $appointment);
        }
    
    }


    public function testGetAppointmentById()
    {

        $client = static::createClient();

        $coachId = 25;

        // Le client fait une requête HTTP GET vers l'endpoint "/api/users/{id}"
        $client->request('GET', "/api/coachs/$coachId/appointments");

        $this->assertResponseStatusCodeSame(Response::HTTP_OK);

        $this->assertJson($client->getResponse()->getContent());

        $responseData = json_decode($client->getResponse()->getContent(), true);
        $this->assertNotEmpty($responseData);

        foreach ($responseData as $appointment) {
        $this->assertEquals($coachId, $appointment['coach']['coachInformation']['idUser']);
        }

    }


    public function testCreateAppointments()
    {
        $client = static::createClient();

        $appointmentData = [
            'coach' => [
                'coachInformation' => [
                    'idUser' => 25, 
                ],
            ],
            'patient' => [
                'patientInformation' => [
                    'idUser' => 19, 
                ],
            ],
            'schedule' => [
                'idSchedule' => 10, 
            ],
        ];

        $jsonData = json_encode($appointmentData);

        $client->request('POST', '/api/post/appointments', [], [], ['CONTENT_TYPE' => 'application/json'], $jsonData);

        $this->assertEquals(Response::HTTP_CREATED, $client->getResponse()->getStatusCode());

        $this->assertJson($client->getResponse()->getContent());

        // Convertir la réponse JSON en tableau associatif
        $responseData = json_decode($client->getResponse()->getContent(), true);

        // Vérifier que les données correspondent à celles envoyées dans la requête
        $this->assertEquals($appointmentData['coach']['coachInformation']['idUser'], $responseData['coach']['coachInformation']['idUser']);
        $this->assertEquals($appointmentData['patient']['patientInformation']['idUser'], $responseData['patient']['patientInformation']['idUser']);
        $this->assertEquals($appointmentData['schedule']['idSchedule'], $responseData['schedule']['idSchedule']);
    }


    public function testUpdateAppointment()
    {
        $client = static::createClient();

        $idCoach = 25;
        $idAppointment = 132; 

        $updatedAppointmentData = [
            'patient' => [
                'patientInformation' => [
                    'idUser' => 19, 
                ],
            ],
            'schedule' => [
                'idSchedule' => 12, 
            ],
        ];

        $jsonData = json_encode($updatedAppointmentData);


        $client->request('PUT', "/api/put/coachs/$idCoach/appointments/$idAppointment", [], [], ['CONTENT_TYPE' => 'application/json'], $jsonData);

        $this->assertEquals(Response::HTTP_CREATED, $client->getResponse()->getStatusCode());

        $this->assertJson($client->getResponse()->getContent());

        $responseData = json_decode($client->getResponse()->getContent(), true);

        // Vérifier que les données correspondent à celles envoyées dans la requête
        $this->assertEquals($updatedAppointmentData['patient']['patientInformation']['idUser'], $responseData['patient']['patientInformation']['idUser']);
        $this->assertEquals($updatedAppointmentData['schedule']['idSchedule'], $responseData['schedule']['idSchedule']);
    }


    public function testDeleteAppointments()
    {
        $client = static::createClient();

        $idCoach = 25; 
        $idAppointment = 131; 

        $client->request('DELETE', "/api/delete/coachs/$idCoach/appointments/$idAppointment");

        $this->assertEquals(Response::HTTP_SEE_OTHER, $client->getResponse()->getStatusCode());

        // Suivre la redirection
        $client->followRedirect();

        // Vérifier que la réponse a un code HTTP 200 (OK) après la redirection
        $this->assertEquals(Response::HTTP_OK, $client->getResponse()->getStatusCode());

        // Vérifier la suppression de l'appointment dans la base de données
        $entityManager = $client->getContainer()->get('doctrine.orm.entity_manager');
        $appointmentRepository = $entityManager->getRepository(Appointment::class);
        $deletedAppointment = $appointmentRepository->find($idAppointment);
        $this->assertNull($deletedAppointment);
    }


}
