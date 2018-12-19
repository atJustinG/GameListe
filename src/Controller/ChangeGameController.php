<?php
/**
 * Created by PhpStorm.
 * User: justinglowa
 * Date: 14.12.18
 * Time: 10:45
 */

namespace App\Controller;


use App\Entity\Game;
use App\Form\Type\GameType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ChangeGameController extends AbstractController
{
    /**
     *
     * @Route("/changeGame/{id}", name="app_game_changeGame")
     */
    public function changeGame($id, Request $request){
        $entityManager = $this->getDoctrine()->getManager();
        $game = $entityManager->getRepository(Game::class)->find($id);
        $form = $this->createForm(GameType::class, $game, array('edit'=>true));


        if(!$game){
            throw $this->createNotFoundException(
                'No Game found for id '.$id
            );
        }
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            //$entityManager->persist($game);
            $entityManager->flush();
            return $this->redirectToRoute('app_game_index');
        }




        return $this->render('/games/changeGame.html.twig', array(
            'form' => $form->createView())
        );
    }



}