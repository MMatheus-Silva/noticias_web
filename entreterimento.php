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
          <img src="home/img-2280.avif" class="text-center img-responsive" onmouseover="trocarImagem(this, 'home/anacastela.avif')" onmouseout="trocarImagem(this, 'home/img-2280.avif')">
        </p>
        <h2 class="text-center">Ana Castela rebate crítica após publicar meme sobre consumo de bebida: 'Quem tem que cuidar das crianças são os pais'</h2>
        <p>Cantora fez uma postagem falando que tinha 'bebido substâncias de procedência duvidosa'</p>
      </div>
      <div class="col-12 news-container">
        <p>
          <img src="home/neymarjr-448474499-830073002379230-2181858185254641176-n.avif" class="img-responsive" onmouseover="trocarImagem(this, 'home/neymarjr-448517276-1603764507072621-954413158626992108-n.avif')" onmouseout="trocarImagem(this, 'home/neymarjr-448474499-830073002379230-2181858185254641176-n.avif')">
        </p>
        <h2>Além do batismo católico, Neymar e Bruna Biancardi consagram Mavie na igreja evangélica</h2>
        <p>A pequena foi apresentada nas duas religiões para respeitar as crenças de cada família.</p>
      </div>
      <div class="col-12 news-container">
        <p>
          <img src="home/maisa-3.avif" class="img-responsive" onmouseover="trocarImagem(this, 'home/maisa_cd9785.webp')" onmouseout="trocarImagem(this, 'home/maisa-3.avif')">
        </p>
        <h2>Maisa fala da primeira antagonista que vai interpretar na TV: 'Nem parece real'</h2>
        <p>Atriz faz sua estreia na TV Globo na próxima novela das seis e conta tudo em primeira mão no café da manhã no Mais Você.</p>
      </div>
      <div style="border-bottom: 1px solid #ddd;">
        <p>
          <img src="home/1718665940573822.avif" class="img-responsive">
        </p>
        <h2>Pedro Scooby defende esposa Cintia Dicker após críticas pelo tamanho dos lábios: 'Beiço lindo, gostoso'</h2>
        <p>O surfista falou sobre como os comentários na internet podem ser cruéis</p>
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