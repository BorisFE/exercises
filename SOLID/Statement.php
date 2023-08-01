<?php

class Statement
{
    public function executeList($params)
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

    public function executeId($id)
    {
        return [
            'id' => 1,
            'name' => 'John Doe',
            'city' => 'London',
            'country' => 'UK',
        ];
    }

    public function executeCreate($id)
    {
        return 3;
    }
}