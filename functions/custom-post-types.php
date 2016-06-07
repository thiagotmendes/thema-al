<?php
/* ----------------------------------------------------- */
/* Post Types */
/* ----------------------------------------------------- */

add_action('init', 'cursos_register');
function cursos_register() {
	 $labels = array(
			'name' => 'Cursos',
			'singular_name' => 'Post',
			'all_items' => 'Todos Cursos',
			'add_new' => 'Adicionar Cursos',
			'add_new_item' => 'Adicionar Cursos',
			'edit_item' => 'Editar Cursos',
			'new_item' => 'Novo Curso',
			'view_item' => 'Ver Cursos',
			'search_items' => 'Procurar Cursos',
			'not_found' =>  'Nada encontrado',
			'not_found_in_trash' => 'Nada encontrado no lixo',
			'parent_item_colon' => '',
			'menu_icon'   => 'teste',
	);
	$args = array(
 			'menu_icon' => 'dashicons-portfolio',
			'labels' => $labels,
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'query_var' => true,
			'capability_type' => 'post',
			'hierarchical' => false,
			'has_archive' => true,
			'taxonomy' => array('categoria-cursos'),
			'menu_position' => 6,
			'supports' => array('title','editor','comments','thumbnail','category','gallery','page-attributes'),
			'rewrite' => array('slug' => 'curso')
	  );
	register_post_type('cursos',$args);
}

register_taxonomy("categoria-cursos", array("cursos"),
	array(
		"hierarchical" => true,
		"label" => "categoria cursos",
		"singular_label" => "categoria cursos",
		'rewrite' => array( 'slug' => 'categoria-cursos' )
	)
);

/* pos graduação */
add_action('init', 'cursospos_register');
function cursospos_register() {
	 $labels = array(
			'name' => 'Cursos pós graduação',
			'singular_name' => 'Post',
			'all_items' => 'Todos pós graduação',
			'add_new' => 'Adicionar pós graduação',
			'add_new_item' => 'Adicionar pós graduação',
			'edit_item' => 'Editar pós graduação',
			'new_item' => 'Novo pós graduação',
			'view_item' => 'Ver pós graduação',
			'search_items' => 'Procurar pós graduação',
			'not_found' =>  'Nada encontrado',
			'not_found_in_trash' => 'Nada encontrado no lixo',
			'parent_item_colon' => '',
			'menu_icon'   => 'teste',
	);
	$args = array(
 			'menu_icon' => 'dashicons-portfolio',
			'labels' => $labels,
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'query_var' => true,
			'capability_type' => 'post',
			'hierarchical' => false,
			'has_archive' => true,
			'taxonomy' => array('categoria-pos-graduacao'),
			'menu_position' => 6,
			'supports' => array('title','editor','comments','thumbnail','category','gallery','page-attributes'),
			'rewrite' => array('slug' => 'pos-graduacao')
	  );
	register_post_type('pos-graduacao',$args);
}

register_taxonomy("categoria-pos-graduacao", array("pos-graduacao"),
	array(
		"hierarchical" => true,
		"label" => "categoria Pos Graduacao",
		"singular_label" => "categoria Pos Graduacao",
		'rewrite' => array( 'slug' => 'categoria-pos-graduacao' )
	)
);

/* Extensão */
add_action('init', 'extensao_register');
function extensao_register() {
	 $labels = array(
			'name' => 'Cursos Extensão',
			'singular_name' => 'Post',
			'all_items' => 'Todos Extensão',
			'add_new' => 'Adicionar Extensão',
			'add_new_item' => 'Adicionar Extensão',
			'edit_item' => 'Editar Extensão',
			'new_item' => 'Novo Extensão',
			'view_item' => 'Ver Extensão',
			'search_items' => 'Procurar Extensão',
			'not_found' =>  'Nada encontrado',
			'not_found_in_trash' => 'Nada encontrado no lixo',
			'parent_item_colon' => '',
			'menu_icon'   => 'teste',
	);
	$args = array(
 			'menu_icon' => 'dashicons-portfolio',
			'labels' => $labels,
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'query_var' => true,
			'capability_type' => 'post',
			'hierarchical' => false,
			'has_archive' => true,
			'taxonomy' => array('categoria-extensao'),
			'menu_position' => 6,
			'supports' => array('title','editor','comments','thumbnail','category','gallery','page-attributes'),
			'rewrite' => array('slug' => 'extensao')
	  );
	register_post_type('extensao',$args);
}

register_taxonomy("categoria-extensao", array("extensao"),
	array(
		"hierarchical" => true,
		"label" => "categoria Extensão",
		"singular_label" => "categoria Extensão",
		'rewrite' => array( 'slug' => 'categoria-extensao' )
	)
);


/* CRIA OS DEPOIMENTOS */
add_action('init', 'depoimentos_register');
function depoimentos_register() {
	 $labels = array(
			'name' => 'Depoimentos',
			'singular_name' => 'Post',
			'all_items' => 'Todos Depoimentos',
			'add_new' => 'Adicionar Depoimentos',
			'add_new_item' => 'Adicionar Depoimento',
			'edit_item' => 'Editar Depoimento',
			'new_item' => 'Novo Depoimento',
			'view_item' => 'Ver Depoimentos',
			'search_items' => 'Procurar Depoimentos',
			'not_found' =>  'Nada encontrado',
			'not_found_in_trash' => 'Nada encontrado no lixo',
			'parent_item_colon' => '',
			'menu_icon'   => 'teste',
	);
	$args = array(
 			'menu_icon' => 'dashicons-portfolio',
			'labels' => $labels,
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'query_var' => true,
			'capability_type' => 'post',
			'hierarchical' => false,
			'has_archive' => true,
			'taxonomy' => array('categoria-depoimentos'),
			'menu_position' => 6,
			'supports' => array('title','editor','comments','thumbnail','category','gallery','page-attributes'),
			'rewrite' => array('slug' => 'depoimentos')
	  );
	register_post_type('depoimentos',$args);
}

?>
