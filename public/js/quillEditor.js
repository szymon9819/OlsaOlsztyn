$(document).ready(function () {
    var toolbarOptions = [
        ['bold', 'italic', 'underline'],        // toggled buttons
        [{'list': 'ordered'}, {'list': 'bullet'}],
        [{'direction': 'rtl'}],                         // text direction
        [{'header': [1, 2, 3, 4, 5, 6, false]}],
        [ 'link', 'image'],          // add's image support
        [{'color': []}, {'background': []}],          // dropdown with defaults from theme
        [{'font': []}],
        [{'align': []}],

        ['clean']                                         // remove formatting button
    ];

    var editor = new Quill('#editor', {
        modules: {
            toolbar: toolbarOptions,
        },
        theme: 'snow',
    });

    editor.getModule('toolbar').addHandler('image', () => {
        selectLocalImage()
    });

    editor.on('text-change', function (delta, oldDelta, source) {
        $('#content-textarea').text($(".ql-editor").html());
    });


    function selectLocalImage() {
        const input = document.createElement('input');
        input.setAttribute('type', 'file');
        input.click();

        // Listen upload local image and save to server
        input.onchange = () => {
            const file = input.files[0];

            if (/^image\//.test(file.type)) {
                imageHandler(file);
            } else {
                console.warn('Tylko zdjecia');
            }
        };
    }

    function imageHandler(image) {
        var formData = new FormData();
        formData.append('image', image);
        formData.append('_token', $('meta[name=csrf-token]').attr("content"));
        var url = $('#editor').data('imgUrl');
        $.ajax({
            type: "POST",
            url: url,
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                if(response.imageUrl)
                    insertToEditor(response.imageUrl, editor);
            }
        });
    }

    function insertToEditor(url) {
        const range = editor.getSelection();
        editor.insertEmbed(range.index, 'image', url);
    }
});

