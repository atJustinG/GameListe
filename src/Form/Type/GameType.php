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
use App\Entity\Genre;
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
        //dump($this->getYears());
//       exit();
        $builder
            ->add('title', TextType::class)
            ->add('Genre', EntityType::class, array(
                'class' => Genre::class,
                'expanded' => true,
                'multiple' => true
            ))
//            ->add('genre', ChoiceType::class, array(
//                'choices' => array(
//                    'Action' => 'Action',
//                    'Adventure' => 'Adventure',
//                    'ActionAdventrue' => 'ActionAdventure',
//                    'Rollenspiel(RPG)' => 'Rollenspiel(RPG)',
//                    'Strategie' => 'Strategie',
//                    'First Person Shooter(FPS)' => 'First Person Shooter(FPS)',
//                    'Sport' => 'Sport',
//                    'Open World' => 'Open-World'
//                )
//            ))
            ->add('release_date', choiceType::class, array(
                'choices' => $this->getYears()

            ))
            ->add('review',ChoiceType::class, array(
                'choices' => $this->getReview()

            ))
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

            ))
            ->add('plattform', EntityType::class, array(
                'class' => Plattform::class,
                'expanded' => true,
                'multiple' => true,


            ))
        ;
        if ($options['edit']){
            $builder
                ->add('btnChange', SubmitType::class,array('label' => 'bearbeiten'));
        }else {
            $builder
            ->add('btnAdd', SubmitType::class, array('label' => 'Hinzufügen'));
        }
    }

    public function configureOptions(OptionsResolver $resolver){
        $resolver->setDefaults(array(
           'data_class' =>  Game::class,
            'edit' => null,
        ));
    }

    public function getYears(){
        $year = array();
        $now = date('Y');
        for($yearCount = 1965; $yearCount <= $now; $yearCount++) {
            $year[$yearCount] = $yearCount;
        }
        return $year;
    }

    public function getReview(){
        $review = array();
        for($i=0;$i <= 100; $i++){
            if($i%5==0){
            $review[$i.'/100']= $i.'/100';
            }
        }
        return $review;
    }


}