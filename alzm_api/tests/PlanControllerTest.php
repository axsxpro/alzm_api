<?php

namespace App\Tests;

use App\Entity\Plan;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class PlanControllerTest extends WebTestCase
{
    public function testGetPlans()
    {

        $client = static::createClient();

        $client->request('GET', '/api/plans');

        $this->assertResponseStatusCodeSame(200);

        $this->assertJson($client->getResponse()->getContent());

        $responseData = json_decode($client->getResponse()->getContent(), true);

        $this->assertNotEmpty($responseData);

        foreach ($responseData as $plan) {
            $this->assertArrayHasKey('idPlan', $plan);
        }
    
    }


    public function testGetPlansById()
    {

        $client = static::createClient();

        $planId = 3;

        $client->request('GET', "/api/plans/$planId");

        $this->assertResponseStatusCodeSame(Response::HTTP_OK);

        $this->assertJson($client->getResponse()->getContent());

        $responseData = json_decode($client->getResponse()->getContent(), true);
        $this->assertNotEmpty($responseData);

        $this->assertEquals($planId, $responseData['idPlan']);
    }


    public function testCreatePlans()
    {

        $client = static::createClient();

        $planData = [
            'name' => 'planTest',
            'description' => 'test du plan',
            'cost' => '25',
            'advantages' => [
                ['idAdvantage' => 7],
                ['idAdvantage' => 8],
            ],
            'resources' => [
                ['idResources' => 3],
                ['idResources' => 4],
            ],
        ];

        $jsonData = json_encode($planData);

        $client->request('POST', '/api/post/plans', [], [], ['CONTENT_TYPE' => 'application/json'], $jsonData);

        $this->assertEquals(201, $client->getResponse()->getStatusCode());

        $responseData = json_decode($client->getResponse()->getContent(), true);

        // Vérifier que les données correspondent à celles envoyées dans la requête
        $this->assertEquals($planData['name'], $responseData['name']);
        $this->assertEquals($planData['description'], $responseData['description']);
        $this->assertEquals($planData['cost'], $responseData['cost']);

        // Vérifier que chaque avantage a été ajouté au plan
        foreach ($planData['advantages'] as $advantage) {

            $this->assertArrayHasKey('idAdvantage', $advantage);
        }

        // Vérifier que chaque ressource a été ajoutée au plan
        foreach ($planData['resources'] as $resource) {

            $this->assertArrayHasKey('idResources', $resource);
        }

    }


    public function testUpdatePlans()
    {

        $client = static::createClient();

        $planId = 6;

        $planData = [
            'name' => 'planTestUpdated',
            'description' => 'test du plan',
            'cost' => '250',
            'advantages' => [
                ['idAdvantage' => 12],
                ['idAdvantage' => 13],
            ],
            'resources' => [
                ['idResources' => 3],
                ['idResources' => 4],
            ],
        ];

        $jsonData = json_encode($planData);

        $client->request('PUT', "/api/put/plans/$planId", [], [], ['CONTENT_TYPE' => 'application/json'], $jsonData);

        $this->assertEquals(Response::HTTP_ACCEPTED, $client->getResponse()->getStatusCode());

        $responseData = json_decode($client->getResponse()->getContent(), true);

        // Vérifier que les données correspondent à celles envoyées dans la requête
        $this->assertEquals($planData['name'], $responseData['name']);
        $this->assertEquals($planData['description'], $responseData['description']);
        $this->assertEquals($planData['cost'], $responseData['cost']);

        // Vérifier que chaque avantage a été ajouté au plan
        foreach ($planData['advantages'] as $advantage) {

            $this->assertArrayHasKey('idAdvantage', $advantage);
        }

        // Vérifier que chaque ressource a été ajoutée au plan
        foreach ($planData['resources'] as $resource) {

            $this->assertArrayHasKey('idResources', $resource);
        }

    }


    public function testDeletePlans()
    {
        $client = static::createClient();

        $planId = 7;

        $client->request('DELETE', "/api/delete/plans/$planId");

        $this->assertEquals(Response::HTTP_NO_CONTENT, $client->getResponse()->getStatusCode());

        // Vérifier la suppression du cours dans la base de données
        $entityManager = $client->getContainer()->get('doctrine.orm.entity_manager');
        $planRepository = $entityManager->getRepository(Plan::class);
        $deletedPlan = $planRepository->find($planId);
        $this->assertNull($deletedPlan);
    }

}
