<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="http://restaurantepaladino.com.br/sistema_cupom2016/css/bootstrap.css" />
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<title>Cupom</title>
</head>

<body>
<form class="" action="http://restaurantepaladino.com.br/confirmar-compra-fondue" method="post" target="_blank" data-toggle="validator">
	<div class="form-group">
	  Nome
	  <input type="text" name="nome" class="form-control" id="nome" placeholder="" required data-error="Campo obrigatório">
	</div>
	<div class="form-group">
	  Email
	  <input type="text" name="email" class="form-control" id="email" placeholder="" required data-error="Campo obrigatório">
	</div>
	<div class="form-group">
	  Dia escolhido
	  <select class="form-control" name="dia" required data-error="Campo obrigatório">
	  	<option></option>
			<?php
			$conect = mysqli_connect("mysql02.restaurantepaladino.com.br","restaurantepal1","r3st2ur2nt3","restaurantepal1");

			$sql_confere_dia = "SELECT count(*) contador FROM promocao where dia_escolhido = '01/06/2016'";
			$result_cupom_impresso = mysqli_query($conect,$sql_confere_dia);
			$num = mysqli_fetch_array($result_cupom_impresso);
			$contador = $num['contador'];
			if($contador >= 49){
				echo '<option disabled>Quarta feira 01/06 (esgotado) </option>';
			} else {
				echo '<option value="01/06/2016">Quarta feira 01/06 </option>';
			}
			?>
			<?php
			$sql_confere_dia = "SELECT count(*) contador FROM promocao where dia_escolhido = '02/06/2016'";
			$result_cupom_impresso = mysqli_query($conect,$sql_confere_dia);
			$num = mysqli_fetch_array($result_cupom_impresso);
			$contador = $num['contador'];
			if($contador >= 45){
				echo '<option disabled> Quinta Feira 02/06 </option>';
			} else {
				echo '<option value="02/06/2016">Quinta Feira 02/06</option>';
			}
			?>
	  </select>
	</div>
	<button type="submit" name="button" class="btn btn-paladino btn-raised">COMPRAR</button>
</form>

<script type="text/javascript" src="http://restaurantepaladino.com.br/sistema_cupom2016/js/jquery-1.12.0.min.js"></script>
<script type="text/javascript" src="http://restaurantepaladino.com.br/sistema_cupom2016/js/bootstrap.js"></script>
<script type="text/javascript" src="http://restaurantepaladino.com.br/sistema_cupom2016/js/validator.js"></script>
</body>
</html>
