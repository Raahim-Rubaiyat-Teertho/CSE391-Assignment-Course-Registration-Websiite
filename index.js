const name_field = document.getElementById("name");
const fname_field = document.getElementById("fname");
const sid_field = document.getElementById("sid");
const email_field = document.getElementById("em");
const slots_field = document.getElementById("slots");
const the_form = document.getElementById('the-form');

function handleSubmit() {
    if(name_field.value == "" || fname_field.value == "" || sid_field.value == "" || email_field.value == "" || slots_field.value == "") {
        alert("Make sure to fill up all fields");
    }

    else {
        the_form.action = 'posted.php'
    }
}

