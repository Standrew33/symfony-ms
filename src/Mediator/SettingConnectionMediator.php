<?php
/**
 * Created by PhpStorm.
 * User: Andrei
 * Date: 07.02.2021
 * Time: 19:39
 */

namespace App\Mediator;


use App\Storage\TypeConnection;
use DomainException;

class SettingConnectionMediator implements MediatorConnectionInterface
{
    private SettingGrpcService $grpcService;

    private SettingRestService $restService;

    private SettingHttpService $httpService;

    public function __construct(
        SettingGrpcService $grpcService,
        SettingRestService $restService,
        SettingHttpService $httpService
    ) {
        $this->grpcService = $grpcService;
        $this->grpcService->setMediator($this);

        $this->restService = $restService;
        $this->restService->setMediator($this);

        $this->httpService = $httpService;
        $this->httpService->setMediator($this);
    }

    public function connectionService(int $type)
    {
        switch ($type) {
            case TypeConnection::REST_TYPE:
                return $this->restService;
            case TypeConnection::HTTP_TYPE:
                return $this->httpService;
            case TypeConnection::GRPC_TYPE:
                return $this->grpcService;
            default:
                throw new DomainException();
        }
    }
}