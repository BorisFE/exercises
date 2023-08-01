<?php

class Request
{
    public $url;
    public $headers;
    public $body;

    public function __construct($url, $headers, $body)
    {
        $this->url = $url;
        $this->headers = $headers;
        $this->body = $body;
    }
}