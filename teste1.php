<?php
session_start();

if (isset($_SESSION['nome'])) {
    $nomeUsuario = $_SESSION['nome'];
    
    // Conectar ao banco de dados
    $host = "localhost";
    $user = "root";
    $password = "";
    $dbname = "rpgeducation";

    // Cria conexão com o banco de dados
    $conn = mysqli_connect($host, $user, $password, $dbname);

    // Verifica se a conexão foi estabelecida corretamente
    if (!$conn) {
        die("Conexão falhou: " . mysqli_connect_error());
    }

    // Consulta para obter o nome da imagem de perfil do usuário
    $sql = "SELECT profile_picture FROM clientes WHERE nome='$nomeUsuario'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $nomeImagemPerfil = $row['profile_picture'];

        
    } else {
        echo "Erro ao consultar o banco de dados: " . mysqli_error($conn);
    }

    // Fechar a conexão com o banco de dados
    mysqli_close($conn);
} else {
    header("Location: login.php");
    exit;
}
?>



<!DOCTYPE html>
<html>
<head>
  <title>Nome do Site</title>
  <meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/teste1css.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.min.css">
</head>

<body style="background-image: url(img/wll.png);">
  <button id="menu-toggle">&#9776;</button>
<div class="menu-bar">
  <ul>
  <li><li>Bem-vindo<br> <?php echo $_SESSION['nome']; ?></li></li>
  <li><img id="profile-icon" src="uploads/<?php echo $nomeImagemPerfil; ?>"></li>
<li>
  <a id="change-profile-icon" href="#">Mudar ícone de perfil</a>
  <li><a  id="btn-inicial" class="btn-carregar-2" href="teste1.php">inicial</a></li>
  <li><a  href="www/">Jogar</a></li>
  <li><a class="btn-carregar" href="formesc.html">Escola</a></li>
  <li><a href="logoff.php">Logoff</a></li>
  </ul>
  </div>
<!-- área de jogo -->
<div class="content-container">
  <div class="main-content">
      <h1>Bem-vindo ao RPG-Education!</h1>
      <p>Obrigado por se cadastrar em nosso site!</p>

  </div>

  <div id="modal" class="modal">
  <div class="modal-content">
    <h2>Selecione uma nova imagem</h2>
    <form action="#" class="dropzone">
      <div class="fallback">
        <input type="file" name="file" />
      </div>
      </form>
    </div>
  </div>

  </div>

  

<script>
    var menuToggle = document.getElementById("menu-toggle");
    var menuBar = document.querySelector(".menu-bar");
    menuToggle.addEventListener("click", function() {
    this.classList.toggle("active");
    menuBar.classList.toggle("active");
    menuBar.classList.contains("active") ? menuToggle.style.transform = "translateX(200px)" : menuToggle.style.transform = "translateX(0)";
    });
</script>
<script>
  $(document).ready(function() {
    $(".btn-carregar").click(function(event) {
      event.preventDefault(); // evita que a página seja recarregada
      var url = $(this).attr("href"); // obtém a URL da página a ser carregada
      $.ajax({
        url: url,
        type: "GET",
        success: function(data) {
          $(".content-container").html(data); // substitui o conteúdo da div "content-container" pelo conteúdo da página carregada
        }
      });
    });
  });
</script>
<script>
  $("#change-profile-icon").click(function() {
    $("#modal").show();
  });
</script>
<script>
  Dropzone.autoDiscover = false;

  $(".dropzone").dropzone({
    url: "upload.php", // caminho para o script PHP que irá lidar com o upload da imagem
    acceptedFiles: "image/*", // permitir apenas imagens
    init: function() {
      this.on("success", function(file, response) {
        // atualizar a imagem de perfil com a nova imagem
        $("#profile-icon").attr("src", "uploads/<?php echo $file_name ?>" + response);
        // fechar o modal
        $("#modal").hide();

      });
    }
  });

</script>
<script>
  function initChangeProfileIcon() {
  $("#change-profile-icon").click(function() {
    $("#modal").show();
  });

  Dropzone.autoDiscover = false;

  $(".dropzone").dropzone({
    url: "upload.php", // caminho para o script PHP que irá lidar com o upload da imagem
    acceptedFiles: "image/*", // permitir apenas imagens
    init: function() {
      this.on("success", function(file, response) {
        // atualizar a imagem de perfil com a nova imagem
        $("#profile-icon").attr("src", "uploads/<?php echo $file_name ?>" + response);
        // fechar o modal
        $("#modal").hide();
      });
    }
  });
  }


</script>
<script>
    $(document).ready(function() {
  initChangeProfileIcon();
  });

</script>
<script>
  // Esconder o modal quando o usuário clicar fora dele
  window.addEventListener("click", function(event) {
  var modal = document.getElementById("modal");
  if (event.target == modal) {
    modal.style.display = "none";
  }
  });

</script>

<script>
  $(document).ready(function() {
    $("#btn-inicial").click(function(event) {
      event.preventDefault();
      var url = "conteudo-inicial.php"; // URL da página de conteúdo inicial
      $.ajax({
        url: url,
        type: "GET",
        success: function(data) {
          $(".content-container").html(data); // Substitui o conteúdo da div "content-container" pelo conteúdo da página carregada via AJAX
        }
      });
    });
  });
</script>


</body>
</html>