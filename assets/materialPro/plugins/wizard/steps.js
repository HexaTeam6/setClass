// $(".tab-wizard").steps({
//     headerTag: "h6"
//     , bodyTag: "section"
//     , transitionEffect: "fade"
//     , titleTemplate: '<span class="step">#index#</span> #title#'
//     , labels: {
//         finish: "Submit"
//     }
//     , onFinished: function (event, currentIndex) {
//        swal("Form Submitted!", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lorem erat eleifend ex semper, lobortis purus sed.");
//
//     }
// });


var form = $(".validation-wizard").show();

$(".validation-wizard").steps({
    headerTag: "h6"
    , bodyTag: "section"
    , transitionEffect: "fade"
    , titleTemplate: '<span class="step">#index#</span> #title#'
    , labels: {
        finish: "Submit"
    }
    , onStepChanging: function (event, currentIndex, newIndex) {
        return currentIndex > newIndex || !(3 === newIndex && Number($("#age-2").val()) < 18) && (currentIndex < newIndex && (form.find(".body:eq(" + newIndex + ") label.error").remove(), form.find(".body:eq(" + newIndex + ") .error").removeClass("error")), form.validate().settings.ignore = ":disabled,:hidden", form.valid())
    }
    , onFinishing: function (event, currentIndex) {
        return form.validate().settings.ignore = ":disabled", form.valid()
    }
    , onFinished: function (event, currentIndex) {
        var formS = form; // storing the form
        swal({
                title: "Apakah data sudah benar?",
                text: "Pastikan data yang anda isikan benar dan sesuai.",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#26C6DA",
                confirmButtonText: "Ya, simpan!",
                cancelButtonText: "Tidak, batalkan!",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function(isConfirm){
                if (isConfirm) {
                    formS.submit();          // submitting the form when user press yes
                } else {
                    swal("Dibatalkan", "Data yang anda isikan belum tersimpan", "error");
                }
            });
    }
}), $(".validation-wizard").validate({
    ignore: "input[type=hidden]"
    , errorClass: "text-danger"
    , successClass: "text-success"
    , highlight: function (element, errorClass) {
        $(element).removeClass(errorClass)
    }
    , unhighlight: function (element, errorClass) {
        $(element).removeClass(errorClass)
    }
    , errorPlacement: function (error, element) {
        error.insertAfter(element)
    }
    , rules: {
        email: {
            email: !0
        }
    }
})