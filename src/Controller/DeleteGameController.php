<?php
/**
 * Created by PhpStorm.
 * User: justinglowa
 * Date: 14.12.18
 * Time: 13:24
 */

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class deleteGameController extends AbstractController
{
    /**
     * @Route("/deleteGame{id}", name="app_game_deleteGame")
     */

    public function deleteGame($id){
        return $this->render('/games/deleteGame.html.twig');
    }

}