<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Login Notícias WEB</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>
    <div id="login">
        <h3 class="text-center text-white pt-5">Login Notícias WEB</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <div id="error-message" class="alert alert-danger" role="alert" style="display: none;"></div>
                        <?php
                        session_start();

                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                            $dsn = 'mysql:host=localhost;dbname=noticias_web';
                            $username = 'root';
                            $password = '';

                            try {
                                $pdo = new PDO($dsn, $username, $password);
                                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                                $nome = $_POST['username'];
                                $senha = $_POST['password'];

                                $query = 'SELECT * FROM tb_usuarios WHERE nome = :nome';
                                $stmt = $pdo->prepare($query);
                                $stmt->execute([':nome' => $nome]);
                                $user = $stmt->fetch(PDO::FETCH_ASSOC);

                                if ($user && password_verify($senha, $user['senha'])) {
                                    $_SESSION['user'] = $user['nome'];
                                    header('Location: home.php');
                                    exit;
                                } else {
                                    echo "<div class='alert alert-danger'>Nome de usuário ou senha inválidos!</div>";
                                }
                            } catch (PDOException $e) {
                                echo '<div class="alert alert-danger">Erro na conexão: ' . $e->getMessage() . '</div>';
                            }
                        }
                        ?>
                        <form id="login-form" class="form" action="" method="POST">
                            <h3 class="text-center text-info">Login</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Nome de Usuário:</label><br>
                                <input type="text" name="username" id="username" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Senha:</label><br>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <a href="cadastro.php">Não tem uma conta? Cadastre-se</a><br><br>
                                <input type="submit" name="login" class="btn btn-info btn-md" value="Login">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>