<?php
/**
 * Created by PhpStorm.
 * User: justinglowa
 * Date: 14.12.18
 * Time: 13:24
 */

namespace App\Controller;


use App\Entity\Game;
use App\Form\Type\DeleteGameType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class DeleteGameController extends AbstractController
{
    /**
     * @Route("/deleteGame{id}", name="app_game_deleteGame")
     */

    public function deleteGame($id, Request $request){

        $entityManager = $this->getDoctrine()->getManager();
        $game = $entityManager->getRepository(Game::class)->find($id);
        $form = $this->createForm(deleteGameType::class, $game);
        if(!$game){
            throw $this->createNotFoundException(
                'No Game found for id '.$id
            );
        }
        $form->handleRequest($request);
        if($form->isSubmitted()&&$form->isValid()){
            $entityManager->remove($game);
            $entityManager->flush();
            return $this->render('games/deleteSuccess.html.twig');
        }


        return $this->render(
            '/games/deleteGame.html.twig',
        array('form' => $form->createView()));
    }

}