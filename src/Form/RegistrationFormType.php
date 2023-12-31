<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nome completo',
                'attr' => ['id' => 'name'],
            ])

            ->add('email', EmailType::class, [
                'label' => 'Email',
                'attr' => ['id' => 'email'],
            ])

            ->add('agreeTerms', CheckboxType::class, [
                'label' => 'Aceito os termos de uso',
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'Você concorda com nossos termos.',
                    ]),
                ],
            ])

            ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'label' => 'Senha',
                'mapped' => false,
                'attr' => [
                    'autocomplete' => 'new-password',
                    'id' => 'password',
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Este campo não pode estar vazio.',
                    ]),

                    new Length([
                        'min' => 6,
                        'minMessage' => 'A senha deve conter no mínimo {{ limit }} caracteres.',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
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
