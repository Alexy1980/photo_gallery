$(document).ready(function(){
    var comment_author;
    var comment_body;
    var comment_created_at;
    var photo_id;

    $('#submit').click(function(e){
        e.preventDefault();
        comment_author = $(".author").val();
        comment_body = $(".body").val();
        comment_created_at = $(".created_at").val();
        photo_id = $(this).attr("data");
        // console.log(comment_author);
        $.ajax({
            type: "POST",
            url: "includes/ajax_code.php",
            dataType:"text",
           /* contentType: false,
            processData: false, */
            data: {comment_author:comment_author, comment_body:comment_body,  comment_created_at:comment_created_at, photo_id:photo_id},
            success: function(data){
                if(!data.error){
                    $('#ajax_comment').append('<div class="media ajax">');
                    $('.ajax').append('<a class="pull-left left">');
                    $('.left').append('<img class="media-object object">');
                    $('.object').attr('src', 'http://placehold.it/64x64&text=image');
                    $('.ajax').append('<div class="media-body body">');
                    $('.body').append("<h4 class='media-heading heading'>");
                    $('.heading').append("<small>Комментарий добавил:" + comment_author + "</small>");
                    $('.heading').append('<br>');
                    $('.heading').append("<small>Добавлен:" + comment_created_at + "</small>");
                    $('.body').append("<p>" + comment_body + "</p>");
                    // $('.ajax').append("<br>");
                    setTimeout(function() {
                        window.location.reload();
                    }, 5000);
                    console.log(data);
                }
            }
        });
    });
});
