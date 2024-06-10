<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = sanitize_input($_POST["name"]);
    $lastname = sanitize_input($_POST["lastname"]);
    $gender = sanitize_input($_POST["gender"]);
    $email = sanitize_input($_POST["email"]);
    $country = sanitize_input($_POST["country"]);
    $subject = sanitize_input($_POST["subject"]);
    $message = sanitize_input($_POST["message"]);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Format d'email invalide";
    } else {
        $to = "$email";
        $subject = "Nouveau message de $name $lastname";
        $headers = "From: $email";
        $message = "Nom: $name $lastname\n".
                   "Genre: $gender\n".
                   "Pays: $country\n".
                   "Sujet: $subject\n".
                   "Message: $message";

        if (mail($to, $subject, $message, $headers)) {
            echo "Votre message a été envoyé avec succès";
        } else {
            echo "Une erreur s'est produite lors de l'envoi de votre message";
        }
    }
}

function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>