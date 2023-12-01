<?php

require 'bootstrap.php';

try {
    $data = router();

    if (!isset($data['data'])) {
        throw new Exception('O indice data esta faltando');
    }

    if (!isset($data['data']['title'])) {
        throw new Exception('O indice title esta faltando');
    }

    if (!isset($data['view'])) {
        throw new Exception('O indíce view está faltando');
    }

    if (!file_exists(VIEWS . $data['view'])) {
        throw new Exception("A view {$data['view']} não existe");
    }

    extract($data['data']);
    $view = $data['view'];

    require VIEWS . 'master.php';
} catch (Exception $e) {
    var_dump($e->getMessage());
}
