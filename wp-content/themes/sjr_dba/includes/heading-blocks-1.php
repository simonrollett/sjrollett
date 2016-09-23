<?php

$menu_name = 'links-main';

if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {
    $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );

    $menu_items = wp_get_nav_menu_items($menu->term_id);

    $heading_block_count = 0;

    foreach ( (array) $menu_items as $key => $menu_item ) {
        $title = $menu_item->title;
        $url = $menu_item->url;
        $subtext = $menu_item->attr_title;
        $heading_block_count ++;
        $heading_block_count_classes = "";

        if(($heading_block_count % 2) == 0){

            $heading_block_count_classes = "fl-R";

        }

        ?>

        <h2 class="col-12 mgn-S heading-block <?php echo $heading_block_count_classes;?>">
            <a class="heading-block-link ds-B " href="<?php echo $url;?>">

                <span class="ds-B heading-block-link-title">
                    <?php echo $title; ?>
                </span>

                <span class="ds-B page-sub-title heading-block-link-caption">
                    <?php echo $subtext;?>
                </span>
            </a>
        </h2>


        <?php

    }

} else {
    $menu_list = '<ul><li>Menu "' . $menu_name . '" not defined.</li></ul>';
}

echo $menu_list;

?>