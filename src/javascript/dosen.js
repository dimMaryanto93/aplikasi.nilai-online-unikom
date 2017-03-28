$(document).ready(function() {
    $("#frm-input-dosen").validate({
        rules: {
            nip: {
                digits: true,
                minlength: 6,
                maxlength: 6,
                required: true
            }, nama: {
                required: true
            }, kode_mtkul: {
                required: true
            }, passNew: {
                required: true                
            }, passDosen: {
                required: true,
                equalTo: "#newPass"
            }
        }, messages: {
            nip: {
                digits: "Field ini harus diisi dengan Angka",
                minlength: "NIP invalid",
                maxlength: "NIP invalid",
                required: "Field ini harus diisi"
            }, nama: {
                required: "Field ini harus diisi"
            }, kode_mtkul: {
                required: "Field ini harus diisi"
            }, passNew: {
                required: "Field ini harus diisi"
            }, passDosen: {
                required: "Field ini harus diisi",
                equalTo: "Password tidak sesuai"
            }
        }, success: function(label) {
            label.addClass("valid").html('Ok!');
        }
    });
});