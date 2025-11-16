<?php

namespace YT24SDK;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class YT24Client
{
    private $apiKey;
    private $baseUrl;
    private $http;

    public function __construct(string $apiKey, string $environment = "production")
    {
        if (empty($apiKey)) {
            throw new \Exception("API key is required.");
        }

        $this->apiKey = $apiKey;

        $this->baseUrl = ($environment === "sandbox")
            ? "https://sandbox.yourtransfer24.com/wp-json/yt24/v1"
            : "https://www.yourtransfer24.com/wp-json/yt24/v1";

        $this->http = new Client([
            "base_uri" => $this->baseUrl,
            "timeout"  => 30,
            "headers"  => [
                "Content-Type" => "application/json",
                "Authorization" => $this->apiKey
            ]
        ]);
    }

    /**
     * Unified HTTP request method
     */
    public function request(string $method, string $endpoint, array $data = null, array $params = null)
    {
        try {
            $options = [];

            if (!empty($data)) {
                $options["json"] = $data;
            }

            if (!empty($params)) {
                $options["query"] = $params;
            }

            $response = $this->http->request($method, $endpoint, $options);
            return json_decode($response->getBody()->getContents(), true);

        } catch (RequestException $e) {

            $body = $e->getResponse()
                ? json_decode($e->getResponse()->getBody()->getContents(), true)
                : ["message" => "Unexpected error"];

            $err = new \Exception($body["message"] ?? "API error");
            $err->status = $e->getCode();
            $err->err_key = $body["err_key"] ?? null;
            $err->details = $body;

            throw $err;
        }
    }
}
