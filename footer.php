  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <img src="<?php echo get_template_directory_uri() ?>/images/logo-assinatura.png" alt="Faculdade Alfa" class="img-fluid" />
        </div>
        <div class="col-md-3">
          <h4>A faculdade</h4>
          <ul>
            <li><a href="<?php echo esc_url( home_url( 'institucional/historia' ) ); ?>">História</a></li>
            <li><a href="<?php echo esc_url( home_url( 'institucional/administracao' ) ); ?>">Administração</a></li>
            <li><a href="<?php echo esc_url( home_url( 'institucional/ensino' ) ); ?>">Ensino</a></li>
            <li><a href="<?php echo esc_url( home_url( 'institucional/estrutura' ) ); ?>">Infra-Estrutura</a></li>
            <li><a href="<?php echo esc_url( home_url( 'institucional/localizacao' ) ); ?>">Localização</a></li>
            <li><a href="#">Mapa do Site</a></li>
          </ul>
        </div>
        <div class="col-md-3">
          <h4>Cursos</h4>
          <ul>
            <li><a href="<?php echo esc_url( home_url( 'cursos-de-extensao' ) ); ?>">Cursos de Extensão</a></li>
            <li><a href="<?php echo esc_url( home_url( 'curso/letras' ) ); ?>">Letras</a></li>
            <li><a href="<?php echo esc_url( home_url( 'curso/pedagogia' ) ); ?>">Pedagogia</a></li>
            <li><a href="<?php echo esc_url( home_url( 'curso/processos-gerenciais' ) ); ?>">Processos Gerenciais</a></li>
            <li><a href="<?php echo esc_url( home_url( 'curso/comunicacao-institucional' ) ); ?>">Comunicação Institucional</a></li>
            <li><a href="<?php echo esc_url( home_url( 'cursos-de-pos-graduacao' ) ); ?>">Pós Graduação</a></li>
          </ul>
        </div>
        <div class="col-md-3">
          <h4><a href="<?php echo esc_url( home_url( 'blog' ) ); ?>">Blog</a></h4>
          <h4><a href="<?php echo esc_url( home_url( 'contato' ) ); ?>">Contato</a></h4>
        </div>
      </div>

      <div class="rodape">
        <i class="fa fa-phone" aria-hidden="true"></i> <strong>Telefone:</strong> (13) 3329.6352
        <i class="fa fa-envelope" aria-hidden="true"></i> <strong>Email:</strong> coordenacao@grupoandrademartins.com.br
        <i class="fa fa-map-marker" aria-hidden="true"></i> <strong>Endereço:</strong> Av. Presidente Kennedy, nº 4285, Praia Grande/SP - CEP: 11703-200
      </div>

    </div>
  </footer>
  <?php wp_footer(); ?>
</body>
</html>
