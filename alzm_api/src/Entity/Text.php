<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Text
 *
 * @ORM\Table(name="text")
 * @ORM\Entity(repositoryClass="App\Repository\TextRepository")
 */
class Text
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_text", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="text_id_text_seq", allocationSize=1, initialValue=1)
     * @Groups({"plans"})
     */
    private $idText;

    /**
     * @var string|null
     *
     * @ORM\Column(name="text", type="text", nullable=true)
     * @Groups({"plans"})
     */
    private $text;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Resources", mappedBy="idText")
     */
    private $idResources = array();

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idResources = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdText(): ?int
    {
        return $this->idText;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(?string $text): static
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @return Collection<int, Resources>
     */
    public function getIdResources(): Collection
    {
        return $this->idResources;
    }

    public function addIdResource(Resources $idResource): static
    {
        if (!$this->idResources->contains($idResource)) {
            $this->idResources->add($idResource);
            $idResource->addIdText($this);
        }

        return $this;
    }

    public function removeIdResource(Resources $idResource): static
    {
        if ($this->idResources->removeElement($idResource)) {
            $idResource->removeIdText($this);
        }

        return $this;
    }

}
