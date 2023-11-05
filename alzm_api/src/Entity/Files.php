<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Files
 *
 * @ORM\Table(name="files")
 * @ORM\Entity(repositoryClass="App\Repository\FilesRepository")
 */
class Files
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_files", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="files_id_files_seq", allocationSize=1, initialValue=1)
     * @Groups({"plans"})
     */
    private $idFiles;

    /**
     * @var string
     *
     * @ORM\Column(name="link", type="string", length=50, nullable=false)
     * @Groups({"plans"})
     */
    private $link;

    /**
     * @var string|null
     *
     * @ORM\Column(name="type", type="string", length=3, nullable=true)
     * @Groups({"plans"})
     */
    private $type;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Resources", mappedBy="idFiles")
     */
    private $idResources = array();

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idResources = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdFiles(): ?int
    {
        return $this->idFiles;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(string $link): static
    {
        $this->link = $link;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): static
    {
        $this->type = $type;

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
            $idResource->addIdFile($this);
        }

        return $this;
    }

    public function removeIdResource(Resources $idResource): static
    {
        if ($this->idResources->removeElement($idResource)) {
            $idResource->removeIdFile($this);
        }

        return $this;
    }

}
