<?php
// recupera dados dos parceiros
$args = array(
    'post_type' => 'parceiros',
    'nopaging' => true,
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
$acf = '';
?>
<div class="container">
    <div class="download-filter">
        <ul class="list-inline">
            <li class="select-cat list-inline-item" data-filter="*">Todos</li>
            <li class="list-inline-item" data-filter=".val5">Diamond</li>
            <li class="list-inline-item" data-filter=".val4">Platinum</li>
            <li class="list-inline-item" data-filter=".val3">Gold</li>
            <li class="list-inline-item" data-filter=".val2">Silver</li>
            <li class="list-inline-item" data-filter=".val1">Bronze</li>
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
        ?>
        <div class="col-md-3 col-sm-4 col-xs-6 <?php echo $nivelParc['value'] ?>"
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