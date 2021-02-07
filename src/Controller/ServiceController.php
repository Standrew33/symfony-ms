<?php

namespace App\Controller;

use App\Service\GrpcService;
use App\Service\RestService;
use App\Service\HttpService;
use App\Service\GuzzleService;
use App\Mediator\SettingConnectionMediator;
use App\Mediator\SettingGrpcService;
use App\Mediator\SettingHttpService;
use App\Mediator\SettingRestService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Encoder\JsonEncoder;

class ServiceController extends AbstractController
{
    private GuzzleService $guzzle;

    private SerializerInterface $serializer;

    private SettingGrpcService $grpcClient;

    public SettingRestService $restClient;

    private SettingHttpService $httpClient;

    public function __construct(
        GuzzleService $guzzle,
        SerializerInterface $serializer
    ) {
        $this->guzzle = $guzzle;
        $this->serializer = $serializer;

        $grpcClient = new SettingGrpcService($serializer, '8000');
        $restClient = new SettingRestService($guzzle, $serializer, '8000');
        $httpClient = new SettingHttpService($guzzle, $serializer, '8000');
        $mediator = new SettingConnectionMediator($grpcClient, $restClient, $httpClient);
    }
    /**
     * @Route("/getRest", methods={"GET"})
     * @return Response
     */
    public function actionGetRest(): Response
    {
        $settings = $this->restClient->getFields();
        $request = $this->serializer->serialize($settings, JsonEncoder::FORMAT);

        return new Response($request);
    }

    /**
     * @Route("/setRest")
     * @param Request $request
     * @return Response
     */
    public function actionSetRest(Request $request): Response
    {
        $settings = $this->serializer->deserialize(
            $request->getContent(),
            RestService::class,
            JsonEncoder::FORMAT
        );

        $this->restClient->setFields($settings);

        return new Response();
    }

    /**
     * @Route("/getRest", methods={"GET"})
     * @return Response
     */
    public function actionGetHttp(): Response
    {
        $settings = $this->httpClient->getFields();
        $request = $this->serializer->serialize($settings, JsonEncoder::FORMAT);

        return new Response($request);
    }
    /**
     * @Route("/setHttp")
     * @param Request $request
     * @return Response
     */
    public function actionSetHttp(Request $request): Response
    {
        $settings = $this->serializer->deserialize(
            $request->getContent(),
            HttpService::class,
            JsonEncoder::FORMAT
        );

        $this->httpClient->setFields($settings);

        return new Response();
    }

    /**
     * @Route("/getRest", methods={"GET"})
     * @return Response
     */
    public function actionGetGrpc(): Response
    {
        $settings = $this->grpcClient->getFields();
        $request = $this->serializer->serialize($settings, JsonEncoder::FORMAT);

        return new Response($request);
    }
    /**
     * @Route("/getRest")
     * @param Request $request
     * @return Response
     */
    public function actionSetGrpc(Request $request): Response
    {
        $settings = $this->serializer->deserialize(
            $request->getContent(),
            GrpcService::class,
            JsonEncoder::FORMAT
        );

        $this->grpcClient->setFields($settings);

        return new Response();
    }
}
