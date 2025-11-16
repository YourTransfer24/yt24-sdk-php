<?php

namespace YT24SDK;

class BookingsAPI
{
    private $client;

    public function __construct(YT24Client $client)
    {
        $this->client = $client;
    }

    /**
     * List bookings
     * Endpoint: GET /bookings
     */
    public function list(array $params = [])
    {
        return $this->client->request("GET", "/bookings", null, $params);
    }

    /**
     * Get single booking
     * Endpoint: GET /booking/{id}
     */
    public function get(int $id)
    {
        return $this->client->request("GET", "/booking/{$id}");
    }

    /**
     * Create booking
     * Endpoint: POST /booking/create
     */
    public function create(array $data)
    {
        return $this->client->request("POST", "/booking/create", $data);
    }

    /**
     * Confirm booking
     * Endpoint: POST /booking/confirm/{id}
     */
    public function confirm(int $id, array $data = null)
    {
        return $this->client->request("POST", "/booking/confirm/{$id}", $data);
    }

    /**
     * Update booking status
     * Endpoint: POST /booking-status/{id}
     */
    public function updateStatus(int $id, array $data)
    {
        return $this->client->request("POST", "/booking-status/{$id}", $data);
    }
}
