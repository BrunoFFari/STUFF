<?php
    require_once('controller/cardapio_controller.php');

?>

<div id="principal">
    <div id="content_pratos">
        <div class="titulo_cardapio">
            Nossas Categorias
        </div>

        <div class="divisao_imagens">
            <div class="img_pratos">
                <img src="imagens/img1.jpg" alt="prato">
            </div>
            <div class="img_pratos">
                <img src="imagens/img2.jpg" alt="prato">
            </div>
            <div class="img_pratos">
                <img src="imagens/img3.jpg" alt="prato">
            </div>

        </div>
        <div class="divisao_imagens">
            <div class="img_pratos">
                <img src="imagens/img1.jpg" alt="prato">
            </div>
            <div class="img_pratos">
                <img src="imagens/img2.jpg" alt="prato">
            </div>
            <div class="img_pratos">
                <img src="imagens/img3.jpg" alt="prato">
            </div>
        </div>
    </div>
    <div id="content_prato_categoria">

		<!-- Exibir através do slide um prato de cada categoria -->
		<div id="slide_categoria-pratos">

				<!-- Começo dos Slides-->
            <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">
                <img src="imagens/seta1.png"/>
            </button>
            <div class="w3-content w3-display-container">
				<div class="mySlides">
                    <div class="titulo_categoria_prato">
                        Steaks
                    </div>
                    <div class="w3_content_imagem">
                        <img src="imagens/img9.jpg">
                    </div>
                    <div class="w3_titulo">
                        ROCKHAMPTON RIBEYE

                    </div>
                    <div class="w3_content_detalhes">
                        <div class="w3_descricao_prato">
                            325g da parte mais gostosa da rib bovina, com o bold flavour inconfundível da nossa mistura secreta de temperos. Na chapa, com tempero tradicional, ou em chama aberta, com o tempero Chargrill condimentado com toque de café.
                        </div>
                        <div class="w3_ingredientes">
                            <p>Ingredientes:</p>
                            O prato é composto por carne bovina
                        </div>
                        <div class="w3_avaliacao">
                            <p> Avalie este prato!</p>
                            <table class="avaliar_prato">
                                <tr>
                                    <td><img src="imagens/estrela.png"> </td>
                                    <td><img src="imagens/estrela.png"> </td>
                                    <td><img src="imagens/estrela.png"> </td>
                                    <td><img src="imagens/estrela.png"> </td>
                                    <td><img src="imagens/estrela.png"> </td>
                                </tr>
                            </table>

                        </div>
                    </div>
                </div>
                <div class="mySlides">
                    <div class="titulo_categoria_prato">
                        Bebidas
                    </div>
                    <div class="w3_content_imagem">
                        <img src="imagens/img10.jpg">
                    </div>
                    <div class="w3_titulo">
                        ICED TEAS
                    </div>
                    <div class="w3_content_detalhes">
                        <div class="w3_descricao_prato">
                            Bebida sem alcool
                        </div>
                        <div class="w3_ingredientes">
                            <p>Ingredientes:</p>
                            Limão, Pêssego e Cranberry
                        </div>
                        <div class="w3_avaliacao">
                            <p> Avalie este prato!</p>
                            <table class="avaliar_prato">
                                <tr>
                                    <td><img src="imagens/estrela.png"> </td>
                                    <td><img src="imagens/estrela.png"> </td>
                                    <td><img src="imagens/estrela.png"> </td>
                                    <td><img src="imagens/estrela.png"> </td>
                                    <td><img src="imagens/estrela.png"> </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="mySlides">
                    <div class="titulo_categoria_prato">
                        Lunch
                    </div>
                    <div class="w3_content_imagem">
                        <img src="imagens/img8.jpg">
                    </div>
                    <div class="w3_titulo">
                        SALADA CAESAR

                    </div>
                    <div class="w3_content_detalhes">
                        <div class="w3_descricao_prato">
                            A clássica salada Caesar, servida em todas as nossas filais incrivelmente saborosa.
                        </div>
                        <div class="w3_ingredientes">
                            <p>Ingredientes:</p>
                            <p> -Alface</p>
                            <p> -Filés de anchovas</p>
                            <p> -Maionese</p>
                            <p> -Suco de limão</p>

                        </div>
                        <div class="w3_avaliacao">
                            <p> Avalie este prato!</p>
                            <table class="avaliar_prato">
                                <tr>
                                    <td><img src="imagens/estrela.png"> </td>
                                    <td><img src="imagens/estrela.png"> </td>
                                    <td><img src="imagens/estrela.png"> </td>
                                    <td><img src="imagens/estrela.png"> </td>
                                    <td><img src="imagens/estrela.png"> </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>


            </div>
            <button class="w3-button w3-black w3-display-right" style="margin-left:-55px;" onclick="plusDivs(1)">
                <img src="imagens/seta2.png"/>
            </button>
            <script>/* Slide manual */
				var slideIndex = 1;
				showDivs(slideIndex);

				function plusDivs(n) {
				    showDivs(slideIndex += n);
				}

				function showDivs(n) {
				var i;
				var x = document.getElementsByClassName("mySlides");
				if (n > x.length) {slideIndex = 1}
				if (n < 1) {slideIndex = x.length}
                    for (i = 0; i < x.length; i++) {
                        x[i].style.display = "none";
                    }
				    x[slideIndex-1].style.display = "block";
				}
            </script>

		</div>
    </div>
    <div id="content_categorias">

        <!--_____________________________-->
        <!--_______*´'  slide '`*_______ -->
        
        <?php
            $controller = new ControllerCardapio();
            $rs = $controller->ListarCategorias();
        
            if($rs != null){
                $cont = 0;
                while($cont < count($rs)){
                    $id = $rs[$cont]->idCategoria;
        ?>
                <div class="titulo_categorias">
                    <?php echo $rs[$cont]->tituloCategoria ?>
                </div>
                <?php
                    $controller = new ControllerCardapio();
                    $result = $controller->ListarPratosCategoria($id);
                    $nmrcont = count($result);
                    
                    if($nmrcont > 3){
                        
                ?>
                        <div class="content">
                            <div class="menu-carrossel">
                                <a href="#" class="prev" id="prev<?php echo $cont ?>" title="Anterior">
                                    <img src="imagens/seta1.png" />
                                </a>
                            </div>
                            <div class="carrossel" id="carrossel<?php echo $cont ?>">
                                <ul>
                                <?php

                                    if($result != null){
                                        $contad = 0;
                                        while($contad < count($result)){
                                ?>
                                    <li>
                                        <img src="<?php echo $result[$contad]->imagem ?>"/>
                                      <div class="detalhes_prato_carrossel">
                                          <?php echo $result[$contad]->titulo ?>
                                      </div>
                                    </li>
                                <?php
                                        $contad++;
                                        }
                                    }
                                ?>
                                </ul>
                            </div>
                            <div class="menu-carrossel">
                                <a href="#" class="next" id="next<?php echo $cont ?>" title="Próximo">
                                    <img src="imagens/seta2.png" />
                                </a>
                            </div>
                        </div>
                        <script src="js/jquery.min.js"></script>
                        <script type="text/javascript" src="js/jcarousellite.js"></script>
                        <script>
                            $(function() {
                                $("#carrossel<?php echo $cont ?>"). jCarouselLite({
                                    btnPrev: '#prev<?php echo $cont ?>',
                                    btnNext: '#next<?php echo $cont ?>',
                                    visible: 5
                                })
                            })
                        </script>
        <?php
                    }else{    
        ?>
                    <div class="pratos_carrossel">
                        <ul>
                            <?php
                                if($result != null){
                                    $contad = 0;
                                    while($contad < count($result)){
                            ?>
                                <li>
                                    <img src="<?php echo $result[$contad]->imagem ?>"/>
                                    <div class="detalhes_prato_carrossel">
                                        <?php echo $result[$contad]->titulo ?>
                                    </div>
                                </li>
                            <?php
                                        $contad++;
                                    }
                                }
                            ?>
                        </ul>
                    </div>
        <?php
                    }
                    $cont++;
                }
            }
        ?>
    </div>

</div>
