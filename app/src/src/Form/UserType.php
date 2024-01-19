<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\Skill;;
use App\Repository\SkillRepository;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('email', null, [
            'label' => 'Email',
            // Autres options possibles 
            'attr' => [
                'placeholder' => 'Entrez votre email'
            ]
            ])
            ->add('roles', ChoiceType::class, [
                'choices' => [
                    'ROLE_ADMIN' => 'ROLE_ADMIN',
                    'ROLE_USER' => 'ROLE_USER',
                    // Add more roles here
                ],
                'multiple' => true,
                'expanded' => true,
            ])
            ->add('password', PasswordType::class, [
                'label' => 'Mot de passe',
                'attr' => [
                    'placeholder' => 'Entrez votre mot de passe'
                ]
            ])
            
            ->add('fullname', null, [
                'label' => 'Nom Complet',
                // Autres options possibles
                'attr' => [
                    'placeholder' => 'Entrez votre nom complet'
                ]
            ])
            ->add('jop', null, [
                'label' => 'Profession',
                // Autres options possibles
                'attr' => [
                    'placeholder' => 'Entrez votre profession'
                ]
            ])
            ->add('phone', null, [
                'label' => 'Numéro de Téléphone',
                // Autres options possibles
                'attr' => [
                    'placeholder' => 'Entrez votre numéro de téléphone'
                ]])
            ->add('adress', null, [
                'label' => 'Adresse',
                // Autres options possibles
                'attr' => [
                    'placeholder' => 'Entrez votre adresse'
                ]
            ])
            ->add('birthday', DateType::class, [
                'widget' => 'single_text',
            ])
            ->add('piographie', null, [
                'label' => 'Piographie',
                // Autres options possibles
                'attr' => [
                    'placeholder' => 'Entrez votre piographie'
                ]
            ])
            //->add('review')
            // ->add('skills', Skill::class, [ // Add this block
            //     'class' => Skill::class, // Assuming Skills::getAllSkills() returns an array of skills
            //     'choice_label' => 'skills', // Property of Category to display in the dropdown
            //     'placeholder' => 'Selectionnez une compétence',
            //     'multiple' => true,
            //     'expanded' => true,
            // ])
            // ->add('academics')
            ->add('picture', FileType::class, [
                'label' => 'Profile Picture',
                'data_class' => null,
                'required' => true,
                'mapped' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
