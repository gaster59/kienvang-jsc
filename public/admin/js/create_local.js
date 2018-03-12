var create_local = {
    getLangLong: function(){
        var url = $('#txt_url').val();
        var address = $('#form_address').val();
        
        $.ajax({
            type: "post",
            url: url,
            data: {"address": address},
            success: function(res){
                var obj = JSON.parse(res);
                if (obj != false) {
                    $('#form_latitude').val(obj.latitude);
                    $('#form_longtitude').val(obj.longtitude);
                }
            }
        });
    }
};