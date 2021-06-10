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
        'nivel_parceiro_' => 'ASC',
        'score_' => 'DESC',
    ),
);
$query = new WP_Query($args);
$parceiros = $query->posts;
$acf = '';
// para pegar tdos os niveis de parceiros que possuem 1 ou mais parceiros cadastrados
$parcNiveis = [];
foreach ($parceiros as $parc) {
    $acfFields = get_fields($parc->ID);
    $nivelParc = $acfFields['nivel_parceiro'];
    $parcV[] = $nivelParc['value'];
    $parcL[] = $nivelParc['label'];
}
$parcV = array_unique($parcV);
$parcL = array_unique($parcL);
?>
<div class="container">
    <div class="download-filter">
        <ul class="list-inline">
            <li class="select-cat list-inline-item" data-filter="*">Todos</li>
            <?php
            foreach ($parcV as $key => $p) {
            ?>
            <li class="list-inline-item" data-filter=".<?php echo $parcV[$key]; ?>">
                <?php echo $parcL[$key]; ?>
            </li>
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
            $nivelParc = $acfFields['nivel_parceiro'];
        ?>
        <div class="col-md-3 col-sm-4 col-xs-6 <?php echo $nivelParc['value'] ?>"
        style="position: absolute; left: 0px; top: 0px;">
            <div class="download-item">
                <div class="download-item-image">
                    <a href="<?php echo $link ?>">
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