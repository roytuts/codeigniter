$(function () {
    $("#cancel-comment-reply-link").hide();
    $(".reply_button").live('click', function (event) {
        event.preventDefault();
        var id = $(this).attr("id");
        if ($("#li_comment_" + id).find('ul').size() > 0) {
            $("#li_comment_" + id + " ul:first").prepend($("#comment_form_wrapper"));
        } else {
            $("#li_comment_" + id).append($("#comment_form_wrapper"));
        }
        $("#reply_id").attr("value", id);
        $("#cancel-comment-reply-link").show();
    });

    $("#cancel-comment-reply-link").bind("click", function (event) {
        event.preventDefault();
        $("#reply_id").attr("value", "");
        $("#comment_wrapper").prepend($("#comment_form_wrapper"));
        $(this).hide();
    });

    $("#comment_form").bind("submit", function (event) {
        event.preventDefault();
        if ($("#comment_text").val() == "")
        {
            alert("Please enter your comment");
            return false;
        }
        $.ajax({
            type: "POST",
            url: "http://localhost/ci-3.1.10-nested-comments/index.php/blogcontroller/add_blog_comment",
            data: $('#comment_form').serialize(),
            dataType: "html",
            beforeSend: function () {
                $('#comment_wrapper').block({
                    message: 'Please wait....',
                    css: {
                        border: 'none',
                        padding: '15px',
                        backgroundColor: '#ccc',
                        '-webkit-border-radius': '10px',
                        '-moz-border-radius': '10px'
                    },
                    overlayCSS: {
                        backgroundColor: '#ffe'
                    }
                });
            },
            success: function (comment) {
                var reply_id = $("#reply_id").val();
                if (reply_id == "") {
                    $("#comment_wrapper ul:first").prepend(comment);
                    if (comment.toLowerCase().indexOf("error") >= 0) {
                        $("#comment_resp_err").attr("value", comment);
                    }
                }
                else {
                    if ($("#li_comment_" + reply_id).find('ul').size() > 0) {
                        $("#li_comment_" + reply_id + " ul:first").prepend(comment);
                    }
                    else {
                        $("#li_comment_" + reply_id).append('<ul class="comment">' + comment + '</ul>');
                    }
                }
                $("#comment_text").attr("value", "");
                $("#reply_id").attr("value", "");
                $("#cancel-comment-reply-link").hide();
                $("#comment_wrapper").prepend($("#comment_form_wrapper"));
                $('#comment_wrapper').unblock();
            }
        });
    });
});