<?php

function create_password($password)
{

    return password_hash($password, PASSWORD_BCRYPT);
}

function check_password($password)
{
    $hash = create_password("hello there");
    return password_verify($password, $hash);
}

if (check_password("hello there")) {
    echo ' correct password';
} else {
    echo " there is error in this password";
}


