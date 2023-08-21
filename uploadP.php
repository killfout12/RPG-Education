<?php
session_start();
if (isset($_SESSION['nome'])) {
  $nome = $_SESSION['nome'];
} else {
  header("Location: login.php");
  exit;
}


if(isset($_FILES['file'])) {
  $file_name = $_FILES['file']['name'];
  $file_tmp = $_FILES['file']['tmp_name'];
  $file_ext = strtolower(end(explode('.', $_FILES['file']['name'])));
  $extensions = array("jpeg", "jpg", "png");
  
  if(in_array($file_ext, $extensions) === false){
      echo "Extensão de arquivo não permitida. Por favor, escolha um arquivo JPEG ou PNG.";
  } else {
      // Diretório onde o arquivo será salvo
      $upload_directory = "uploads/";
      
      // Move o arquivo para o diretório de upload
      move_uploaded_file($file_tmp, $upload_directory.$file_name);
      
      // Salvar nome do arquivo no banco de dados
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

      // Atualiza a coluna 'profile_picture' da tabela 'clientes' com o nome do arquivo
      $sql = "UPDATE professores SET profile_picture='$file_name' WHERE nome='$nome'";
      if (mysqli_query($conn, $sql)) {
          // Retorna o nome do arquivo para o script jQuery
          echo $file_name;
          
      } else {
          echo "Erro ao atualizar o perfil: " . mysqli_error($conn);
      }
      
      // Salvar nome do arquivo na sessão do usuário
        $_SESSION['file_name'] = $file_name;

      // Fecha a conexão com o banco de dados
      mysqli_close($conn);
  }
}
?>
