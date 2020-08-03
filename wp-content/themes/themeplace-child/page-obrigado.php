<?php
/**
 * The template for displaying Author Archive.
 * Edited by DNA For Marketing Dev Team
 *
 * @package themeplace
 */
$queriedObject = get_queried_object();

get_header();

?>
<section class="themeplace-page-section">
    <div class="container">
    <div class="text-center">
        <?php
            echo($queriedObject->post_content);
            if (isset($_GET['parceiro'])){
                $parceiroInf = get_post($_GET['parceiro']);
        ?>
        <p>
            A mensagem foi enviada para: <?php echo($parceiroInf->post_title); ?>
        </p>
        <?php
            }
        ?>
    </div>
        
    </div>
</section>

<?php get_footer(); ?>