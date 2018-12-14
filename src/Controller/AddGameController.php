<?php
/**
 * Created by PhpStorm.
 * User: justinglowa
 * Date: 12.12.18
 * Time: 09:36
 */

namespace App\Controller;
use App\Entity\Game;
use App\Form\Type\GameType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AddGameController extends AbstractController
{

    /**
     * @Route("/addGame", name="app_game_addGame")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */

    public function addGame(Request $request){
        $game = new Game();
        $form = $this->createForm(GameType::class, $game);


        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($game);
            $entityManager->flush();

            return $this->redirectToRoute('app_game_addSuccess');
        }

        return $this->render(
            '/games/addGame.html.twig',
            array( 'form' => $form->createView())
        );

    }

    /**
     * @Route ("/addSuccess", name = "app_game_addSuccess")
     */

    public function addSuccess(){
        return $this->render(
            '\games\addSuccess.html.twig'
        );
    }
}