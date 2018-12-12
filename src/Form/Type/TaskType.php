<?php
/**
 * Created by PhpStorm.
 * User: justinglowa
 * Date: 07.12.18
 * Time: 12:52
 */

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class TaskType extends AbstractType
{
    /** public function buildForm(FormBuilderInterface $builder, array $options){
        $builder
            ->add('task')
            ->add('add', SubmitType::class, array('label' => 'Hinzufügen'));
    }

    public function configureOptions(OptionsResolver $resolver){
        $resolver->setDefaults(array(
            'data_class' => IndexTask::class,
        ));
    }*/
}