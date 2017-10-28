<?php
    require_once('controller/home_controller.php');
    $editSlide = 0;
    $editCarrossel = 0;

    if(isset($_GET['acao'])){
        
        if($_GET['acao'] == 'editarSlide'){
            $editSlide = 1;
            $idS = $_GET['id'];
            
        }
        if($_GET['acao'] == 'editarCarsl'){
            $editCarrossel = 1;
            $idC = $_GET['id'];

        }
        
    }
?>
<div class="titulo_slide">
    SLIDE PÁGINA HOME
    <a href="?acao=inserirSlide">
        <input type="submit" value="Cadastrar" class="estilo_botao">
    </a>
</div>
<div class="content_slide">
    <?php
        if(isset($_GET['acao'])){
            if($_GET['acao'] == 'inserirSlide'){
        
    ?>
        <div class="imagem_slide">
            <img src="" class="img_slide">
            <form action="router.php?controller=home&modo=inserirSld" method="post" enctype="multipart/form-data">
                <p><input type="file" name="flSlide"></p>
                <input type="submit" name="btn_salvar">    
            </form>
            
        </div>
    <?php
            }
        }
    
    
    $controller = new ControllerHome();
    $rs = $controller->ListarImagensSlide();
    if($rs != null){
        $cont = 0;
        while($cont < count($rs)){
            $idSlide = $rs[$cont]->idSlide;
            $imagem = $rs[$cont]->imagem;
            
    ?>
    <div class="imagem_slide">
        <img src="../<?php echo $imagem ?>" class="img_slide">
        
        <?php
            if($editSlide != 0 && $idSlide == $idS){
        ?>
            <form action="router.php?controller=home&modo=editarSld&id=<?php echo $idSlide ?>" method="post" enctype="multipart/form-data">
                <p><input type="file" name="flSlide"></p>
                <input type="submit" name="btn_salvar">    
            </form>
        <?php
            }else{
        ?>
            <div class="EditarExcluir">
                <a href="adm_home.php?acao=editarSlide&id=<?php echo $idSlide ?>" class="left">
                     <img src="imagens/editar.png" class="icone"> 
                     Editar 
                </a>
                <a href="router.php?controller=home&modo=excluirSlide&id=<?php echo $idSlide ?>" class="right">
                    <img src="imagens/delete.png" class="icone"> 
                    Excluir
                </a>
            </div>
        <?php        
            }
        ?>
    </div>
    <?php
            $cont++;
        }
    }else{
        echo 'Não há imagens cadastradas';
        
    }
    ?>
</div>
<div id="content_menu">
    <?php
        $edit = false;
        $idMenu = 0;
        if(isset($_GET['acao'])){
            if($_GET['acao'] == 'editar'){
                $idMenu = $_GET['id'];
                $edit = true;
            }
        }
    
        $controller = new ControllerHome();
        $rs = $controller->ListarMenu();
        
        if($rs != null){
            
            $cont = 0;
            while($cont < count($rs)){
                $area = $rs[$cont]->area;
                
                if($area == '1'){
                    $id1 = $rs[$cont]->id;
                    $imagem1 = $rs[$cont]->imagem;
                    $titulo1 = $rs[$cont]->titulo;
                    $descricao1 = $rs[$cont]->descricao;
                }elseif($area == '2'){
                    $id2 = $rs[$cont]->id;
                    $imagem2 = $rs[$cont]->imagem;
                    $titulo2 = $rs[$cont]->titulo;
                    $descricao2 = $rs[$cont]->descricao;
                }elseif($area == '3'){
                    $id3 = $rs[$cont]->id;
                    $imagem3 = $rs[$cont]->imagem;
                    $titulo3 = $rs[$cont]->titulo;
                    $descricao3 = $rs[$cont]->descricao;
                }elseif($area == '4'){
                    $id4 = $rs[$cont]->id;
                    $imagem4 = $rs[$cont]->imagem;
                    $titulo4 = $rs[$cont]->titulo;
                    $descricao4 = $rs[$cont]->descricao;
                }elseif($area == '5'){
                    $id5 = $rs[$cont]->id;
                    $imagem5 = $rs[$cont]->imagem;
                    $titulo5 = $rs[$cont]->titulo;
                    $descricao5 = $rs[$cont]->descricao;
                }elseif($area == '6'){
                    $id6 = $rs[$cont]->id;
                    $imagem6 = $rs[$cont]->imagem;
                    $titulo6 = $rs[$cont]->titulo;
                    $descricao6 = $rs[$cont]->descricao;
                }elseif($area == '7'){
                    $id7 = $rs[$cont]->id;
                    $imagem7 = $rs[$cont]->imagem;
                    $titulo7 = $rs[$cont]->titulo;
                    $descricao7 = $rs[$cont]->descricao;
                }elseif($area == '8'){
                    $id8 = $rs[$cont]->id;
                    $imagem8 = $rs[$cont]->imagem;
                    $titulo8 = $rs[$cont]->titulo;
                    $descricao8 = $rs[$cont]->descricao;
                }                        
                    $cont++;
                }
                
            }
    ?>
        <div class="divisao_menu_1">
            <form action="router.php?controller=home&modo=editar&id=<?php echo $idMenu ?>&area=1" method="post" enctype="multipart/form-data" class="menu_img_1">
                <div class="img_1">
                    <img src="../<?php echo $imagem1 ?>" class="imagem">
                </div>
            <?php
                if($edit == false || $id1 != $idMenu){
            ?>
                <p> Titulo: <?php echo $titulo1 ?> </p>
                <p> Descricao: <?php echo $descricao1 ?> </p>
                <p> <a href="adm_home.php?acao=editar&id=<?php echo $id1 ?>">
                    Editar
                    </a>
                </p>
            <?php
                }else{
            ?>
                <p> <input type="file" name="flMenu"> </p>
                <p> Titulo: <input type="text" name="txtTitulo" value="<?php echo $titulo1 ?>"> </p>
                <p> Descricao: <input type="text" name="txtDescricao" value="<?php echo $descricao1 ?>"> </p>
                <p> <input type="submit" name="btnEditar" value="Editar"> </p>
             <?php
                    
                }
            ?>
            </form>
            <form action="router.php?controller=home&modo=editar&id=<?php echo $idMenu ?>&area=2" method="post" enctype="multipart/form-data" class="menu_img_2">
                <div class="img_2">
                    <img src="../<?php echo $imagem2 ?>" class="imagem">
                </div>
            <?php
                if($edit == false || $id2 != $idMenu){
            ?>
                <p> Titulo: <?php echo $titulo2 ?> </p>
                <p> Descricao: <?php echo $descricao2 ?> </p>
                <p> <a href="adm_home.php?acao=editar&id=<?php echo $id2 ?>">
                    Editar
                    </a>
                </p>
            <?php
                }else{
            ?>
                <p> <input type="file" name="flMenu"> </p>
                <p> Titulo: <input type="text" name="txtTitulo" value="<?php echo $titulo2 ?>"> </p>
                <p> Descricao: <input type="text" name="txtDescricao" value="<?php echo $descricao2 ?>"> </p>
                <p> <input type="submit" name="btnEditar" value="Editar"> </p>
             <?php
                    
                }
            ?>
            </form>
            <form action="router.php?controller=home&modo=editar&id=<?php echo $idMenu ?>&area=3" method="post" enctype="multipart/form-data" class="menu_img_2">
                <div class="img_2">
                    <img src="../<?php echo $imagem3 ?>" class="imagem">
                </div>
            <?php
                if($edit == false || $id3 != $idMenu){
            ?>
                <p> Titulo: <?php echo $titulo3 ?> </p>
                <p> Descricao: <?php echo $descricao3 ?> </p>
                <p> <a href="adm_home.php?acao=editar&id=<?php echo $id3 ?>">
                    Editar
                    </a>
                </p>
            <?php
                }else{
            ?>
                <p> <input type="file" name="flMenu"> </p>
                <p> Titulo: <input type="text" name="txtTitulo" value="<?php echo $titulo3 ?>"> </p>
                <p> Descricao: <input type="text" name="txtDescricao" value="<?php echo $descricao3 ?>"> </p>
                <p> <input type="submit" name="btnEditar" value="Editar"> </p>
             <?php
                    
                }
            ?>
            </form>
        </div>
        <div class="divisao_menu_2">
            <form action="router.php?controller=home&modo=editar&id=<?php echo $idMenu ?>&area=4" method="post" enctype="multipart/form-data" class="menu_img_3">
                <div class="img_3">
                    <img src="../<?php echo $imagem4 ?>" class="imagem">
                </div>
            <?php
                if($edit == false || $id4 != $idMenu){
            ?>
                <p> Titulo: <?php echo $titulo4 ?> </p>
                <p> Descricao: <?php echo $descricao4 ?> </p>
                <p> <a href="adm_home.php?acao=editar&id=<?php echo $id4 ?>">
                    Editar
                    </a>
                </p>
            <?php
                }else{
            ?>
                <p> <input type="file" name="flMenu"> </p>
                <p> Titulo: <input type="text" name="txtTitulo" value="<?php echo $titulo4 ?>"> </p>
                <p> Descricao: <input type="text" name="txtDescricao" value="<?php echo $descricao4 ?>"> </p>
                <p> <input type="submit" name="btnEditar" value="Editar"> </p>
             <?php
                    
                }
            ?>
            </form>
            <div class="content_img_4">
                <form action="router.php?controller=home&modo=editar&id=<?php echo $idMenu ?>&area=5" method="post" enctype="multipart/form-data" class="menu_img_4">
                    <div class="img_4">
                        <img src="../<?php echo $imagem5 ?>" class="imagem">
                    </div>
                <?php
                    if($edit == false || $id5 != $idMenu){
                ?>
                    <p> Titulo: <?php echo $titulo5 ?> </p>
                    <p> Descricao: <?php echo $descricao5 ?> </p>
                    <p> <a href="adm_home.php?acao=editar&id=<?php echo $id5 ?>">
                        Editar
                        </a>
                    </p>
                <?php
                    }else{
                ?>
                    <p> <input type="file" name="flMenu"> </p>
                    <p> Titulo: <input type="text" name="txtTitulo" value="<?php echo $titulo5 ?>"> </p>
                    <p> Descricao: <input type="text" name="txtDescricao" value="<?php echo $descricao5 ?>"> </p>
                    <p> <input type="submit" name="btnEditar" value="Editar"> </p>
                 <?php

                    }
                ?>
                </form>
                <form action="router.php?controller=home&modo=editar&id=<?php echo $idMenu ?>&area=6" method="post" enctype="multipart/form-data" class="menu_img_4">
                    <div class="img_4">
                        <img src="../<?php echo $imagem6 ?>" class="imagem">
                    </div>
                <?php
                    if($edit == false || $id6 != $idMenu){
                ?>
                    <p> Titulo: <?php echo $titulo6 ?> </p>
                    <p> Descricao: <?php echo $descricao6 ?> </p>
                    <p> <a href="adm_home.php?acao=editar&id=<?php echo $id6 ?>">
                        Editar
                        </a>
                    </p>
                <?php
                    }else{
                ?>
                    <p> <input type="file" name="flMenu"> </p>
                    <p> Titulo: <input type="text" name="txtTitulo" value="<?php echo $titulo6 ?>"> </p>
                    <p> Descricao: <input type="text" name="txtDescricao" value="<?php echo $descricao6 ?>"> </p>
                    <p> <input type="submit" name="btnEditar" value="Editar"> </p>
                 <?php

                    }
                ?>
                </form>
            </div>
            <div class="content_img_4">
                <form action="router.php?controller=home&modo=editar&id=<?php echo $idMenu ?>&area=7" method="post" enctype="multipart/form-data" class="menu_img_4">
                    <div class="img_4">
                        <img src="../<?php echo $imagem7 ?>" class="imagem">
                    </div>
                <?php
                    if($edit == false || $id7 != $idMenu){
                ?>
                    <p> Titulo: <?php echo $titulo7 ?> </p>
                    <p> Descricao: <?php echo $descricao7 ?> </p>
                    <p> <a href="adm_home.php?acao=editar&id=<?php echo $id7 ?>">
                        Editar
                        </a>
                    </p>
                <?php
                    }else{
                ?>
                    <p> <input type="file" name="flMenu"> </p>
                    <p> Titulo: <input type="text" name="txtTitulo" value="<?php echo $titulo7 ?>"> </p>
                    <p> Descricao: <input type="text" name="txtDescricao" value="<?php echo $descricao7 ?>"> </p>
                    <p> <input type="submit" name="btnEditar" value="Editar"> </p>
                 <?php

                    }
                ?>
                </form>
                <form action="router.php?controller=home&modo=editar&id=<?php echo $idMenu ?>&area=8" method="post" enctype="multipart/form-data" class="menu_img_4">
                    <div class="img_4">
                        <img src="../<?php echo $imagem8 ?>" class="imagem">
                    </div>
                <?php
                    if($edit == false || $id8 != $idMenu){
                ?>
                    <p> Titulo: <?php echo $titulo8 ?> </p>
                    <p> Descricao: <?php echo $descricao8 ?> </p>
                    <p> <a href="adm_home.php?acao=editar&id=<?php echo $id8 ?>">
                        Editar
                        </a>
                    </p>
                <?php
                    }else{
                ?>
                    <p> <input type="file" name="flMenu"> </p>
                    <p> Titulo: <input type="text" name="txtTitulo" value="<?php echo $titulo8 ?>"> </p>
                    <p> Descricao: <input type="text" name="txtDescricao" value="<?php echo $descricao8 ?>"> </p>
                    <p> <input type="submit" name="btnEditar" value="Editar"> </p>
                 <?php

                    }
                ?>
                </form>
            </div>
        </div>
</div>
<div class="titulo_slide" id="carrossel">
    CARROSSEL PÁGINA HOME
    <a href="?acao=inserirCarrossel#carrossel">
        <input type="submit" value="Cadastrar" class="estilo_botao">
    </a>
</div>
<div class="content_slide">
    <?php
        if(isset($_GET['acao'])){
            if($_GET['acao'] == 'inserirCarrossel'){
        
    ?>
        <div class="imagem_slide">
            <img src="" class="img_carrossel">
            <form action="router.php?controller=home&modo=inserirCrsl" method="post" enctype="multipart/form-data">
                <p><input type="file" name="flCarrossel"></p>
                <input type="submit" name="btn_salvar">    
            </form>
            
        </div>
    <?php
            }
        }
    
    $controller = new ControllerHome();
    $rs = $controller->ListarImagensCarrossel();
    if($rs != null){
        $cont = 0;
        while($cont < count($rs)){
            $idCarsl = $rs[$cont]->idCarrossel;
            $imagem = $rs[$cont]->imagem;
            
    ?>
    <div class="imagem_carrossel">
        <img src="../<?php echo $imagem ?>" alt="" class="img_carrossel">
        
        <?php
            if($editCarrossel != 0 && $idCarsl == $idC){
        ?>
            <form action="router.php?controller=home&modo=editarCarsl&id=<?php echo $idCarsl ?>" method="post" enctype="multipart/form-data">
                <p><input type="file" name="flCarrossel"></p>
                <input type="submit" name="btn_salvar">    
            </form>
        <?php
            }else{
        ?>
            <div class="EditarExcluir">
                <a href="adm_home.php?acao=editarCarsl&id=<?php echo $idCarsl ?>#carrossel" class="left">
                     <img src="imagens/editar.png" class="icone"> 
                     Editar 
                </a>
                <a href="router.php?controller=home&modo=excluirCarsl&id=<?php echo $idCarsl ?>" class="right">
                    <img src="imagens/delete.png" class="icone"> 
                    Excluir
                </a>
            </div>
        
        <?php        
            }
        ?>
    </div>
    <?php
            $cont++;
        }
    }else{
        echo 'Não há imagens cadastradas';
        
    }
    
    ?>
</div>