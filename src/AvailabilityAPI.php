<?php

namespace YT24SDK;

class AvailabilityAPI
{
    private $client;

    public function __construct(YT24Client $client)
    {
        $this->client = $client;
    }

    /**
     * Check vehicle/service availability
     * Endpoint: POST /availability
     */
    public function check(array $data)
    {
        return $this->client->request("POST", "/availability", $data);
    }
}
