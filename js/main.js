function validation(){
    var title = document.forms["noteBook"]["title"].value;
    var notes = document.forms["noteBook"]["notes"].value
    if (title == null || title == "" || notes == null || notes == "") {
        document.querySelector(".notify").textContent = "Please fill out all text fields.";
        return false;
    }
}

$('.submit').mouseover(function( event) {
    alert('Submit Notes Here');
});