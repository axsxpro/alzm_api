<?php

namespace App\Tests;

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
            $idUser = $availability['coach']['coachInformation']['idUser'];;

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

        // Exécuter une requête POST vers l'endpoint '/api/post/coachs/{id}/availabilities'
        $client->request('POST', '/api/post/coachs/1/availabilities', [], [], ['CONTENT_TYPE' => 'application/json'], $jsonData);

        // Vérifier que la réponse a un code HTTP 201 (Created)
        $this->assertEquals(Response::HTTP_CREATED, $client->getResponse()->getStatusCode());


        $this->assertJson($client->getResponse()->getContent());

        // Convertir la réponse JSON en tableau associatif
        $responseData = json_decode($client->getResponse()->getContent(), true);


        // Vérifier que la date de disponibilité correspond à celle envoyée dans la requête
        $this->assertEquals($availabilityData['dateAvailability'], $responseData['dateAvailability']);


    }


}
