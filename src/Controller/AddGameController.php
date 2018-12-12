<?php
/**
 * Created by PhpStorm.
 * User: justinglowa
 * Date: 12.12.18
 * Time: 09:36
 */

namespace App\Controller;
use App\Entity\Game;
use App\Form\Type;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class AddGameController extends AbstractController
{

    /**
     * @Route("/addGame", name="app_game_addGame")
     * @return \Symfony\Component\HttpFoundation\Response
     */


    public function AddGame(){
        $game = new Game();

        $game ->setBtnAdd('add');

        $form=$this->createFormBuilder($game)
            ->add('add', SubmitType::class, array('label' => 'ADD'))
            ->getForm();
        $game->setBtnAdd('add');
        return $this->render("/games/addGame.html.twig", array(
            'form' =>  $form->createView()
        ));
    }
}