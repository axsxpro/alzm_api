<?php

namespace App\Tests;

use App\Entity\Availability;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class AvailabilityControllerTest extends WebTestCase
{


    public function testGetAvailabilities()
    {
        $client = static::createClient();

        // Le client fait une requête HTTP GET vers l'endpoint '/api/availabilities'
        $client->request('GET', '/api/availabilities');

        $this->assertResponseStatusCodeSame(200);

        $this->assertJson($client->getResponse()->getContent());

        $responseData = json_decode($client->getResponse()->getContent(), true);

        $this->assertNotEmpty($responseData);

        foreach ($responseData as $availability) {
            $this->assertArrayHasKey('idAvailability', $availability);
        }
    
    }


    public function testGetAvailabilitiesByCoachId()
    {

        $client = static::createClient();

        $idCoach = 24;

        // Exécuter une requête GET vers l'endpoint
        $client->request('GET', "/api/coachs/$idCoach/availabilities");

        $this->assertResponseStatusCodeSame(200);

        $this->assertJson($client->getResponse()->getContent());

        $responseData = json_decode($client->getResponse()->getContent(), true);

        foreach ($responseData as $availability) {
            
            // récupération de la valeur de idUser
            $idUser = $availability['coach']['coachInformation']['idUser'];

            // Comparer la valeur de 'idUser' avec $idCoach afin de vérifier si on a récupérer l'availability du bon coach
            $this->assertEquals($idUser, $idCoach);
        }
    }


    public function testCreateAvailabilities()
    {
        $client = static::createClient();

        // données JSON à envoyer dans la requête POST
        $availabilityData = [
            'dateAvailability' => '2023-12-28T10:00:00+00:00',
            'hourStartSlot' => '2023-12-28T13:00:00+00:00',
            'hourEndSlot' => '2023-12-28T14:00:00+00:00',
        ];

        $jsonData = json_encode($availabilityData);

        $idCoach = 24;

        // Exécuter une requête POST vers l'endpoint '/api/post/coachs/{id}/availabilities'
        $client->request('POST', "/api/post/coachs/$idCoach/availabilities", [], [], ['CONTENT_TYPE' => 'application/json'], $jsonData);

        // Vérifier que la réponse a un code HTTP 201 (Created)
        $this->assertEquals(Response::HTTP_CREATED, $client->getResponse()->getStatusCode());


        $this->assertJson($client->getResponse()->getContent());


        $responseData = json_decode($client->getResponse()->getContent(), true);

        // Vérifier que les données correspondent à celle envoyée dans la requête
        $this->assertEquals($availabilityData['dateAvailability'], $responseData['dateAvailability']);
        $this->assertEquals($availabilityData['hourStartSlot'], $responseData['hourStartSlot']);
        $this->assertEquals($availabilityData['hourEndSlot'], $responseData['hourEndSlot']);
        $this->assertEquals($idCoach, $responseData['coach']['coachInformation']['idUser']);

    }


    public function testUpdateAvailabilities()
    {

        $client = static::createClient();

        // Données JSON à envoyer dans la requête PUT
        $availabilityData = [
            'dateAvailability' => '2023-12-23T10:00:00+00:00',
        ];

        $jsonData = json_encode($availabilityData);

        $idCoach = 24;
        $idAvailability = 14;

        // Exécuter une requête PUT vers l'endpoint /api/put/coachs/$idCoach/availabilities/$idAvailability
        $client->request('PUT', "/api/put/coachs/$idCoach/availabilities/$idAvailability", [], [], ['CONTENT_TYPE' => 'application/json'], $jsonData);

        // Vérifier que la réponse a un code HTTP 202 (Accepted)
        $this->assertEquals(Response::HTTP_ACCEPTED, $client->getResponse()->getStatusCode());

        $this->assertJson($client->getResponse()->getContent());

        $responseData = json_decode($client->getResponse()->getContent(), true);

        // Vérifier que la date de disponibilité correspond à celle envoyée dans la requête
        $this->assertEquals($availabilityData['dateAvailability'], $responseData['dateAvailability']);

    }


    public function testDeleteAvailabilities()
    {
        $client = static::createClient();

        $idCoach = 24;
        $idAvailability = 15;

        // Exécuter une requête DELETE vers l'endpoint
        $client->request('DELETE', "/api/delete/coachs/$idCoach/availabilities/$idAvailability");

        
        $this->assertEquals(Response::HTTP_NO_CONTENT, $client->getResponse()->getStatusCode());


        // Vérifier la supression de l'availability dans la base de données
        $entityManager = $client->getContainer()->get('doctrine.orm.entity_manager');
        $availabilityRepository = $entityManager->getRepository(Availability::class);
        $deletedAvailability = $availabilityRepository->find($idAvailability);
        $this->assertNull($deletedAvailability);

    }


}
