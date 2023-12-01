<?php

function validate(array $validations)
{
    $result = [];
    $param = '';

    foreach ($validations as $field => $validate) {
        $result[$field] = (!str_contains($validate, '|')) ?
            singleValidation($validate, $field, $param) :
            multipleValidations($validate, $field, $param);
    }

    if (in_array(false, $result)) {
        return false;
    }

    return $result;
}

function singleValidation($validate, $field, $param)
{
    if (str_contains($validate, ':')) {
        [$validate, $param] = explode(':', $validate);
    }

    return $validate($field, $param);
}

function multipleValidations($validate, $field, $param)
{
    $result = [];
    $explodePipeValidate = explode('|', $validate);
    foreach ($explodePipeValidate as $validate) {
        if (str_contains($validate, ':')) {
            [$validate, $param] = explode(':', $validate);
        }
        $result[$field] = $validate($field, $param);
    }

    return $result;
}

function required($field)
{
    if ($_POST[$field] === '') {
        setFlash($field, 'O campo e obrigatorio');
        return false;
    }

    return filter_input(INPUT_POST, $field, FILTER_UNSAFE_RAW);
}

function email($field)
{
    $emailIsValid = filter_input(INPUT_POST, $field, FILTER_VALIDATE_EMAIL);

    if (!$emailIsValid) {
        setFlash($field, 'O campo tem que ser um email valido');
        return false;
    }

    return filter_input(INPUT_POST, $field, FILTER_UNSAFE_RAW);
}

function unique($field, $param)
{
    $data = filter_input(INPUT_POST, $field, FILTER_UNSAFE_RAW);
    $user = findBy($param, $field, $data);

    if ($user) {
        setFlash($field, "Esse valor ja esta cadastrado");
    }

    return $data;
}

function maxlen($field, $param)
{
    $data = filter_input(INPUT_POST, $field, FILTER_UNSAFE_RAW);

    if (strlen($data) > $param) {
        setFlash($field, "Esse campo nao pode passar de {$param} caracteres");
        return false;
    }

    return $data;
}
