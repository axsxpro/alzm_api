<?php

namespace App\Tests;

use App\Entity\Resources;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class ResourcesControllerTest extends WebTestCase
{

    public function testGetResources()
    {

        $client = static::createClient();

        $client->request('GET', '/api/resources');

        $this->assertResponseStatusCodeSame(200);

        $this->assertJson($client->getResponse()->getContent());

        $responseData = json_decode($client->getResponse()->getContent(), true);

        $this->assertNotEmpty($responseData);

        foreach ($responseData as $resource) {
            $this->assertArrayHasKey('idResources', $resource);
        }
    }


    public function testGetResourcesById()
    {

        $client = static::createClient();

        $resourceId = 3;

        $client->request('GET', "/api/resources/$resourceId");

        $this->assertResponseStatusCodeSame(Response::HTTP_OK);

        $this->assertJson($client->getResponse()->getContent());

        $responseData = json_decode($client->getResponse()->getContent(), true);
        $this->assertNotEmpty($responseData);

        $this->assertEquals($resourceId, $responseData['idResources']);
    }


    public function testCreateResources()
    {
        $client = static::createClient();


        $resourcesData = [

            "text" => [
                ["idText" => 4]
            ],
            "files" => [
                ["idFiles" => 3]
            ],
        ];

        $jsonData = json_encode($resourcesData);

        $client->request('POST', '/api/post/resources', [], [], ['CONTENT_TYPE' => 'application/json'], $jsonData);

        $this->assertEquals(Response::HTTP_CREATED, $client->getResponse()->getStatusCode());


        $this->assertJson($client->getResponse()->getContent());

        json_decode($client->getResponse()->getContent(), true);

        
        // Vérifier que chaque text a été ajouté à la resource
        foreach ($resourcesData['text'] as $text) {

            $this->assertArrayHasKey('idText', $text);
        }

        // Vérifier que chaque files a été ajouté à la resource
        foreach ($resourcesData['files'] as $file) {

            $this->assertArrayHasKey('idFiles', $file);
        }
    }


    public function testUpdateResources()
    {
        $client = static::createClient();

        $resourceId = 7;

        $resourcesData = [

            "text" => [
                ["idText" => 4]
            ],
            "files" => [
                ["idFiles" => 3]
            ],
        ];

        $jsonData = json_encode($resourcesData);

        $client->request('PUT', "/api/put/resources/$resourceId", [], [], ['CONTENT_TYPE' => 'application/json'], $jsonData);

        $this->assertEquals(Response::HTTP_ACCEPTED, $client->getResponse()->getStatusCode());

        $this->assertJson($client->getResponse()->getContent());

        json_decode($client->getResponse()->getContent(), true);


        // Vérifier que chaque text a été ajouté à la resource
        foreach ($resourcesData['text'] as $text) {

            $this->assertArrayHasKey('idText', $text);
        }

        // Vérifier que chaque files a été ajouté à la resource
        foreach ($resourcesData['files'] as $file) {

            $this->assertArrayHasKey('idFiles', $file);
        }
    }


    public function testDeleteResources()
    {
        $client = static::createClient();

        $resourceId = 8;

        $client->request('DELETE', "/api/delete/resources/$resourceId");

        $this->assertEquals(Response::HTTP_NO_CONTENT, $client->getResponse()->getStatusCode());

        // Vérifier la suppression du cours dans la base de données
        $entityManager = $client->getContainer()->get('doctrine.orm.entity_manager');
        $ResourcesRepository = $entityManager->getRepository(Resources::class);
        $deletedResource = $ResourcesRepository->find($resourceId);
        $this->assertNull($deletedResource);
    }


}
