<?php
/**
 * Created by PhpStorm.
 * User: justinglowa
 * Date: 12.12.18
 * Time: 15:43
 */

namespace App\Form\Type;

use App\Entity\Entwickler;
use App\Entity\Game;
use App\Entity\Plattform;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
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
            ->add('release_date', choiceType::class, array(
                'choices' => $this->getYears()

                /*[
                    $years = function(){
                    $year=array();
                        for($yearCount=1920; $yearCount<=2500; $yearCount++) {
                            $year+=$yearCount;

                        }
                        return $year;
                    },
                    $years = function(){

                        $year=array();
                        for($yearCount=1920; $yearCount<=2500; $yearCount++) {
                            $year+=$yearCount;

                        }
                        return $year;
                    },
                ]*/
            ))
            ->add('review', TextType::class)
            ->add('publisher', ChoiceType::class, array(
                'choices' => array(
                    'Electronic Arts(EA)' => 'Electronic Arts',
                    'Nintendo' => 'Nintendo',
                    '2K' => '2K',
                    'Activision Blizzard' => 'Activision Blizzard',
                    'Ubisoft' => 'Ubisoft'
                )
            ))


            ->add('entwicklers', EntityType::class, array(
                'class' => Entwickler::class,
                'expanded' => true,
                'multiple' => true,
                'label' => 'Entwickler:'
            ))
            ->add('plattform', EntityType::class, array(
                'class' => Plattform::class,
                'expanded' =>  true,
                'multiple' => true,
                'label' => 'Plattform:'
            ))
            ->add('btnAdd', SubmitType::class,array('label' => 'Hinzufügen'))
        ;
    }

    public function getYears(){
        $years = array();
        foreach($years as $yr)
        for($yearCount = 1920; $yearCount<=2500; $yearCount++){
            $yr = $yearCount;
        }
        return $years;
    }


    public function configureOptions(OptionsResolver $resolver){
        $resolver->setDefaults(array(
           'data_class' =>  Game::class,
        ));
    }
}