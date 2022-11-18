<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('username')
            ->add('roles', ChoiceType::class, [
                "choices" => [
                    "Administrateur" => "ROLE_ADMIN",
                    "User"         => "ROLE_USER",
                    "Modérateur"     => "ROLE_MODO"
                ],
                "multiple"  => true,
                "expanded"  => true,
                "label" => "Accréditation"
            ])
            ->add('password')
            ->add('email')
            ->add('nom')
            ->add('prenom')
            ->add('civilite')
            ->add('adresse')
            ->add('code_postal')
            ->add('ville')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
