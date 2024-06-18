<?php
session_start();
if (!isset($_SESSION['user'])) {
  header('Location: index.php');
  exit;
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
  <link rel="stylesheet" type="text/css" href="style.css">

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
        <li><span class="navbar-text">Olá, <a href="perfil.php" class="destaque"><strong><?php echo $_SESSION['user']; ?></strong></a>!</span></li>
        <li><a href="logout.php">Sair</a></li>
      </ul>
    </div>
  </nav>

  <div class="container">
    <h3 class="text-center news-container text-white pt-5" style="color: #8B0000;">Principais notícias</h3>

    <div class="row">
      <div class="col-12 news-container">
        <p>
          <img src="home/Inmet.webp" class="text-center img-responsive" onmouseover="trocarImagem(this, 'home/inmet-mapa.webp')" onmouseout="trocarImagem(this, 'home/Inmet.webp')">
        </p>
        <h2 class="text-center">Inmet alerta para baixa umidade em São Paulo e mais 11 estados</h2>
        <p>O Instituto Nacional de Meteorologia (Inmet) emitiu um alerta de baixa umidade do ar para São Paulo e mais 11 estados. O aviso vale para esta terça-feira e deve durar até o anoitecer.</p>
        <p>De acordo com os meteorologistas, a umidade varia entre 30% e 20%. O ideal para a saúde humana e o meio ambiente é acima de 60%.</p>
      </div>
      <div class="col-12 news-container">
        <p>
          <img src="home/sdfghdfgjdfgj.webp" class="img-responsive">
        </p>
        <h2>Xi Jinping pede esforço total de resgate após tempestades atingirem a China</h2>
        <p>Cerca de uma dúzia de pessoas foram mortas em enchentes ou deslizamentos de terra provocados pela chuva nos últimos dias.</p>
      </div>
      <div class="col-12 news-container">
        <p>
          <img src="home/GettyImages-1481884984.webp" class="img-responsive">
        </p>
        <h2>Região Sul deverá ter chuva nesta terça-feira (18), diz Climatempo</h2>
        <p>Previsão do tempo indica possibilidade de tempo seco no Sudeste.</p>        
        <p>
        A região Sul do Brasil deverá enfrentar chuvas por conta do transporte de umidade causado pela circulação de ventos e a atuação de um cavado nesta terça-feira (18). As informações são da Climatempo.
        </p>
      </div>
    </div>
  </div>
  <script>
    function trocarImagem(img, novaSrc) {
      img.src = novaSrc;
    }
  </script>

</body>

</html>