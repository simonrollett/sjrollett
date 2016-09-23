<div class="col-12 col-6-ts col-12-ds form">
    <div class="mgn mgn-NS-ds content-item-divider">
        <h2 class="sub-title sub-title-small thin-base">Blog:</h2>

        <ul class="link-list">
            <li><a class="link" href="<?php echo home_url(); ?>/blog">Blog home</a></li>
        </ul>

    </div>
    <div class="mgn content-item-divider">
        <h3 class="sub-title sub-title-small thin-base">Archives by date:</h3>
        <select class="select" name="archive-dropdown" onchange="document.location.href=this.options[this.selectedIndex].value;">
            <option value=""><?php echo esc_attr( __( 'Select Month' ) ); ?></option>
            <?php wp_get_archives( array( 'type' => 'monthly', 'format' => 'option', 'show_post_count' => 1 ) ); ?>
        </select>
    </div>
    <div class="mgn content-item-divider">
        <h3 class="sub-title sub-title-small thin-base">Categories:</h3>

        <ul class="link-list">
            <?php wp_list_categories('orderby=name&show_count=0&title_li='); ?>
        </ul>

    </div>
</div>