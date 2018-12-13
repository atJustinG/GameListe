<?php
/**
 * Created by PhpStorm.
 * User: justinglowa
 * Date: 06.12.18
 * Time: 13:16
 */

namespace App\Controller;

use App\Entity\IndexTask;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\TextType;


class DefaultController extends AbstractController
{


    /** public function newTask(){
        $task= new Type\TaskType();
        $form=$this->createForm(Type\TaskType::class, $task);

        return Response($form);
    }*/
    /**
     * @Route("/", name="app_game_index")
     *
     */

    public function index()
    {
        $task = new IndexTask();

        $task->setTask('');
        $task->setBtnAdd('add');
        $task->setBtnShow('show');
        $task->setBtnEdit('edit');
        $task->setBtnDel('delete');



        $form= $this->createFormBuilder($task)
        ->add('task', TextType::class)
        ->add('add', ButtonType::class, array('label' => 'Hinzufügen'))
        ->getForm();
        $task->setBtnAdd('add');
        return $this->render('/games/index.html.twig', array(
            'form' => $form->createView()
            ));

    }
}