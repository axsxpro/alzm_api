<?php

namespace App\Form;

use App\Entity\AppUser;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AppUserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('lastname')
            ->add('firstname')
            ->add('datebirth')
            ->add('email')
            ->add('password')
            ->add('accessToken')
            ->add('dateRegistration')
            ->add('roles')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => AppUser::class,
        ]);
    }
}
