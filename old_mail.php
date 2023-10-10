<?php

$error = false; // initialisation
$email="";

if(isset($_POST['email'])) {

    // $email = $_POST['email'];
    //等同于 ：['email'=> $email] = $_POST;
    ['email'=> $email ] = $_POST;
    $errorMsg = "";
    $emailsfilePath = "userInfo.txt";
    $spamfilePath = "spam_domain.txt";

    // 1. 检查邮件是否为空
    if(empty($email)) {
        $error = true;
        $errorMsg = "L'email est obligatoire!";
    }

    // 2. 检查邮件格式是否正确
    if(!$error && filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
        $error=true;
        $errorMsg = "Le format de l'email est incorrect!";

    }

    // 3. 检查邮箱是否有注册过
    $emails = file($emailsfilePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    if(!$error && in_array($email, $emails)) {
        $error=true;
        $errorMsg = "Le mail existe déjà";
    }

    // 4. 检查邮箱域名是否合法
    if(!$error) {
        $emailDomain = ltrim(strstr($email, '@'), '@');
        $spamDomains = file($spamfilePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        if (in_array($emailDomain, $spamDomains)) {
            $error = true;
            $errorMsg = "Désolé, cet email n'est pas accepté dans notre newsletter";
        }
    }

    if(!$error) {
        $emailsFile = fopen($emailsfilePath, 'a');
        fwrite($emailsFile, $email . PHP_EOL);
        fclose($emailsFile);
        redirect('subscription_confirm.php?email=' . $email);
    }
}
