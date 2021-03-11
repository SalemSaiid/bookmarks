<?php

namespace App\Controller;

use App\Entity\Image;
use App\Entity\ReferencedLink;
use App\Entity\Video;
use App\Form\ReferencedLinkType;
use App\Service\EmbedService;
use App\Service\ReferencedLinkService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * @Route("/api/referenced-link")
 */
class ApiReferencedLinkController extends  ApiController
{
    /**
     * @Route("/", name="api_referenced_link_list", methods={"GET"})
     */
    public function indexAction(ReferencedLinkService $referencedLinkService, SerializerInterface $serializer)
    {
       $links = $referencedLinkService->findAll();

       $json = $serializer->serialize($links, 'json');

       $response = new JsonResponse($json, 200, [], true);

       return $response;
    }

    /**
     * @Route("/", name="api_referenced_link_add", methods={"POST"})
     */
    public function addAction(ReferencedLinkService $referencedLinkService,  EmbedService $embedService, Request $request)
    {
        $request = $this->transformJsonBody($request);
        $type = $request->get('type');

        if(!in_array($type,ReferencedLink::REFERENCE_LINK_TYPE)){
            throw new \Exception("Bad request: Invalid Type url", 400);
        }

        $data = ($type == ReferencedLink::TYPE_VIDEO)?new Video():new Image();

        $form = $this->createForm(
            ReferencedLinkType::class,
            $data,
            ['data_class' => ($type == ReferencedLink::TYPE_VIDEO)?Video::class:Image::class]
        );

        $form->submit($request->request->all());

        if (!$form->isValid()) {
            return $form;
        }
        $data = $embedService->initEmbed($data);

        $referencedLinkService->create($data);

        return $this->respondWithSuccess('Successfully created');
    }

}