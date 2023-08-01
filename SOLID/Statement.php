<?php

class Statement
{
    public function execute($params)
    {
        return [
            [
                'id' => 1,
                'name' => 'John Doe',
                'city' => 'London',
                'country' => 'UK',
            ],
            [
                'id' => 2,
                'name' => 'Jane Doe',
                'city' => 'New York',
                'country' => 'USA',
            ],
        ];
    }
}