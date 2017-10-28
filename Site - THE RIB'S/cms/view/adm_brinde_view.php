<div class="conteudo_brinde">
  <div class="campo-cadastro_brinde">

    <div class="nome">
        <input name="txtNome" class="login_senha" placeholder="Nome do brinde" value="" type="text" maxlength="50" />
        <span class="bar_nome"> </span>
    </div>
    <div class="input_valor">

      <select class="select" name="slcValor">
        <?php
          require_once("controller/brinde_controller.php");

          $lista_brinde = new ControllerBrinde();
          $result_set = $lista_brinde->ListarValor();
          $contador = 0;
          echo(count($result_set));
          while($contador < count($result_set)){

         ?>
            <option value=""> <?php echo($result_set[$contador]->min."-".$result_set[$contador]->valor_max)?></option>

        <?php
          $contador++ ;
          }
       ?>
       </select>


    </div>


    <textarea placeholder="Digite o texto" class="textarea" name="txtDescricao" rows="8" cols="80"></textarea>

    <div class="campo_imagem">



      <input class="input_imagem" type="file" name="filefotos" value="">
    </div>

    <div class="campo_do_botao">

        <button class="btn_cadastrar" type="submit" name="btn_alterar" > Cadastrar </button>

    </div>

  </div>

  <div class="campo_brindes_cadastrados">

    <p class="titulo_brinde_cadastrado">Brindes Cadastrados</p>

    <div class="brindes_cadastrados">

      <label class="nome_banco_brinde"> Nome :</label>

      <label class="nome_vem_do_banco"> Carrinho de mão fafa</label>

      <div class="imagem_vem_do_banco">

      </div>

    </div>
  </div>



  </div>
