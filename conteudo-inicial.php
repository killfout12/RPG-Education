<?php
echo "<h1>Bora jogar!</h1>";
echo "<p>Vá em jogar no menu e inicie sua diversão!</p>";
?>

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