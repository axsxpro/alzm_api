<?php

namespace App\Controller;

use App\Repository\TransactionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use OpenApi\Annotations as OA;



class TransactionController extends AbstractController
{


    /**
     * Get all transactions
     *
     * @OA\Response(
     *     response=200,
     *     description="Ok",
     * )
     * 
     * @OA\Tag(name="Transactions")
     */
    #[Route('/api/transactions', name: 'app_transactions', methods: ['GET'])]
    public function getTransactions(TransactionRepository $transactionRepository, SerializerInterface $serializerInterface ): JsonResponse
    {

        $transactions = $transactionRepository->findAll();

        $transactionsJson = $serializerInterface->serialize($transactions, 'json', ['groups' => 'transaction']);

        // le code retour : ici Response::HTTP_OK  correspond au code 200 . Ce code est celui renvoyé par défaut lorsque rien n’est précisé ;
        // [] : les headers (qu’on laisse vides pour l’instant pour garder le comportement par défaut);
        // un true qui signifie que nous avons DÉJÀ sérialisé les données et qu’il n’y a donc plus de traitement à faire dessus. 
        return new JsonResponse($transactionsJson, Response::HTTP_OK, [], true);
    }


    
}
