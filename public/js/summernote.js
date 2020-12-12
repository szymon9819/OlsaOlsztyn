$('#summernote').summernote({
    placeholder: 'Treść artykułu',
    height: 220,
});

$("#summernote").summernote("code", $("#summernote").val().html());

