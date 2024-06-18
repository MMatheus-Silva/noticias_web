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
      <h2 class="text-center">Atlético-MG acusa árbitro de mentir sobre Hulk na súmula e ironiza: "Rodrigo Wright de Lima"</h2>
        <p>
          <img src="home/agif2406172108307.avif" class="text-center img-responsive" onmouseover="trocarImagem(this, 'home/agf20240617223-r1low0919lbt.webp')" onmouseout="trocarImagem(this, 'home/agif2406172108307.avif')">
        </p>
        
        <p>Clube compara responsável pelo apito contra o Palmeiras a ex-árbitro que expulsou cinco jogadores do Galo na Libertadores de 1981, contra o Flamengo</p>
      </div>
      <div class="col-12 news-container">
      <h2>Bastidores: Palmeiras e Dudu têm relação abalada, e Abel dá primeiro passo para recomeço</h2>
        <p>
          <img src="home/53789719386-cbda70bf1d-h.avif" class="img-responsive" onmouseover="trocarImagem(this, 'home/rib9345.avif')" onmouseout="trocarImagem(this, 'home/53789719386-cbda70bf1d-h.avif')">
        </p>
        
        <p>Negociação com o Cruzeiro gerou ruídos, e camisa 7 decidiu ficar horas depois de a presidente Leila Pereira falar em fim de ciclo. Técnico defendeu a relação com atacante e o aguarda</p>
      </div>
      <div class="col-12 news-container">
      <h2>Dudu volta aos treinos no Palmeiras e fica à disposição de Abel Ferreira</h2>
        <p>
          <img src="home/53772684412-adb0be5c59-h.avif" class="img-responsive" onmouseover="trocarImagem(this, 'home/7u2tse6xo98os1h53oyi30hi1.webp')" onmouseout="trocarImagem(this, 'home/53772684412-adb0be5c59-h.avif')">
        </p>
        
        <p>Camisa 7 não havia sido relacionado para o jogo contra o Atlético-MG por decisão da diretoria; com futuro definido, atacante pode ser aproveitado nas próximas partidas</p>
      </div>
      <div class="col-12 news-container">        
        <h2>Militão revela medo de perder Copa América e aposta em Vini Jr melhor do mundo: "Sem dúvidas"</h2>
        <p>
          <img src="home/whatsapp-image-2024-06-18-at-14.03.02.avif" class="img-responsive" onmouseover="trocarImagem(this, 'home/whatsapp-image-2024-06-18-at-14.01.51.avif')" onmouseout="trocarImagem(this, 'home/whatsapp-image-2024-06-18-at-14.03.02.avif')">
        </p>
        <p>Zagueiro do Real Madrid, que se machucou em agosto de 2023 e voltou recentemente aos gramados, aposta em Vini como Bola de Ouro</p>
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