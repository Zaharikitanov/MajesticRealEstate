<?php

require_once dirname(dirname(__FILE__)) . '/databaseProtection.php';
require_once dirname(dirname(dirname(__FILE__))) . '/globals.php';

$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$mail = injectionCheck($_REQUEST['mail']);
$password = injectionCheck($_REQUEST['password']);

if (isset($mail) && filter_var($mail, FILTER_VALIDATE_EMAIL) == false) {

    $error = "Въведете валиден имейл адрес.";
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

        $userEmail = encrypt($mail, $keyword);
        $userPassword = encrypt($password, $keyword);

        $checkForExistingUser = "SELECT * FROM " . BROKERS_TABLE . " "
                . "WHERE email = '" . $userEmail . "' ";

        $userCheck = $conn->query($checkForExistingUser);

        if ($userCheck->num_rows > 0) {

            $checkForExistingRecord = "SELECT * FROM " . BROKERS_TABLE . " "
                    . "WHERE email = '" . $userEmail . "' "
                    . "AND password = '" . $userPassword . "'";

            $result = $conn->query($checkForExistingRecord);

            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {
                    
                    setcookie(COOKIE_NAME, $row["token"], time() + (86400 * 30), "/");
                }
                /*print_r($_COOKIE[$cookie_name]);
                die();*/
                
                $rootVar = array('url' => ROOT);
                $error = json_encode($rootVar);
            } else {
                $error = "Грешна парола.";
            }
        } else {
            $error = "Няма такъв потребителски имейл.";
        }
    }
}
$conn->close();

if (isset($error))
    echo $error;
