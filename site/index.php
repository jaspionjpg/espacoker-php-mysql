<!DOCTYPE html>

<?php session_start();
include_once "../sistema/Entidades/Entity_SlidePrincipal.php";
include_once "../sistema/Entidades/Entity_Destaques.php";

$slid = new Entity_SlidePrincipal();
$slidd = new Entity_Destaques();

?>
        <meta charset="utf-8">

<html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title>Agendamento Online</title>
    	<meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <a href="css/glyphicons_free/__MACOSX/._glyphicons_free"></a>
    <a href="css/glyphicons_free/__MACOSX/glyphicons_free/._glyphicons"></a>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
        
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/font-awesome.css">
        <link rel="stylesheet" href="css/animate.css">
        <link rel="stylesheet" href="css/templatemo_misc.css">
        <link rel="stylesheet" href="css/templatemo_style.css">
        <script src="js/vendor/modernizr-2.6.1-respond-1.1.0.min.js"></script>

        <link rel="stylesheet" type="text/css" href="../sistema/css/sweetalert.css">
        <script src="../sistema/js/sweetalert.min.js"></script>
       
       
    </head>
    <body style="background-color:gainsboro;">
 <?php 
if(!empty($_GET['log']))
if($_GET['log'] == 'false'){
        echo '<script>swal({   title: "Falha!",   text: "Login ou senha Incorretos",   type: "warning",   confirmButtonText: "OK!!" });</script>';
} 
?>
        <div class="site-main" id="sTop">
            <div class="site-header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <ul class="social-icons">
                                <li><a href="https://www.facebook.com/espacoker" class="fa fa-facebook"></a></li>
                                <li><a href="http://www.twitter.com.br/espacoker" class="fa fa-twitter"></a></li>
                                <li><a href="http://www.dribbble.com.br" class="fa fa-dribbble"></a></li>
                                <li><a href="http://www.linkedin.com.br" class="fa fa-linkedin"></a></li>
                            </ul>
                        </div> <!-- /.col-md-12 -->
                    </div> <!-- /.row -->
                </div> <!-- /.container -->
                <div class="main-header">
                    <div class="container">
                        <div id="menu-wrapper">
                            <div class="row">
                                <div class="logo-wrapper col-md-2 col-sm-2">
                                  
                                </div> <!-- /.logo-wrapper -->
                                <div class="col-md-10 col-sm-10 main-menu text-right">
                                    <div class="toggle-menu visible-sm visible-xs"><i class="fa fa-bars"></i></div>
                                    <ul class="menu-first">
                                        
                                        
                                        <li class="active"><a href="#">Espaço K &R</a></li>
                                        <li><a href="#services">Sobre nós</a></li>
                                        <li><a href="#portfolio">Serviços</a></li>
                                        <li><a href="#our-team">Pacote de casamento</a></li>
                                        <li><a href="#contact">Contato</a></li>
<!--                                               <li><a href="#">
                                                        Login:<input type="text" id="login">
                                                        Senha:<input type="password" id="senha">
                                            </a>-->
                                      
                                    </ul>                                    
                                </div> <!-- /.main-menu -->
                            </div> <!-- /.row -->
                        </div> <!-- /#menu-wrapper -->                        
                    </div> <!-- /.container -->
                </div> <!-- /.main-header -->
            </div> <!-- /.site-header -->
            <div class="site-slider">
                <div class="slider">
                    <div class="flexslider">
                        <ul class="slides">
                            <?php echo $slid->getImagensIndex();?>
                           
                        </ul>
                    </div> <!-- /.flexslider -->
                </div> <!-- /.slider -->
            </div> <!-- /.site-slider -->
        </div> <!-- /.site-main -->


        <div class="content-section" id="services">
            <div class="container">
                <div class="row">
                    <div class="heading-section col-md-12 text-center">
                        <h2>Sobre nós</h2>
                        <p>Nossos Valores como empresa</p>
                    </div> <!-- /.heading-section -->
                </div> <!-- /.row -->
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="service-item" id="service-1">
                            <div class="service-icon">
                                <i class="fa fa-suitcase"></i>
                            </div> <!-- /.service-icon -->
                            <div class="service-content">
                                <div class="inner-service">
                                   <h3>Historico</h3>
                                   <p>O Salão de beleza Espaço K&R foi fundada no dia 17 de Outubro de 2015 por Karen Fernandes e Rubens Souza.</p>
                                    
                                </div>
                            </div> <!-- /.service-content -->
                        </div> <!-- /#service-1 -->
                    </div> <!-- /.col-md-3 -->
                    <div class="col-md-3 col-sm-6">
                        <div class="service-item" id="service-2">
                            <div class="service-icon">
                                <i class="fa fa-list"></i>
                            </div> <!-- /.service-icon -->
                            <div class="service-content">
                                <div class="inner-service">
                                   <h3>Descrição</h3>
                                   <p>O Espaço K&R oferece serviços de cabelereiro,manicure</p>
                                     <p>designer de sobrancelhas e barbearia.</p>                                   
                                </div>
                            </div> <!-- /.service-content -->
                        </div> <!-- /#service-1 -->
                    </div> <!-- /.col-md-3 -->
                    <div class="col-md-3 col-sm-6">
                        <div class="service-item" id="service-3">
                            <div class="service-icon">
                                <i class="fa fa-eye"></i>
                            </div> <!-- /.service-icon -->
                            <div class="service-content">
                                <div class="inner-service">
                                    <h3>Visão</h3>
                                   <p>Tornar-se referência no atendimento ao cliente e na área da beleza no bairro Jardim Robrú num período de cinco anos.</p> 
                                </div>
                            </div> <!-- /.service-content -->
                        </div> <!-- /#service-1 -->
                    </div> <!-- /.col-md-3 -->
                   <div class="col-md-3 col-sm-6">
                        <div class="service-item" id="service-4">
                            <div class="service-icon">
                                <i class="fa fa-check-square-o"></i>
                            </div> <!-- /.service-icon -->
                            <div class="service-content">
                                <div class="inner-service">
                                   <h3>Missão</h3>
                                   <p>Garantir a satisfação do cliente e melhorar sua autoestima, tratando cada cliente como se fosse único.</p> 
                                </div>
                            </div> <!-- /.service-content -->
                        </div> <!-- /#service-1 -->
                    </div> <!-- /.col-md-3 -->
                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </div> <!-- /#services -->



        <div class="content-section" id="portfolio">
            <div class="container">
                <div class="row">
                    <div class="heading-section col-md-12 text-center">
                        <h2>Nossos Principais Serviços para você.</h2>
                        <p>Escolha e agende.</p>
                    </div> <!-- /.heading-section -->
                </div> <!-- /.row -->
                
                <div class="row">
                      <?php echo $slidd->getTodosPortifolioServicos();?>
     
                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </div> <!-- /#portfolio -->




        <div class="content-section" id="our-team">
            <div class="container">
                <div class="row">
                    <div class="heading-section col-md-12 text-center">
                         <h2>Vai se casar?</h2>
                         <p>Conheça nossos serviços do dia de noiva</p>
                    </div> <!-- /.heading-section -->
                </div> <!-- /.row -->
               
                <div class="row">
                    <div class="team-member col-md-3 col-sm-6">
                        <div class="member-thumb">
                            <img src="img/Pacote noivo 1.jpg" alt="">
                            <div class="team-overlay">
                                <h3>Pacote Noivo </h3>
                                <span>
                                    <p>Tratamento de cabelo,barba,mão e pé;</p>
                                    <p>Depilação corporal;</p>
                                    <p>Massagem anti-stress;</p>
                                    <p>Hidratação corporal.</p>
                              </span>
                            </div> <!-- /.team-overlay -->
                        </div> <!-- /.member-thumb -->
                    </div> <!-- /.team-member -->
                    
                    
                    <div class="team-member col-md-3 col-sm-6">
                        <div class="member-thumb">
                            <img src="img/Pacote noivo 2.jpg" alt="Pacote noivo ">
                            <div class="team-overlay">
                                <h3>Pacote Noivo II</h3>
                                
                                <span>
                                    <p>Ele se arruma direitinho</p>
                                </span>
                               
                            </div> <!-- /.team-overlay -->
                        </div> <!-- /.member-thumb -->
                    </div> <!-- /.team-member -->
                    <div class="team-member col-md-3 col-sm-6">
                        
                        
                        <div class="member-thumb">
                            <img src="img/Pacote noiva 1.jpg" alt="Pacote noiva 1">
                            <div class="team-overlay">
                                <h3>Pacote completo </h3>
                                <span>
                                    <p>Teste de maquiagem e cabelo;</p> 
                                    <p>Cabelo e maquiagem;</p>
                                    <p>Massagem relaxante;</p>
                                    <p>Manicure e pedicure;</p>
                                   
                                    </span>
                              
                            </div> <!-- /.team-overlay -->
                        </div> <!-- /.member-thumb -->
                    </div> <!-- /.team-member -->
                    
                    <div class="team-member col-md-3 col-sm-6">
                        <div class="member-thumb">
                            <img src="img/Pacote noiva 2.jpg" alt="">
                            <div class="team-overlay">
                                <h3>Dia de rainha</h3>
                                <span>
                                 <p>Pacote completo incluso;</p>
                                 <p>Depilação completa;</p>
                                 <p>Hidromassagem;</p>
                                 <p>Design de sobrancelhas.</p>
                                 <p>Design de sobrancelhas;</p>
                                 <p>Hospedagem,alimentação e deslocamento.</p> </span>
                
                                  
                             
                            </div> <!-- /.team-overlay -->
                        </div> <!-- /.member-thumb -->
                    </div> <!-- /.team-member -->
                </div> <!-- /.row -->
                
                 <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="height:400px;width:100%; position:relative; ">
                    <br>
                    <font size="6px"color="black" style="margin-left:15%;">Dicas</font>
                <hr style="width:70%;margin-left: 14%; background-color: #FF69B4; color:#FF69B4;height:1px;">
                                  
                                <ol class="carousel-indicators">
                                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"style="background-color: #FF69B4;"></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="1"style="background-color: #FF69B4;"></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="2"style="background-color:#FF69B4;"></li>
                                </ol>
                         
                        <div class="carousel-inner" role="listbox">    
                            <div class="item active"style="margin-left:20%;">
                                    <br><font color="#000000" size="5px">
                                    <p>Se a beleza está nos olhos de quem vê, que tal olhar mais pra você?</p>
                                
                                    </font>
                            </div>
                            <div class="item"style="margin-left:20%;">
                                    <font color="#000000" size="5px"><p>Cada dia é uma nova chance para recomeçar.</p>

                                    </font>

                            </div>
                            <div class="item"style="margin-left:20%;">
                                   <font color="#000000"  size="5px">
                                    
                                     <p>Uma mulher bonita é aquela que </p>
					<p>pode oferecer mais do que sua aparência.</p></font>

                            </div>
                        </div>
        </div>
                
                
                

        <div class="content-section" id="contact">
            <div class="container">
                <div class="row">
                    <div class="heading-section col-md-12 text-center">
                        <h2>Entre em contato</h2>
                        <p>Mande uma messagem para nós</p>
                    </div> <!-- /.heading-section -->
                </div> <!-- /.row -->
<!--                <div class="row">
                    <div class="col-md-12">
                       <div class="googlemap-wrapper">
                            <div id="map_canvas" class="map-canvas"></div>
                        </div>  /.googlemap-wrapper 
                    </div>  /.col-md-12 
                </div>  /.row -->
<div class="row" >
                    <div class="col-md-12" style="boder-color: black;">     
                        <div class="googlemap-wrapper"style="boder-color: black;">
                            <div id="map_canvas" class="map-canvas">
                                 <ul class="contact-info">
                            <li>>    Telefone: 4002-8922</li>
                            <li>>    Email: <a href="techwelt.etec@gmail.com">techwelt.etec@gmail.com</a></li>
                            <li>>    Endereço: R. Felíciano de Mendonça, 290 - Guaianazes, SP, 08460-365 </li>
                        </ul>
                        <!-- spacing for mobile viewing --><br><br>
                            
                                <div class="col-md-5 col-sm-6" style="margin-left: 50%;margin-top:-10%;">
                        <div class="contact-form">
                            <form method="post" name="contactform" action="enviar.php" id="contactform">
                                <p>
                                    <input name="name" type="text" id="name" placeholder="Insira seu nome">
                                </p>
                                <p>
                                    <input name="email" type="text" id="email" placeholder="Insira seu email"> 
                                </p>
                               
                                <p>
                                    <textarea name="comments" id="comments" placeholder="Escreva a messagem aqui"></textarea>    
                                </p>
                                <input type="submit" class="mainBtn" id="submit" value="Enviar">
                            </form>
                        </div> <!-- /.contact-form -->
                    </div> <!-- /.col-md-5 -->
                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </div> <!-- /#contact -->
                </div></div></div>
        <div id="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-xs-12 text-left">
                        <span>Copyright &copy; TechWelt</span>
                  </div> <!-- /.text-center -->
                    <div class="col-md-4 hidden-xs text-right">
                        <a href="#top" id="go-top">Voltar ao topo</a>
                    </div> <!-- /.text-center -->
                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </div> <!-- /#footer -->
        <div class="modal fade" id="myModa3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="margin-left:20%;">>
			<div class="modal-dialog" role="document">
                            <form class="form-signin" role="form" action="Login.php" method="post">
			<div class="modal-content" style="height:79%;width:60%; background-color:;">
			<div class="modal-header"style="background:captiontext;opacity: 0.70; z-index:1000;">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
			<h4 class="modal-title"><center><font color="pink">Espaço K & R</font></center></h4>
			</div>
			<center>
			<p><h5>Logue-se</h5></p>
			<div class="modal-body" >
			<p>
			<label>
			<input type="text" name="login" class="form-control" placeholder="Login" required autofocus
			style="width:100%; margin-left:0%;">
			</label>
			</p>
			<p>
			<label>
			<input type="password" name="senha" class="form-control" placeholder="Senha" required autofocus
			style="width:100%; margin-left:0%;">
			</label>
			</p>	</div>
			<div class="modal-footer"style="background:captiontext;opacity: 0.70; z-index:1000;">
			<center>
			<button type="submit" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
			<input  class="btn btn-primary" type="submit" value="Entrar" style="background:pink;margin-top:-4px;height:40px;width:110px;margin-left:0px;">
			</center>
                        </div>
                </div>
 </form>
        
                        </div>
        </div>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        <script src="js/vendor/jquery-1.11.0.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.0.min.js"><\/script>')</script>
        <script src="js/bootstrap.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

        <!-- Google Map -->
        <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        <script src="js/vendor/jquery.gmap3.min.js"></script>
        
        <!-- Google Map Init-->
        <script type="text/javascript">
            jQuery(function($){
                $('#map_canvas').gmap3({
                    marker:{
                        address: '-23.5530837, -46.3995964' 
                    },
                        map:{
                        options:{
                        zoom: 15,
                        scrollwheel: false,
                        streetViewControl : true
                        }
                    }
                });

                /* Simulate hover on iPad
                 * http://stackoverflow.com/questions/2851663/how-do-i-simulate-a-hover-with-a-touch-in-touch-enabled-browsers
                 --------------------------------------------------------------------------------------------------------------*/ 
                $('body').bind('touchstart', function() {});
            });
        </script>
       
    </body>
</html>