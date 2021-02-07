<?php
/**
 * Created by PhpStorm.
 * User: Andrei
 * Date: 07.02.2021
 * Time: 19:56
 */

namespace App\Mediator;

use App\Service\GuzzleService;
use App\Service\InterfaceService;
use App\Service\RestService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\SerializerInterface;

class SettingRestService extends MediatorService
{
    private GuzzleService $guzzle;

    private SerializerInterface $serializer;

    private string $host;

    public function __construct(
        GuzzleService $guzzle,
        SerializerInterface $serializer,
        string $host
    ) {
        $this->guzzle = $guzzle;
        $this->serializer = $serializer;
        $this->host = $host;

        $this->mediator->connectionService(1);
    }

    /**
     * @return RestService
     */
    public function getFields(): InterfaceService
    {
        $response = $this->guzzle->buildRequest($this->host, Request::METHOD_GET);
        $result = $this->serializer->deserialize($response, RestService::class, JsonEncoder::FORMAT);

        return $result;
    }

    /**
     * @param RestService $restService
     */
    public function setFields(RestService $restService): void
    {
        $this->guzzle->buildRequest($this->host, Request::METHOD_PUT, [
            'fieldOne'   => $restService->getFieldOne(),
            'fieldTwo'   => $restService->getFieldTwo(),
            'fieldThree' => $restService->getFieldThree(),
        ]);
    }
}