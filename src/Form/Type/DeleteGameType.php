<?php
/**
 * Created by PhpStorm.
 * User: justinglowa
 * Date: 19.12.18
 * Time: 10:37
 */

namespace App\Form\Type;


use App\Entity\Game;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DeleteGameType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder
            ->add('btnDelete', SubmitType::class, array('label' => 'Ja'));
    }

    public function configureOptions(OptionsResolver $resolver){
        $resolver->setDefaults(array(
            'data_class' => Game::class
        ));
    }

}