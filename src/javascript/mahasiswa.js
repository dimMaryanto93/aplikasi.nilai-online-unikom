$(document).ready(function() {
    $("#frm-input-mahasiswa").validate({
        rules: {
            nim: {
                digits: true,
                minlength: 8,
                maxlength: 8,
                required: true
            }, nama: {
                required: true
            }, jk: {
                required: true
            }, jur: {
                required: true
            }, pass: {
                required: true,
                minlength: 8
            }
        }, messages: {
            nim: {
                digits: "Field ini harus di isi dengan angka",
                minlength: "Field ini harus di isi dengan 8 karakter",
                maxlength: "Field ini harus di isi dengan 8 karakter",
                required: "Field ini harus di isi"
            }, nama: {
                required: "Field ini harus di isi"
            }, jk: {
                required: "Field ini harus di isi"
            }, jur: {
                required: "Field ini harus di isi"
            }, pass: {
                required: "Field ini harus di isi",
                minlength: "Password lemah!"
            }
        }, errorPlacement: function(error, element) {
            if (element.is(":radio[name=jk]")) {
                error.appendTo('#errorMessage');
            }
            else { // This is the default behavior of the script for all fields
                error.insertAfter(element);
            }
        }, success: function(label) {
            label.addClass("valid").html('Ok!');
        }
    });
});