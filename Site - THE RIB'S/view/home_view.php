<?php
    require_once('controller/home_controller.php');
?>
<div id="conteinner-home">
            <a href="#conteinner-menu">
                <div id="indicador">
                <img src="imagens/seta_baixo2.gif" alt="indicador" />
            </div>
            </a>

            <div id="slider-show">
                <div id="slider">
                    <a href="#" id="prev">
                        <img src="slides/seta.png" alt="seta" />

                    </a>
                    <a href="#" id="next">
                        <img src="slides/seta.png" alt="seta" />
                    </a>
                    <center>
                    <ul>
                    <?php
                        $controller = new ControllerHome();
                        $rs = $controller->ListarSlide();
                        
                        if($rs != null){
                            
                            $cont = 0;
                            while($cont < count($rs)){
                                $imgSlide = $rs[$cont]->imagemSlide;
                    ?>
                            <li class="one" style="background-image:url('<?php echo $imgSlide ?>')">
                                <div class="centralizar">
                                    <div class="row"><h1>Venha garantir seu brinde!</h1></div>
                                    <div class="row"><p>Cadastre sua nota fiscal aqui, e ganhe um super brinde!</p></div>
                                     <form name="frmSlider" action="#">
                                        <button> Saiba como chegar </button>
                                        <button> Reserve Já </button>
                                    </form>
                                </div>
                            </li>
                    <?php
                                $cont++;
                            }
                            
                        }else{
                        
                    ?>
                            <li class="one" style="background-image:url('slides/3.jpg')">
                                <div class="centralizar">
                                    <div class="row"><h1>Venha garantir seu brinde!</h1></div>
                                    <div class="row"><p>Cadastre sua nota fiscal aqui, e ganhe um super brinde!</p></div>
                                     <form name="frmSlider" action="#">
                                        <button> Saiba como chegar </button>
                                        <button> Reserve Já </button>
                                    </form>
                                </div>
                            </li>
                    <?php
                        }
                    ?>
                    </ul>
                  </center>
              </div>
            </div>

        </div>
        <div id="conteinner-menu">
            <div id="coisas-conteinner-menu">
                <div id="menu">
            <?php
                $menu_controller = new ControllerHome();
                $rs = $menu_controller->ListarMenu();
                
                if($rs != null){
                    $cont = 0;
                    while($cont < count($rs)){
                        $titulo[$cont] = $rs[$cont]->titulo;
                        $descricao[$cont] = $rs[$cont]->descricao;
                        $cont++;
                    }
                
            ?>
                
                  <a href="index.php?filiais">
                    <div id="menu-filiais">
                      <div class="imagem-menu-filiais">

                      </div>
                      <div class="animation-menu">
                        <div class="titulo-animation">
                            <?php echo $titulo[0] ?>
                        </div>
                        <div class="descricao-animation">
                          <?php echo $descricao[0] ?>
                        </div>
                      </div>
                    </div>
                  </a>
                  <a href="login.php">
                    <div id="menu-cadastro">
                      <div class="imagem-menu-filiais">

                      </div>
                      <div class="animation-menu">
                        <div class="titulo-animation">
                            <?php echo $titulo[1] ?>
                        </div>
                        <div class="descricao-animation">
                          <?php echo $descricao[1] ?>
                        </div>
                      </div>
                    </div>
                  </a>
                  <a href="contato.php">
                    <div id="menu-contato">
                      <div class="imagem-menu-filiais">

                      </div>
                      <div class="animation-menu">
                        <div class="titulo-animation">
                            <?php echo $titulo[2] ?>
                        </div>
                        <div class="descricao-animation">
                          <?php echo $descricao[2] ?>
                        </div>
                      </div>
                    </div>
                  </a>
                  <a href="cardapio.php">
                    <div id="menu-cardapio">
                      <div class="imagem-menu-filiais-cardapio">

                      </div>
                      <div class="animation-menu-cardapio">
                        <div class="titulo-animation">
                            <?php echo $titulo[3] ?>
                        </div>
                        <div class="descricao-animation">
                          <?php echo $descricao[3] ?>
                        </div>
                      </div>
                    </div>
                  </a>
                  <a href="sobre.php">
                    <div id="menu-sobre">
                      <div class="imagem-menu-filiais-sobre">

                      </div>
                      <div class="animation-menu-sobre">
                        <div class="titulo-animation">
                            <?php echo $titulo[4] ?>
                        </div>
                        <div class="descricao-animation">
                          <?php echo $descricao[4] ?>
                        </div>
                      </div>
                    </div>
                  </a>
                  <a href="reservas.php">
                    <div id="menu-reservas">
                      <div class="imagem-menu-filiais-sobre">

                      </div>
                      <div class="animation-menu-sobre">
                        <div class="titulo-animation">
                            <?php echo $titulo[5] ?>
                        </div>
                        <div class="descricao-animation">
                          <?php echo $descricao[5] ?>
                        </div>
                      </div>
                    </div>
                  </a>
                  <a href="galeria.php">
                    <div id="menu-galeria">
                      <div class="imagem-menu-filiais-sobre">

                      </div>
                      <div class="animation-menu-sobre">
                        <div class="titulo-animation">
                            <?php echo $titulo[6] ?>
                        </div>
                        <div class="descricao-animation">
                          <?php echo $descricao[6] ?>
                        </div>
                      </div>
                    </div>
                  </a>
                  <a href="#">
                    <div id="menu-eventos">
                      <div class="imagem-menu-filiais-sobre">

                      </div>
                      <div class="animation-menu-sobre">
                        <div class="titulo-animation">
                            <?php echo $titulo[7] ?>
                        </div>
                        <div class="descricao-animation">
                          <?php echo $descricao[7] ?>
                        </div>
                      </div>
                    </div>
                  </a>

                
                <?php
                
                }else{
                    require_once('view/home_menu_view.html');
                
                }
                
                ?>
                </div>
                <div id="mini-galeria">
                  <div id="content">
                    <div id="menu-carrossel">
                        <a href="#" class="prev" title="Anterior">
                            <img src="imagens/seta1.png" />
                        </a>
                      </div>
                      <div id="carrossel">
                        <ul>
                        <?php
                            $controller = new ControllerHome();
                            $rs = $controller->ListarCarrossel();

                            if($rs != null){

                                $cont = 0;
                                while($cont < count($rs)){
                                    $imgCarrossel = $rs[$cont]->imagemCarrossel;
                        ?>
                                  <li>
                                    <img src="<?php echo $imgCarrossel ?>"/>
                                  </li>
                        <?php
                                $cont++;
                                }
                            }
                        ?>
                        </ul>
                      </div>
                      <div id="menu-carrossel">
                        <a href="#" class="next" title="Próximo">
                            <img src="imagens/seta2.png" />
                        </a>
                      </div>
                    </div>

                </div>

            </div>
        </div>
        <div id="conteinner-mapa">
            <img src="imagens/mapa_home_out.png" alt="Mapa temp" onmouseover="ImagemOver(this)" onmouseout="ImagemOut(this)">
            <!--
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3658.1099290529214!2d-46.90018408452954!3d-23.528548284699124!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94cf0154039cb55b%3A0xadf34a919f156950!2sSENAI+-+Professor+Vicente+Amato!5e0!3m2!1spt-BR!2sbr!4v1505846892409"  frameborder="0" style="border:0" allowfullscreen></iframe>
            -->
        </div>
