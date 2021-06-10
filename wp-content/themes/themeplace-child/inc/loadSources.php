<?php
/**
 * Adiciona os scripts e folha de estilos ao site
 *
 * @package DNA
 * @subpackage loadSources
 * @author Vinicius de Santana
 */
function add_css_and_js() {
// Atenção, get_stylesheet_directory_uri é para child theme
  $jsInternalPath = get_stylesheet_directory() . "/"."assets/js/";
  $jsUriPath = get_stylesheet_directory_uri() . "/"."assets/js/";
  /*if(is_page('simulacao')) {//caso o slug da pagina seja
    $archive = 'simulator.js';
    $urlPath = $jsUriPath . $archive;
    $internalPath = $jsInternalPath . $archive;
    $fileVersion = filemtime($internalPath);
    wp_enqueue_script( $archive, $urlPath, array (), $fileVersion, true);
  } */
  //###############################################################################################
  //styles: wp_enqueue_style( $nome, $origem, $dependencia, $versao, $media );
  $media = 'all';
  $cssInternalPath = get_stylesheet_directory() . "/"."assets/css/";
  $cssUriPath = get_stylesheet_directory_uri() . "/"."assets/css/";

  $archive = 'style.css';
  $urlPath = $cssUriPath . $archive;
  $internalPath = $cssInternalPath . $archive;
  $fileVersion = filemtime($internalPath);
  wp_enqueue_style( $archive, $urlPath, array(), $fileVersion, $media );
}
//do it
add_action( 'wp_enqueue_scripts', 'add_css_and_js' );