<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit;
}

$dsn = 'mysql:host=localhost;dbname=noticias_web';
$username = 'root';
$password = '';

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = 'DELETE FROM tb_usuarios WHERE nome = :nome';
    $stmt = $pdo->prepare($query);
    $stmt->execute([':nome' => $_SESSION['user']]);

    unset($_SESSION['user']);
    session_destroy();

    header('Location: index.php');
    exit;
} catch (PDOException $e) {
    echo '<div class="alert alert-danger">Erro ao excluir usuário: ' . $e->getMessage() . '</div>';
    exit;
}
?>
