<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType as TypeTextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('userNom', TypeTextType::class, [
                'label' => 'Nom',
                'attr' => ['placeholder' => 'Nom'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez renseigner votre nom'
                    ]),
                    new Length([
                        'min' => 2,
                        'minMessage' => 'Le nom doit comporter au moins 2 caractères',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                    new Regex(['pattern' => '/^[A-Za-zéèàçâêûîôäëüïö\_\-\s]+$/', 
                                  'message' => 'Caratère(s) non valide(s)'
                    ])
                ]
            ])
            ->add('userPrenom', TypeTextType::class, [
                'label' => 'Prénom',
                'attr' => ['placeholder' => 'Prénom'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez renseigner votre prénom'
                    ]),
                    new Length([
                        'min' => 2,
                        'minMessage' => 'Le prénom doit comporter au moins 2 caractères',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                    new Regex(['pattern' => '/^[A-Za-zéèàçâêûîôäëüïö\_\-\s]+$/', 
                                  'message' => 'Caratère(s) non valide(s)'
                    ])
                ]
            ])
            ->add('userAdresse', TypeTextType::class, [
                'label' => 'Adresse',
                'attr' => ['placeholder' => 'Adresse'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez renseigner votre adresse'
                    ]),
                    new Length([
                        'min' => 5,
                        'minMessage' => 'L\'adresse doit comporter au moins 2 caractères',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                    new Regex(['pattern' => '/^[A-Za-zéèàçâêûîôäëüïö\_\-\s0-9]+$/', 
                                  'message' => 'Caratère(s) non valide(s)'
                    ])
                ]
            ])
            ->add('codePostal', TypeTextType::class, [
                'label' => 'Code Postal',
                'attr' => ['placeholder' => 'Code Postal'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez renseigner votre code postal'
                    ]),
                    new Length([
                        'min' => '5',
                        'minMessage' => 'Le code postal doit comporter au moins 5 caractères',
                        // max length allowed by Symfony for security reasons
                        'max' => 5,
                    ]),
                    new Regex(['pattern' => '/^[A-Za-zéèàçâêûîôäëüïö\_\-\s0-9]+$/', 
                                  'message' => 'Caratère(s) non valide(s)'
                    ])
                ]
            ])
            ->add('userVille', TypeTextType::class, [
                'label' => 'Ville',
                'attr' => ['placeholder' => 'Ville'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez renseigner votre ville'
                    ]),
                    new Length([
                        'min' => 2,
                        'minMessage' => 'Le nom de la ville doit comporter au moins 2 caractères',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                    new Regex(['pattern' => '/^[A-Za-zéèàçâêûîôäëüïö\_\-\s]+$/', 
                                  'message' => 'Caratère(s) non valide(s)'
                    ])
                ]
            ])
            ->add('userPays', TypeTextType::class, [
                'label' => 'Pays',
                'attr' => ['placeholder' => 'Pays'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez renseigner votre pays'
                    ]),
                    new Length([
                        'min' => 3,
                        'minMessage' => 'Le nom du pays doit comporter au moins 3 caractères',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                    new Regex(['pattern' => '/^[A-Za-zéèàçâêûîôäëüïö\_\-\s]+$/', 
                                  'message' => 'Caratère(s) non valide(s)'
                    ])
                ]
            ])
            ->add('email')
            ->add('agreeTerms', CheckboxType::class, [
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'You should agree to our terms.',
                    ]),
                ],
            ])
            ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'attr' => ['autocomplete' => 'new-password'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
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
