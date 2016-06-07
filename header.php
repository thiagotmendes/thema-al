<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php wp_head() ?>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <title>
      <?php
	      if ( is_single() ) {
	        bloginfo('name'); echo " | "; single_post_title();
	      }elseif ( is_home() || is_front_page() ) {
	        bloginfo('name'); echo ' | ';
	        bloginfo('description');
	      }elseif ( is_page() ) {
	        single_post_title('');
	      }elseif ( is_search() ) {
	        bloginfo('name');
	        echo ' | Search results for ' . wp_specialchars($s);
	      }elseif ( is_404() ) {
	        bloginfo('name');
	        print ' | Erro 404';
	      }else {
	        bloginfo('name');
	        wp_title('|');
	      }
      ?>
    </title>
  </head>
  <body>
    <header>
      <div class="topbar">
        <div class="container">
          <div class="pull-left atendimento-top">
            <small>ATENDIMENTO:</small>   <span><small>(13)</small> 3329.6352</span>
          </div>

          <div class="pull-right">
            <form class="form-inline" action="" method="post">
              <div class="form-group">
                <label for="login">Usuário</label>
                <input type="text" class="form-control" id="" placeholder="">
              </div>
              <div class="form-group">
                <label for="login">Senha</label>
                <input type="text" class="form-control" id="" placeholder="">
              </div>
              <div class="form-group">
                <button type="button" class="btn btn-login-top" name="button">Entrar</button>
              </div>
            </form>
          </div>
        </div>
      </div>



      <nav class="navbar navbar-alfa" role="navigation">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_template_directory_uri() ?>/images/logo.png" alt="Faculdade Alfa" /></a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="navbar">
            <div class="social-block pull-right">
              <form action="<?php echo esc_url( home_url( '/' ) ); ?>" class="form-inline">

                <div class="input-group">
                  <input type="text" name="s" id="s" class="form-control" placeholder="Search for...">
                  <span class="input-group-btn">
                    <button class="btn btn-default btn-info" type="submit"> <i class="fa fa-search"></i> </button>
                  </span>
                </div>

              </form>
            </div>
            <div class="social-block pull-right">
              <ul class="social ">
                <li> <a href="#" class=""> <i class="fa fa-youtube-square" aria-hidden="true"></i> </a> </li>
                <li> <a href="#" class=""> <i class="fa fa-google-plus-square" aria-hidden="true"></i> </a> </li>
                <li> <a href="#" class=""> <i class="fa fa-linkedin-square" aria-hidden="true"></i> </a> </li>
                <li> <a href="#" class=""> <i class="fa fa-facebook-official" aria-hidden="true"></i> </a> </li>
                <li> <a href="#" class=""> <i class="fa fa-instagram" aria-hidden="true"></i> </a> </li>
              </ul>
            </div>

            <?php
  		    	$args = array(
  		    		'menu' => 'principal',
  		    		'menu_class' => 'nav navbar-nav navbar-right',
  		    		'walker'	 => new BootstrapNavMenuWalker()
  		    	);
  		    	wp_nav_menu( $args ); ?>

          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
    </header>
