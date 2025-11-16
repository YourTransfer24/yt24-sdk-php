<?php

namespace YT24SDK;

class CoverageAPI
{
    private $client;

    public function __construct(YT24Client $client)
    {
        $this->client = $client;
    }

    /**
     * Get coverage zones
     * Endpoint: GET /coverage
     */
    public function list()
    {
        return $this->client->request("GET", "/coverage");
    }
}
