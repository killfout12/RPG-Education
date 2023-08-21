<?php
session_start(); // Iniciar a sessão

// Suponhamos que você já tenha iniciado a sessão e definido $_SESSION['nome']

        $host = "localhost";
		$user = "root";
		$password = "";
		$dbname = "rpgeducation";

		$conn = new mysqli($host, $user, $password, $dbname);

		if ($conn->connect_error) {
			die("Falha ao conectar ao banco de dados:" . $conn->connect_error);
		}

$nomeUsuario = $_SESSION['nome'];

// Preparar consulta para verificar se o nome de usuário está na tabela de professores
$stmtProfessores = $conn->prepare("SELECT nome FROM professores WHERE nome = ?");
$stmtProfessores->bind_param("s", $nomeUsuario);
$stmtProfessores->execute();

$resultProfessores = $stmtProfessores->get_result();

// Preparar consulta para verificar se o nome de usuário está na tabela de clientes
$stmtClientes = $conn->prepare("SELECT nome FROM clientes WHERE nome = ?");
$stmtClientes->bind_param("s", $nomeUsuario);
$stmtClientes->execute();

$resultClientes = $stmtClientes->get_result();

if ($resultProfessores->num_rows > 0) {
    // O usuário é um professor
    header("Location: teste1P.php");
    exit;
} elseif ($resultClientes->num_rows > 0) {
    // O usuário é um cliente
    header("Location: teste1.php");
    exit;
} else {
    // O usuário não é nem cliente nem professor
    header("Location: login.php");
    exit;
}

$stmtProfessores->close();
$stmtClientes->close();
$conn->close(); // Fechar a conexão com o banco de dados
?>
