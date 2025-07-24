<?php

namespace App\Tests;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\AppUser;



class UsersControllerTest extends WebTestCase
{

    public function testGetUsers()
    {

        // Crée une instance client: un client test qui va permettre de faire des requetes HTTP
        $client = static::createClient();

        // Le client fait une requête HTTP GET vers l'endpoint '/api/users'
        $client->request('GET', '/api/users');

        // vérifier que la réponse a un code HTTP 200 (OK)
        // $client->getResponse() : Cela récupère l'objet Response retourné par le client Symfony lors de la requête HTTP. Le Response contient toutes les informations sur la réponse HTTP, telles que le statut de la réponse, le header et le body.
        // $this->assertEquals : assertion d'égalité; 200: c'est la valeur attendue soit un code HTTP 200 (OK).
        // $client->getResponse()->getStatusCode(): Obtention du code HTTP de la réponse suite à la requete
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        // $this->assertResponseStatusCodeSame(200);

        // vérifier que la réponse est au format JSON
        // $this->assertTrue : assertion de vérité 
        // vérifie que la réponse de la requête GET vers l'endpoint '/api/users' a l'en-tête 'Content-Type' avec la valeur 'application/json'. 
        $this->assertTrue($client->getResponse()->headers->contains('Content-Type', 'application/json'));
        // $this->assertResponseHeaderSame('content-type', 'application/json');
        // $this->assertJson($client->getResponse()->getContent());


        // vérifier le contenu de la réponse JSON
        // getResponse()->getContent(): renvoie le contenu du body de la réponse HTTP. 
        // json_decode: permet de convertir du JSON en un objet PHP
        // L'utilisation de true comme deuxième argument de json_decode() permet de décoder le JSON en tant que tableau associatif.
        $responseData = json_decode($client->getResponse()->getContent(), true);

        // vérifier que le tableau de données n'est pas vide
        $this->assertNotEmpty($responseData);

        // foreach ($responseData as $user) {
        //     $this->assertArrayHasKey('idUser', $user);
        // }

    }


    public function testGetUserById()
    {

        $client = static::createClient();

        // déclaration d'une variable av comme valeur l'id 20
        $userId = 20;

        // Le client fait une requête HTTP GET vers l'endpoint "/api/users/{id}"
        $client->request('GET', "/api/users/$userId");

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $this->assertJson($client->getResponse()->getContent());

        // Vérifie que le contenu de la réponse JSON n'est pas vide
        $responseData = json_decode($client->getResponse()->getContent(), true);
        $this->assertNotEmpty($responseData);

        // Facultatif : Vérifie que l'ID de l'utilisateur dans la réponse correspond à l'ID attendu
        $this->assertEquals($userId, $responseData['idUser']);
    }


    public function testGetUserRoleById()
    {

        $client = static::createClient();

        $userId = 24;

        // Le client fait une requête HTTP GET vers l'endpoint "/api/users/{id}/roles"
        $client->request('GET', "/api/users/$userId/roles");

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $this->assertJson($client->getResponse()->getContent());

        // $responseData = [
        //     [0] => "ROLE_****"
        // ];
        $responseData = json_decode($client->getResponse()->getContent(), true);
        $this->assertNotEmpty($responseData);

        //  $this->assertEquals : pour vérifier que la valeur de $responseData est un tableau contenant "ROLE_USER"
        $this->assertEquals(['ROLE_COACH'], json_decode($responseData));
        // $this->assertEquals(['ROLE_PATIENT'], json_decode($responseData));
        // $this->assertEquals(['ROLE_ADMIN'], json_decode($responseData));
    }


    public function testCreateUsers()
    {

        $client = static::createClient();

        // Crée des données JSON à envoyer dans la requête POST 
        json_encode($postData = [
            'lastname' => 'TestLastname',
            'firstname' => 'TestFirstname',
            "datebirth" => "1990-01-15T00:00:00+00:00",
            "email" => "usertestunit@example.com",
            "roles" => ['ROLE_PATIENT'],
            "password" => "password",
        ]);


        // convertir les données en JSON
        $jsonData = json_encode($postData);

        // Le client fait une requête HTTP POST vers l'endpoint '/api/post/users'
        // ['CONTENT_TYPE' => 'application/json'] : C'est le tableau du header de la requête, spécifie que le type de contenu de la requête est du JSON.
        // $jsonData : C'est la variable contenant les données JSON que l'on va envoyer dans le body de la requête POST
        $client->request('POST', '/api/post/users', [], [], ['CONTENT_TYPE' => 'application/json'], $jsonData);

        // Vérifie que la réponse a un code HTTP 201 (Created)
        $this->assertEquals(Response::HTTP_CREATED, $client->getResponse()->getStatusCode());

        $this->assertJson($client->getResponse()->getContent());

        // Vérifier que la requete a été correctement persistée en base de données
        // getContainer(): récupère le conteneur de services de l'application Symfony
        // ->get('doctrine.orm.entity_manager'): permet d'obtenir le gestionnaire d'entités Doctrine 'entityManager'
        $entityManager = $client->getContainer()->get('doctrine.orm.entity_manager');

        // recherche de l'user par son nom
        $user = $entityManager->getRepository(AppUser::class)->findOneBy(['lastname' => 'TestLastname']);

        // vérifier si l'objet $user est une instance de la classe AppUser
        $this->assertInstanceOf(AppUser::class, $user);

        // Vérifier que le mot de passe a bien été hashé
        $this->assertNotEquals('password', $user->getPassword());

    }


    public function testUpdateUsers()
    {

        $client = static::createClient();

        // récupération d'un utilisateur existant depuis la base de données
        $entityManager = $client->getContainer()->get('doctrine.orm.entity_manager');
        $user = $entityManager->getRepository(AppUser::class)->findOneBy(['idUser' => 41]); // Remplacez 1 par l'ID d'un utilisateur existant

        // Génération d'un tableau de données JSON à envoyer dans la requête PUT
        $userData = [
            'email' => 'new_emailtest@example.com',
        ];


        $jsonData = json_encode($userData);

        // Faire une requête HTTP PUT vers l'endpoint '/api/put/users/{id}'
        $client->request('PUT', '/api/put/users/' . $user->getIdUser(), [], [], ['CONTENT_TYPE' => 'application/json'], $jsonData);

        // Vérifier que la réponse a un code HTTP 202 (Accepted)
        $this->assertEquals(202, $client->getResponse()->getStatusCode());

        // Vérifier que la réponse est au format JSON
        $this->assertJson($client->getResponse()->getContent());

        // récupération des données mises à jours dans le body de la response
        $responseData = json_decode($client->getResponse()->getContent(), true);
        $email = $responseData['email'];
        

        // Nouvelle requête pour récupérer l'utilisateur depuis la base de données après la mise à jour
        $updatedUser = $entityManager->getRepository(AppUser::class)->find($user->getIdUser());

        // Vérifier que les données maj et persistés dans la base de données correspondent aux données envoyées dans la requête
        $this->assertEquals($email, $updatedUser->getEmail());
    }



    public function testDeleteUser()
    {
        $client = static::createClient();

        $userId = 43;

        // requête HTTP DELETE vers l'endpoint '/api/users/{id}/delete'
        $client->request('DELETE', "/api/users/$userId/delete");

        // Vérifier que la réponse a un code HTTP 204
        $this->assertEquals(204, $client->getResponse()->getStatusCode());

        // Vérifier que l'user a bien été supprimées de la base de données
        $entityManager = $client->getContainer()->get('doctrine.orm.entity_manager');

        // Vérifier l'absence de l'utilisateur dans la base de données AppUser 
        $appUserRepository = $entityManager->getRepository(AppUser::class);
        $deletedUser = $appUserRepository->find($userId);
        // vérifie si la variable $deletedUser est null
        $this->assertNull($deletedUser);

        // Vérifier que l'utilisateur est bien redirigé après la suppression
        // 'app_users' : C'est l'URL vers laquelle la redirection doit se produire
        // $this->assertResponseRedirects('app_users', Response::HTTP_SEE_OTHER);
    }

}
