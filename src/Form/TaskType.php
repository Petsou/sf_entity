<?php

namespace App\Form;

use App\Entity\Task;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class TaskType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            // Name
            ->add('name', TextType::class, [

                //texte de la balise <label>
                'label'=> "Entrer le nom de la tâche",

                // modification des attributs de la balise <label>
                'label_attr' => [
                    'class' => "my-custom-class"
                ],

                // Rendre le champ obligatoire ou non
                'required' => true,

                // Modification des attributs du champ html
                'attr' => [
                    // Ajouter des classes sur le champ html
                    // 'class' => "form-control",

                    // Ajouter le placeholder
                    'placeholder' => "Saisir votre champ !!!"
                ],


                // Helper
                // --

                // Ajoute un texte d'aide pour les utilisateurs
                'help' => "Ceci est un texte d'aide pour les utilisateurs !",

                // Modifie les attributs du helper
                'help_attr' => [
                    // 'class' => "CLASS-FOR-MY-HELPER",
                ],

                // Contraintes / Controle du formulaire
                // --

                'constraints' => [
                    new NotBlank([
                        'message' => "Le champ est obligatoire"
                    ])
                ],
            ])

            // createDate
            // ->add('createDate')

            //completeAt
            //->add('completeAt')

            // Création d'un champ non référencé dans l'Entité
            ->add('myCustomField', TextareaType::class, [

                //Le  champ n'est pas "mapé" dans l'entité
                'mapped' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Task::class,
        ]);
    }
}
