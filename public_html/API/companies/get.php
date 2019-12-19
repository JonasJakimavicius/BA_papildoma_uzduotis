<?php

require '../../../bootloader.php';

$response = new \Core\Api\Response();

$company = \App\App::$company_repository->load($_POST);

if ($company) {

    foreach ($company as $month) {
        $response->addData($month->getData());
    }
} else {
    $response->addError('Operacija nepavyko');
}

$response->print();