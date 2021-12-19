var simplemde = new SimpleMDE({
        element: document.getElementById("editor"),
        spellChecker: false,
        toolbar: ["bold", "italic", "heading", "|", "code", "quote", "link", "|", "unordered-list", "ordered-list", "table", "|", "preview", "side-by-side", "fullscreen"
            // , '|',
            // {
            //     name: "emojiable",
            //     action: function customFunction(editor) {
            //         $.triggerEmojiMenu()
            //     },
            //     className: "fa fa-smile-o",
            //     title: "Emoji",
            // }
        ]
    });


    $(function () {
        window.emojiPicker = new EmojiPicker({
            assetsPath: 'simplemde-with-emoji-picker-main/unicode-emoji-picker/img/',
            triggerButton: $("#openEmoji"),
            emojiMenuPlace: $(".editor-toolbar"),
            dontHideOnClick: 'fa-smile-o',
            emojiResult: function (res) {
                var pos = simplemde.codemirror.getCursor();
                simplemde.codemirror.setSelection(pos, pos);
                simplemde.codemirror.replaceSelection(res.unicode);
            }
        });
        window.emojiPicker.discover();

        $('.emoji-menu').css('left', $("[title='Emoji']").offset().left - 150);
    });




