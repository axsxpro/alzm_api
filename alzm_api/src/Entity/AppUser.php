<?php

namespace App\Entity;



use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * AppUser
 *
 * @ORM\Table(name="app_user")
 * @ORM\Entity(repositoryClass="App\Repository\AppUserRepository")
 * 
 */
class AppUser implements UserInterface, PasswordAuthenticatedUserInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_user", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="app_user_id_user_seq", allocationSize=1, initialValue=1)
     * @Groups({"patients","coach", "transaction", "course","planning","availability","appointment"})
     */
    private $idUser;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=50, nullable=false)
     * @Assert\NotBlank(message="Field LASTNAME cannot be blank")
     * @Groups({"patients","coach","transaction", "course","planning","availability","appointment"})
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=50, nullable=false)
     * @Assert\NotBlank(message="Field FIRSTNAME cannot be blank")
     * @Groups({"patients","coach", "transaction", "course","planning", "availability","appointment"})
     */
    private $firstname;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datebirth", type="date", nullable=false)
     * @Assert\NotBlank(message="Field DATEBIRTH cannot be blank")
     * @Groups({"patients","coach", "transaction", "course","planning","availability","appointment", "appointment"})
     */
    private $datebirth;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=50, nullable=false)
     * @Assert\Email(
     *     message=" The e-mail adress format is incorrect",
     *     mode="strict"
     * )
     * @Assert\NotBlank(message="Field EMAIL cannot be blank")
     * @Groups({"patients","coach", "transaction","course","planning", "availability", "appointment"})
     */
    private $email;

    /**
     * @var string The hashed password
     *
     * @ORM\Column(name="password", type="string", length=1000, nullable=true)
     * @Assert\NotBlank(message="Field PASSWORD cannot be blank")
     * 
     */
    private $password;

    /**
     * @var string|null
     *
     * @ORM\Column(name="access_token", type="string", length=1000, nullable=true)
     * 
     */
    private $accessToken;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_registration", type="date", nullable=true)
     * @Groups({"patients","coach"})
     */
    private $dateRegistration;

    /**
     * @var array
     *
     * @ORM\Column(name="roles", type="json", nullable=true)
     * @Assert\NotBlank(message="Field ROLES cannot be blank")
     */
    private $roles = [];


    public function getIdUser(): ?int
    {
        return $this->idUser;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): static
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): static
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getDatebirth(): ?\DateTimeInterface
    {
        return $this->datebirth;
    }

    public function setDatebirth(\DateTimeInterface $datebirth): static
    {
        $this->datebirth = $datebirth;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getAccessToken(): ?string
    {
        return $this->accessToken;
    }

    public function setAccessToken(?string $accessToken): static
    {
        $this->accessToken = $accessToken;

        return $this;
    }

    public function getDateRegistration(): ?\DateTimeInterface
    {
        return $this->dateRegistration;
    }

    public function setDateRegistration(?\DateTimeInterface $dateRegistration): static
    {
        $this->dateRegistration = $dateRegistration;

        return $this;
    }


    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @deprecated since Symfony 5.3, use getUserIdentifier instead
     */
    public function getUsername(): string
    {
        return $this->getUserIdentifier();
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;

        $roles[] = 'ROLE_USER';

        return array_unique($roles);

        // return $this->roles;
    }

    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }
}
