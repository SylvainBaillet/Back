// MDB Lightbox Init
console.log('text');
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