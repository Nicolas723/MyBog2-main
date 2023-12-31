<?php
session_start();



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Olvido su contraseña</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./estilos/registro.css">
    <link rel="stylesheet" href="./estilos/HeaderFooter.css">
</head>

<body>
    <div class="wrapper">
        <div class="content">
            <nav id="custom-navbar" class="navbar navbar-expand-lg navbar-light navbar-dark-bg">
                <div class="container-fluid" id="header">
                    <a class="navbar-brand Logo" href="./index.php"><img src="./Imagenes/Logo.png" alt="Logo"></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav justify-content-end">
                            <li class="nav-item">
                                <a class="nav-link rojo" id="mapa" href="./mapa.php">Mapa</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link amarillo" id="calendario" href="./calendario.php">Calendario</a>
                            </li>
                            <?php
                            if (isset($_SESSION['user_id'])) {
                                echo '<li class="nav-item">
                                <form id="logout-form" action="./php/logout.php" method="post">
                                    <button type="submit" class="nav-link btn rojo" data-bs-toggle="modal" data-bs-target="#confirmLogoutModal">Cerrar sesión</button>
                                </form>
                            </li>';
                            } else {
                                echo '<li class="nav-item">
                                <a class="nav-link rojo" id="main" href="./main.php" >Ingresar</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link amarillo" id="registro" href="./registro.php">Registro</a>
                            </li>';
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="login-box">
                            <h2>Crear Cuenta</h2>
                            <form action="php/procesar_registro.php" method="post"
                                onsubmit="return validarFormulario()">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="Nombres" name="Nombres" required>
                                    <label>Nombre</label>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="Apellidos" name="Apellidos" required>
                                    <label>Apellido</label>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" id="email" name="Email" required>
                                    <label>Correo</label>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" required minlength="8" maxlength="12"
                                        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,12}" name="Password" id="password">
                                    <label>Contraseña</label>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" required minlength="8" maxlength="12"
                                        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,12}" id="confirmPassword">
                                    <label>Confirmar Contraseña</label>
                                    <center><span id="errorMensaje" style="color: red; display: none;">Las contraseñas
                                            no coinciden.</span></center>
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" required> Acepto los términos y condiciones
                                </div>
                                <br>
                                <div>
                                    <button type="submit">Crear</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <img class="ciudad" src="./Imagenes/bogota (2).png" alt="ciudad">
                    </div>
                </div>
            </div>
            <footer class="footer">
                <nav>
                    <ul>
                        <li><a href="#">Política de privacidad</a></li>
                        <li><a href="#">Términos y condiciones</a></li>
                        <li><a href="#">Contacto</a></li>


                        <?php
                        if (isset($_SESSION['user_id'])) {
                            echo '<li><a href="./reg_establecimiento.php">deseas registrar tu establecimiento</a></li>';
                        } else {
                            echo '<li><a data-toggle="modal" data-target="#myModal" href="#">deseas registrar tu establecimiento</a></li>';
                        }
                        ?>
                        <br>
                        <p>© 2023 MyBog. Todos los derechos reservados.</p>
                    </ul>
        </div>
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Mensaje</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        Debes estar logeado/Registrado para utilizar este servicio.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        </nav>
        </footer>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./Funcionamiento_por_js/confirmacion_de_contraseña.js"></script>
</body>

</html>