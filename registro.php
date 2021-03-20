<?php session_start();

// Comprobamos si ya tiene una sesion
# Si ya tiene una sesion redirigimos al contenido, para que no pueda volver a registrar un usuario.
if (isset($_SESSION['correo'])) {
	header('Location: index.php');
	die();
}

// Comprobamos si ya han sido enviado los datos
if($_SERVER['REQUEST_METHOD'] == 'POST') {
	// Validamos que los datos hayan sido rellenados
	$usuario = filter_var(strtolower($_POST['correo']), FILTER_SANITIZE_STRING);
	$password = $_POST['password'];

// // Tambien podemos limpiar mediante las funciones
// 	# El problema es que si lo hacemos de esta forma no estamos eliminando caracteres especiales, solo los transformamos.
	
// 	// La funcion htmlspecialchars() convierte caracteres especiales en entidades HTML, (&, "", '', <, >)
// 	$usuario = htmlspecialchars($_POST['usuario']);
// 	// La funcion trim() elimina espacio en blanco al inicio y final de la cadena de texo
// 	$usuario = trim($usuario);
// 	// stripslashes() quita las barras de un string con comillas escapadas, los \ los convierte en \'
// 	$usuario = stripslashes($usuario);

	$errores = '';

	// Comprobamos que ninguno de los campos este vacio.
	if (empty($usuario) or empty($password) ) {
		$errores = '<li>Por favor rellena todos los datos correctamente</li>';
	} else {

		// Comprobamos que el usuario no exista ya.
		try {
			$conexion = new PDO('mysql:host=localhost;dbname=libro_eaes', 'root', '');
		} catch (PDOException $e) {
			echo "Error:" . $e->getMessage();
		}

		$statement = $conexion->prepare('SELECT * FROM usuarios WHERE email = :email LIMIT 1');
		$statement->execute(array(':email' => $usuario));

		// El metodo fetch nos va a devolver el resultado o false en caso de que no haya resultado.
		$resultado = $statement->fetch();

		// Si resultado es diferente a false entonces significa que ya existe el usuario.
		if ($resultado != false) {
			$errores .= '<li>El correo de usuario ya existe</li>';
		}

		// Hasheamos nuestra contraseña para protegerla un poco.
		# OJO: La seguridad es un tema muy complejo, aqui solo estamos haciendo un hash de la contraseña,
		# pero esto no asegura por completo la informacion encriptada.
		$password = hash('sha512', $password);
		
	}

	// Comprobamos si hay errores, sino entonces agregamos el usuario y redirigimos.
	if ($errores == '') {
		$statement = $conexion->prepare('INSERT INTO usuarios (id, email, password) VALUES (null, :email, :password)');
		$statement->execute(array(
				':email' => $usuario,
				':password' => $password
			));

		// Despues de registrar al usuario redirigimos para que inicie sesion.
		header('Location: login.php');
	}


}

require 'views/registrate.view.php';
?>
