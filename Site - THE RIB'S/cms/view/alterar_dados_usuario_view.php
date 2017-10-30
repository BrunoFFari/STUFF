<div id="cabecalho_titulo">
    ALTERAR DADOS DO USUÁRIO
</div>
<?php
    require_once('controller/alterar_dados_usuario_controller.php');
    require_once('model/alterar_dados_usuario_class.php');
    $controller = new ControllerAlterarDadosUsuario();
    $rs = $controller->ListarDadosUsuario($idUsuario);
    
    $cont = 0;
    while($cont < count($rs)){
        $nome = $rs->nome;
        $cpf = $rs->cpf;
        $telefone = $rs->telefone;
        $celular = $rs->celular;
        $foto = '../'.$rs->foto;
        $email = $rs->email;
        $senha = $rs->senha;
        $cep = $rs->cep;
        $rua = '---'; //$rs->rua;
        $numero = $rs->numero;
        $bairro = $rs->bairro;
        $logradouro = $rs->logradouro;
        $complemento = $rs->complemento;
        $id_cidade_select = $rs->id_cidade;
        $cont++;
    }
    
?>
<form method="post" action="router.php?controller=usuario&modo=alterar&id=<?php echo $idUsuario ?>" enctype="multipart/form-data">
    <div id="conteudo_imagem">
        <div class="content_foto">
            <div class="foto_perfil" style="background-image:url(<?php echo $foto ?>);">
                <a href="?edit=FotoPerfil" class="editar_foto">
                    Editar
                </a>
            </div>

            <?php
                if(!empty($_GET['edit'])){
                    if($_GET['edit'] == 'FotoPerfil'){
            ?>
                <p><input type="file" name="flFoto"></p>
            <?php
                    }
                }
            ?>
        </div>
        <div class="cadastrar_redes_sociais">
            Você também pode cadastrar suas redes sociais

        </div>
        <div class="icone_circulo"></div>
    </div>
    <div id="dados_usuario">
        <div class="dados_cadastrados">
            <p> Nome: </p>
            <p> <input type="text" name="txtNome" size="30" value="<?php echo $nome ?>"> </p>
            <p> CPF: </p>
            <p> <input type="text" name="txtCpf" size="30" value="<?php echo $cpf ?>"> </p>
            <p> Telefone: </p>
            <p> <input type="text" name="txtTelefone" size="30" value="<?php echo $telefone ?>"> </p>
            <p> Celular: </p>
            <p> <input type="text" name="txtCelular" size="30" value="<?php echo $celular ?>"> </p>
            <p> 
                <input type="submit" value="Salvar" class="botao"> 
            </p>
        </div>
        <div class="dados_cadastrados">
            <p> E-mail: </p>
            <p> <input type="text" name="txtEmail" size="30" value="<?php echo $email ?>"> </p>
            <p> CEP: </p>
            <p> <input type="text" name="txtCep" size="30" value="<?php echo $cep ?>"> </p>
            <p> Estado: </p>
            <p> <select name="slct_estado">
                    <option value="0"> Selecione </option>
                    <?php 
                        $controller = new ControllerAlterarDadosUsuario();
                        $rs = $controller->ListarEstados();

                        if($rs != null){
                            $cont=0;
                            while($cont < count($rs)){
                                $id_estado = $rs[$cont]->id_estado;
                                $estado = $rs[$cont]->estado;
                                $select = 'selected';

                    ?>
                        <option value="<?php echo $id_estado ?>" <?php echo $select ?>> <?php echo $estado; ?> </option>
                    <?php
                                $cont++;
                            }
                        }
                    ?>
                </select> 
            </p>
            <p> Cidade: </p>
            <p> <select name="slct_cidade">
                <option value="0"> Selecione </option>
                <?php 
                    $controller = new ControllerAlterarDadosUsuario();
                    $rs = $controller->ListarCidades();
                    
                    if($rs != null){
                        $cont=0;
                        while($cont < count($rs)){
                            $id_cidade = $rs[$cont]->id_cidade;
                            $cidade = $rs[$cont]->cidade;
                            $select = '';
                            
                            if($id_cidade_select == $id_cidade){
                                $select = 'selected';
                            }
                ?>
                    <option value="<?php echo $id_cidade ?>" <?php echo $select ?>> <?php echo $cidade; ?> </option>
                <?php
                            $cont++;
                        }
                    }
                ?>
                </select> 
            </p>
        </div>
        <div class="dados_cadastrados">
            <p> Bairro: </p>
            <p> <input type="text" name="txtBairro" size="30" value="<?php echo $bairro ?>"> </p>
            <p> Logradouro: </p>
            <p> <input type="text" name="txtLogradouro" size="30" value="<?php echo $logradouro ?>"> </p>
            <p> Complemento: </p>
            <p> <input type="text" name="txtComplemento" size="30" value="<?php echo $complemento ?>"> </p>
            <div class="lado">
                <p>  N°: </p>
                <p> <input type="text" name="txtNumero" size="1" value="<?php echo $numero ?>"> </p>
            </div>
        </div>
    </div>
</form>
<form method="post" action="router.php?controller=usuario&modo=senha&id=<?php echo $idUsuario ?>" class="dados_cadastrados">
    <p> Editar Senha: </p>
    <?php
        if(!empty($_GET['edit'])){
            if(($_GET['edit'] == 'senha')){
                
    ?>
            <p> Senha atual: </p>
            <p> <input type="text" name="txtAtual" size="30"> </p>
            <p> Nova senha: </p>
            <p> <input type="text" name="txtNova" size="30"> </p>
            <p> Confirmar senha: </p>
            <p> <input type="text" name="txtRepetir" size="30"> </p>
            <p> 
                <input type="submit" value="Salvar" class="botao"> 
                <a href="alterar_dados_usuario.php">
                    Cancelar
                </a>
            </p>
    <?php 
            }
        }else{
            
    ?>
        <p> Senha: 
            <?php 
            $cont = 0;
            while($cont < strlen($senha)){
                echo '*';
                $cont++;
            } ?> 
        </p>
        <p><a href="?edit=senha"> Editar </a></p>
   
    <?php
        }
    ?>
    
</form>
    
    