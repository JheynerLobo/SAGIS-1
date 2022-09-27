<script>
    function destroy(event, id, title) {

        
        alert('Funcionando')
        event.preventDefault();

        let form = document.getElementById(id);

        Swal.fire({
            title: '¿Estás seguro?',
            text: title,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, ¡Estoy seguro!',
            cancelButtonText: 'Cancelar',
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            } else {
                return false;
            }
        })
      
    }
</script>

<script>
    //Initialize Select2 Elements
    // $('.select2bs4').select2({
    //     theme: 'bootstrap4'
    // })
</script>
