function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#displayImage').css('background', 'url(' + e.target.result + ')');
        }

        reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
}

$("#image").change(function () {
    readURL(this);
});

let clear = document.querySelector('#clearForm');