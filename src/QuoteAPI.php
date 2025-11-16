<?php

namespace YT24SDK;

class QuoteAPI
{
    private $client;

    public function __construct(YT24Client $client)
    {
        $this->client = $client;
    }

    /**
     * Get service quote
     * Endpoint: POST /quote
     */
    public function getQuote(array $data)
    {
        return $this->client->request("POST", "/quote", $data);
    }
}
