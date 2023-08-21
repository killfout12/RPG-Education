<?php
session_start(); // Iniciar a sessão

// Destruir todas as variáveis de sessão
$_SESSION = array();

// Se você deseja encerrar completamente a sessão, incluindo o cookie de sessão, descomente as linhas abaixo
// if (ini_get("session.use_cookies")) {
//     $params = session_get_cookie_params();
//     setcookie(session_name(), '', time() - 42000,
//         $params["path"], $params["domain"],
//         $params["secure"], $params["httponly"]
// );
// }

// Encerrar a sessão
session_destroy();

// Redirecionar para a página de login após o logoff
header("Location: index.html");
exit;
?>