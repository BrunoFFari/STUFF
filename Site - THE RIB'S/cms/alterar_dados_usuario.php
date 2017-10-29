<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title> Alterar dados - Usuário</title>
        <link rel="stylesheet" type="text/css" href="estilo/estilo.css" />
        <link rel="stylesheet" type="text/css" href="estilo/estilo_alterar_dados_usuario.css" />
    </head>
    <body>
        <?php
            /*
            session_start();
            if(!empty($_SESSION['id_usuario'])){
                $idUsuario = $_SESSION['id_usuario'];
            }
            */
            $idUsuario = 1;
        ?>
        <section id="menu">
            <?php require_once('view/menu_lateral_area_do_usuario_view.php'); ?>
        </section>
        <section id="conteudo">
            <?php require_once('view/alterar_dados_usuario_view.php'); ?>
        </section>
        <footer>
        
        </footer>
    </body>
</html>
