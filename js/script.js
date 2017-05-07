;
var wrapper = $('#wrapper');
var mask = $('#mask');
var ok = $('#ok');
var preview = $('#preview');
var image = $('#inputFile');
var myname = $('#previewName');
var email = $('#previewEmail');
var text = $('#previewText');

mask.click(function () {
  wrapper.hide();
});

ok.click(function () {
  wrapper.hide();
});

preview.click(function () {
  myname.text($('#inputName').val());
  email.text($('#inputEmail').val());
  text.text($('#inputText').val());
  wrapper.show();
});

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#previewImage').attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}

image.change(function(){
    readURL(this);
});
