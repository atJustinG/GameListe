<?php
/**
 * Created by PhpStorm.
 * User: justinglowa
 * Date: 06.12.18
 * Time: 13:16
 */

namespace App\Controller;

use App\Entity\IndexTask;
use App\Form\Type;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Response;


class DefaultController extends AbstractController
{


    /** public function newTask(){
        $task= new Type\TaskType();
        $form=$this->createForm(Type\TaskType::class, $task);

        return Response($form);
    }*/
    /**
     * @Route("/")
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
       // ->add('task', TextType::class)
        ->add('add', ButtonType::class, array('label' => 'Hinzufügen'))
        ->getForm();
        $task->setBtnAdd('add');
        return $this->render('/games/index.html.twig', array(
            'form' => $form->createView()
            ));

    }



}