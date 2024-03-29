$(function(){
	action = $('#uploadform').attr('action');

    $('#fileupload').fileupload({
        url: action,
        dataType: 'json',
        done: function (e, data) {
            //path, success, errors
            if(data && data.result){
                $.each(data.result, function(indx, val){
                    /* this will log the return from the controller in your console zomg */
                    console.log( val );
                    if(val.errors.length > 0) {
                        alert(val.errors+" : "+val.original_name);
                    }
                });
            }
            address = document.URL;
            $('#imagesHolder').load(address+" #images", function() {
                $('#loadingDiv').hide();
            });
        },
    });
});