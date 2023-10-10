<?php

const EMAIL_EMPTY = 1;
const EMAIL_INVALID = 2;
const EMAIL_DUPLICATE = 3;
const EMAIL_SPAM = 4;

function getErrorMessage(int $errorCode): string
{
    return match($errorCode) {
        EMAIL_EMPTY => "L'email est obligatoire!",
        EMAIL_INVALID => "Le format de l'email est incorrect!",
        EMAIL_DUPLICATE => "Le mail existe déjà",
        EMAIL_SPAM => "Désolé, cet email n'est pas accepté dans notre newsletter",
        default => "Une erreur est survenue"
    };
}

// $errMsgs=[
//   "email_empty"=>"L'email est obligatoire!",
//   "invalid_format"=>"Le format de l'email est incorrect!",
//   "email_exists"=>"Le mail existe déjà",
//   "invalid_domain"=>"Désolé, cet email n'est pas accepté dans notre newsletter"
// ];
