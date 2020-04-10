window.onload = function() {

    $('.toggle-live').change(function() {
        var islive = $(this).prop('checked') == true ? 1 : 0;
        var artwork_id = $(this).data('id');

        $.ajax({
            type: "GET",
            dataType: "json",
            url: '/changeStatus',
            data: {'islive': islive, 'id': artwork_id},
            success: function(data){
                console.log(data.success)
            }
        });
    })
};
