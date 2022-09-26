<?php

namespace App\Form;

use App\Entity\Argonaute;
use PhpParser\Node\VariadicPlaceholder;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;

class ArgonauteHiringFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => "Nom de l'argonaute",
                'constraints' => [
                    new Length(['min' => 3])
                ],
                'attr' => [
                    'placeholder' => 'Charalampos'
                ]
            ])
            ->add('Envoyer', SubmitType::class, [
                'attr' => ['class' => 'save'],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Argonaute::class,
        ]);
    }
}
