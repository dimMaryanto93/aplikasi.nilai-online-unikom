$(document).ready(function() {
    $("#frm-input-administrator").validate({
        rules: {
            username: {
                required: true
            }, passNew: {
                required: true,
                minlength: 8
            }, pass: {
                required: true,
                equalTo: "#id_pass"
            }, nama: {
                required: true
            }
        }, messages: {
            username: {
                required: "Field ini harus diisi"
            }, passNew: {
                required: "Field ini harus diisi",
                minlength: "password lemah"
            }, pass: {
                required: "Field ini harus diisi",
                equalTo: "Password tidak sesuai"
            }, nama: {
                required: "Field ini harus diisi"
            }
        }, success: function(label) {
            label.addClass("valid").html('Ok!');
        }
    });
});