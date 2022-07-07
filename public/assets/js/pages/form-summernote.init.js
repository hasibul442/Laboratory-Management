$(document).ready(function () {
    $(".summernote").summernote({
        height: 250,
        minHeight: null,
        maxHeight: null,
        focus: !1,
    }),
        $("#summernote-inline").summernote({ airMode: !0 });
});
