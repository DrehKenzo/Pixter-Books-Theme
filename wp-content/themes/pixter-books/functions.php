<?php 

//Registrar imagem em destaque
add_theme_support('post-thumbnails');


//Registrar menus
function registrarMenu(){
  register_nav_menu('header-menu', 'main-menu');
}
add_action('init', 'registrarMenu');


// Registrar Livros
function cadastrando_livros(){

  $nomeSingular = 'Livro Digital';
  $nomePlural = 'Livros Digitais';
  $description = 'Livros digitais da Pixter';
  
  $labels = array(
    'name' => $nomePlural,
    'name_singular' => $nomeSingular,
    'add_new_item' => 'Adicionar novo ' . $nomeSingular,
    'edit_item' => 'Editar' . $nomeSingular,
  );
  
$suportes = array(
  'title',
  'editor',
  'thumbnail',
  'taxonomies',
);

  $args = array(
    'labels' => $labels,
    'public' => true,
    'description' => $description,
    'menu_icon' => 'dashicons-book',
    'supports' => $suportes,
  );
  
  register_post_type('livros', $args );
}

add_action('init', 'cadastrando_livros');


// Criar rota para CPT de livros
add_action('rest_api_init', 'custom_api_get_livros');
function custom_api_get_livros(){
  register_rest_route( 'livros', '/todos-os-livros', array(
    'methods' => 'GET',
    'callback' => 'custom_api_get_livros_callback'
  ));
}

function custom_api_get_livros_callback($request){
  $posts_data = array();
  $paged = $request->get_param('page');
  $paged = (isset($paged) || !(empty($paged))) ? $paged : 1;
  $posts = get_posts( array(
    'post_type'       => 'livros',
    'status'          => 'published',
    'posts_per_page'  => 8,
    'orderby'         => 'post_date',
    'order'           => 'DESC',
    'paged'           => $paged
  ));
  
  foreach($posts as $post){
    $id = $post->ID;
    $post_thumbnail = (has_post_thumbnail($id)) ? get_the_post_thumbnail_url($id) : null;
    $post_cat = get_the_category($id);
    // $featured = (get_field('livros_featured', $id)) ? true : false;
    $posts_data[] = (object)array(
      'id' => $id,
      'slug' => $post->post_name,
      'type' => $post->post_type,
      'title' => $post->post_title,
      'featured_img_src' => $post_thumbnail,
      // 'featured' => $featured,
      'category' => $post_cat[0]->cat_name
    );
  }
  return $posts_data;
}

/* Adiciona Imagem Destacada na Coluna da Listagem de Posts */
if ( function_exists( 'add_theme_support' ) ) {
  add_image_size( 'admin-thumb', 100, 150 ); // 100 pixels de largura (e altura ilimitada)
  }
   
  add_filter('manage_posts_columns', 'posts_columns', 5);
  add_action('manage_posts_custom_column', 'posts_custom_columns', 5, 2);
   
  function posts_columns($defaults){
  $defaults['my_post_thumbs'] = __('Capa do livro'); //Modifique o nome para o que desejar
  return $defaults;
  }
   
  function posts_custom_columns($column_name, $id){
  if($column_name === 'my_post_thumbs'){
  echo the_post_thumbnail( 'admin-thumb' );
  }
}

// function your_columns_head($defaults) {
 
//   $new = array();
//   $tags = $defaults['my_post_thumbs']; // Salva a coluna Imagem
//   unset($defaults['my_post_thumbs']); // Remove a coluna Imagem da lista
   
//   foreach($defaults as $key=>$value) {
//   if($key=='title') { // Quando encontrar a coluna titulo
//   $new['my_post_thumbs'] = $tags; // Coloque a coluna Imagem antes dele
//   }
//   $new[$key]=$value;
//   }
   
//   return $new;
//   }
//   add_filter('manage_posts_columns', 'your_columns_head');

//Gerar titulo das páginas
function geraTitulo(){
  bloginfo('name');
  if(!is_home()) echo " | "; 
  the_title();
}


//Registrando Widget
function add_widget_Support() {
  register_sidebar( array(
    'name'          => 'Links Rodapé',
    'id'            => 'links-rodape',
    'before_widget' => '<div>',
    'after_widget'  => '</div>',
    'before_title'  => '<h2>',
    'after_title'   => '</h2>', 
));
}

add_action( 'widgets_init', 'add_Widget_Support' );


//Registrando Widgets Extras
if ( function_exists('register_sidebar') ) {
  $sidebar1 = array(
    'name'          => 'Infomação 01',
    'id'            => 'informacao-01',
    'before_widget' => '<div>',
    'after_widget'  => '</div>',
    'before_title'  => '<h2>',
    'after_title'   => '</h2>',
  ); 
  $sidebar2 = array(
    'name'          => 'Infomação 02',
    'id'            => 'informacao-02',
    'before_widget' => '<div>',
    'after_widget'  => '</div>',
    'before_title'  => '<h2>',
    'after_title'   => '</h2>',
  ); 
  $sidebar3 = array(
    'name'          => 'Infomação 03',
    'id'            => 'informacao-03',
    'before_widget' => '<div>',
    'after_widget'  => '</div>',
    'before_title'  => '<h2>',
    'after_title'   => '</h2>',
  );  
  $sidebar4 = array(
    'name'          => 'Infomação 04',
    'id'            => 'informacao-04',
    'before_widget' => '<div>',
    'after_widget'  => '</div>',
    'before_title'  => '<h2>',
    'after_title'   => '</h2>',
  ); 
  $sidebar5 = array(
    'name'          => 'Infomação 05',
    'id'            => 'informacao-05',
    'before_widget' => '<div>',
    'after_widget'  => '</div>',
    'before_title'  => '<h2>',
    'after_title'   => '</h2>',
  );
  
  register_sidebar($sidebar1);
  register_sidebar($sidebar2);
  register_sidebar($sidebar3);
  register_sidebar($sidebar4);
  register_sidebar($sidebar5);
}


//remover itens da barra de menu
function remove_admin_bar_options() {
  global $wp_admin_bar;

  $wp_admin_bar->remove_menu('wp-logo');
	$wp_admin_bar->remove_menu('comments');
	$wp_admin_bar->remove_menu('updates');
  $wp_admin_bar->remove_menu('new-content');
  $wp_admin_bar->remove_menu('wpseo-menu');
}

add_action('wp_before_admin_bar_render', 'remove_admin_bar_options', 0);


// remover menu
add_action('admin_head', 'submenus');

function submenus() {
  echo '
  <style>
    
    
  </style>';
}
