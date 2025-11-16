<?php

namespace YT24SDK;

class VehiclesAPI
{
    private $client;

    public function __construct(YT24Client $client)
    {
        $this->client = $client;
    }

    /**
     * List vehicles
     * Endpoint: GET /vehicles
     */
    public function list(array $params = [])
    {
        return $this->client->request("GET", "/vehicles", null, $params);
    }

    /**
     * Get a single vehicle
     * Endpoint: GET /vehicle/{id}
     */
    public function get(int $id)
    {
        return $this->client->request("GET", "/vehicle/{$id}");
    }
}
