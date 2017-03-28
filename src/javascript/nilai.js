$(document).ready(function() {
    $("#frm-input-nilai").validate({
        rules: {
            nim: {
                required: true
            }, nip: {
                required: true
            }, nama_mhs: {
                required: true
            }, nama_dosen: {
                required: true
            }, ni_tugas: {
                required: true,
                digits: true,
                max: 100,
                min: 0
            }, ni_uts: {
                required: true,
                digits: true,
                max: 100,
                min: 0
            }, ni_uas: {
                required: true,
                digits: true,
                max: 100,
                min: 0
            }
        }, messages: {
            nim: {
                required: "Field ini harus diisi"
            }, nip: {
                required: "Field ini harus diisi"
            },nama_mhs: {
                required: "Field ini harus diisi"
            }, nama_dosen: {
                required: "Field ini harus diisi"
            }, ni_tugas: {
                required: "Field ini harus diisi",
                digits: "Field ini hanya dapat diisi dengan angka",
                max: "Field ini hanya dapat diisi dengan angka kurang dari 100",
                min: "Field ini hanya dapat diisi dengan angka lebih dari 0"
            }, ni_uts: {
                required: "Field ini harus diisi",
                digits: "Field ini hanya dapat diisi dengan angka",
                max: "Field ini hanya dapat diisi dengan angka kurang dari 100",
                min: "Field ini hanya dapat diisi dengan angka lebih dari 0"
            }, ni_uas: {
                required: "Field ini harus diisi",
                digits: "Field ini hanya dapat diisi dengan angka",
                max: "Field ini hanya dapat diisi dengan angka kurang dari 100",
                min: "Field ini hanya dapat diisi dengan angka lebih dari 0"
            }
        }, success: function(label) {
            label.addClass("valid").html('Ok!');
        }
    });
});