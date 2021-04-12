<?php

declare(strict_types = 1);

namespace App\Form\Type;

use App\Entity\Epic;
use App\Entity\Task;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\GreaterThan;
use Symfony\Component\Validator\Constraints\NotNull;

class TaskType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class,
                [
                    'constraints' => [
                        new NotNull([
                            'message' => 'Title cannot be blank.'
                        ])
                    ]
                ]
            )
            ->add('description', TextType::class,
                [
                    'constraints' => [
                        new NotNull([
                            'message' => 'Description cannot be blank.'
                        ])
                    ]
                ]
            )
            ->add('epic', EntityType::class,
                [
                    'class' => Epic::class,
                    'choice_label' => 'epic',
                    'constraints' => [
                        new NotNull( [
                            'message' => 'Epic cannot be blank.'
                        ] )
                    ]
                ]
            )
            ->add('search', TextType::class,
                [
                    'class' => Epic::class,
                    'choice_label' => 'epic',
                    'constraints' => [
                        new NotNull( [
                            'message' => 'Epic cannot be blank.'
                        ] )
                    ]
                ]
            );
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults( [
            'data_class'      => Task::class,
            'csrf_protection' => false,
       ] );
    }
}