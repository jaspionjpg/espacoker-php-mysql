<?php
include_once 'topo.php';

include_once "Entidades/Entity_SlidePrincipal.php";


$slid = new Entity_SlidePrincipal();
?>

	<div class="col-sm-9 col-md-10 affix-content">
		<div class="container">

                    <div class="page-header" style="border-color:#DB7093;"><div style="height:50px;"></div>
	<h3><span class="glyphicon glyphicon-th-list"></span> Configurações - Altere Slide Principal</h3>
</div>

<center>

<div class="w3-content w3-display-container">
<?php echo $slid->getImagensEdit();?>
<a class="w3-btn-floating w3-hover-dark-grey w3-display-left" onclick="plusDivs(-1)"> <img class="" src="imagens/back.png"></a>
<a class="w3-btn-floating w3-hover-dark-grey w3-display-right" onclick="plusDivs(1)"> <img class="" src="imagens/next.png"></a>
	  
</div>

<script>

function deletar(id){
swal({
      title: "Deseja realmente Deletar?",
      type: "warning",
		showCancelButton: true,
      confirmButtonText: 'Deletar'

   }, function(){
      window.location.href = "./Chamadas/deletarImagem.php?id="+id;
   });}
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
	<div class="col-md-12 col-sm-6" style= "padding-top:30px;">
	
	</div>
    <form class="form-signin" role="form" enctype="multipart/form-data"  action="./imagens/imagensUpload/cadastrarImagemPrincipal.php" method="post">





	<div class="col-md-12 col-sm-6" style= "padding-top:30px;">
	 <p> Texto :
		  <label>
		   <input type="text" name="texto" class="form-control" placeholder="Texto" required autofocus
		   style="width:100%; margin-left:0%;">
		  </label>
	  </p>

	  <p> Imagem :
		  <label>
			  <input type="file" name="file" class="form-control" required autofocus style="width:100%; margin-left:0%;">
		  </label>
	  </p>
	</div>

        
                    <button type = "submit" class = "btn btn-info"style="background-color: #DB7093; border-color:#DB7093"><font color="white">Adicionar</font></button>
		 </form>

</div>
    </div>
<?php
echo $listaedit;
include_once 'baixo.php';
?>
