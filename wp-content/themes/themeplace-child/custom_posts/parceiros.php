<?php
function custom_parceiros() {
	$labels = array(
		'name'                  => _x( 'Parceiros', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Parceiros', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Parceiros', 'text_domain' ),
		'name_admin_bar'        => __( 'Parceiros', 'text_domain' ),
		'archives'              => __( 'Parceiros Arquivados', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'Todos os parceiros', 'text_domain' ),
		'add_new_item'          => __( 'Adicionar novo parceiro', 'text_domain' ),
		'add_new'               => __( 'Adicionar novo', 'text_domain' ),
		'new_item'              => __( 'Novo parceiro', 'text_domain' ),
		'edit_item'             => __( 'Editar parceiro', 'text_domain' ),
		'update_item'           => __( 'Atualizar parceiro', 'text_domain' ),
		'view_item'             => __( 'Ver parceiro', 'text_domain' ),
		'search_items'          => __( 'Buscar parceiro', 'text_domain' ),
		'not_found'             => __( 'Nenhum cadastrado', 'text_domain' ),
		'not_found_in_trash'    => __( 'Nenhum na lixeira', 'text_domain' ),
		'featured_image'        => __( 'Imagem destaque', 'text_domain' ),
		'set_featured_image'    => __( 'Definir imagem', 'text_domain' ),
		'remove_featured_image' => __( 'Remover imagem', 'text_domain' ),
		'use_featured_image'    => __( 'Usar imagem parceiro', 'text_domain' ),
		'insert_into_item'      => __( 'Inserir no parceiro', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Subir para parceiro', 'text_domain' ),
		'items_list'            => __( 'Lista de parceiro', 'text_domain' ),
		'items_list_navigation' => __( 'Navegar pelos parceiro', 'text_domain' ),
		'filter_items_list'     => __( 'Filtrar parceiro', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Parceiros', 'text_domain' ),
		'description'           => __( 'Cadastrar parceiro', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title' ),
		'taxonomies'            => array( 'categoria_parceiros' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'show_in_rest'          => true,
		'menu_position'         => 30,
		'menu_icon'				=> 'dashicons-groups',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'parceiros', $args );
}
add_action( 'init', 'custom_parceiros', 0 );

// Register Custom Post Type Categoria
function tax_parceiros() {
	$labels = array(
		'name'                       => _x( 'Categorias do parceiro', 'Taxonomy General Name', 'dna' ),
		'singular_name'              => _x( 'Categoria do parceiro', 'Taxonomy Singular Name', 'dna' ),
		'menu_name'                  => __( 'Categorias', 'dna' ),
		'all_items'                  => __( 'Todas as categorias', 'dna' ),
		'parent_item'                => __( 'Categoria mãe', 'dna' ),
		'parent_item_colon'          => __( 'Categoria mãe:', 'dna' ),
		'new_item_name'              => __( 'Nova Categoria do parceiro', 'dna' ),
		'add_new_item'               => __( 'Adicionar Categoria do parceiro', 'dna' ),
		'edit_item'                  => __( 'Editar Categoria do parceiro', 'dna' ),
		'update_item'                => __( 'Atualizar Categoria do parceiro', 'dna' ),
		'view_item'                  => __( 'Ver Categoria do parceiro', 'dna' ),
		'separate_items_with_commas' => __( 'Separar categorias por vírgula', 'dna' ),
		'add_or_remove_items'        => __( 'Adicionar ou remover Categoria do parceiro', 'dna' ),
		'choose_from_most_used'      => __( 'Mostrar categorias mais usadas', 'dna' ),
		'popular_items'              => __( 'Categorias populares', 'dna' ),
		'search_items'               => __( 'Buscar Categoria do parceiro', 'dna' ),
		'not_found'                  => __( 'Nada encontrado', 'dna' ),
		'no_terms'                   => __( 'Nenhuma Categoria do parceiro', 'dna' ),
		'items_list'                 => __( 'Lista de categorias', 'dna' ),
		'items_list_navigation'      => __( 'Navegar por Categoria do parceiro', 'dna' ),
	);
	$rewrite = array(
		'slug'                       => 'categoria_parceiros',
		'with_front'                 => false,
		'hierarchical'               => true,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		"show_in_rest"				 => true,
		'rewrite'                    => $rewrite,
	);
	register_taxonomy( 'categoria_parceiros', array( 'parceiros' ), $args );
}
add_action( 'init', 'tax_parceiros', 0 );
