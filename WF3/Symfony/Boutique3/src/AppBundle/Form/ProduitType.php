<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

// nous avons defini dans $builder, les 'Types' de chaque champ, nous devons faire un 'use' de chaque Type dont on aura besoin
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Validator\Constraints as Assert;

class ProduitType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder                 // ci dessous ::class veut signifie qu'il va chercher directement la class, comme dans le use 
        ->add('reference', TextType::class, array(
            'required' => false,
            'constraints' => array( //pour utiliser constraints on dois faire un use plus haut /!\ use Symfony\Component\Validator\Constraints as Assert;
                new Assert\NotBlank(array(
                    'message' => 'Attention, veuillez renseigner ce champs !'
                )),
                new Assert\Length(array(
                    'min'=> 3,
                    'minMessage' => 'Attention veuillez renseigner un texte compris entre 3 et 20 caracteres',
                    'max' => 20,
                    'maxMessage' => 'Attention veuillez renseigner un texte compris entre 3 et 20 caracteres',
                )),
                new Assert\Regex(array(
                    'pattern' => '/^[a-zA-Z-_0-9]+$/',
                    'message' => 'Veuillez utiliser les lettres de A à Z et les chiffres de 0 à 9',
                ))
            )
                ))
        ->add('categorie', TextType::class, array(
            'required' => false,
        ))
        ->add('titre', TextType::class, array(
            'required' => false,
        ))
        ->add('description', TextareaType::class, array(
            'required' => false,
        ))
        ->add('couleur', TextType::class, array(
            'required' => false,
        ))
        ->add('taille', ChoiceType::class, array(
            'choices'=> array(
                'XS' => 'xs',
                'S' => 's',
                'M' => 'm',
                'L' => 'l',
                'XL' => 'xl',
                'XXL' => 'XXL',
            )
        ) )

        ->add('public', ChoiceType::class, array(
            'choices'=> array(
                'Homme' => 'm',
                'Femme' => 'f',
                'Homme et Femme' => 'mixte'
            )
        ))
        ->add('file', FileType::class, array(// ici on remplace le champs photo, par le champs file, pareil plus haut pour le use, il faut rajouter un use 'FileType'
            'required' => false
        ))   
        ->add('prix', MoneyType::class)
        ->add('stock',IntegerType::class, array(
            'required'=> false,
            'constraints' => array(
                new Assert\Type(array(   // ici on impose une contrainte de 'type', auquel on dit, ça doit etre un type 'integer'
                    'type' => 'integer',
                    'message' => 'Veuillez renseigner avec des chiffres',
                )),
            ),
            'attr' =>array(
                'placeholder' => 'ex : 125',
                'class' => 'form-control',
            )
        ))
        ->add('enregistrer', submitType::class, array(
            'attr' => array(                           // ici, 
                'class' => 'btn btn-warning'           
            )
        ));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Produit'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_produit';
    }


}
