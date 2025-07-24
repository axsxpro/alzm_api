<?php

namespace App\Repository;

use App\Entity\AppUser;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\PasswordUpgraderInterface;

/**
 * @extends ServiceEntityRepository<AppUser>
* @implements PasswordUpgraderInterface<AppUser>
 *
 * @method AppUser|null find($id, $lockMode = null, $lockVersion = null)
 * @method AppUser|null findOneBy(array $criteria, array $orderBy = null)
 * @method AppUser[]    findAll()
 * @method AppUser[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AppUserRepository extends ServiceEntityRepository implements PasswordUpgraderInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AppUser::class);
    }

    /**
     * Used to upgrade (rehash) the user's password automatically over time.
     */
    public function upgradePassword(PasswordAuthenticatedUserInterface $user, string $newHashedPassword): void
    {
        if (!$user instanceof AppUser) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', $user::class));
        }

        $user->setPassword($newHashedPassword);
        $this->getEntityManager()->persist($user);
        $this->getEntityManager()->flush();
    }


    // fonction qui récupère le role d'un user en fonction de son id
    public function findUserRoleById($id)
    {
        // Utilisation du QueryBuilder pour créer une requête SQL
        return $this->createQueryBuilder('user') // Alias de la table 'AppUser' nommé aussi 'categorie'
            ->select('user.roles') //Sélectionne uniquement la colonne 'roles', equivaut à : SELECT roles from AppUser
            ->where('user.idUser = :id') // condition where, equivaut à : where idUser(attention ne prend pas les'_') = :id(parametre/valeur) ->  where id_user = $id;
            ->setParameter('id', $id)  // Lie la valeur de $id au paramètre :id('id')
            ->getQuery() // Obtient l'objet de requête
            ->getSingleScalarResult(); // Exécute la requête et récupère un seul résultat scalaire (l'ID)
    }
}
