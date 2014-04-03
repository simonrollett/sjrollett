// toggle expanding hidden panel content

$(document).ready(function($) {

    $(".j-hidden-content").click(function (e){
        $(this).toggleClass("toggled-open-Y");
        $(this).closest('.hidden-content-wrapper').children('.hidden-content').slideToggle( "slow" );
    });



    // for logo bar basket

        $(".j-hidden-basket").click(function (){
            $("#j-wrapper-basket").slideToggle( "slow" );//
        });


    // for more pages menu

        $(".j-menu-more-pages").click(function (){
            $(".menu-more-pages").slideToggle( "slow" );//
        });


    // for single prod main image swap

        $image_counter = 1;
        $min_image_counter = 1;
        $max_image_counter = $(".prod-main-view-gallery > li").size();//

        $(".j-gallery-view-change").click(function (e){

            gallery_remove_class($image_counter);
            $image_counter = $(this).attr("data-view-src");
            gallery_add_class($image_counter);
            gallery_nav_action();

        });

    // for single page gallery navigate

            $(".j-gallery-prev").click(function(e){

                if($image_counter > $min_image_counter ){
                    gallery_down();
                }

            });

            $(".j-gallery-next").click(function(e){

                if($image_counter < $max_image_counter ){
                    gallery_up();
                }
            });

            function gallery_set_counter($counter_value){
                $image_counter = (parseFloat($image_counter) + $counter_value);
            }

            function gallery_remove_class($image_counter){
                $("#prod-main-image").removeClass("prod-view-"+$image_counter);
                $("#prod-overlay-image").removeClass("prod-view-overlay-"+$image_counter);
            }

            function gallery_add_class($image_counter){
                $("#prod-main-image").addClass("prod-view-"+$image_counter);
                $("#prod-overlay-image").addClass("prod-view-overlay-"+$image_counter);
            }

            function gallery_up(){

                gallery_remove_class($image_counter);
                gallery_set_counter(+1);
                gallery_add_class($image_counter);
                gallery_nav_action();

            }

            function gallery_down(){

                gallery_remove_class($image_counter);
                gallery_set_counter(-1);
                gallery_add_class($image_counter);
                gallery_nav_action();
            }

            function gallery_nav_action(){

                if($image_counter == $min_image_counter){
                    $(".j-gallery-prev").addClass("invisi");
                    $(".j-gallery-next").removeClass("invisi");
                }

                if($image_counter == $max_image_counter){
                    $(".j-gallery-next").addClass("invisi");
                    $(".j-gallery-prev").removeClass("invisi");
                }

                if($image_counter > 1 && $image_counter < $max_image_counter){
                    $(".j-gallery-next").removeClass("invisi");
                    $(".j-gallery-prev").removeClass("invisi");
                }

            }

    // for ratings select

        $( "#mj-rating-select" ).change(function() {

            $selected_rating = "0";
            $rating_set = $("#mj-rating-select").val();

            $("#mj-rating-select-value > div").css("width",$rating_set*18+"px");

            if($selected_rating !== null){
                $("#frating").val($rating_set);
                $rating_set = $("#mj-rating-select").val();
            }
        });

    // ratings submit conf

    if (window.location.hash) {
         if (window.location.hash.indexOf('mj-reviews') == 1) { // not 0 because # is first character of window.location.hash
             $(".ratings-submit-confirmation").addClass("show");
         }
     }
});

// MODAL OVERLAY

function hide_overlay(){
    $("body").removeClass("overlay-on");
}

function show_modal($modal_classname,$event){
    $event.preventDefault();
    show_overlay();
    $($modal_classname + "-modal").removeClass("hide");

}

function show_overlay(){
    $("body").addClass("overlay-on");
}

function hide_modal(e){
    hide_overlay();
    $(".modal").addClass("hide");
}

$prod_thumbs_html = "";

function pass_gallery_thumbs_to_overlay(){
    $prod_thumbs_html = $(".prod-main-view-gallery").html();
}

$(document).ready(function($) {

    // MODAL CLOSE BEHAVIOUR

    $("#overlay-bg").click(function (e) {
        hide_modal(e);
    });


    $(".j-modal-close").click(function (e) { // binding onclick
        e.preventDefault();
        hide_modal(e);
        e.stopPropagation();
    });


    // CALL MODALS

    $(".j-image-zoom").click(function(e){
        show_modal(".j-image-zoom",e,"");
        $(".j-image-zoom-modal").css("top",0);
        pass_gallery_thumbs_to_overlay();
        //$("#modal-thumbs").html($prod_thumbs_html);
    });

    $(".j-size-guides").click(function(e){
        show_modal(".j-size-guides",e);
        $(".j-size-guides-modal").css("top",e.pageY);
    });


})

// e-commerce not used

// E-COMMERCE SHIPPING ADDRESS

function field_val_pass($receiving_field_id,$sending_field_id){
    $($receiving_field_id).val($($sending_field_id).val());
}

function field_clear_shipping(){
    field_val_pass("#wpsc_checkout_form_11","");
    field_val_pass("#wpsc_checkout_form_12","");
    field_val_pass("#wpsc_checkout_form_13","");
    field_val_pass("#wpsc_checkout_form_14","");
    field_val_pass("#wpsc_checkout_form_15","");
    //field_val_pass("#wpsc_checkout_form_16","#wpsc_checkout_form_7");
    field_val_pass("#wpsc_checkout_form_17","");
}

$("#mj-ship-to-billing").click(function(e){

    field_val_pass("#wpsc_checkout_form_11","#wpsc_checkout_form_2");
    field_val_pass("#wpsc_checkout_form_12","#wpsc_checkout_form_3");
    field_val_pass("#wpsc_checkout_form_13","#wpsc_checkout_form_4");
    field_val_pass("#wpsc_checkout_form_14","#wpsc_checkout_form_5");
    field_val_pass("#wpsc_checkout_form_15","#wpsc_checkout_form_6");
    //field_val_pass("#wpsc_checkout_form_16","#wpsc_checkout_form_7");
    field_val_pass("#wpsc_checkout_form_17","#wpsc_checkout_form_8");

});