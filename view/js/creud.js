function erase(obj){
  
    codigo = obj.children[0].innerHTML;
    

    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: 'btn btn-success',
          cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
      })
      
      swalWithBootstrapButtons.fire({
        title: '¿estas seguro?',
        text: "no podras deshacer este cambio",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'si, borralo',
        cancelButtonText: 'no,cancelar',
        reverseButtons: true
      }).then((result) => {
        if (result.isConfirmed) {

          window.location="index.php?ruta=erase&codigo="+codigo;

         
        } else if (
          /* Read more about handling dismissals below */
          result.dismiss === Swal.DismissReason.cancel
        ) {
          swalWithBootstrapButtons.fire(
            'cancelado',
            'tu registro esta intacto',
            'error'
          )
        }
      })
}
function getData(obj){
  let nombre = obj.children[1].innerHTML;
  let apellido = obj.children[2].innerHTML;
  let usuario = obj.children[3].innerHTML;
  let clave = obj.children[4].innerHTML;
  let codigo = obj.children[0].innerHTML;

  document.getElementById("txtNameM").value = nombre;
  document.getElementById("txtLNameM").value = apellido;
  document.getElementById("txtUserM").value = usuario;
  document.getElementById("txtPWordM").value = clave;
  document.getElementById("txtCodigoM").value = codigo;
  
}
function getGeneraReporte(e){
  window.open('view/module/alluser.php','_blank');
  e.preventDefault();
}