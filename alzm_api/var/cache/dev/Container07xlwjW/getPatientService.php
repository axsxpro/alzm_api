<?php

namespace Container07xlwjW;


use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getPatientService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'App\Entity\Patient' shared autowired service.
     *
     * @return \App\Entity\Patient
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/src/Entity/Patient.php';

        return $container->privates['App\\Entity\\Patient'] = new \App\Entity\Patient();
    }
}
