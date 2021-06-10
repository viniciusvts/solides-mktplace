<?php
/**
 * Template to display Parceiros
 * by DNA For Marketing Dev Team
 * @author Vinicius de Santana
 * @package themeplace-child
 */

get_header();

global $themeplace_opt;
$queriedObject = get_queried_object();
$acfFields = get_fields($queriedObject->ID);
$categories = wp_get_post_terms($queriedObject->ID, 'categoria_parceiros');
$img = $acfFields['foto'];
$certs = $acfFields['certificados'];
$nivelParc = $acfFields['nivel_parceiro'];
$sobre = $acfFields['sobre'];
$link = $acfFields['link'];
$endereco = $acfFields['endereco'];
$email = $acfFields['email'];
$site = $acfFields['site'];
$linkedin = $acfFields['linkedin'];
$telefone = $acfFields['telefone'];
$mapa = $acfFields['mapa'];
?>
    <section class="themeplace-page-section">
        <div class="container">
            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="author-profile-sidebar">
                        <div class="author-info">
                            <div class="author-pic">
                                <img width="200" height="200" 
                                src="<?php echo $img['sizes']['medium'] ?>" 
                                class="avatar avatar-200 wp-user-avatar wp-user-avatar-200 alignnone photo"
                                alt="<?php echo $img['alt'] ?>">
                            </div>
                            <h3><?php echo $queriedObject->post_title; ?></h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="author-info-box mb-0 h-100 d-flex">
                        <h3 class="text-center m-auto">BUSSINESS<br> <?php echo $nivelParc['label'] ?></h3>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="author-info-box mb-0 h-100 d-flex">
                        <div class="menu-item menu-login-url m-auto" style="margin-right: auto!important;margin-left: auto!important;">
                            <a class="p-2 px-4" href="#contato"
                            data-toggle="modal" data-target="#DNAmodal">Contato</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="author-info-box m-0 h-100">
                        <h3 class="widget-title mb-4">ÁREAS DE ATUAÇÃO</h2>
                        <ul class="list-inline" style="border:0;">
                            <?php
                            foreach ($categories as $cat) {
                                /**adicionar ao final o slug da categoria */
                                $url = 'http://solides_mktplace.localhost/?s=&post_type=parceiros&categoria_parceiros=';
                            ?>
                                <li class="mb-2">
                                    <a href="<?php echo $url.$cat->slug ?>"><?php echo $cat->name ?></a>
                                </li>
                            <?php
                            }
                            ?>
                        </ul>
                    </div>
                </div>
                <div class="col-8">
                    <div class="row">
                        <div class="col-12 mb-4">
                            <div class="author-info-box w-100 m-0 px-5 text-left infodna">
                                <?php
                                if ($site){
                                ?>
                                    <a class="mt-0 mb-3 d-block" href="<?php echo $site ?>">
                                        <h6>
                                            <img class="data-icone" src="<?php echo(get_stylesheet_directory_uri()); ?>/assets/img/globe-solid.svg" alt="">
                                            <?php echo $site ?>
                                        </h6>
                                    </a>
                                <?php
                                }
                                if ($linkedin){
                                ?>
                                    <a class="mt-0 mb-3 d-block" href="<?php echo $linkedin ?>">
                                        <h6>
                                            <img class="data-icone" src="<?php echo(get_stylesheet_directory_uri()); ?>/assets/img/linkedin-in-brands.svg" alt="">
                                            <?php echo $linkedin ?>
                                        </h6>
                                    </a>
                                <?php
                                }
                                if ($email){
                                ?>
                                    <a class="mt-0 mb-3 d-block" href="mailto:<?php echo $email ?>">
                                        <h6>
                                            <img class="data-icone" src="<?php echo(get_stylesheet_directory_uri()); ?>/assets/img/envelope-solid.svg" alt="">
                                            <?php echo $email ?>
                                        </h6>
                                    </a>
                                <?php
                                }
                                if ($telefone){
                                ?>
                                    <a class="mt-0 mb-3 d-block" href="tel:<?php echo $telefone ?>">
                                        <h6>
                                            <img class="data-icone" src="<?php echo(get_stylesheet_directory_uri()); ?>/assets/img/phone-alt-solid.svg" alt="">
                                            <?php echo $telefone ?>
                                        </h6>
                                    </a>
                                <?php
                                }
                                ?>
                                <a class="mt-0 d-block" href="https://universidade.solides.com.br/">
                                    <h6 class="mb-0">
                                        <img class="data-icone" src="<?php echo(get_stylesheet_directory_uri()); ?>/assets/img/logo-solides.png" alt="">
                                        https://universidade.solides.com.br/
                                    </h6>
                                </a>
                                <!-- <h7><?php echo 'Parceiro desde: '.date_format(
                                                    date_create($queriedObject->post_date),"d/m/Y"
                                                ); ?></h7> -->
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <?php
                                if ($sobre){
                                ?>
                                <div class="col-md-12">
                                    <div class="author-info-box mb-0 px-5">
                                        <h3 class="widget-title mb-4">SOBRE</h2>
                                        <?php echo $sobre; ?>
                                    </div>
                                </div>
                                <?php
                                }
                                ?>
                            </div>                    
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                if($certs){
                ?>
                <div class="col-md-12 mb-4">
                    <div class="author-info-box mb-0">
                        <h3><?php echo get_theme_mod( 'dnaTheme_setting_rotuloCertificados') ?></h3>
                        <ul class="list-inline author-product">
                        <?php
                        foreach ($certs as $cert) {
                            $certFields = get_fields($cert['certificado']->ID);
                            $certImage = $certFields['imagem'];
                            $certNome = $cert['certificado']->post_title;
                            $certEmissao = $cert['data_emissao'];
                        ?>
                            <li class="list-inline-item scale-on-hover col-6 col-lg-3 p-3"
                            style="margin-bottom: 1rem !important;padding-bottom: 1rem !important;">
                                <img src="<?php echo $certImage['sizes']['thumbnail'] ?>"
                                alt="<?php echo $certImage{'alt'} ?>">
                                <b><?php echo $certNome ?></b>
                                <?php
                                // if ($certEmissao){
                                //     echo 'Emitido em: ';
                                //     echo $certEmissao;
                                // }
                                ?>
                            </li>
                        <?php
                        }
                        ?>
                        </ul>
                    </div>
                </div>
                <?php
                }
                if ($mapa){
                ?>
                <div class="col-md-12">
                    <div class="author-info-box">
                        <h3><?php echo get_theme_mod( 'dnaTheme_setting_rotuloRegiao') ?></h3>
                        <div class="author-product mapa-parceiro"><?php echo $mapa ?></div>
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
        </div>
    </section>
    <!-- Modal de envio do form -->
    <div class="modal fade" id="DNAmodal" tabindex="-1" role="dialog" aria-labelledby="tituloModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tituloModal">Entre em contato com <?php echo $queriedObject->post_title; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/wp-json/dna_ccp/v1/parceiro" method="post" id="contatoParceiro">
                        <input type="hidden" name="parceiro" value="<?php echo($queriedObject->ID); ?>">
                        <input type="hidden" name="emailparceiro" value="<?php echo($email); ?>">
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control" name="nome" placeholder="Nome" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email"
                            aria-describedby="ajudaEmail" placeholder="Email" required>
                            <small id="ajudaEmail" class="form-text text-muted">Insira um email corporativo</small>
                        </div>
                        <div class="form-group">
                            <label for="website">Website</label>
                            <input type="url" class="form-control" name="website" placeholder="Website" required>
                        </div>
                        <div class="form-group">
                            <label for="telefone">Telefone</label>
                            <input type="tel" class="form-control" name="telefone" placeholder="Telefone" required>
                        </div>
                        <div class="form-group">
                            <label for="mensagem">Mensagem</label>
                            <textarea class="form-control" name="mensagem" placeholder="Mensagem" required></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary" onclick="document.getElementById('contatoParceiro').submit()">Enviar</button>
                </div>
            </div>
        </div>
    </div>
    
    <style>
    .scale-on-hover:hover{
        transform: scale(1.1);
        transition: all .5s;
    }
    .scale-on-hover{
        transition: all .5s;
    }
    .mapa-parceiro iframe{
        width: 100%!important;
    }
    .author-profile-sidebar .author-info h3 {
        font-size: 22px;
        margin-top: 15px;
        font-weight: 600;
        display: inline-block;
        color: #2e3d62;
        margin-bottom: 10px;
    }
    .modal-footer{
        border-top:0;
    }
    </style>
<?php get_footer(); ?>