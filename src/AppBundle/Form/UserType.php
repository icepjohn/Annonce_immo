<?php
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 12/07/2017
 * Time: 11:44
 */
class UserType extends AbstractType

{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'firstName',
                TextType::class,
                [
                    "label" => "Prénom"
                ])
            ->add(
                'name',
                TextType::class,
                [
                    "label" => "Nom"
                ])
            ->add(
                'submit',
                SubmitType::class,
                [
                    'label' => 'Valider',
                    'attr' => [
                        "class" => "btn-primary"
                    ]
                ]);

}
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\User'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'AppBundle_User';
    }


}