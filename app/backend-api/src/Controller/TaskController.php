<?php

declare(strict_types = 1);

namespace App\Controller;

use App\Entity\Task;
use App\Form\Type\TaskType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;



class TaskController extends AbstractApiController
{
    /**
     * @Route("/list", name="list")
     */
    public function indexAction( Request $request ): Response
    {
        $epic_id = $request->get( 'id' );

        if( !$epic_id ){
            throw new NotFoundHttpException('Not valid id.');
        }

        $task = $this
            ->getDoctrine()
            ->getRepository( Task::class )
            ->findBy(
                [
                    'epic' => $epic_id
                ]
            );

        return $this->respond( $task );
    }

    /**
     * @Route("/create", name="create")
     */
    public function createAction( Request $request ): Response
    {
        $form = $this->buildForm( TaskType::class );

        $form->handleRequest( $request );

        if( !$form->isSubmitted() || !$form->isValid() )
        {
            return $this->respond( $form, Response::HTTP_BAD_REQUEST );
        }
        /** @var Task $task */
        $task = $form->getData();

        $this->getDoctrine()->getManager()->persist( $task );
        $this->getDoctrine()->getManager()->flush();

        return $this->respond( $task );
    }
}
