<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/estilos.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <title>LIBRO EAES</title>
</head>

<body>
    <div class="container">
        <div class="container_description">
            <div class="img">
                <img src="img/EAES.png" alt="">
            </div>
            <div class="content_login">
                <h2>Contiene</h2>
                <p><i class="fas fa-angle-right"></i> Matemática (104 preguntas con desarrollo )</p>
                <br>
                <p><i class="fas fa-angle-right"></i> Lengua Y Literatura (43 preguntas con desarrollo ) </p>
                <br>
                <p><i class="fas fa-angle-right"></i> Ciencias Naturales  (69 preguntas con desarrollo )</p>
                <br>
                <p><i class="fas fa-angle-right"></i> Ciencias Sociales  (68 preguntas con desarrollo )</p>
                <br>
                <p><i class="fas fa-angle-right"></i> Preguntas Filtradas</p>
                <br>
                <p><i class="fas fa-angle-right"></i> Simulador del Examen EAES 2021</p>
            </div>
            <div class="content_contact">
                <h2>Contactos</h2>
                <div class="numbers">
                    <a href="https://api.whatsapp.com/send?phone=593993294856">099 329 4856</a>
                    <a href="https://api.whatsapp.com/send?phone=593987764569">098 776 4569</a>
                </div>
            </div>
        </div>
        <div class="container_form">
            <div class="user">
                <i class="fas fa-user-circle"></i>
                <br>
            </div>
            <form class="formulario" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                <div class="correo">
                    <label for="correo">Correo</label>
                    <input type="email" id="correo" name="correo">
                </div>
                <br>
                <div class="password">
                    <label for="password">Contraseña</label>
                    <input type="password" id="password" name="password">
                </div>
                <br>
                <div class="content_btn">
                    <input type="submit" value="Ingresar" class="btn">
                </div>
                <?php if(!empty($errores)): ?>
                <div class="error">
                    <ul>
                        <?php echo $errores; ?>
                    </ul>
                </div>
                <?php endif; ?>
            </form>
        </div>

    </div>
    <script src="https://kit.fontawesome.com/e59cc094ae.js" crossorigin="anonymous"></script>
</body>

</html>