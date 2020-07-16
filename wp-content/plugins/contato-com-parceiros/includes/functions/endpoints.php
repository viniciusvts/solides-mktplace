<?php

/**
 * Função a ser usada no rest api para enviar dados para parceiro
 * @author Vinicius de Santana
 */
function dnaapi_ccp($req){
  // pega os parametros
  $nome = $req->get_param('nome');
  $email = $req->get_param('email');
  $website = $req->get_param('website');
  $telefone = $req->get_param('telefone');
  $mensagem = $req->get_param('mensagem');
  $parceiro = $req->get_param('parceiro');
  $emailparceiro = $req->get_param('emailparceiro');
  //paranauê e aú sem mão
  $identificaparceiro = $parceiro.', '.$emailparceiro;
  $bdReturn = insertNewData($nome, $email, $website, $telefone, $mensagem, $identificaparceiro);
  // envia email
  $to = $emailparceiro;
  $subject = 'Sólides Market Place - contato com o parceiro';
  $message = "Nome: ".$nome
      ."<br>Email: ".$email
      ."<br>website: ".$website
      ."<br>telefone: ".$telefone
      ."<br>mensagem: ".$mensagem;
  $headers = array('Content-Type: text/html; charset=UTF-8');
  $wpmail = wp_mail( $to, $subject, $message, $headers );
  if (!$bdReturn) return 'Houve um erro ao processar, tente novamente.';
  $url = '/obrigado/?parceiro='.$parceiro;
  wp_redirect($url);
  exit;
}

/**
 * Função registra o endpoint
 * @author Vinicius de Santana
 */
function dnaapi_register_ccp(){
  register_rest_route('dna_ccp/v1',
    '/parceiro',
    array(
      'methods' => 'POST',
      'callback' => 'dnaapi_ccp',
      'description' => 'Este endpoint recebe as informações e envia um email',
      'args' => array(
        'nome' => array(
          'required' => true,
        ),
        'email' => array(
          'required' => true,
        ),
        'website' => array(
          'required' => true,
        ),
        'telefone' => array(
          'required' => true,
        ),
        'mensagem' => array(
          'required' => true,
        ),
        'parceiro' => array(
          'required' => true,
        ),
      )
    )
  );
}

add_action('rest_api_init', 'dnaapi_register_ccp');