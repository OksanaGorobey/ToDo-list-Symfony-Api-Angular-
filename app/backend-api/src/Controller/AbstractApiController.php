<?php

declare(strict_types = 1);

namespace App\Controller;

use FOS\RestBundle\Controller\AbstractFOSRestController;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Response;


abstract class AbstractApiController extends AbstractFOSRestController
{
    /**
     * @param string $type
     * @param array|null $data
     * @param array $options
     * @return mixed
     */
    protected function buildForm( string $type, ?array $data = null, array $options = [] ): FormInterface
    {
        return $this->container->get('form.factory')->createNamed('', $type, $data, $options);
    }

    protected function respond( $data, int $statusCode = Response::HTTP_OK ): Response
    {
        return $this->handleView( $this->view( $data, $statusCode ) );
    }
}
