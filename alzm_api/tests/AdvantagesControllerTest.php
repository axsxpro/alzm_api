<?php

namespace App\Tests;

use App\Entity\Advantage;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class AdvantagesControllerTest extends WebTestCase
{
    
    public function testGetAdvantages()
    {

        $client = static::createClient();

        $client->request('GET', '/api/advantages');

        $this->assertResponseStatusCodeSame(200);

        $this->assertJson($client->getResponse()->getContent());

        $responseData = json_decode($client->getResponse()->getContent(), true);

        $this->assertNotEmpty($responseData);

        foreach ($responseData as $advantage) {
            $this->assertArrayHasKey('idAdvantage', $advantage);
        }
    
    }


    public function testGetAvantagesById()
    {

        $client = static::createClient();

        $advantageId = 8;

        // Le client fait une requête HTTP GET vers l'endpoint "/api/users/{id}"
        $client->request('GET', "/api/advantages/$advantageId");

        $this->assertResponseStatusCodeSame(Response::HTTP_OK);

        $this->assertJson($client->getResponse()->getContent());

        $responseData = json_decode($client->getResponse()->getContent(), true);
        $this->assertNotEmpty($responseData);

        $this->assertEquals($advantageId, $responseData['idAdvantage']);
    }


    // public function testCreateAdvantages()
    // {
    //     $client = static::createClient();

    //     $advantageData = [
    //         'description' => 'Advantage description test',
    //     ];

    //     $jsonData = json_encode($advantageData);

    //     $client->request('POST', '/api/post/advantages', [], [], ['CONTENT_TYPE' => 'application/json'], $jsonData);

    //     $this->assertEquals(Response::HTTP_CREATED, $client->getResponse()->getStatusCode());

    //     $this->assertJson($client->getResponse()->getContent());

    //     $responseData = json_decode($client->getResponse()->getContent(), true);

    //     // Vérifier que les données correspondent à celles envoyées dans la requête
    //     $this->assertEquals($advantageData['description'], $responseData['description']);
    // }



    public function testUpdateAdvantages()
    {
        $client = static::createClient();

        // Créer un nouvel avantage pour la mise à jour
        $advantageData = [
            'description' => 'Advantage description',
        ];

        $jsonData = json_encode($advantageData);

        $client->request('POST', '/api/post/advantages', [], [], ['CONTENT_TYPE' => 'application/json'], $jsonData);

        // Récupérer la réponse pour obtenir l'ID de l'avantage créé
        $responseData = json_decode($client->getResponse()->getContent(), true);
        $idAdvantage = $responseData['idAdvantage'];


        // Modifier la description de l'avantage
        $updatedAdvantageData = [
            'description' => 'Updated advantage description',
        ];

        $updatedJsonData = json_encode($updatedAdvantageData);

        // Envoyer une requête PUT pour mettre à jour l'avantage
        $client->request('PUT', "/api/put/advantages/$idAdvantage", [], [], ['CONTENT_TYPE' => 'application/json'], $updatedJsonData);

        $this->assertEquals(Response::HTTP_ACCEPTED, $client->getResponse()->getStatusCode());

        $this->assertJson($client->getResponse()->getContent());

        $updatedResponseData = json_decode($client->getResponse()->getContent(), true);

        // Vérifier que les données mises à jour correspondent à celles envoyées dans la requête
        $this->assertEquals($updatedAdvantageData['description'], $updatedResponseData['description']);
    
    }

    
    public function testDeleteAdvantages()
    {
        $client = static::createClient();

        $advantageId = 18;

        $client->request('DELETE', "/api/delete/advantages/$advantageId");

        $this->assertEquals(Response::HTTP_NO_CONTENT, $client->getResponse()->getStatusCode());

        // Vérifier la suppression du cours dans la base de données
        $entityManager = $client->getContainer()->get('doctrine.orm.entity_manager');
        $AdvantageRepository = $entityManager->getRepository(Advantage::class);
        $deletedAdvantage = $AdvantageRepository->find($advantageId);
        $this->assertNull($deletedAdvantage);
    }


}
