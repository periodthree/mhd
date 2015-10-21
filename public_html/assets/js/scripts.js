(function($) {

$('.btn-delete').on('click',function(e) {
    return confirm('Are you Sure?');
});

//Duplicate Serial
$('.add-serial').on('click',function (e){

        var toClone = $('.serials div.serial:nth-child(2)');
        var numDivs = $('.serials div.serial').length;

        var cloned = toClone.clone().insertAfter( ".serials div.serial:last" );

        //Clear Inputs
        cloned.find('input').val('');
        cloned.find('.unit').html('');

        //Replace Numbers in attributes
        cloned.find('input').attr('id', 'unit_'+(numDivs+1) );
        cloned.find('label').attr('for', 'unit_'+(numDivs+1) );

        //Replace Numbers in HTML
        var labelNum = cloned.find('label').html();
        labelNum = labelNum.replace('#2','#'+(numDivs+1));
        cloned.find('label').html(labelNum);

        if(numDivs == 5) $(this).attr('disabled','disabled');

        e.preventDefault();
});

function findModel(object) {

    var serial = $(object).val();
    var serialID = $(object).attr('id');

    console.log(serialID);

    $.ajax({

            cache: false,
            timeout: 8000,
            url: "/findmodel",
            type: "POST",
            dataType: 'json',
            data: ({ serial: serial }),

            beforeSend: function() {
                if (serial.length >= 10) {
                    $('#'+serialID+'_model').html('Finding Model...');
                }

            },

            success: function( data, textStatus, jqXHR ){

                console.log(data);

                if(data.model) {

                    //$('#'+serialID+'_model').html(data.model);

                    var source   = $("#unit-template").html();
                    var template = Handlebars.compile(source);
                    var html    = template(data);

                    $('#'+serialID+'_model').html(html);
                } else {
                    $('#'+serialID+'_model').html('Not Found');
                }



            },

            error: function( jqXHR, textStatus, errorThrown ){
                console.log( 'The following error occured: ' + textStatus, errorThrown );
            },

            complete: function( jqXHR, textStatus ){
            }

        });

}

$(document).on('blur','.serial_input', function() {

    // // Set Timeout
    // clearTimeout($.data(this, 'timer'));

    // // Set Search String
    // var serial = $(this).val();

    // // Do Search
    // if (serial.length >= 10) {
    //     $(this).data('timer', setTimeout(findModel($(this)), 100));
    // }

});




})(jQuery);
