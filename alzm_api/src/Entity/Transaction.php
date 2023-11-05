<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Transaction
 *
 * @ORM\Table(name="transaction", indexes={@ORM\Index(name="IDX_723705D16B3CA4B", columns={"id_user"})})
 * @ORM\Entity(repositoryClass="App\Repository\TransactionRepository")
 */
class Transaction
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_transaction", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="transaction_id_transaction_seq", allocationSize=1, initialValue=1)
     * @Groups({"transaction"})
     */
    private $idTransaction;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_transaction", type="datetime", nullable=true)
     * @Groups({"transaction"})
     */
    private $dateTransaction;

    /**
     * @var string|null
     *
     * @ORM\Column(name="amount", type="decimal", precision=15, scale=2, nullable=true)
     * @Groups({"transaction"})
     */
    private $amount;

    /**
     * @var string|null
     *
     * @ORM\Column(name="payment_method", type="string", length=50, nullable=true)
     * @Groups({"transaction"})
     */
    private $paymentMethod;

    /**
     * @var \Patient
     *
     * @ORM\ManyToOne(targetEntity="Patient")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user", referencedColumnName="id_user")
     * })
     * @Groups({"transaction"})
     * @SerializedName("patient")
     */
    private $idUser;

    public function getIdTransaction(): ?int
    {
        return $this->idTransaction;
    }

    public function getDateTransaction(): ?\DateTimeInterface
    {
        return $this->dateTransaction;
    }

    public function setDateTransaction(?\DateTimeInterface $dateTransaction): static
    {
        $this->dateTransaction = $dateTransaction;

        return $this;
    }

    public function getAmount(): ?string
    {
        return $this->amount;
    }

    public function setAmount(?string $amount): static
    {
        $this->amount = $amount;

        return $this;
    }

    public function getPaymentMethod(): ?string
    {
        return $this->paymentMethod;
    }

    public function setPaymentMethod(?string $paymentMethod): static
    {
        $this->paymentMethod = $paymentMethod;

        return $this;
    }

    public function getIdUser(): ?Patient
    {
        return $this->idUser;
    }

    public function setIdUser(?Patient $idUser): static
    {
        $this->idUser = $idUser;

        return $this;
    }


}
