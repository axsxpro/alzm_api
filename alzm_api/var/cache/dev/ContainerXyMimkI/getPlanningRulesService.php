<?php

namespace ContainerXyMimkI;


use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getPlanningRulesService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'App\Entity\PlanningRules' shared autowired service.
     *
     * @return \App\Entity\PlanningRules
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/src/Entity/PlanningRules.php';

        return $container->privates['App\\Entity\\PlanningRules'] = new \App\Entity\PlanningRules();
    }
}
