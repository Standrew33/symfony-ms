<?php
// GENERATED CODE -- DO NOT EDIT!

namespace GrpcServices;

/**
 */
class GrpcClientClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\ClientStreamingCall
     */
    public function get($metadata = [], $options = []) {
        return $this->_clientStreamRequest('/grpcServices.GrpcClient/get',
        ['\GrpcServices\GrpcRequest','decode'],
        $metadata, $options);
    }

    /**
     * @param \GrpcServices\GrpcRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\ServerStreamingCall
     */
    public function set(\GrpcServices\GrpcRequest $argument,
      $metadata = [], $options = []) {
        return $this->_serverStreamRequest('/grpcServices.GrpcClient/set',
        $argument,
        ['\GrpcServices\GrpcRequest', 'decode'],
        $metadata, $options);
    }

}
