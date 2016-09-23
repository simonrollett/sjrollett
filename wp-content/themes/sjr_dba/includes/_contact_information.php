<?php $options = get_option('plugin_options');

if(isset($options1['address_1'])){?>

    <div class="theme-contact-info pad-S" itemscope itemtype="http://schema.org/Organization">

        <div class="tpd-contact-row tpd-contact-address" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">

        <span class="tpd-contact-value" itemprop="streetAddress">
            <?php echo $options['address_1']; ?>,
            <?php echo $options['address_2']; ?>,
            <?php echo $options['address_3']; ?>,
        </span>
            <span class="tpd-contact-value" itemprop="addressLocality"><?php echo $options['address_4']; ?></span>
            <span class="tpd-contact-value" itemprop="postalCode"><?php echo $options['postcode_']; ?></span>

        </div>

        <?php include "_contact_information_digital.php";?>

    </div>

<?php } ?>