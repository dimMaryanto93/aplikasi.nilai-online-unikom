$(document).ready(function() {
    $("#frm-input-matakuliah").validate({
        rules: {
            kd_mtkul:{
                required : true,
                number : true,
                maxlength : 5,
                minlength : 5
            },nama_mtkul:{
                required : true
            }
        }, messages: {
           kd_mtkul:{
                required : "Field ini harus diisi",
                number : "Field ini hanya dapat diisi dengan Number",
                maxlength : "Kode Matakuliah Tidak Valid",
                minlength : "Kode Matakuliah Tidak Valid"
            },nama_mtkul:{
                required : "Field ini Harus diisi"
            }
        }, success: function(label) {
            label.addClass("valid").html('Ok!');
        }
    });
});