$(document).ready(function(){
    $('.search').keyup(function(){
        var search = $(this).val();
        $.post('http://udemy.php/admin/includes/search_user.php', {search:search}, function(data){
            $('.search-result').html(data);
        });
    });
});
