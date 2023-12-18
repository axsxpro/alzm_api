<?php

namespace App\Tests;

use App\Entity\Course;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class CourseControllerTest extends WebTestCase
{
    
    public function testGetCourses()
    {

        $client = static::createClient();

        $client->request('GET', '/api/courses');

        $this->assertResponseStatusCodeSame(200);

        $this->assertJson($client->getResponse()->getContent());

        $responseData = json_decode($client->getResponse()->getContent(), true);

        $this->assertNotEmpty($responseData);

        foreach ($responseData as $course) {
            $this->assertArrayHasKey('idCourse', $course);
        }
    
    }


    public function testGetCoursesById()
    {

        $client = static::createClient();

        $courseId = 8;

        // Le client fait une requête HTTP GET vers l'endpoint "/api/users/{id}"
        $client->request('GET', "/api/courses/$courseId");

        $this->assertResponseStatusCodeSame(Response::HTTP_OK);

        $this->assertJson($client->getResponse()->getContent());

        $responseData = json_decode($client->getResponse()->getContent(), true);
        $this->assertNotEmpty($responseData);

        $this->assertEquals($courseId, $responseData['idCourse']);
    }


    // public function testCreateCourses()
    // {

    //     $client = static::createClient();

    //     $courseData = [
    //         'name' => 'kkjj',
    //         'description' => 'jlklkol',
    //         'duration' => 60,
    //         'cost' => '45',
    //         'coach' => [
    //             [
    //                 'coachInformation' => [
    //                     'idUser' => 24,
    //                 ],
    //             ],
    //         ],
    //     ];

    //     $jsonData = json_encode($courseData);

    //     $client->request('POST', '/api/post/courses', [], [], ['CONTENT_TYPE' => 'application/json'], $jsonData);

    //     $this->assertEquals(Response::HTTP_CREATED, $client->getResponse()->getStatusCode());

    //     $this->assertJson($client->getResponse()->getContent());

    //     $responseData = json_decode($client->getResponse()->getContent(), true);

    //     // Vérifier que les données correspondent à celles envoyées dans la requête
    //     $this->assertEquals($courseData['name'], $responseData['name']);
    //     $this->assertEquals($courseData['description'], $responseData['description']);
    //     $this->assertEquals($courseData['duration'], $responseData['duration']);
    //     $this->assertEquals($courseData['cost'], $responseData['cost']);
    //     // le tableau coach contient un autre tableau 
    //     $this->assertEquals($courseData['coach'][0]['coachInformation']['idUser'], $responseData['coach'][0]['coachInformation']['idUser']);
    // }



    public function testUpdateCourses()
    {
        $client = static::createClient();

        $courseId = 8;

        $updateCourseData = [
            'name' => 'Nouveau nom',
            'description' => 'Nouvelle description',
            'duration' => 90,
            'cost' => '50.99',
        ];

        $jsonData = json_encode($updateCourseData);

        $client->request('PUT', "/api/put/courses/$courseId", [], [], ['CONTENT_TYPE' => 'application/json'], $jsonData);

        $this->assertEquals(Response::HTTP_ACCEPTED, $client->getResponse()->getStatusCode());

        $this->assertJson($client->getResponse()->getContent());

        $responseData = json_decode($client->getResponse()->getContent(), true);

        // Vérifier que les données correspondent à celles envoyées dans la requête
        $this->assertEquals($updateCourseData['name'], $responseData['name']);
        $this->assertEquals($updateCourseData['description'], $responseData['description']);
        $this->assertEquals($updateCourseData['duration'], $responseData['duration']);
        $this->assertEquals($updateCourseData['cost'], $responseData['cost']);

    }


    public function testDeleteCourses()
    {
        $client = static::createClient();

        $courseId = 14;

        $client->request('DELETE', "/api/delete/courses/$courseId");

        $this->assertEquals(Response::HTTP_NO_CONTENT, $client->getResponse()->getStatusCode());

        // Vérifier la suppression du cours dans la base de données
        $entityManager = $client->getContainer()->get('doctrine.orm.entity_manager');
        $coursesRepository = $entityManager->getRepository(Course::class);
        $deletedCourse = $coursesRepository->find($courseId);
        $this->assertNull($deletedCourse);
    }


}
