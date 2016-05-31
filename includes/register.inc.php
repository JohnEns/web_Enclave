<?php

include_once 'db_connect.php';
include_once 'psl-config.php';

$error_msg = "";

if (isset($_POST['username'], $_POST['email'], $_POST['p'])) {
    // Sanitize and validate the data passed in
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Not a valid email
        $error_msg .= '<p class="error">Dit is geen geldig e-mailadres.</p>';
    }

    $password = filter_input(INPUT_POST, 'p', FILTER_SANITIZE_STRING);
    if (strlen($password) != 128) {
        // The hashed pwd should be 128 characters long.
        // If it's not, something really odd has happened
        $error_msg .= '<p class="error">Dit wachtwoord is niet toegestaan.</p>';
    }

    // Username validity and password validity have been checked client side.
    // This should should be adequate as nobody gains any advantage from
    // breaking these rules.
    //
 
    $prep_stmt = "SELECT id FROM members WHERE email = ? ";
    $stmt = $mysqli->prepare($prep_stmt);

    // check existing email  
    if ($stmt) {
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows == 1) {
            // A user with this email address already exists
            $error_msg .= '<p class="error">Er is reeds een Enclave-lid met dit emailadres.</p>';
            $stmt->close();
        }
        $stmt->close();
    } else {
        $error_msg .= '<p class="error">Database-fout op regel 44</p>';
        $stmt->close();
    }

    // check existing username
    $prep_stmt = "SELECT id FROM members WHERE username = ? LIMIT 1";
    $stmt = $mysqli->prepare($prep_stmt);

    if ($stmt) {
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows == 1) {
            // A user with this username already exists
            $error_msg .= '<p class="error">Er is reeds een Enclave-lid met deze Gebruikersnaam.</p>';
            $stmt->close();
        }
        $stmt->close();
    } else {
        $error_msg .= '<p class="error">Database-fout op regel 64</p>';
        $stmt->close();
    }

    // TODO: 
    // We'll also have to account for the situation where the user doesn't have
    // rights to do registration, by checking what type of user is attempting to
    // perform the operation.

    if (empty($error_msg)) {
        // Create a random salt
        //$random_salt = hash('sha512', uniqid(openssl_random_pseudo_bytes(16), TRUE)); // Did not work
        $random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));

        // Create salted password 
        $password = hash('sha512', $password . $random_salt);

        // Insert the new user into the database 
        if ($insert_stmt = $mysqli->prepare("INSERT INTO members (username, email, password, salt) VALUES (?, ?, ?, ?)")) {
            $insert_stmt->bind_param('ssss', $username, $email, $password, $random_salt);
            // Execute the prepared query.
            if (!$insert_stmt->execute()) {
                header('Location: ../error.php?err=Registratie fout: INSERT');
            }
        }
        
        $to = $email;
        $subject = "Inschrijving bij Website Enclave";
        $txt = "Hierbij bevestigen wij uw inschrijving bij de website Enclave. Was dit niet uw bedoeling of heeft u zich geheel en al niet opgegeven, stuur dan een mailtje naar info@enclave.nl Veel Plezier bij Enclave!";
        $headers = "From: info@enclave.nl " . "\r\n" ;

        mail($to, $subject, $txt, $headers);
        
        header('Location: ./register_success.php');
    }
}