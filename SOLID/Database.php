<?php

class Database
{
    public function prepare($query)
    {
        return new Statement($query);
    }
}