<?php

namespace App\Controller;

use App\Entity\Video;
use App\Form\ReferencedLinkType;
use App\Service\EmbedService;
use App\Service\VideoReferencedLinkService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * @Route("/api/video")
 */
class ApiVideoController extends  ApiController
{
    /**
     * @Route("/", name="api_video_list", methods={"GET"})
     */
    public function indexAction(VideoReferencedLinkService $videoReferencedLinkService, SerializerInterface $serializer)
    {
       $links = $videoReferencedLinkService->findAll();

       $json = $serializer->serialize($links, 'json');

       $response = new JsonResponse($json, 200, [], true);

       return $response;
    }

    /**
     * @Route("/", name="api_video_add", methods={"POST"})
     */
    public function addAction(VideoReferencedLinkService $videoReferencedLinkService,  EmbedService $embedService, Request $request)
    {
        $request = $this->transformJsonBody($request);

        $data = new Video();

        $form = $this->createForm(
            ReferencedLinkType::class,
            $data,
            ['data_class' => Video::class]
        );

        $form->submit($request->request->all());

        if (!$form->isValid()) {
            return $form;
        }

        $data = $embedService->initEmbed($data);

        $videoReferencedLinkService->create($data);

        return $this->respondWithSuccess('Successfully created');
    }

}