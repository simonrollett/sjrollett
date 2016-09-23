$(document).ready(function($) {

    // mobile menus

    $(".j-menu-pages").click(function (e) {

        $(".menu-main").slideToggle( "slow" );
        $(".j-menu-pages").toggleClass( "menu-selected-1" );

    });

    // secondary nav

    $(".j-gallery-menu").click(function (e){

        //alert("jam");
        $("#gallery-item-extras").slideToggle( "slow" );
        $(".j-gallery-menu").toggleClass( "menu-selected-2" );

    });

    // gallery nav inner scroll indicator

    $(".gallery-nav-outer").scroll(function (event){

        $mark_scroll_left = $(".gallery-nav-outer").scrollLeft();

        console.log($mark_scroll_left);

        $(".gallery-nav-indicator-mark").css('margin-left',$mark_scroll_left);

    });

    // hidden content

    $(".j-hidden-content").click(function (e){
        $(this).toggleClass("toggled-open-Y");
        $(this).closest('.hidden-content-wrapper').children('.hidden-content').slideToggle( "slow" );
    });

    //

    $header_contact = 0;

    $(".j-contact").click(function (e) {

        if($header_contact == 0){

            $contact_info_from_footer = $("#contact-information").html();
            $(".header-inner").append($contact_info_from_footer);
            $(".header-inner .theme-contact-info").addClass("show");
            $header_contact = 1;
        }else{
            $(".header-inner .theme-contact-info").remove();
            $header_contact = 0;
        }

    });

// desktop menus

	$(".menu-main .dropdown > a").click(function (e) { // binding onclick
		e.preventDefault();
		if ($(this).parent().hasClass('selected')) {
			$(".menu-main .selected .sub-menu").removeClass('show');//
			$(".menu-main .selected").removeClass("selected");
            // body blur test
			$("body").removeClass("blur-enabled");
            console.log('blur on');
		} else {
			$(".menu-main .selected .sub-menu").removeClass('show');//
			$(".menu-main .selected").removeClass("selected");
            $("body").removeClass("blur-enabled");
			if ($(this).next(".sub-menu").length) {
                $("body").addClass("blur-enabled");
				$(this).parent().addClass("selected"); // display popup
				$(this).next(".sub-menu").addClass('show');
			}
		}
		e.stopPropagation();
	});

	$("body").click(function () { // binding onclick to body
		$(".menu-main .selected .sub-menu").removeClass('show');
		$(".menu-main .selected").removeClass("selected");
        $("body").removeClass("blur-enabled");
	});
});