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

    $query = 'SELECT * FROM tb_usuarios WHERE nome = :nome';
    $stmt = $pdo->prepare($query);
    $stmt->execute([':nome' => $_SESSION['user']]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo '<div class="alert alert-danger">Erro na conexão: ' . $e->getMessage() . '</div>';
    exit;
}

$successMessage = '';

if (isset($_POST['submit'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = null;

    if (isset($_POST['change_password']) && $_POST['change_password'] === 'yes') {
        if (isset($_POST['senha_atual'])) {
            $senhaAtual = $_POST['senha_atual'];
            if (password_verify($senhaAtual, $user['senha'])) {
                $senha = password_hash($_POST['nova_senha'], PASSWORD_DEFAULT);
            } else {
                echo '<div class="alert alert-danger">Senha atual incorreta!</div>';
                exit;
            }
        } else {
            echo '<div class="alert alert-danger">Informe a senha atual!</div>';
            exit;
        }
    }

    try {
        $query = 'UPDATE tb_usuarios SET nome = :nome, email = :email';
        if ($senha !== null) {
            $query .= ', senha = :senha';
        }
        $query .= ' WHERE nome = :old_nome';
        $stmt = $pdo->prepare($query);
        if ($senha !== null) {
            $stmt->execute([':nome' => $nome, ':email' => $email, ':senha' => $senha, ':old_nome' => $_SESSION['user']]);
        } else {
            $stmt->execute([':nome' => $nome, ':email' => $email, ':old_nome' => $_SESSION['user']]);
        }

        $_SESSION['user'] = $nome;
        $successMessage = '<div class="alert alert-success">Atualizado com sucesso!</div>';
    } catch (PDOException $e) {
        echo '<div class="alert alert-danger">Erro ao atualizar usuário: ' . $e->getMessage() . '</div>';
        exit;
    }
}
if (isset($_POST['submit'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = null;

    if (isset($_POST['change_password']) && $_POST['change_password'] === 'yes') {
        if (isset($_POST['senha_atual'])) {
            $senhaAtual = $_POST['senha_atual'];
            if (password_verify($senhaAtual, $user['senha'])) {
                if ($_POST['nova_senha'] === $_POST['confirm_password']) {
                    $senha = password_hash($_POST['nova_senha'], PASSWORD_DEFAULT);
                } else {
                    echo '<div class="alert alert-danger">A nova senha e a confirmação da nova senha não coincidem!</div>';
                    exit;
                }
            } else {
                echo '<div class="alert alert-danger">Senha atual incorreta!</div>';
                echo "<div class='alert alert-danger'>Nome de usuário ou senha inválidos!</div>";
                exit;
            }
        } else {
            echo '<div class="alert alert-danger">Informe a senha atual!</div>';
            exit;
        }
    }

    try {
        $query = 'UPDATE tb_usuarios SET nome = :nome, email = :email, senha = :senha WHERE nome = :old_nome';
        $stmt = $pdo->prepare($query);
        $stmt->execute([':nome' => $nome, ':email' => $email, ':senha' => $senha, ':old_nome' => $_SESSION['user']]);

        $_SESSION['user'] = $nome;
        $successMessage = '<div class="alert alert-success">Atualizado com sucesso!</div>';
        
    } catch (PDOException $e) {
        echo '<div class="alert alert-danger">Erro ao atualizar usuário: ' . $e->getMessage() . '</div>';
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Notícias WEB</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        .img-responsive:hover {
            cursor: pointer;
        }

        .destaque {
            font-weight: bold;
            font-size: larger;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="home.php" style="color: #17a2b8;">NOTÍCIAS WEB</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="home.php">Home</a></li>
                <li><a href="esportes.php">Esportes</a></li>
                <li><a href="entreterimento.php">Entretenimento</a></li>
                <li><a href="clima.php">Clima</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><span class="navbar-text">Olá, <a href="perfil.php" class="destaque"><?php echo $_SESSION['user']; ?></a>!</span></li>
                <li><a href="logout.php">Sair</a></li>
            </ul>
        </div>
    </nav>


    <div class="container">
        <h2 class="text-center text-white pt-5" style="color: #17a2b8;">Perfil do Usuário</h2>
        <?php echo $successMessage; ?>
        <form method="POST" action="perfil.php">
            <div class="form-group">
                <label for="nome" class="text-info">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $user['nome']; ?>">
            </div>
            <div class="form-group">
                <label for="email" class="text-info">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $user['email']; ?>">
            </div>
            <div class="form-group">
                <label for="change_password" class="text-info">Deseja trocar a senha?</label>
                <select class="form-control" id="change_password" name="change_password">
                    <option value="no">Não</option>
                    <option value="yes">Sim</option>
                </select>
            </div>
            <div class="form-group" id="senha_atual_div" style="display: none;">
                <label for="senha_atual" class="text-info">Senha Atual:</label>
                <input type="password" class="form-control" id="senha_atual" name="senha_atual">
            </div>
            <div class="form-group" id="nova_senha_div" style="display: none;">
                <label for="nova_senha" class="text-info">Nova Senha:</label>
                <input type="password" class="form-control" id="nova_senha" name="nova_senha">
            </div>
            <div class="form-group" id="confirm_password_div" style="display: none;">
                <label for="confirm_password" class="text-info">Confirme a Nova Senha:</label>
                <input type="password" name="confirm_password" id="confirm_password" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Salvar</button>
        </form>
        <form method="POST" action="excluir_conta.php" onsubmit="return confirm('Tem certeza que deseja excluir sua conta?');">
            <button type="submit" class="btn btn-danger">Excluir Conta</button>
        </form>
    </div>

    <script>
        document.getElementById('change_password').addEventListener('change', function() {
            if (this.value === 'yes') {
                document.getElementById('senha_atual_div').style.display = 'block';
                document.getElementById('nova_senha_div').style.display = 'block';
                document.getElementById('confirm_password_div').style.display = 'block';
            } else {
                document.getElementById('senha_atual_div').style.display = 'none';
                document.getElementById('nova_senha_div').style.display = 'none';
                document.getElementById('confirm_password_div').style.display = 'none';
            }
        });
    </script>

</body>

</html>