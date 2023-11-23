<?php

namespace App\Controller;

use App\Entity\Course;
use App\Repository\CoachRepository;
use App\Repository\CourseRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use OpenApi\Annotations as OA;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;


class CourseController extends AbstractController
{

    /**
     * Get all courses
     *
     * @OA\Response(
     *     response=200,
     *     description="Ok",
     * )
     * 
     * @OA\Tag(name="Courses")
     */
    #[Route('/api/courses', name: 'app_courses', methods: ['GET'])]
    public function getCourses(CourseRepository $courseRepository, SerializerInterface $serializerInterface): JsonResponse
    {

        $courses = $courseRepository->findAll();

        $coursesJson = $serializerInterface->serialize($courses, 'json', ['groups' => 'course']);

        // le code retour : ici Response::HTTP_OK  correspond au code 200 . Ce code est celui renvoyé par défaut lorsque rien n’est précisé ;
        // [] : les headers (qu’on laisse vides pour l’instant pour garder le comportement par défaut);
        // un true qui signifie que nous avons DÉJÀ sérialisé les données et qu’il n’y a donc plus de traitement à faire dessus. 
        return new JsonResponse($coursesJson, Response::HTTP_OK, [], true);
    }


    /**
     * Get courses by id
     *
     * @OA\Response(
     *     response=200,
     *     description="Ok",
     * )
     * 
     * @OA\Tag(name="Courses")
     */
    #[Route('/api/courses/{id}', name: 'app_courses_id', methods: ['GET'])]
    public function getCoursesbyId(Course $course, SerializerInterface $serializerInterface): JsonResponse
    {

        $courseById = $serializerInterface->serialize($course, 'json', ['groups' => 'course']);

        return new JsonResponse($courseById, Response::HTTP_OK, ['accept' => 'json'], true);
    }


    /**
     * Create new courses 
     *
     * @OA\Response(
     *     response=201,
     *     description="Created",
     * )
     * 
     * @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="name", type="string"),
     *             @OA\Property(property="description", type="string"),
     *             @OA\Property(property="duration", type="integer"),
     *             @OA\Property(property="cost", type="string"),
     *             @OA\Property(property="coach", type="array", @OA\Items(
     *             type="object",
     *             @OA\Property(property="coachInformation", type="object", @OA\Property(property="idUser", type="integer")),
     *         ))
     *     )
     * ),
     * 
     * @OA\Tag(name="Courses")
     */
    #[Route('/api/post/courses', name: "app_courses_post", methods: ['POST'])]
    public function createCourses(Request $request, CoachRepository $coachRepository, serializerInterface $serializerInterface, EntityManagerInterface $entityManager): JsonResponse
    {

        // $request->getContent(): récupère le contenu de la requête HTTP POST reçue.
        // Course::class: C'est la classe cible dans laquelle on veut désérialiser les données JSON
        // json :  indique au composant de sérialisation que le contenu de la requête est au format JSON
        $courses = $serializerInterface->deserialize($request->getContent(), Course::class, 'json');

        // Récupération de l'ensemble des données envoyées sous forme de tableau
        $content = $request->toArray();

        // Récupération de l'id coach de la requete en parcourant le tableau coach[] puis le tableau associatif !
        $idCoach = $content['coach'][0]['coachInformation']['idUser'];

        // On cherche l' id de coach  et on l'assigne à un cour.
        // Si "find" ne trouve pas l' id, alors null sera retourné.
        $courses->addIdUser($coachRepository->find($idCoach));

        // persistance des données dans la BDD
        $entityManager->persist($courses);

        $entityManager->flush();

        $jsonCourses = $serializerInterface->serialize($courses, 'json', ['groups' => 'course']);

        // created = code 201
        return new JsonResponse($jsonCourses, Response::HTTP_CREATED, [], true);
    }


    /**
     * Edit courses
     *
     * @OA\Response(
     *     response=202,
     *     description="Accepted",
     * )
     * 
     * 
     * @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="name", type="string"),
     *             @OA\Property(property="description", type="string"),
     *             @OA\Property(property="duration", type="integer"),
     *             @OA\Property(property="cost", type="string"),
     *     )
     * ),
     * 
     * @OA\Tag(name="Courses")
     */
    #[Route('/api/put/courses/{id}', name: "app_courses_put", methods: ['PUT'])]
    public function updateCourses(Request $request, SerializerInterface $serializer, Course $course, EntityManagerInterface $entityManager): JsonResponse
    {

        $updatedCourse = $serializer->deserialize($request->getContent(), Course::class, 'json', [AbstractNormalizer::OBJECT_TO_POPULATE => $course, 'ignored_attributes' => ['idCourse', 'coach']]);

        $entityManager->persist($updatedCourse);

        $entityManager->flush();

        $jsonUpdatedCourse = $serializer->serialize($updatedCourse, 'json', ['groups' => 'course']);

        // accepted = code 202
        return new JsonResponse($jsonUpdatedCourse, JsonResponse::HTTP_ACCEPTED, [], true);
    }


    /**
     * Delete courses
     *
     * @OA\Response(
     *     response=204,
     *     description="No content",
     * )
     * 
     * @OA\Tag(name="Courses")
     */
    #[Route('/api/delete/courses/{id}', name: 'delete_courses', methods: ['DELETE'])]
    public function deleteCourses(Course $course, EntityManagerInterface $entityManager): Response
    {
        $entityManager->remove($course);

        $entityManager->flush();

        return $this->redirectToRoute('app_courses', [], Response::HTTP_SEE_OTHER, true);
        // return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }
}
