@extends('admin.layout.template')
@push('css')

@endpush
@section('content')
<h1>Selamat datang</h1>
@endsection

@push('js')
<script>
    const flashData = $('.flash-data').data('flashdata');

    if (flashData) {
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: "{{Session::get('success')}}",
            showConfirmButton: false,
            timer: 3500
        });
    }
</script>


@endpush