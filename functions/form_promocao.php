<?php
  function formulario_shortcode(){
  ?>
    <form class="" action="" method="post" id="form_promocao">
      <h2>Quer participar do sorteio desta promoção?</h2>
      <p>
        Então preencha o campo abaixo com o número de sua matrícula e  clique em <strong>"participar"</strong>. Simples assim.
      </p>
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label for="matricula">Matrícula</label>
            <input type="text" class="form-control campos-contato" name="matricula" id="matricula" placeholder="">
            <input type="hidden" id="id_promo" name="id_promo" value="<?php echo get_the_id() ?>">
            <input type="hidden" name="titulo_promo" id="titulo_promo" value="<?php the_title() ?>">
          </div>
        </div>
        <div class="col-md-8">
          <a href="" target="_blank" style="margin-top:70px; display:block">Clique aqui e leia o regulamento desta promoção</a>
        </div>
      </div>
      <div class="checkbox">
        <label>
          <input type="checkbox" id="termo" name="termos" value="1"> Li e aceito o <strong>regulamento</strong> desta promoção
        </label>
      </div>
      <button type="submit" name="button" class="btn btn-primary btn-raised">Participar</button>
      <div id="alerta_usuario" class=""></div>
    </form>

    <script type="text/javascript">
    jQuery(document).ready(function(){
  		jQuery('#form_promocao').submit(function(){
  			var dados = jQuery( this ).serialize();
        var termo = $('#termo').val()
  			jQuery.ajax({
  				type: "POST",
  				url: "<?php echo get_template_directory_uri() ?>/functions/insert_promo.php",
  				data: dados,
  				success: function( data )
  				{
            if(data == 2){
              $('#alerta_usuario').removeClass('alert alert-dismissible alert-success');
              $('#alerta_usuario').addClass('alert alert-dismissible alert-danger').html('Necessário aceitar os termos de regulamento');
            } else if(data == 0) {
              $('#alerta_usuario').removeClass('alert alert-dismissible alert-success');
              $('#alerta_usuario').addClass('alert alert-dismissible alert-danger').html('Nenhum usuário cadastrado! entre em contato com a Asttter');
            } else {
              $('#alerta_usuario').removeClass('alert alert-dismissible alert-danger');
              $('#alerta_usuario').addClass('alert alert-dismissible alert-success').html('Olá <strong>'+ data + '</strong>, Seu cadastro foi realizado com sucesso!');
            }
  				  //alert( data );
  				}
  			});

  			return false;
  		});
  	});
    </script>

  <?php
  }
?>
