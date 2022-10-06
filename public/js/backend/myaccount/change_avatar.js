$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
    
$uploadCrop = $('#upload-demo').croppie({
    url: user_photo_url,
    enableExif: true,
    viewport: {
        width: 100,
        height: 100,
        // type: 'circle'
    },
    boundary: {
        width: 300,
        height: 300
    }
});

$('#upload').on('change', function () { 
    var reader = new FileReader();
    reader.onload = function (e) {
        $uploadCrop.croppie('bind', {
            url: e.target.result
        }).then(function(){
            console.log('jQuery bind complete');
        });
    }
    reader.readAsDataURL(this.files[0]);
});

$('#uploadAvatarBtn').on('click', function (ev) {
    $uploadCrop.croppie('result', {
        type: 'canvas',
        size: 'viewport'
    }).then(function (resp) {
        $.ajax({
            url: backend_url + "/myaccount/change_avatar_action",
            type: "POST",
            data: {"image":resp},
            success: function (data) {
                // html = '<img src="' + resp + '" />';
                // $("#upload-demo-i").html(html);
                location.reload();
            }
        });
    });
});