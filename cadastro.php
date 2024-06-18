<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Cadastro Notícias WEB</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>
    <div id="login">
        <h3 class="text-center text-white pt-5">Cadastro Notícias WEB</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <div id="error-message" class="alert alert-danger" role="alert" style="display: none;"></div>
                        <div>
                            <label class="text-info">Cadastre em nossa página de notícias para ficar por dentro do que acontece aqui e no mundo!</label><br>
                        </div>
                        <?php
                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                            $dsn = 'mysql:host=localhost;dbname=noticias_web';
                            $username = 'root';
                            $password = '';

                            try {
                                $pdo = new PDO($dsn, $username, $password);
                                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                                $nome = $_POST['username'];
                                $email = $_POST['email'];
                                $senha = $_POST['password'];
                                $confirmarSenha = $_POST['confirm_password'];

                                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                    if ($senha === $confirmarSenha) {
                                        $query = 'INSERT INTO tb_usuarios (nome, email, senha) VALUES (:nome, :email, :senha)';
                                        $stmt = $pdo->prepare($query);
                                        $stmt->execute([
                                            ':nome' => $nome,
                                            ':email' => $email,
                                            ':senha' => password_hash($senha, PASSWORD_DEFAULT)
                                        ]);
                                        header('Location: index.php');
                                        exit;
                                    } else {
                                        echo "<div class='alert alert-danger'>As senhas não coincidem.</div>";
                                    }
                                } else {
                                    echo "<div class='alert alert-danger'>Email inválido.</div>";
                                }
                            } catch (PDOException $e) {
                                echo '<div class="alert alert-danger">Erro na conexão: ' . $e->getMessage() . '</div>';
                            }
                        }

                        ?>
                        <form id="login-form" class="form" action="" method="POST" onsubmit="return validateForm()">
                            <h3 class="text-center text-info">Cadastro</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Nome de Usuário:</label><br>
                                <input type="text" name="username" id="username" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="email" class="text-info">E-mail:</label><br>
                                <input type="email" name="email" id="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Senha:</label><br>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="confirm_password" class="text-info">Confirme a Senha:</label><br>
                                <input type="password" name="confirm_password" id="confirm_password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <a href="index.php">Já tenho cadastro!</a><br><br>
                                <input type="submit" name="cadastrar" class="btn btn-info btn-md" value="Cadastrar">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function validateForm() {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirm_password').value;
            const errorMessage = document.getElementById('error-message');

            if (password.length < 6) {
                errorMessage.textContent = 'A senha deve ter pelo menos 6 caracteres!';
                errorMessage.style.display = 'block';
                return false;
            }

            if (password !== confirmPassword) {
                errorMessage.textContent = 'As senhas não coincidem!';
                errorMessage.style.display = 'block';
                return false;
            }

            errorMessage.style.display = 'none';
            return true;
        }
    </script>
</body>

</html>