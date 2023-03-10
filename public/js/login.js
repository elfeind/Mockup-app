$(document).ready(function() {
    $("#show_hide_password a").on('click', function(event) {
        event.preventDefault();
        if($('#show_hide_password input').attr("type") == "text"){
            $('#show_hide_password input').attr('type', 'password');
            $('#show_hide_password i').addClass( "fa-eye-slash" );
            $('#show_hide_password i').removeClass( "fa-eye" );
        }else if($('#show_hide_password input').attr("type") == "password"){
            $('#show_hide_password input').attr('type', 'text');
            $('#show_hide_password i').removeClass( "fa-eye-slash" );
            $('#show_hide_password i').addClass( "fa-eye" );
        }
    });
});

$('#form-login').parsley();
$('#form-login').on('submit', function (e){
    e.preventDefault();
    var form = $(this);
    form.parsley().validate();
    var formData = new FormData(this);


    // // Display the key/value pairs
    // for (var pair of formData.entries()) {
    //     console.log(pair[0]+ ', ' + pair[1]);
    // }


    if (form.parsley().isValid()) {
        $.ajax({
            type: 'post',
            url: 'auth/dologin',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: formData,
            type: 'POST',
            datatype: 'JSON',
            processData: false,
            contentType: false,
            beforeSend: function() {
                $.LoadingOverlay('show');
            },
            success: function(msg) {
                console.log(msg);
                $.LoadingOverlay('hide');
                var jsonObject = JSON.parse(msg);
                // console.log(jsonObject);
                if (jsonObject.status) {
                    window.location.href = jsonObject.link;
					$('#form-login')[0].reset();
					$('#form-login').parsley().reset();
                } else {
                    Swal.fire(
                        'Failed',
                        jsonObject.message,
                        'error'
                    );
					// $('#password').val('');
                }
            }
        });
    }


});
