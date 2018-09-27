<?php

require_once dirname(dirname(__FILE__)) . '/databaseProtection.php';
require_once dirname(dirname(dirname(__FILE__))) . '/globals.php';

$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$mail = injectionCheck($_REQUEST['mail']);
$username = injectionCheck($_REQUEST['username']);
$password = injectionCheck($_REQUEST['password']);
$confirmPassword = injectionCheck($_REQUEST['confirmPassword']);

if (isset($mail) && filter_var($mail, FILTER_VALIDATE_EMAIL) == false) {

    $error = "Въведете валиден имейл адрес.";
    
} else {

    if (isset($username) && strlen($username) <= 2) {

        $error = "Потребителското име трябва да е минимум 3 символа.";
        
    } else {

        if (isset($password) && !preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/', $password)) {

            $error = "Паролата трябва да отговаря на следните изисквания: <br>
                - да съдържа поне една малка буква <br>
                - да съдържа поне една главна буква <br>
                - да съдържа поне една цифра <br>
                - да бъде минимум 8 символа дълга <br>
                - да съдържа поне един от следните символи: @#-_$%^&+=§!? <br>
                Пример: Password-1";
        } else {
            $userPassword = encrypt($password, $keyword);
            $userConfirmPassword = encrypt($confirmPassword, $keyword);

            if ($userPassword !== $userConfirmPassword) {
                $error = "Въведете паролата отново";
            } else {
                $userEmail = encrypt($mail, $keyword);
                $userPassword = encrypt($password, $keyword);

                $checkForExistingRecord = "SELECT * FROM " . BROKERS_TABLE . " "
                        . "WHERE email = '" . $userEmail . "' "
                        . "AND password = '" . $userPassword . "'";

                $result = $conn->query($checkForExistingRecord);

                if ($result->num_rows > 0) {
                    $error = "Има такъв потребител.";
                } else {
                    $userRole = "owner";
                    $token = $mail . $password;
                    $UserName = encrypt($username, $keyword);
                    $UserEmail = encrypt($mail, $keyword);
                    $UserPassword = encrypt($password, $keyword);
                    $UserRole = encrypt($userRole, $keyword);
                    $UserToken = encrypt($token, $keyword);
                    $date = date('Y-m-d H:i:s');

                    $stmt = $conn->prepare(
                            "INSERT INTO " . BROKERS_TABLE . " ("
                            . "username, "
                            . "email, "
                            . "password, "
                            . "userRole,"
                            . "token, "
                            . "created) "
                            . "VALUES (?, ?, ?, ?, ?, ?)");
                    $stmt->bind_param("ssssss", $UserName, $UserEmail, $UserPassword, $UserRole, $UserToken, $date);
                    $conn->query("SET NAMES utf8");
                    $stmt->execute();

                    $stmt->close();
                    $conn->close();
                    $rootVar = array('url' => ROOT . '/app/dbb9bed556e645783499ed0f1d804797.php');
                    $error = json_encode($rootVar);
                }
            }
        }
    }
}

if (isset($error))
    echo $error;
