<?php

require_once "functions.php";
require_once "data/errorMsgs.php";


// if(isset($_POST['email'])) {
//     $email=$_POST['email'];
//     // errorProcess($email);
//     $error = true;
//     $errorMsg = $errMsgs["email_empty"];
// }


// return early pattern

if(!isset($_POST['email'])) {
    redirect('subscribe.php');
}

// --------------ici c'est-à-dire que j'ai bien la clé email dans la $_POST

// 1. initialisation des variables
// $error = false;
$email = $_POST['email'];
// ['email'=> $email ] = $_POST;
// $errorMsg = "";
$emailsfilePath = "userInfo.txt";
$spamfilePath = "spam_domain.txt";


// 2. validation

// 2.1 检查邮件是否为空
if(empty($email)) {
    redirect("subscribe.php?error=" . EMAIL_EMPTY);
    // $error = true;
    // $errorMsg = $errMsgs["email_empty"];
}


// 2.2 检查邮件格式是否正确
// if($error===false && filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
//     redirect("subscribe.php?error=le");

//     // $error=true;
//     // $errorMsg = $errMsgs["invalid_format"];

// }
if(filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
    redirect("subscribe.php?error=" . EMAIL_INVALID ."&email=$email");
}

// 2.3 检查邮箱是否有注册过
// $emails = file($emailsfilePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
// if(!$error && in_array($email, $emails)) {
//     $error=true;
//     $errorMsg = $errMsgs["email_exists"];

// }

$emails = file($emailsfilePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
if(in_array($email, $emails)) {
    redirect("subscribe.php?error=". EMAIL_DUPLICATE ."&email=$email");
}

// 2.4 检查邮箱域名是否合法
// if(!$error) {
//     $emailDomain = ltrim(strstr($email, '@'), '@');
//     $spamDomains = file($spamfilePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
//     if (in_array($emailDomain, $spamDomains)) {
//         $error = true;
//         $errorMsg = $errMsgs["invalid_domain"];
//     }
// }

$emailDomain = ltrim(strstr($email, '@'), '@');
$spamDomains = file($spamfilePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
if (in_array($emailDomain, $spamDomains)) {
    redirect("subscribe.php?error=". EMAIL_SPAM ."&email=$email");
}


// if($error) {
//     redirect('subscribe.php?error=true&errorMsg=' . $errorMsg);

// } else {
//     $emailsFile = fopen($emailsfilePath, 'a');
//     fwrite($emailsFile, $email . PHP_EOL);
//     fclose($emailsFile);
//     redirect('subscription_confirm.php?email=' . $email);
// }

registerEmail($emailsFilePath, $email);
redirect('subscription_confirm.php?email=' . $email);
