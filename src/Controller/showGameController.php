<?php
/**
 * Created by PhpStorm.
 * User: justinglowa
 * Date: 13.12.18
 * Time: 15:30
 */

namespace App\Controller;


use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class showGameController extends AbstractController
{
    /**
     * @Route("/showGame", name = "app_game_showGame")
     */
    public function showGame(){

        return $this->render('/games/showGame.html.twig');
    }

}