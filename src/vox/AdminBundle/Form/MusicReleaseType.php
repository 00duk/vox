<?php

namespace vox\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MusicReleaseType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('artist',      'text', array('attr' => array('class' => 'form-control')))
            ->add('title',     'text', array('attr' => array('class' => 'form-control')))
            ->add('tracklist',    'textarea', array('attr' => array('class' => 'form-control')))
            ->add('description',   'textarea', array('attr' => array('class' => 'form-control')))
            ->add('image', new ImageType())
            #->add('date_added',   'datetime', array('attr' => array('class' => 'form-control')))
            #->add('image_1',      'text', array('required' => false, 'attr' => array('class' => 'form-control')))
            #->add('image_1',      'text', array('required' => false, 'attr' => array('class' => 'form-control')))
            #->add('image_2',      'text', array('required' => false, 'attr' => array('class' => 'form-control')))
            #->add('image_3',      'text', array('required' => false, 'attr' => array('class' => 'form-control')))
            ->add('enabled', 'checkbox', array('required' => false, 'attr' => array('checked' => 'checked')))
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
        return 'vox_';
    }

} 