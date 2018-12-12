<?php
/**
 * Created by PhpStorm.
 * User: justinglowa
 * Date: 12.12.18
 * Time: 15:43
 */

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class GameType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder
            ->add('title', TextType::class)
            ->add('genre', TextType::class)
            ->add('release_date', TextType::class)
            ->add('review', TextType::class)
            ->add('publisher', TextType::class)
            ;
    }

    public function configureOptions(OptionsResolver $resolver){
        $resolver->setDefualt(array(
           'data_class' =>  Game::class,
        ));
    }
}