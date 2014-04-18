<?php

namespace StacyMark\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PaintingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('image')
            ->add('thumb')
            ->add('title')
            ->add('medium')
            ->add('date_fin')
            ->add('dim')
            ->add('available')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'StacyMark\MainBundle\Entity\Painting'
        ));
    }

    public function getName()
    {
        return 'stacymark_mainbundle_paintingtype';
    }
}
