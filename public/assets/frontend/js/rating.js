jQuery(document).ready(function($){
list_rating ={
    1: 'Không thích',
    2: 'Tạm được',
    3: 'Bình thường',
    4: 'Rất tốt',
    5: 'Tuyệt vời quá',
}
    $(".btnrating").on('click',(function(e) {

        var previous_value = $("#selected_rating").val();

        var selected_value = $(this).attr("data-attr");
        $(".list_text").text('').text(list_rating[$(this).attr("data-attr")]).show();
        $("#selected_rating").val(selected_value);

        $(".number_rating").val(selected_value);

        $(".selected-rating").empty();
        $(".selected-rating").html(selected_value);

        for (i = 1; i <= selected_value; ++i) {
            $("#rating-star-"+i).toggleClass('btn-warning');
            $("#rating-star-"+i).toggleClass('btn-default');
        }

        for (ix = 1; ix <= previous_value; ++ix) {
            $("#rating-star-"+ix).toggleClass('btn-warning');
            $("#rating-star-"+ix).toggleClass('btn-default');
        }

    }));


});

