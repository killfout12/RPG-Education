<?php
// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {

	// Obter os dados do formulário
	$emailP = $_POST['email'];
	$senhaP = $_POST['senha'];
	
	// Verificar se o usuário existe no banco de dados
	$host = "localhost";
	$user = "root";
	$password = "";
	$dbname = "rpgeducation";

	$conn = new mysqli($host, $user, $password, $dbname);

	if ($conn->connect_error) {
		die("Falha ao conectar ao banco de dados:" . $conn->connect_error);
	}

	$sql = "SELECT * FROM professores WHERE email='$emailP'";

	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		// O usuário foi encontrado no banco de dados

		$row = $result->fetch_assoc();

		if ($row['senha'] == $senhaP) {
			// A senha está correta, então o usuário pode ser autenticado
			// Redirecionar para a página de dashboard
			session_start();
    		$_SESSION['nome'] = $row['nome'];

			header("Location: teste1P.php");
			exit;
		} else {
			// A senha está incorreta
			echo "<p class='error'>Senha incorreta</p>";
		}
	} else {
		// O usuário não foi encontrado no banco de dados
		echo "<p class='error'>Usuário não encontrado</p>";
	}

	// Fechar a conexão com o banco de dados
	$conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Profe</title>
	
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/logincss.css">
	<link rel="stylesheet" href="css/error.css">
</head>

<body style="background-image: url(img/wll.png);">
	<div class="container">
		<form method="post" action="loginP.php">
			<h2>Login Profe</h2>
			<div class="inputBox">
				<input type="email" name="email" id="email" required>
				<label>Email</label>
			</div>
			<div class="inputBox">
				<input type="password" name="senha" id="senha" required>
				<label>Senha</label>
			</div>
			<input type="submit" name="entrar" value="Entrar">
            <button onclick="window.location.href='index.html'" style="margin-top: 10px;">Voltar</button>
        <p style="margin-top: 10px; color: rgb(146, 146, 146);">Não tem uma conta? <a href="cadastroP.php" style="color:rgb(190, 190, 190)">Cadastre-se aqui</a>.</p>
			
		</form>
        
	</div>
	
</body>
</html>