<?php

namespace App\Controller;

use App\Entity\Image;
use App\Form\ReferencedLinkType;
use App\Service\EmbedService;
use App\Service\ImageReferencedLinkService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * @Route("/api/image")
 */
class ApiImageController extends  ApiController
{
    /**
     * @Route("/", name="api_image_list", methods={"GET"})
     */
    public function indexAction(ImageReferencedLinkService $imageReferencedLinkService, SerializerInterface $serializer)
    {
       $links = $imageReferencedLinkService->findAll();

       $json = $serializer->serialize($links, 'json');

       $response = new JsonResponse($json, 200, [], true);

       return $response;
    }

    /**
     * @Route("/", name="api_image_add", methods={"POST"})
     */
    public function addAction(ImageReferencedLinkService $imageReferencedLinkService, EmbedService $embedService, Request $request)
    {
        $request = $this->transformJsonBody($request);

        $data = new Image();

        $form = $this->createForm(
            ReferencedLinkType::class,
            $data,
            ['data_class' => Image::class]
        );

        $form->submit($request->request->all());

        if (!$form->isValid()) {
            return $form;
        }

        $data = $embedService->initEmbed($data);

        $imageReferencedLinkService->create($data);

        return $this->respondWithSuccess('Successfully created');
    }

}