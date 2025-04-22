<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = htmlspecialchars($_POST["nom"]);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $sujet = htmlspecialchars($_POST["sujet"]);
    $message = htmlspecialchars($_POST["message"]);

    // Adresse du destinataire
    $to = "guerindagohoue@gmail.com"; 

    // Sujet de l'email
    $subject = "Message depuis UlrichCagnotte : $sujet";

    // Contenu de l'email
    $body = "Nom : $nom\nEmail : $email\n\nMessage :\n$message";

    // En-têtes
    $headers = "From: $email";

    // Envoi
    if (mail($to, $subject, $body, $headers)) {
        echo '<div class="alert alert-success">Message envoyé avec succès !</div>';
    } else {
        echo '<div class="alert alert-danger">Erreur lors de l\'envoi du message.</div>';
    }
}
?>