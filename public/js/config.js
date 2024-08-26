function showLoader(){
    document.getElementById('loader').classList.remove('d-none')
}
function hideLoader(){
    document.getElementById('loader').classList.add('d-none')
}

function successToast(msg){
    Toastify({
        gravity: "bottom",
        position: "center",
        text: msg,
        className: "mb-5",
        style: {
            background: "green",
        }
    }).showToast();
}

function errorToast(msg){
    Toastify({
        gravity: "bottom",
        position: "center",
        text: msg,
        className: "mb-5",
        style: {
            background: "red",
        }
    }).showToast();
}





