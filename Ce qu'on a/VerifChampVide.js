function testEmpty() {
    if ((document.getElementById("name").value == "") ||
        (document.getElementById("age").value == "") ||
        (document.getElementById("phone").value == "") ||
        (document.getElementById("birthday").value == "")) {
        alert("Un champ est vide");
    }
}