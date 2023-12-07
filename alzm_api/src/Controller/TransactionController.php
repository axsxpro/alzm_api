<?php

namespace App\Controller;

use App\Entity\Transaction;
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

        return new JsonResponse($transactionsJson, Response::HTTP_OK, [], true);
    }



    /**
     * Get transactions by id
     *
     * @OA\Response(
     *     response=200,
     *     description="OK",
     * )
     * 
     * @OA\Tag(name="Transactions")
     */
    #[Route('/api/transactions/{id}', name: 'transactions_id', methods: ['GET'])]
    public function getTransactionsById(Transaction $transaction, SerializerInterface $serializer): JsonResponse
    {
        $transactionById = $serializer->serialize($transaction, 'json', ['groups' => 'resources']);

        return new JsonResponse($transactionById, Response::HTTP_OK, ['accept' => 'json'], true);
    }


}
