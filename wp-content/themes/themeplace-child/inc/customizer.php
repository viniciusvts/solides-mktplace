<?php
/**
 * Adiciona  opções de personalização para o usuário no menu Aparencia >> personalização
 *
 * @package DNA
 * @subpackage Lafaete tema
 * @author Vinicius de Santana
 */
add_action('customize_register','dnaTheme_register_panelsAndSections');
function dnaTheme_register_panelsAndSections( $wp_customize ) {
    // start panel
    $dnaTheme_panel = array(
        'priority'       => 10,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => 'Tema DNA',
        'description'    => 'Editar opções do tema DNA',
    );
    $wp_customize->add_panel( 'dnaTheme_panel', $dnaTheme_panel);
    // end panel

    // start sections //
    $dnaTheme_section_parceiros = array(
        'title' => 'Página Parceiros', 
        'priority'          => 80,
        'panel'  => 'dnaTheme_panel',
    );
    $wp_customize->add_section('dnaTheme_section_parceiros', $dnaTheme_section_parceiros);
    // end sections //

        // start settings and controls
    /* https://codex.wordpress.org/Class_Reference/WP_Customize_Manager/add_control => type: text, checkbox, radio, select, textarea, dropdown-pages, email, url, number, hidden, and date.*/

    $dnaTheme_setting_rotuloCategorias = array( 
        'default' => 'Categorias:',
        'transport' => 'refresh', // or postMessage
    );
    $dnaTheme_control_rotuloCategorias = array(
        'label' => 'Rótulo da seção categoria',
        'section' => 'dnaTheme_section_parceiros',
        'settings' => 'dnaTheme_setting_rotuloCategorias',
    );
    $wp_customize->add_setting('dnaTheme_setting_rotuloCategorias', $dnaTheme_setting_rotuloCategorias);
    $wp_customize->add_control('dnaTheme_control_rotuloCategorias', $dnaTheme_control_rotuloCategorias);

    $dnaTheme_setting_rotuloNivelParceiro = array( 
        'default' => 'Nível do parceiro:',
        'transport' => 'refresh', // or postMessage
    );
    $dnaTheme_control_rotuloNivelParceiro = array(
        'label' => 'Rótulo da seção nível do parceiro',
        'section' => 'dnaTheme_section_parceiros',
        'settings' => 'dnaTheme_setting_rotuloNivelParceiro',
    );
    $wp_customize->add_setting('dnaTheme_setting_rotuloNivelParceiro', $dnaTheme_setting_rotuloNivelParceiro);
    $wp_customize->add_control('dnaTheme_control_rotuloNivelParceiro', $dnaTheme_control_rotuloNivelParceiro);

    $dnaTheme_setting_rotuloSobre = array( 
        'default' => 'Sobre:',
        'transport' => 'refresh', // or postMessage
    );
    $dnaTheme_control_rotuloSobre = array(
        'label' => 'Rótulo da seção sobre',
        'section' => 'dnaTheme_section_parceiros',
        'settings' => 'dnaTheme_setting_rotuloSobre',
    );
    $wp_customize->add_setting('dnaTheme_setting_rotuloSobre', $dnaTheme_setting_rotuloSobre);
    $wp_customize->add_control('dnaTheme_control_rotuloSobre', $dnaTheme_control_rotuloSobre);

    $dnaTheme_setting_rotuloCertificados = array( 
        'default' => 'Certificados:',
        'transport' => 'refresh', // or postMessage
    );
    $dnaTheme_control_rotuloCertificados = array(
        'label' => 'Rótulo da seção certificados',
        'section' => 'dnaTheme_section_parceiros',
        'settings' => 'dnaTheme_setting_rotuloCertificados',
    );
    $wp_customize->add_setting('dnaTheme_setting_rotuloCertificados', $dnaTheme_setting_rotuloCertificados);
    $wp_customize->add_control('dnaTheme_control_rotuloCertificados', $dnaTheme_control_rotuloCertificados);

    $dnaTheme_setting_rotuloRegiao = array( 
        'default' => 'Região:',
        'transport' => 'refresh', // or postMessage
    );
    $dnaTheme_control_rotuloRegiao = array(
        'label' => 'Rótulo da seção região',
        'section' => 'dnaTheme_section_parceiros',
        'settings' => 'dnaTheme_setting_rotuloRegiao',
    );
    $wp_customize->add_setting('dnaTheme_setting_rotuloRegiao', $dnaTheme_setting_rotuloRegiao);
    $wp_customize->add_control('dnaTheme_control_rotuloRegiao', $dnaTheme_control_rotuloRegiao);
    // end setting and controls
}
