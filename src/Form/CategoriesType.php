<?php

namespace App\Form;

use App\Entity\Categories;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType as TypeTextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Image;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;



class CategoriesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

            ->add('cat_nom', TypeTextType::class, [
                'label' => 'Nom de catégorie',
                'help' => 'Indiquez ici le nom complet de la catégorie',
                'attr' => ['placeholder' => 'Catégorie'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez renseigner le nom de la catégorie'
                    ]),
                    new Length([
                        'min' => 4,
                        'minMessage' => 'Le nom de la catégorie doit comporter au moins 4 caractères',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                    new Regex(['pattern' => '/^[A-Za-zéèàçâêûîôäëüïö\_\-\s]+$/', 
                                  'message' => 'Caratère(s) non valide(s)'
                    ])
                ]
            ])


            ->add('cat_photo', FileType::class, [
                'label' => 'Photo de catégorie',
                /* unmapped => fichier non associé à aucune propriété d'entité, 
                validation impossible avec les annotations */
                'mapped' => false,
                // pour éviter de recharger la photo lors de l'édition du profil
                'required' => false,
                'constraints' => [
                    new Image([
                        'maxSize' => '1024k',
                        'mimeTypes' => ['application/jpg','application/png'],
                        'mimeTypesMessage' => 'Veuillez télécharger une photo au format jpg, png'
                    ])
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Categories::class,
        ]);
    }
}

