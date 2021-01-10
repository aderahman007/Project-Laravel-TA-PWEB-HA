<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    const flashDataError = $('.flash-error').data('flashdata');
    const flashDataSuccess = $('.flash-success').data('flashdata');

    if (flashDataError) {
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: "{{Session::get('error')}}",
            showConfirmButton: false,
            timer: 3500
        });
    }

    if (flashDataSuccess) {
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: "{{Session::get('success')}}",
            showConfirmButton: false,
            timer: 3500
        });
    }
</script>
</body>

</html>