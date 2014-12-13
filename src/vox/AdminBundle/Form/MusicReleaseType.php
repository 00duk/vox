<?php

namespace vox\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MusicReleaseType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            /*->add('artist_name',      'text', array('attr' => array('class' => 'form-control', 'autocomplete' => 'off')))*/
            ->add('title',     'text', array('attr' => array('class' => 'form-control', 'autocomplete' => 'off')))
            ->add('tracklist',    'textarea', array('attr' => array('class' => 'form-control')))
            ->add('description',   'textarea', array('attr' => array('class' => 'form-control')))
            ->add('image', new ImageType(), array('required' => false))
            ->add('enabled', 'checkbox', array('required' => false, 'attr' => array('checked' => 'checked')))
            ->add('artist', 'entity', array(
                    'empty_value' => 'Select Artist',
                    'class'=>'vox\AdminBundle\Entity\Artist',
                    'property'=>'name',
                    'attr' => array('class' => 'form-control')
                )
            )
            ->add('save',      'submit', array('attr' => array('class' => 'btn btn-default')))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'vox\AdminBundle\Entity\MusicRelease'
        ));
    }

    public function getName()
    {
        return 'vox_musicrelease_form';
    }

} 