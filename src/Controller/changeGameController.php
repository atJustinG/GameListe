<?php
/**
 * Created by PhpStorm.
 * User: justinglowa
 * Date: 14.12.18
 * Time: 10:45
 */

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class changeGameController extends AbstractController
{
    /**
     * @Route("/changeGame{id}", name="app_game_changeGame", requirements={"id"="\d+"})
     */
    public function changeGame($id){
        return $this->render('/games/changeGame.html.twig');
    }

}