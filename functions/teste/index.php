<?php

  // DEFINE O TEMPO EM MINUTOS QUE A SESS�O IR� LEVAR PARA EXPIRAR
  session_cache_expire(540);

  // INICIA A SESS�O
  session_start();
  setlocale(LC_CTYPE, "portuguese");

  $ui            = ((@$_REQUEST['ui'])  ? @$_REQUEST['ui']  : null );
  $aux           = ((@$_REQUEST['aux']) ? @$_REQUEST['aux'] : null );
  $glr           = ((@$_REQUEST['glr']) ? @$_REQUEST['glr'] : null );
  $popup         = ((@$_REQUEST['pp'])  ? @$_REQUEST['pp']  : 'true' );
  $ml            = ((@$_REQUEST['ml'])  ? @$_REQUEST['ml']  : null );
  $qr            = ((@$_REQUEST['qr'])  ? @$_REQUEST['qr']  : null );
  $pg            = ((@$_REQUEST['pg'])  ? @$_REQUEST['pg']  : 1 );

  // BUSCA A CONEX�O COM A CLASSE
  require 'config.php';

  if($ui){
    if(substr_count($ui,'/') > 0){
      $arrUi = preg_split('/[-\.\/ ]/',$ui);
      $chave_conteudo  = $arrUi[0];
      $aux_conteudo    = $arrUi[1];
    }else{
      $chave_conteudo  = $ui;
      $aux_conteudo    = $aux;
    }

    if($ntc){
      $id_noticia   = base64_decode($ntc);
    }
    if($glr){
      $id_galeria   = base64_decode($glr);
    }
    if($ml){
      $login_central = $ml;
    }

    $webclasse->banco->consulta("SELECT tb_conteudo.*, tb_menu_site.nivel, tb_menu_site.id_origem, tb_menu_site.descricao
                                 FROM tb_conteudo
                                 LEFT JOIN tb_menu_site ON tb_conteudo.id_menu_site = tb_menu_site.id
                                 WHERE tb_conteudo.url='$chave_conteudo' AND tb_conteudo.online=1 AND tb_conteudo.status=1");
    $webclasse->banco->proxRegistro();

    $id_conteudo     = $webclasse->banco->data['id'];
    $tipo_conteudo   = $webclasse->banco->data['tipo_conteudo'];
    $id_menu_site    = $webclasse->banco->data['id_menu_site'];
    $titulo          = $webclasse->banco->data['titulo'];
    $conteudo        = $webclasse->banco->data['conteudo'];
    $data            = $webclasse->banco->data['data'];
    $tipo_submenu    = $webclasse->banco->data['tipo_submenu'];
    $link_conteudo   = $webclasse->banco->data['url'];
    $nivel_link      = $webclasse->banco->data['nivel'];
    $nivel_permissao = $webclasse->banco->data['nivel_permissao'];
    $exibe_destaques = $webclasse->banco->data['exibe_destaques'];
    $promocao_ativa  = $webclasse->banco->data['promocao_ativa'];
    $de_agenda       = $webclasse->banco->data['de_agenda'];
    $ate_agenda      = $webclasse->banco->data['ate_agenda'];
    $arquivo_require = $webclasse->banco->data['arquivo_require'];

    if($nivel_link == 2 || $nivel_link == 3){
      $id_menu_site_anterior = $webclasse->banco->data['id_menu_site'];

      $webclasse->con->consulta("SELECT descricao FROM tb_menu_site WHERE id=$id_menu_site_anterior AND online=1 AND status=1");
      $webclasse->con->proxRegistro();

      $titulo_submenu = $webclasse->con->data['descricao'];
    }else{
      $titulo_submenu = $webclasse->banco->data['descricao'];
    }

    // BUSCA O SUBT�TULO DA SESS�O DE PRODUTOS
    if($chave_conteudo == 'produtos'){
      $webclasse->banco->consulta("SELECT nome FROM tb_categoria WHERE url='$aux_conteudo'");
      $webclasse->banco->proxRegistro();
      $subtitulo = $webclasse->banco->data['nome'];
    }

  }

  // BUSCA AS CONFIGURA��ES PADR�O DO SITE
  $webclasse->banco->consulta("SELECT * FROM tb_config_site");
  $webclasse->banco->proxRegistro();

  $nome_site   = $webclasse->banco->data['nome_site'];
  $titulo_site = $webclasse->banco->data['titulo_site'];
  $email_envio = $webclasse->banco->data['email_envio'];

  // CONSULTA SE EXISTE POPUP
  $webclasse->banco->consulta("SELECT * FROM tb_popup WHERE online=1 AND status=1 ORDER BY data_hora_cadastro DESC, id DESC");
  if($webclasse->banco->nrows > 0){
    $webclasse->banco->proxRegistro();

    $endereco_imagem_popup   =  $webclasse->banco->data['endereco_imagem'];
    $largura_popup           =  $webclasse->banco->data['largura'];
    $altura_popup            =  $webclasse->banco->data['altura'];
    $borda_popup             =  $webclasse->banco->data['borda'];
    $link_imagem_popup       =  $webclasse->banco->data['link'];
    $janela_link_popup       =  $webclasse->banco->data['janela_link'];
    $timer_popup             =  $webclasse->banco->data['timer'];
  }
?>
<?php /* <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd"> */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title><?php echo $nome_site . ' - ' . $titulo_site; ?></title>

  <base href="http://asttter.com.br/">

  <?php /* === CSS =================================================================================== */ ?>
  <link rel="stylesheet" type="text/css" href="css/padrao.css" />
  <link rel="stylesheet" type="text/css" href="css/ampliacao.css" />
  <link rel="stylesheet" type="text/css" href="css/cabecalho.css" />
  <link rel="stylesheet" type="text/css" href="css/menu.css" />
  <link rel="stylesheet" type="text/css" href="css/servicos.css" />
  <link rel="stylesheet" type="text/css" href="css/rodape.css" />
<?php
  // CSS`S SOMENTE DA P�GINA INICIAL
  if($ui == null){
?>
  <?php if($popup != 'false'){ ?><link rel="stylesheet" type="text/css" href="css/popup.css" /><?php } ?>
  <link rel="stylesheet" type="text/css" href="css/banner_principal.css" />
  <link rel="stylesheet" type="text/css" href="css/inicial.css" />
<?php
  // CSS`S DAS P�GINAS INTERNAS
  }else{
?>
  <link rel="stylesheet" type="text/css" href="css/banner_interna.css" />
  <link rel="stylesheet" type="text/css" href="css/interna.css" />
  <link rel="stylesheet" type="text/css" href="css/login.css" />
<?php
  }

  // CHAMA O CSS DE CADA P�GINA INTERNA ESPEC�FICA DE ACORDO COM O ID DELE NA TABELA DE CONTE�DO
  if($id_conteudo){
    // CONSULTA CSS
    $webclasse->banco->consulta("SELECT * FROM tb_css WHERE id_conteudo=$id_conteudo");
    if($webclasse->banco->nrows > 0){
      while($webclasse->banco->proxRegistro()){
        $arquivo_css = $webclasse->banco->data['arquivo'];
?>
  <link rel="stylesheet" type="text/css" href="<?php echo $arquivo_css; ?>" />
<?php
      }
    }
  }
?>
  <?php /* === FIM CSS =================================================================================== */ ?>

  <?php /* === JAVASCRIPTS =================================================================================== */ ?>
  <script language="javascript" src="script/padrao.js"></script>
  <script language="javascript" src="script/func.js"></script>
  <script language="javascript" src="script/newfunc.js"></script>
  <script language="javascript" src="script/funcoes.js"></script>
  <script language="javascript" src="script/ampliacao.js"></script>
  <script language="javascript" src="script/form_contato.js"></script>

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
  <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>

  <script type="text/javascript" src="script/cufon-yui.js"></script>
  <script type="text/javascript" src="script/fonts/Guardian_Sans_Light_300-Guardian_Sans_Light_italic_300.font.js"></script>
  <script type="text/javascript" src="script/fonts/Guardian_Sans_Medium_500-Guardian_Sans_Semibold_600-Guardian_Sans_Medium_italic_500-Guardian_Sans_Semibold_italic_600.font.js"></script>
  <script type="text/javascript">
    Cufon.replace('.font_padrao',{ fontFamily: 'Guardian Sans Medium', hover: 'true' });
    Cufon.replace('.font_padrao2',{ fontFamily: 'Guardian Sans Light', hover: 'true' });

    Cufon.replace('a', {hover: 'true'});
//    Cufon.replace('.font_padrao_semibold',{ fontFamily: 'Guardian Sans Semibold' });
  </script>

<?php
  // JAVASCRIPT`S SOMENTE DA P�GINA INICIAL
  if($ui == null){
?>
  <?php if($popup != 'false'){ ?><script language="javascript" src="script/popup.js"></script><?php } ?>
  <script type='text/javascript' src="script/cycle.js"></script>
<?php
  }else{
?>
  <script type="text/javascript" src="script/fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>
  <link rel="stylesheet" href="script/fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
  <script type="text/javascript" src="script/fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>
<?php
  }

  // CHAMA OS JAVASCRIPT`S DE CADA P�GINA INTERNA ESPEC�FICA DE ACORDO COM O ID DELE NA TABELA DE CONTE�DO
  if($id_conteudo){
    // CONSULTA JAVASCRIPT
    $webclasse->banco->consulta("SELECT * FROM tb_javascript WHERE id_conteudo=$id_conteudo");
    if($webclasse->banco->nrows > 0){
      while($webclasse->banco->proxRegistro()){
        $arquivo_javascript = $webclasse->banco->data['arquivo'];
        if(file_exists($arquivo_javascript)){
?>
  <script language="javascript" src="<?php echo $arquivo_javascript; ?>"></script>
<?php
        }
      }
    }
  }
?>
  <?php /* === FIM JAVASCRIPTS =================================================================================== */ ?>
</head>

<body onLoad="<?php if(!$ui){ ?>document.getElementById('banner').style.visibility = 'visible';<?php if(!$ui && $popup != 'false'){ ?><?php if($endereco_imagem_popup){ ?> exibePopUp(<?php echo $largura_popup; ?>,<?php echo $altura_popup; ?>,<?php echo $timer_popup; ?>);<?php } ?><?php } } ?>">
  <div id="fundo_ampliacao" onClick="fechaAmpliacao();"></div>
  <div id="frame_ampliacao">
    <div id="fecha_ampliacao" onClick="fechaAmpliacao();"></div>
    <div id="content_frame_ampliacao"></div>
  </div>
<?php
  if(!$ui && $popup != 'false'){
?>
  <div id="fundo_popup" onClick="escondePopup();"></div>
  <div id="popup">
    <div id="fecha_popup" onClick="escondePopup();"><div id="x_fecha_popup">X</div><div id="texto_fecha_popup">FECHAR</div></div>
    <div id="imagem_popup" style="<?php if($largura_popup){ ?>width:<?php echo $largura_popup; ?>px;<?php } ?><?php if($altura_popup){ ?>height:<?php echo $altura_popup; ?>px;<?php } ?><?php if($borda_popup){ ?>border:<?php echo $borda_popup; ?>;<?php } ?>"><?php if($endereco_imagem_popup){ ?><?php if($link_imagem_popup){ ?><a href="<?php echo $link_imagem_popup; ?>"<?php if($link_imagem_popup){ ?> target="<?php echo $janela_link_popup; ?>"<?php } ?>><?php } ?><img src="<?php echo $endereco_imagem_popup; ?>" border="0" /><?php if($link_imagem_popup){ ?></a><?php } ?><? } ?></div>
  </div>
<?php
  }
?>
  <div id="pg_atualizacao"><iframe src id="atualiza" name="atualiza" marginwidth="0" marginheight="0"></iframe></div>
  <div id="wrap">
    <div id="container">
      <div id="superior">
        <?php require 'inc/cabecalho.php'; ?>
<?php
        if(!$ui){
          require 'inc/banner_principal.php';
        }else{
          require 'inc/banner_interna.php';
        }
        require 'inc/servicos.php';
?>
      </div>
      <div id="conteudo">
<?php
        if(!$ui){
          require 'inc/inicial.php';
        }else{
          require 'inc/interna.php';
        }
?>
      </div>
      <?php require 'inc/faixa_contato.php'; ?>
      <?php require 'inc/rodape.php'; ?>
    </div>
  </div>
</body>
</html>
