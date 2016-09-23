<div class="l-12 glyphicon glyphicon-chevron-up" style="margin-left:-0.4em"></div>

<h2 class="l-6 w-12 heading-block"">

<a class="heading-block-link ds-B al-C" href="<?php the_permalink(); ?>">

    <span class="ds-B heading-block-link-title"><?php echo $titleChop; ?></span>

    <?php
    $sjr_experience_value = get_post_meta(get_the_ID(), 'sjr_experience_value', true );

    if($sjr_experience_value !==''){?>

        <span class="ds-B heading-block-link-stat-panel">

            <?php echo $sjr_experience_value; ?>

            <span class="heading-block-link-stat-panel-subcaption">Years</span>

        </span>

    <?php } ?>


</a>
<span class="ds-B pad-ESW text_default clr-gray-mid">
    <?php echo substr($content, 0, 90); ?>...
</span>

</h2>
<div class="l-6 w-12 bg-white al-C page-sub-title">
    <?php echo $date; ?>
</div>