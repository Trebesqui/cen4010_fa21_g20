function openForm() {
    my_form = document.getElementById("myLogin");
    my_form.style.display = "block";
    my_form.classList.add("dim");
}
                
function closeForm() {
    document.getElementById("myLogin").style.display = "none";
}
