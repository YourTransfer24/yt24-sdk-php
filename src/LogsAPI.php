<?php

namespace YT24SDK;

class LogsAPI
{
    private $client;

    public function __construct(YT24Client $client)
    {
        $this->client = $client;
    }

    /**
     * List system logs
     * Endpoint: GET /logs
     */
    public function list(array $params = [])
    {
        return $this->client->request("GET", "/logs", null, $params);
    }
}
