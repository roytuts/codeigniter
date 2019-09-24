$(function () {
    $(".star").on("mouseover", function () { //SELECTING A STAR
        $(".rating").hide(); //HIDES THE CURRENT RATING WHEN MOUSE IS OVER A STAR
        var d = $(this).attr("id"); //GETS THE NUMBER OF THE STAR

        //HIGHLIGHTS EVERY STAR BEHIND IT
        for (i = (d - 1); i >= 0; i--) {
            $(".transparent .star:eq(" + i + ")").css({"opacity": "1.0"});
        }
    }).on("click", function () { //RATING PROCESS
        var blog_id = $("#blog_content_id").val(); //GETS THE ID OF THE CONTENT
        var rating = $(this).attr("id"); //GETS THE NUMBER OF THE STAR
        var data = 'rating=' + rating + '&blog_id=' + blog_id;
        $.ajax({
            type: "POST",
            data: data,
            url: "http://localhost/codeIgniter-ajax-mysql-voting-rating-app/index.php/VotingRatingController/rate_blog", //CALLBACK FILE
            success: function (e) {
                $("#ajax_vote").html(e); //DISPLAYS THE NEW RATING IN HTML
            },
            error: function (e) {
                alert(e);
            }
        });
    }).on("mouseout", function () { //WHEN MOUSE IS NOT OVER THE RATING
        $(".rating").show(); //SHOWS THE CURRENT RATING
        $(".transparent .star").css({"opacity": "0.25"}); //TRANSPARENTS THE BASE
    });
});