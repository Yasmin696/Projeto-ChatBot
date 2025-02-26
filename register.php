<?php
include 'db_connection.php'; // Inclui o arquivo de conexão

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Armazena a senha em texto simples
    $sql = "INSERT INTO usuarios (email, username, senha) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $email, $username, $password);

    if ($stmt->execute()) {
        // Redireciona para a página de login
        header("Location: Login.html"); 
        exit();
    } else {
        echo "Erro ao criar conta: " . $stmt->error;
    }

    $stmt->close();
}
$conn->close();
?>