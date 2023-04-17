function checkInput() {
    var inputVal = document.getElementById("idsiswa").value;
    var btn = document.querySelector('button[type="submit"]');
    if (inputVal === "") {
        btn.disabled = true;
        btn.classList.add('bg-mute');
    } else {
        btn.disabled = false;
        btn.classList.add('bg-success');
        btn.classList.add('text-light');
    }
}
document.getElementById("idsiswa").addEventListener("input", checkInput);