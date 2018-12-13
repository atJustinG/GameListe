<?php
/**
 * Created by PhpStorm.
 * User: justinglowa
 * Date: 13.12.18
 * Time: 09:19
 */

namespace App\Form\Type;
use App\Entity\Game;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class PlattformType extends AbstractType
{
 public  function buildForm(FormBuilderInterface $builder, array $options){
     $builder
         ->add('name', Texttype::class)
         ->add('Firma', TextType::class)
         ;
 }



}