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
use App\Form\Type\EntwicklerType;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class AddGameController extends AbstractController
{

    /**
     * @Route("/addGame", name="app_game_addGame")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */

    public function addGame(Request $request){
        $game = new Game();
        $entwickler = new Entwickler();
        $form = $this->createForm(GameType::class, $game );


        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($game);
            $entityManager->flush();

            return $this->redirectToRoute('app_game_index');
        }

        return $this->render(
            '/games/addGame.html.twig',
            array( 'form' => $form->createView())
        );

    }


   /* public function AddGame(){

        $entityManager = $this->getDoctrine()->getManager();
        $game = new Game();


        $game ->setBtnAdd('add');
        $game->setTitle('');
        $game->setGenre('');
        $game->setReleaseDate();
        $game->setReview('');
        $game->setPublisher('');


        $form=$this->createFormBuilder($game)
            ->add('title', TextType::class)
            ->add('genre', TextType::class)
            ->add('release_date', TextType::class)
            ->add('review', TextType::class)
            ->add('publisher', TextType::class)
            ->add('add', SubmitType::class, array('label' => 'Hinzufügen'))
            ->getForm();
        //$entityManager->persist($game);
        //$game->setBtnAdd('add');
        //$entityManager->persist($game);

        //$entityManager->flush();
        return $this->render("/games/addGame.html.twig", array(
            'form' =>  $form->createView()
        ));
    }*/

}