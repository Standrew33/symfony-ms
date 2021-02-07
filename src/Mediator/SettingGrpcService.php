<?php
/**
 * Created by PhpStorm.
 * User: Andrei
 * Date: 07.02.2021
 * Time: 19:56
 */

namespace App\Mediator;

use GrpcServices\GrpcClientClient;
use GrpcServices\GrpcRequest;
use Grpc\ChannelCredentials;
use App\Service\GrpcService;
use App\Service\InterfaceService;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\SerializerInterface;

class SettingGrpcService extends MediatorService
{
    private GrpcClientClient $client;

    private SerializerInterface $serializer;

    public function __construct(SerializerInterface $serializer, string $host)
    {
        $this->serializer = $serializer;
        $this->client = new GrpcClientClient($host, [
            'credentials' => ChannelCredentials::createInsecure(),
        ]);
    }

    /**
     * @param GrpcService $grpcService
     */
    public function setSettings(GrpcService $grpcService): void
    {
        $grpcRequest = new GrpcRequest();
        $grpcRequest->setFieldOne($grpcService->getFieldOne());
        $grpcRequest->setFieldTwo($grpcService->isFieldTwo());
        $grpcRequest->setFieldThree($grpcService->getFieldThree());

        $this->client->set($grpcRequest);
    }

    /**
     * @return GrpcService
     */
    public function getSettings(): InterfaceService
    {
        $feature = $this->client->get()->wait();
        $result = $this->serializer->deserialize($feature, GrpcService::class, JsonEncoder::FORMAT);

        return $result;
    }
}