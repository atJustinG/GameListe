<?php
/**
 * Created by PhpStorm.
 * User: justinglowa
 * Date: 12.12.18
 * Time: 09:36
 */

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AddGameController extends AbstractController
{
    /**
     * @Route("/addGame", name="app_game_addGame")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function AddGame(){
        return $this->render("/games/addGame.html.twig");
    }
}