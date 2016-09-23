<form class="form col-12 hide" action="<?php the_permalink();?>" method="post" id="contact_form" name="contact_form">

    <label for="message_sender_name">Your name:</label>
    <input type="text" class="text-input mgn-S" name="message_sender_name" id="message_sender_name"/>

    <label for="message_sender_email">Your email:</label>
    <input type="text" class="text-input mgn-S" name="message_sender_email" id="message_sender_email"/>

    <label for="message_sender_subject">Subject:</label>
    <input type="text" class="text-input mgn-S" name="message_sender_subject" id="message_sender_subject"/>

    <label for="message_sender_message">Message:</label>
    <input type="text" class="text-input mgn-S" name="message_sender_message" id="message_sender_message"/>


    <?php

    ?>

    <button class="btn btn-black" type="submit">Submit</button>



</form>