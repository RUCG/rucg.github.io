<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // E-Mail-Adresse aus dem Formular abrufen und validieren
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    // Überprüfen, ob die E-Mail-Adresse gültig ist
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Datei, in der die E-Mails gespeichert werden
        $file = 'emails.txt';

        // E-Mail in der Datei speichern
        file_put_contents($file, $email . PHP_EOL, FILE_APPEND);

        // Erfolgsnachricht anzeigen
        echo "<!DOCTYPE html>
        <html lang='de'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Newsletter Anmeldung</title>
            <style>
                body {
                    font-family: 'Arial', sans-serif;
                    margin: 0;
                    padding: 0;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    height: 100vh;
                    background-color: #333; /* Grauer Hintergrund */
                    color: #fff; /* Weißer Text */
                }
                .message {
                    text-align: center;
                    background-color: #444; /* Dunkelgrauer Hintergrund für die Nachricht */
                    padding: 20px;
                    border-radius: 10px;
                }
                .btn {
                    padding: 10px 20px;
                    background-color: #ff6f61;
                    border: none;
                    border-radius: 5px;
                    color: #fff;
                    text-decoration: none;
                    font-size: 18px;
                    cursor: pointer;
                    transition: background-color 0.3s ease;
                    margin-top: 20px;
                    display: inline-block;
                }
                .btn:hover {
                    background-color: #de4463;
                }
            </style>
        </head>
        <body>
            <div class='message'>
                <h1>Danke fürs Abonnieren! 🎉</h1>
                <a href='index.html' class='btn'>Zurück zur Startseite</a>
            </div>
        </body>
        </html>";
    } else {
        // Fehlermeldung bei ungültiger E-Mail
        echo "Ungültige E-Mail-Adresse.";
    }
} else {
    // Nachricht bei direktem Aufruf des Skripts
    echo "Direkter Zugriff auf dieses Skript ist nicht erlaubt.";
}
?>