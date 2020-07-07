<?php
// recupera dados dos parceiros
$args = array(
    'post_type' => 'parceiros',
    
    'meta_query' => array(
        'relation' => 'AND',
        'nivel_parceiro_' => array(
            'key' => 'nivel_parceiro',
        ),
        'score_' => array(
            'key' => 'score',
        ), 
    ),
    'orderby' => array( 
        'nivel_parceiro_' => 'DESC',
        'score_' => 'DESC',
    ),
);
$query = new WP_Query($args);
$parceiros = $query->posts;

// recupera dados dos certificados
$args = array(
    'post_type' => 'certificados',
);
$query = new WP_Query($args);
$certificados = $query->posts;
?>
<div class="container">
    <div class="download-filter">
        <ul class="list-inline">
            <li class="select-cat list-inline-item" data-filter="*">All Items</li>
            <?php
            foreach ($certificados as $cert) {
            ?>
            <li class="list-inline-item"
            data-filter=".<?php echo $cert->post_name ?>"><?php echo $cert->post_title ?></li>
            <?php
            }
            ?>
        </ul>
    </div>
    <div class="download_items row" style="position: relative; height: 3234.75px;">
        <?php
        foreach ($parceiros as $parc) {
            $link = get_permalink($parc->ID);
            $acfFields = get_fields($parc->ID);
            $img = $acfFields['foto'];
            $certs = $acfFields['certificados'];
            $nivelParc = $acfFields['nivel_parceiro'];
            $certsSlugS = '';
            if($certs){
                foreach ($certs as $cert) {
                    $certsSlugS .= $cert['certificado']->post_name;
                    $certsSlugS .= ' ';
                }
            }
        ?>
        <div class="col-md-4 col-sm-4 col-xs-6 <?php echo $certsSlugS ?>"
        style="position: absolute; left: 0px; top: 0px;">
            <div class="download-item">
                <div class="download-item-image">
                    <a href="<?php echo $link ?>">
                        <h5 class="nivel-parc <?php echo $nivelParc['value'] ?>"><?php echo $nivelParc['label'] ?></h5>
                        <img width="1280" height="720" 
                        src="<?php echo $img['sizes']['medium'] ?>" 
                        class="attachment-post-thumbnail size-post-thumbnail wp-post-image"
                        alt="<?php echo $img['alt'] ?>">
                    </a>
                </div>
            </div>
        </div>
        <?php
        }
        ?>
    </div>
</div>
<style>
h5.nivel-parc{
    position: absolute;
    padding: 10px 15px;
    background-color: #fafafa;
}
h5.nivel-parc.val1{
    color: white;
    background-color: #cd7f32;
}
h5.nivel-parc.val2{
    background-color: silver;
}
h5.nivel-parc.val3{
    background-color: gold;
}
h5.nivel-parc.val4{
    background-color: #6BABB1;
}
h5.nivel-parc.val5{
    color: white;
    background-color: #6BABB1;
}
</style>