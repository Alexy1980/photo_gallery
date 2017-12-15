//tinymce.init({ selector:'textarea' });
$(document).ready(function(){
    var image_href;
    var image_href_splitted;
    var image_id;
    var photo_src;
    var photo_src_splitted;
    var photo_name;
    var photo_id;

    $(".img-thumbnail").click(function(){
        $("#set_user_image").prop('disabled', false);

        $(this).addClass('selected');
        image_href = $("#image-id").prop('href');
        image_href_splitted = image_href.split("=");
        image_id = image_href_splitted[image_href_splitted.length - 1];
        photo_src = $(this).prop('src');
        photo_src_splitted = photo_src.split("/");
        photo_name = photo_src_splitted[photo_src_splitted.length - 1];
        // для отображения при клике на картинке ее данных
        photo_id = $(this).attr("data");

        $.ajax({
            url: "includes/ajax_code.php",
            data: {photo_id:photo_id},
            type: "POST",
            success: function(data){
                if(!data.error){
                    $("#modal_sidebar").html(data);
                }
            }
        });
    });
    //ajax
    // при нажатии на кнопку "Сохранить и закрыть" ajax передаст данные того фото, которое будет выбрано в модальном окне
    $("#set_user_image").click(function(){
        $.ajax({
            url: "includes/ajax_code.php",
            data: {photo_name:photo_name, image_id:image_id},
            type: "POST",
            success: function(data){
                if(!data.error){
                    $(".photo_image_box a img").prop('src', data);
                }
            }
        });
    });

    /*Edit photo side bar*/

    $(".info-box-header").click(function(){
        $(".inside").slideToggle("fast");
        $("#toggle").toggleClass("glyphicon glyphicon-menu-down , glyphicon glyphicon-menu-up ");
    });

    /*Delete function*/

    $(".delete_link").click(function(){
        return confirm("Вы уверены, что хотите удалить фото?");
    });

});