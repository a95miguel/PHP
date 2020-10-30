<?php require_once("includes/session.php"); ?>
<?php require_once("includes/funciones.php"); ?>
<?php confirmar_logged_in(); ?>
<?php include("includes/header.php"); ?>

    <table id="estructura">
    <tr>
        <td id="navegacion">
                &nbsp;
        </td>
        <td id="pagina">
            <h2>Menu de Staff</h2>
            <p>Bienvenido al Área de Staff, <?php echo $_SESSION['usuario']; ?>.</p>
            <ul>
                <li><a href="contenido.php">Administrar contenido de la pagina</a></li>
                <li><a href="nuevo_usuario.php">Agregar usuario staff</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </td>
    </tr>
    </table>
<?php include("includes/footer.php"); ?>