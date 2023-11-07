<?php

namespace ContainerFoQU26m;


use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getAppUserService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'App\Entity\AppUser' shared autowired service.
     *
     * @return \App\Entity\AppUser
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/security-core/User/UserInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/security-core/User/PasswordAuthenticatedUserInterface.php';
        include_once \dirname(__DIR__, 4).'/src/Entity/AppUser.php';

        return $container->privates['App\\Entity\\AppUser'] = new \App\Entity\AppUser();
    }
}