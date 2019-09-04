// MDB Lightbox Init
$(function () {

    $(".petite").click(function () {
        var SourcePetiteImage = $(this).attr('src');
        var SourceGrandeImage = SourcePetiteImage.replace("petite", "grande");
        $(".grande").html("<img src='" + SourceGrandeImage + "'>");
        $(".grande").fadeIn("slow").css("display", "flex");
    });

    $(".grande").click(function () {
        $(".grande").fadeOut("fast");
    });

});

$(document).ready(function () {

    $("#ancre").hide();

    // faire apparaitre #text1
    $(function () {
        $(window).scroll(function () {
            if ($(this).scrollTop() > 200) {
                $('#ancre').fadeIn(300);
            } else {
                $('#ancre').fadeOut(300);
            }
        });
        });
    });
