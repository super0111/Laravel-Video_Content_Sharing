 /*-------------------------------
        Video Like
    -------------------------------------*/
function like(id)
{
    var url = $("#like_url").val();
    $.ajax({
        url: url,
        data: { id: id },
        type: "GET",
        dataType: "HTML",
        beforeSend: function() {
            if ($("#like").hasClass("far fa-heart")) {
                $('#like').attr('class','fas fa-heart');
            }else{
                $('#like').attr('class','far fa-heart');
            }
        },
        success: function(response) {

        }
    });
}



