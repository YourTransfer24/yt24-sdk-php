<?php

namespace YT24SDK;

class ProfileAPI
{
    private $client;

    public function __construct(YT24Client $client)
    {
        $this->client = $client;
    }

    /**
     * Get authenticated user profile
     * Endpoint: GET /me
     */
    public function getProfile()
    {
        return $this->client->request("GET", "/me");
    }

    /**
     * Update authenticated user profile
     * Endpoint: PATCH /me
     */
    public function updateProfile(array $data)
    {
        return $this->client->request("PATCH", "/me", $data);
    }
}
