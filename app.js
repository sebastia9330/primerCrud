const myModal = document.getElementById('exampleModal')
const myInput = document.getElementById('myInput')


myModal.addEventListener('shown.bs.modal', () => {
    myInput.focus()
})

function crear(){
    const name = document.getElementsByName('producto');
    console.log(name);
}