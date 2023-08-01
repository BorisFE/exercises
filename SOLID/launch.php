<?php

require 'Database.php';
require 'ClientController.php';
require 'Request.php';
require 'Statement.php';


$db = new Database();

$clientController = new ClientController($db);

$request = new Request(
    'http://localhost:8080/clients',
    ['Content-Type' => 'application/json'],
    '{"params": {"city": "London", "country": "England"}}'
);
var_dump($clientController->getList($request));



$request = new Request(
    'http://localhost:8080/clients',
    ['Content-Type' => 'application/json'],
    '{"params": {"city": "London"}}'
);
var_dump($clientController->getList($request));



$request = new Request(
    'http://localhost:8080/clients',
    ['Content-Type' => 'application/json'],
    '{"params": {"country": "England"}}'
);
var_dump($clientController->getList($request));




$request = new Request(
    'http://localhost:8080/clients',
    ['Content-Type' => 'application/json'],
    '{"params": {"id": "2"}}'
);
var_dump($clientController->get($request));




$request = new Request(
    'http://localhost:8080/clients',
    ['Content-Type' => 'application/json'],
    '{"params": {"city": "London","country": "England","name": "Test"}}'
);
var_dump($clientController->create($request));