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
        <h2 class="text-center">Ao menos 5 homicídios foram registrados em BH e região nas últimas 48 horas</h2>
        <p>
          <img src="home/1.avif" class="text-center img-responsive" onmouseover="trocarImagem(this, 'home/2.avif')" onmouseout="trocarImagem(this, 'home/1.avif')">
        </p>

        <p>Em Betim, uma mulher foi espancada até a morte. Na capital, um homem foi morto com seis tiros na cabeça e em outra ocorrência a vítima levou, ao menos, dez tiros enquanto lanchava.</p>
        <p>Em Belo Horizonte, no bairro Ribeiro de Abreu, um homem, de 30 anos, foi executado com seis tiros na cabeça. Segundo o boletim de ocorrência, ele estava cometendo furtos na região e teria sido ameaçado por traficantes do bairro.</p>
      </div>
      <div class="col-12 news-container">
        <h2>Mulher morta em tentativa de assalto na Linha Amarela deixa bebê de 7 meses</h2>
        <p>
          <img src="home/home2.avif" class="img-responsive" onmouseover="trocarImagem(this, 'home/home12.avif')" onmouseout="trocarImagem(this, 'home/home2.avif')">
        </p>
        <p>Deborah Vilas Boas Pires da Silva, de 27 anos, estava em um ponto de ônibus na manhã desta terça-feira (18), quando foi baleada. José Carlos da Silva Miranda, de 64 anos, também morreu no local.</p>
        <p>Deborah foi mãe em novembro do ano passado. A bebê completou 7 meses na quinta-feira (13).</p>
      </div>
      <div class="col-12 news-container">
        <h2>Polícia prende humorista Carlinhos Mendigo, que deve R$ 247 mil de pensão</h2>
        <p>
          <img src="home/img-0055.webp" class="img-responsive" onmouseover="trocarImagem(this, 'home/2024931634-abre-perfil-brasil-42-5.webp')" onmouseout="trocarImagem(this, 'home/img-0055.webp')">
        </p>

        <p>Mendigo ficou conhecido pelo trabalho no programa 'Pânico' no rádio e na televisão. Ele estava foragido desde 2022 por dívida de pensão alimentícia do filho Arthur.</p>
      </div>
      <div style="border-bottom: 1px solid #ddd;">
        <h2>Atlas da Violência: agressões sexuais foram o maior tipo de violência contra meninas de 10 a 14 anos em 2022</h2>
        <p>
          <img src="home/e98e212f1305f0c6d649a3f6dd320024.avif" class="img-responsive imagem-unica">
        </p>

        <p>Em outras faixas etárias, agressões físicas e negligência são as violações predominantes, aponta levantamento do Ipea e do Fórum Brasileiro de Segurança Pública.</p>
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