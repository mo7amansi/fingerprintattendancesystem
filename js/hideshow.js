var div = document.getElementById('form-style-5');
div.style.display = "none";
var display = 1;

function new_student() {
    if (display == 1) {
        div.style.display = 'block';
        display = 0;
    } else {
        div.style.display = 'none';
        display = 1;
    }
}