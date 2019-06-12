<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Validator\Constraints as Assert;

class MembreType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('username', TextType::class, array(
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
            )
        ))
        ->add('password', PasswordType::class, array(
            'required' => false

        ))
        ->add('nom', TextType::class, array(
            'required' => false
                
                
        ))
        ->add('prenom', TextType::class, array(
            'required' => false,
            new Assert\NotBlank(array(
                    'message' => 'Attention, veuillez renseigner ce champs !'
                )),
                new Assert\Length(array(
                    'min'=> 3,
                    'minMessage' => 'Attention veuillez renseigner un texte compris entre 3 et 20 caracteres',
                    'max' => 20,
                    'maxMessage' => 'Attention veuillez renseigner un texte compris entre 3 et 20 caracteres',
                )),
            
        ))
        ->add('email', EmailType::class, array(
            'required' => false,
            new Assert\NotBlank(array(
                    'message' => 'Attention, veuillez renseigner ce champs !'
                )),
                new Assert\Length(array(
                    'min'=> 3,
                    'minMessage' => 'Attention veuillez renseigner un texte compris entre 3 et 20 caracteres',
                    'max' => 20,
                    'maxMessage' => 'Attention veuillez renseigner un texte compris entre 3 et 20 caracteres',
                )),
            

        ))

        ->add('civilite', ChoiceType::class, array(
            'choices'=> array(
                'Homme' => 'm',
                'Femme' => 'f',
            )
        ))
        ->add('ville', TextType::class, array(
            'required' => false,
            new Assert\NotBlank(array(
                    'message' => 'Attention, veuillez renseigner ce champs !'
                )),
                new Assert\Length(array(
                    'min'=> 3,
                    'minMessage' => 'Attention veuillez renseigner un texte compris entre 3 et 20 caracteres',
                    'max' => 20,
                    'maxMessage' => 'Attention veuillez renseigner un texte compris entre 3 et 20 caracteres',
                )),
            
        ))
        ->add('codepostal', IntegerType::class)
        ->add('adresse', TextType::class, array(
            'required' => false,
            new Assert\NotBlank(array(
                    'message' => 'Attention, veuillez renseigner ce champs !'
                )),
                new Assert\Length(array(
                    'min'=> 3,
                    'minMessage' => 'Attention veuillez renseigner un texte compris entre 3 et 20 caracteres',
                    'max' => 20,
                    'maxMessage' => 'Attention veuillez renseigner un texte compris entre 3 et 20 caracteres',
                )),
            
        ))
        ->add('statut', IntegerType::class, array())
        ->add('enregistrer', SubmitType::class);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Membre'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_membre';
    }


}
