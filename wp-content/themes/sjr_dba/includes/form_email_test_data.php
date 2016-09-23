<div class="col-12 j-populate-test-data bg-white">add test data</div>
<script>

    $(document).ready(function($) {

        // mobile menus

        $(".j-populate-test-data").click(function (e) {

            $("#message_sender_name").val("Mr. SenderName");
            $("#message_sender_email").val("simon@madjester.co.uk");
            $("#message_sender_subject").val("great job opp");
            $("#message_sender_message").val("You're ace - the job's yours");

            //console.log('wtf');
            //$(".j-menu-pages").toggleClass( "menu-selected-1" );

        });
    });



</script>