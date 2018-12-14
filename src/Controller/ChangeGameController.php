<?php
/**
 * Created by PhpStorm.
 * User: justinglowa
 * Date: 14.12.18
 * Time: 10:45
 */

namespace App\Controller;


use App\Entity\Game;
use App\Form\Type\changeGameType;
use App\Form\Type\GameType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ChangeGameController extends AbstractController
{
    /**
     *
     * @Route("/changeGame/{id}", name="app_game_changeGame")
     */
    public function changeGame($id){
        $game = new Game();
        $form = $this->createForm(changeGameType::class, $game);
        if(!$game){
            throw $this->createNotFoundException(
                'No Game found for id '.$id
            );
        }


        return $this->render('/games/changeGame.html.twig', array(
            'form' => $form->createView())
        );
    }



}