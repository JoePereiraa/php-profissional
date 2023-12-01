<?php

use PDO;

function connect()
{
    return new PDO(
        "mysql:host=localhost;dbname=curso_lumen",
        'root',
        'Aluno#123',
        [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
        ]
    );
}
