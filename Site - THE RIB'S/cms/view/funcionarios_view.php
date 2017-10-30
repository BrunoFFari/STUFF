<?php
    require_once('controller/funcionarios_controller.php');

    $modo = 'inserir';
    $botao = 'Salvar';

    $id = '';
    $codigo = '';
    $id_filial_sclt = '';
    $id_funcao_sclt = '';
    $nome = '';
    $email = '';
    $senha = '';
    $celular = '';
    $imagem = '';

    if(isset($_GET['editar'])){
        $id = $_GET['id'];
        $modo = 'alterar&id='.$id;
        $botao = 'Editar';
        
        $controller = new ControllerFuncinarios();
        $rs = $controller->SelecionarFuncionario($id);
        
        $cont = 0;
        while($cont < count($rs)){
            $id = $rs->id;
            $codigo = $rs->codigo;
            $id_filial_sclt = $rs->id_filial;
            $id_funcao_sclt = $rs->id_funcao;
            $nome = $rs->nome;
            $email = $rs->email;
            $senha = $rs->senha;
            $celular = $rs->celular;
            $imagem = $rs->foto;
            
            $cont++;
        }
        
    }
    
?>
    <form method="post" action="router.php?controller=funcionario&modo=<?php echo $modo ?>" enctype="multipart/form-data" class="lado">
        <div class="content_divisao">
            <div class="lado">
                <div class="ver_foto_funcionario">
                    <img src="../<?php echo $imagem ?>" alt="">
                </div>
                <input type="file" name="flFoto">
            </div>
            <div class="content_dados_funcionario">
                <p> Código </p>
                <input type="text" name="txtCodigo" value="<?php echo $codigo ?>" size="8">
                <div>
                    <div class="clear">
                        <p> Função: </p>
                        <select name="slct_funcao">
                            <option value='0'> Selecione </option>
                            
                            <?php
                                $controller = new ControllerFuncinarios();
                                $rs = $controller->ListarFuncoes();
                                
                                if($rs != null){
                                    $cont = 0;
                                    while($cont < count($rs)){
                                        $id_funcao = $rs[$cont]->id_funcao;
                                        $funcao = $rs[$cont]->funcao;
                                        $s = '';
                                        if($id_funcao_sclt == $id_funcao){
                                            $s = 'selected';
                                        }
                            ?>
                            
                                    <option value="<?php echo $id_funcao ?>" <?php echo $s ?>> 
                                        <?php echo $funcao ?> 
                                    </option>
                            
                            <?php
                                    
                                        $cont++;
                                    }
                                }
                            ?>
                            
                        </select>
                    </div>
                    <div class="clear">
                        <p> Filial: </p>
                        <select name="slct_filial">
                            <option value='0'> Selecione </option>
                            
                            <?php
                                $controller = new ControllerFuncinarios();
                                $result = $controller->ListarFiliais();
                                
                                if($result != null){
                                    $cont = 0;
                                    while($cont < count($result)){
                                        $id_filial = $result[$cont]->id_filial;
                                        $filial = $result[$cont]->filial;
                                        $s = '';
                                        if($id_filial_sclt == $id_filial){
                                            $s = 'selected';
                                        }
                            ?>
                            
                                    <option value="<?php echo $id_filial ?>" <?php echo $s ?>> 
                                        <?php echo $filial ?> 
                                    </option>
                            
                            <?php
                                    
                                        $cont++;
                                    }
                                }
                            ?>
                            
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="content_divisao">
            <div class="content_dados_funcionario"> 
                
                <p> Nome: </p>
                <input type="text" name="txtNome" value="<?php echo $nome ?>" size="30">
                <p> E-mail: </p>
                <input type="text" name="txtEmail" value="<?php echo $email ?>" size="30">
                <p> Senha: </p>
                <input type="text" name="txtSenha" value="<?php echo $senha ?>" size="30">
                <p> Celular: </p>
                <input type="text" name="txtCelular" value="<?php echo $celular ?>" size="30">
                    
            </div>
            <?php 
            
            if(!empty($_GET['erro'])){
                if($_GET['erro'] == 'codigo'){
            ?>
            <div class="content_dados_funcionario"> 
                
                <center><span style="color:#9c0404"> Este código pertence a outro funcionário </span></center>
                <br>
                <center> <a href="adm_funcionarios.php" class="botao"> OK </a> </center>
            </div>
                
            <?php
                }
                
            }
            
            ?>
        </div>
        <div class="clear">
            <p> <input type="submit" name="btnSalvar" class="botao" value="<?php echo $botao ?>"> 
            <?php
              if($botao == 'Editar'){  
            ?>
                <span>
                    <a href="router.php?controller=funcionario&modo=excluir&id=<?php echo $id ?>">
                        Excluir 
                    </a>
                </span>
            </p>
                
            <?php } ?>
        </div>
        
    </form>
    <div id="todos_funcionario">
        <p class="titulo"> Funcionários já cadastrados </p>
        <div id="lista_funcionarios">
            <table class="tbl_funcionarios">
                <tr class="titulo_tbl">
                    <td>NOME</td><td>FILIAL</td><td>FUNÇÃO</td><td>MAIS</td>
                </tr>
            
        <?php
            $controller = new ControllerFuncinarios();
            $rs = $controller->ListarFuncionarios();
            
            if($rs != null){
                $cont = 0;
                while($cont < count($rs)){
        ?>
                <tr>
                    <td><?php echo $rs[$cont]->nome ?></td>
                    <td><?php echo $rs[$cont]->filial ?></td>
                    <td><?php echo $rs[$cont]->funcao ?></td>
                    <td>
                        <a href="?editar&id=<?php echo $rs[$cont]->id ?>">
                            VER 
                        </a>
                    </td>
                </tr>
                            
        <?php
                $cont++;
                    
                }
            }
            
        ?>
            </table>
            
        </div>
    </div>


