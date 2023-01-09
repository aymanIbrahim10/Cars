<script>
    @if(Session::has('success'))
    swal(
                {
                    position: 'top-end',
                    type: 'success',
                    title: '{{Session::get('success')}}',
                    showConfirmButton: false,
                    timer: 1500
                }
            )
            @endif
</script>
