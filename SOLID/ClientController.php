<?php

class ClientController
{
    protected $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function getList(Request $request)
    {
        if (empty($request->body)) {
            return [];
        }

        $body = json_decode($request->body, true);

        if (!empty($body['params'])) {
            $city = $body['params']['city'] ?? null;
            $country = $body['params']['country'] ?? null;

            if (empty($city) && empty($country)) {
                throw new Exception('Invalid request');
            }

            if (empty($city)) {
                $query = 'SELECT * FROM clients WHERE country = :country';
                return $this->db->prepare($query)->executeList(['country' => $country]);
            }

            if (empty($country)) {
                $query = 'SELECT * FROM clients WHERE city = :city';
                return $this->db->prepare($query)->executeList(['city' => $city]);
            }

            $query = 'SELECT * FROM clients WHERE city = :city AND country = :country';
            return $this->db->prepare($query)->executeList(['city' => $city, 'country' => $country]);

        }

        throw new Exception('Invalid request');
    }

    public function get(Request $request)
    {
        if (empty($request->body)) {
            return [];
        }

        $body = json_decode($request->body, true);

        if (!empty($body['params'])) {
            $id = $body['params']['id'] ?? null;

            if (empty($id)) {
                throw new Exception('Invalid request');
            }

            $query = 'SELECT * FROM clients WHERE id = :id';
            return $this->db->prepare($query)->executeId(['id' => $id]);

        }

        throw new Exception('Invalid request');
    }

    public function create(Request $request)
    {
        if (empty($request->body)) {
            return [];
        }

        $body = json_decode($request->body, true);

        if (!empty($body['params'])) {
            $name = $body['params']['name'] ?? null;
            $city = $body['params']['city'] ?? null;
            $country = $body['params']['country'] ?? null;

            if (empty($name) && empty($city) && empty($country)) {
                throw new Exception('Invalid request');
            }

            $query = 'INSERT INTO clients (name, city, country) VALUES (:name, :city, :country)';
            return $this->db->prepare($query)->executeCreate(['name' => $name, 'city' => $city, 'country' => $country]);

        }

        throw new Exception('Invalid request');
    }
}