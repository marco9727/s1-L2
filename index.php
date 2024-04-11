<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form di Contatto</title>
</head>
<body>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Filtra e valida il nome
    $nome = filter_var($_POST["nome"], FILTER_SANITIZE_STRING);
    
    // Filtra e valida l'email
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Email non valida.";
        exit;
    }
    
    // Filtra e valida il messaggio
    $messaggio = filter_var($_POST["messaggio"], FILTER_SANITIZE_STRING);
    
    // Visualizza i dati del form
    echo "<h2>Dati del Form</h2>";
    echo "<p><strong>Nome:</strong> $nome</p>";
    echo "<p><strong>Email:</strong> $email</p>";
    echo "<p><strong>Messaggio:</strong> $messaggio</p>";
} else {
    echo "<p>Compila il form per inviare un messaggio.</p>";
}

?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" required>
    <label for="email">Email:</label>
    <input type="text" id="email" name="email" required>
    <label for="messaggio">Messaggio:</label>
    <textarea id="messaggio" name="messaggio" required></textarea>
    <input type="submit" value="Invia">
</form>

</body>
</html>