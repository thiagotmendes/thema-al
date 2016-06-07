<?php
$id_promo     = $_POST["id_promo"];
$titulo_promo = $_POST['titulo_promo'];
$matricula    = $_POST['matricula'];
$termo        = $_POST['termos'];

if( $termo == 1 ){
  $conect = mysql_connect("asttter_wp.mysql.dbaas.com.br","asttter_wp","pWTdqRDyy8Me");
  $db     = mysql_select_db('asttter_wp');

  $verifica_cadastro = mysql_query("select * from cadastro_promocao where idpromocao = '$id_promo' and matricula_participante = '$matricula'");
  $linha_verifica_cadastro = mysql_fetch_array($verifica_cadastro);

  if ($linha_verifica_cadastro['idpromocao'] != $id_promo and $linha_verifica_cadastro['matricula_participante'] != $matricula) {

    $verifica_candidato = mysql_query("select * from associados where matricula = '$matricula'");
    $linha_verifica_candidato = mysql_fetch_array($verifica_candidato );
    $nome = $linha_verifica_candidato['nome'];

    if(!empty($nome)){
      mysql_query("insert into cadastro_promocao (titulo_promocao, idpromocao, nome_participante, matricula_participante )
                    values ('$titulo_promo', '$id_promo', '$nome', '$matricula');");
      echo $nome;
    } else {
      $nome = '0';
      echo $nome;
    }

  } else {
    $verifica_candidato = mysql_query("select * from associados where matricula = '$matricula'");
    $linha_verifica_candidato = mysql_fetch_array($verifica_candidato );
    $nome = $linha_verifica_candidato['nome'];

    echo $nome;
  }
} else {
  $termo = 2;
  echo $termo;
}

?>
