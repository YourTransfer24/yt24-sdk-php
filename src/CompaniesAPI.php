<?php

namespace YT24SDK;

class CompaniesAPI
{
    private $client;

    public function __construct(YT24Client $client)
    {
        $this->client = $client;
    }

    /**
     * List vehicle companies
     * Endpoint: GET /vehicle-companies
     */
    public function list(array $params = [])
    {
        return $this->client->request("GET", "/vehicle-companies", null, $params);
    }

    /**
     * Get details for a single vehicle company
     * Endpoint: GET /vehicle-company/{id}
     */
    public function get(int $id, array $params = [])
    {
        return $this->client->request("GET", "/vehicle-company/{$id}", null, $params);
    }
}
