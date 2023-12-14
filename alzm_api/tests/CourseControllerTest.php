<?php

namespace App\Tests;


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




}
