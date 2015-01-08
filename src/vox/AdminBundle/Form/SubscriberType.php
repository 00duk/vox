<?php

namespace vox\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SubscriberType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', 'text', array('attr' => array('class' => 'form-control', 'autocomplete' => 'off')))
            ->add('enable', 'checkbox', array('required' => false, 'attr' => array('checked' => 'checked')))
            ->add('save',      'submit', array('attr' => array('class' => 'btn btn-default')))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'vox\AdminBundle\Entity\Subscriber'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'vox_adminbundle_subscriber';
    }
}
