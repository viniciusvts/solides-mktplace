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
$img = $acfFields['foto'];
$certs = $acfFields['certificados'];
$nivelParc = $acfFields['nivel_parceiro'];
$sobre = $acfFields['sobre'];
$link = $acfFields['link'];
?>
    <section class="themeplace-page-section">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="author-profile-sidebar">
                        <div class="author-info">
                            <div class="author-pic">
                            <img width="200" height="200" 
                            src="<?php echo $img['sizes']['medium'] ?>" 
                            class="avatar avatar-200 wp-user-avatar wp-user-avatar-200 alignnone photo"
                            alt="<?php echo $img['alt'] ?>">
                            </div>
                            <a href="<?php echo esc_url(
                                                add_query_arg(
                                                    'author-profile',
                                                    'true',
                                                    get_author_posts_url($queriedObject->ID)
                                                )
                                            ); ?>">
                                <?php echo $queriedObject->post_title; ?>
                            </a>
                            <h6><?php echo 'Parceiro desde: '.date_format(
                                                date_create($queriedObject->post_date),"d M Y"
                                            ); ?></h6>
                            <h2 class="widget-title d-lg-none">Certificados:</h2>
                            <ul class="list-inline author-product d-lg-none" style="border:0;">
                            <?php
                            if($certs){
                                foreach ($certs as $cert) {
                                    $certImage = get_field('imagem', $cert['certificado']->ID);
                                ?>
                                    <li class="list-inline-item scale-on-hover">
                                        <img src="<?php echo $certImage['sizes']['medium'] ?>"
                                        alt="<?php echo $certImage{'alt'} ?>">
                                    </li>
                                <?php
                                }
                            }
                            ?>
                            </ul>
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
                </style>
                <div class="col-md-8">
                    <div class="row">
                        <?php
                        if ($nivelParc) {
                        ?>
                        <div class="col-md-6">
                            <div class="author-info-box">
                                <p>Nível do parceiro:</p>
                                <h3>
                                <?php echo $nivelParc['label'] ?></h3>
                            </div>
                        </div>
                        <?php
                        }
                        if ($link) {
                        ?>
                        <div class="col-md-6">
                            <div class="author-info-box">
                                <div class="menu-item menu-login-url mt-4" style="display:block!important;">
                                    <a class="p-2 px-4"
                                    href="<?php echo $link['url'] ?>"><?php echo $link['title'] ?></a>
                                </div>
                            </div>
                        </div>
                        <?php
                        }
                        ?>
                    </div>

                    <div class="row">
                        <?php
                        if ($sobre){
                        ?>
                        <div class="col-md-12">
                            <div class="author-info-box px-5">
                                <h3 class="mb-4">Sobre:</h3>
                                <?php echo $sobre; ?>
                            </div>
                        </div>
                        <?php
                        }
                        if ($certs){
                        ?>
                        <div class="col-md-12">
                            <div class="author-info-box d-none d-lg-block">
                                <h3>Certificados:</h3>
                                <ul class="list-inline author-product">
                                <?php
                                if($certs){
                                    foreach ($certs as $cert) {
                                        $certImage = get_field('imagem', $cert['certificado']->ID);
                                    ?>
                                        <li class="list-inline-item scale-on-hover">
                                            <img src="<?php echo $certImage['sizes']['medium'] ?>"
                                            alt="<?php echo $certImage{'alt'} ?>">
                                        </li>
                                    <?php
                                    }
                                }
                                ?>
                                </ul>
                            </div>
                        </div>
                        <?php
                        }
                        ?>
                    </div>                    
                </div>
            </div>
        </div>
    </section>

<?php get_footer(); ?>