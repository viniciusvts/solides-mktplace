<div class="themeplace-product-search-form mb-5" id="dnaform1">
    <form method="GET" action="<?php echo get_site_url(); ?>">
        <div class="themeplace-download-cat-filter">
            <?php 
                wp_dropdown_categories( array(
                  'show_option_all' => 'Categorias',
                  'name' => 'categoria_parceiros',
                  'id'	=> 'categoria_parceiros',
                  'class'	=> 'themeplace-download-cat-filter focus-disable',
                  'taxonomy' => 'categoria_parceiros',
                  'orderby' => 'name',
                  'echo' => true,
                  'hide_empty' => true,
                  'hierarchical' => false,
                  'value_field' => 'slug',
                ));
            ?>
        </div>
        <div class="themeplace-search-fields">
            <input name="s" value="" type="text" placeholder="Busque Parceiros">
            <input type="hidden" name="post_type" value="parceiros">
            <span class="themeplace-search-btn"><input type="submit"></span>
        </div>
    </form>
</div>
<style>
.focus-disable:focus{outline:0;}
#dnaform1 select,
#dnaform1 input,
#dnaform1 input::placeholder{color: #2F0A77;}
</style>