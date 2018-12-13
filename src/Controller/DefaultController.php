<?php
/**
 * Created by PhpStorm.
 * User: justinglowa
 * Date: 06.12.18
 * Time: 13:16
 */

namespace App\Controller;

use App\Entity\Game;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;


class DefaultController extends AbstractController
{



    /**
     * @Route("/", name="app_game_index")
     *
     */

    public function index()
    {
       $repository = $this->getDoctrine()->getRepository(Game::class);

        $game = $repository->findAll();
        return $this->render('/games/index.html.twig');
    }

}