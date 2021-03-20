<?php session_start();

// Comprobamos tenga sesion, si no entonces redirigimos y MATAMOS LA EJECUCION DE LA PAGINA.
if (isset($_SESSION['correo'])) {
	require 'views/ciencias.view.php';
} else {
	header('Location: login.php');
	die();
}

?>
