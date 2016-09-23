<?php $options1 = get_option('plugin_options');

if(isset($options1['company_email'])){?>

    <div class="tpd-contact-row tpd-contact-points">
    <span class="tpd-contact-row tap_digital-contact-tel">
    Tel: <span class="tpd-contact-value" itemprop="telephone"><?php echo $options1['company_tel']; ?></span>
    </span>
    <span class="tpd-contact-row tap_digital-contact-fax">
    Fax: <span class="tpd-contact-value" itemprop="faxNumber"><?php echo $options1['company_fax']; ?></span>
    </span>
    <span class="tpd-contact-row tap_digital-contact-email">
    E-mail: <span class="tpd-contact-value" itemprop="email"><?php echo $options1['company_email']; ?></span>
    </span>
    </div>

<?php } ?>
