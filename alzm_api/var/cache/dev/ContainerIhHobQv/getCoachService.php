<?php

namespace ContainerIhHobQv;


use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getCoachService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'App\Entity\Coach' shared autowired service.
     *
     * @return \App\Entity\Coach
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/src/Entity/Coach.php';

        return $container->privates['App\\Entity\\Coach'] = new \App\Entity\Coach();
    }
}
