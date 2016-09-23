<?php

$classes_form = "";
$classes_confirmation = "hide";

if(!empty($_POST['message_sender_name'])){

    $message_sender_name = sanitize_text_field($_POST['message_form_name']);
    $message_sender_email = sanitize_text_field($_POST['message_form_email']);
    $message_sender_subject = sanitize_text_field($_POST['message_form_subject']);
    $message_sender_message = sanitize_text_field($_POST['message_form_message']);

    //$to      = 'simon@madjester.co.uk';
    //$subject = $message_sender_subject;
    //$message = 'hello';
    $headers = 'From: contactform@sjrollett.com' . "\r\n" .
        'Reply-To: contactform@sjrollett.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

//            $headers   = array();
//            $headers[] = "MIME-Version: 1.0";
//            $headers[] = "Content-type: text/plain; charset=iso-8859-1";
//            $headers[] = "From: S.J.Rollett";//<sender@domain.com>
//            $headers[] = "Bcc: JJ Chong <bcc@domain2.com>";
//            $headers[] = "Reply-To: Recipient Name <receiver@domain3.com>";
//            $headers[] = "Subject: {$message_sender_subject}";
//            $headers[] = "X-Mailer: PHP/".phpversion();


    mail($message_sender_email, $message_sender_subject, $message_sender_message, $headers);

    //echo 'form submitted 1';


    //define the receiver of the email
    $to = 'simon@madjester.co.uk';
//define the subject of the email
    $subject = 'Test email';
//define the message to be sent.
    $message = "Hello World!\r\nThis is my mail.";
//define the headers we want passed.
    $header = "From: simon@madjester.co.uk"; // must be a genuine address
//send the email
    $mail_sent = mail('simon@madjester.co.uk', $message_sender_subject, $message_sender_message, $headers);
//if the message is sent successfully print "Mail sent". Otherwise print "Mail failed"

    echo $mail_sent ? "Mail sent" : "Mail failed";



}else{

    //echo 'form NOT submitted';

}

if(mail($message_sender_email, $message_sender_subject, $message_sender_message, $headers))
{
    ///echo "Mail Sent Successfully";
}else{
    //echo "Mail Not Sent";
}

;?>

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