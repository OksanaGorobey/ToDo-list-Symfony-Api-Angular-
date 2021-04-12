<?php

declare(strict_types = 1);

namespace App\Controller;

use App\Entity\Epic;
use App\Form\Type\EpicType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



class EpicController extends AbstractApiController
{
    /**
     * @Route("/list", name="list")
     */
    public function indexAction(Request $request): Response
    {
        $epic = $this
            ->getDoctrine()
            ->getRepository(Epic::class)
            ->findAll();

        return $this->respond($epic);
    }

    /**
     * @Route("/create", name="create")
     */
    public function createAction( Request $request ): Response
    {
        $form = $this->buildForm( EpicType::class );

        $form->handleRequest($request);

        if( !$form->isSubmitted() || !$form->isValid() )
        {
            return $this->respond( $form, Response::HTTP_BAD_REQUEST );
        }
        /** @var Epic $epic */
        $epic = $form->getData();

        $this->getDoctrine()->getManager()->persist( $epic );
        $this->getDoctrine()->getManager()->flush();

        return $this->respond($epic);
    }
}
