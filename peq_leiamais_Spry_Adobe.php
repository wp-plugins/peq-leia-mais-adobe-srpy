<?php
/*
Plugin Name: peq Leia Mais Spry Adobe
Plugin URI: http://peq.110mb.com
Description: Efeito de leia mais em texto um efeito da biblioteca Spry da adobe integrada no wordpress, use com moderação.

Author: Pablo Erick - pabloprogramador@gmail.com
Version: 1.0
Author URI: http://peq.110mb.com
*/

/*  Copyright YEAR  PLUGIN_AUTHOR_NAME  (email : pabloprogramador@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

/*
FORMA DE USAR:
[peqLeia link="leia mais"]vai que da rapa[/peqLeia]
*/

//DEFINE AQUI NOME DO PLUGIN
define( 'peqLeia_PEQ_PLUGIN', 'peq_leiamais_Spry_Adobe' );

///DEFININDO PASTA LOCAL
if ( ! defined( 'peqLeia_PLUGIN_BASENOME' ) )
  define( 'peqLeia_PLUGIN_BASENOME', plugin_basename( __FILE__ ) );

if ( ! defined( 'peqLeia_PLUGIN_NOME' ) )
  define( 'peqLeia_PLUGIN_NOME', trim( dirname( peqLeia_PLUGIN_BASENOME ), '/' ) );

if ( ! defined( 'peqLeia_PLUGIN_PASTA' ) )
  define( 'peqLeia_PLUGIN_PASTA', '../wp-content/plugins/' . peqLeia_PLUGIN_NOME .'/');


//CHAMADAS HOOKS
global $shortcode_tags;//comando filha da mae de achar
//add_action('admin_menu', 'peqLeia_meu_plugin_menu');
add_action('wp_head', 'peqLeia_cabecalho', 10);
//add_filter('the_content', 'peqLeia_conteudo', 1);
add_shortcode('peqPopup', 'peqLeia_substituir_my_tags'); //TAGS PERSONALISADAS 

//add_filter('the_content', 'do_shortcode');
//add_filter('the_excerpt', 'do_shortcode');
//add_filter('widget_text', 'do_shortcode');
add_filter( 'widget_text', 'shortcode_unautop');
add_filter( 'widget_text', 'do_shortcode');
add_filter( 'the_excerpt', 'shortcode_unautop');
add_filter( 'the_excerpt', 'do_shortcode');
add_filter( 'the_content', 'shortcode_unautop');
add_filter( 'the_content', 'do_shortcode');

global $id_spry;
$id_spry = 0;
//CRIACAO DE DADOS
//if (get_option(peqLeia_PEQ_PLUGIN.'_px') == '') add_option(peqLeia_PEQ_PLUGIN.'_px', '10');
//if (get_option(peqLeia_PEQ_PLUGIN.'_py') == '') add_option(peqLeia_PEQ_PLUGIN.'_py', '10');
//if (get_option(peqLeia_PEQ_PLUGIN.'_efeito') == '') add_option(peqLeia_PEQ_PLUGIN.'_efeito', 'Fade');
//if (get_option(peqLeia_PEQ_PLUGIN.'_duracao') == '') add_option(peqLeia_PEQ_PLUGIN.'_duracao', '1500');
//if (get_option(peqLeia_PEQ_PLUGIN.'_segueMouse') == '') add_option(peqLeia_PEQ_PLUGIN.'_segueMouse', 'false');

//SALVA DADOS 
//if (isset($_POST['peqLeia_salvar'])) {
//  update_option(peqLeia_PEQ_PLUGIN.'_px', $_POST['dados1']);
//  update_option(peqLeia_PEQ_PLUGIN.'_py', $_POST['dados2']);
//  update_option(peqLeia_PEQ_PLUGIN.'_efeito', $_POST['dados3']);
//  update_option(peqLeia_PEQ_PLUGIN.'_duracao', $_POST['dados4']);
//  update_option(peqLeia_PEQ_PLUGIN.'_segueMouse', $_POST['dados5']);
  //echo '<div class="updated"><p><strong>Salvo com sucesso.</strong></p></div>';
//}
  
//CONSTRUINDO O MENU  ADMIN
//mudar nome
//function peqLeia_meu_plugin_menu() {
  //add_menu_page(peqLeia_PEQ_PLUGIN, peqLeia_PEQ_PLUGIN, 10, peqLeia_PLUGIN_NOME, "peqLeia_admin_pag_1", peqLeia_PLUGIN_PASTA.'menu-icon.png');
  //add_submenu_page(PLUGIN_NOME, "subPrimeiro", "subPrimeiro", 10, PLUGIN_NOME."_1", "funcao1");
//}

//FUNCOES CHAMADAS PELO MENU
/*
function peqLeia_admin_pag_1() {
  if (!current_user_can('manage_options'))  {
    wp_die( __('Sem permissão para acessar.') );
  }

}
*/
//FUNCAO CHAMADA NO CABECALHO DO SITE
function peqLeia_cabecalho($cabecalho_texto = '') {
  $wpurl = get_bloginfo('wpurl');
  $cabecalho_texto .= '<script type="text/javascript" src="'.$wpurl.'/wp-content/plugins/'.peqLeia_PLUGIN_NOME.'/tooltip/SpryTooltip.js"></script>';
  //$content .= '<script type="text/javascript" src="'. $wpurl .'/wp-content/plugins/tippy/dom_tooltip.js"></script>';
  echo $cabecalho_texto;
}

//MODIFICA O CONTEUDO
function peqLeia_conteudo($conteudo_texto) {
  //$wpurl = get_bloginfo('wpurl');
  //$content .= 'teste';
  //$content .= get_option(PEQ_PLUGIN.'_valor1');
  //$content .= '<script type="text/javascript" src="'. $wpurl .'/wp-content/plugins/tippy/dom_tooltip.js"></script>';
  //$conteudo_texto .= "";
  echo $conteudo_texto;
}

//SUBSTITUI TAGS PERSONALIZADAS
function peqLeia_substituir_my_tags($atts, $content = '') {
  global $id_spry;
  $id_spry++;
  extract(shortcode_atts(array(
  'link' => 'leia mais...',
  ), $atts));
  return 'teste';
}
?>