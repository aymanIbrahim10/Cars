<script>
    @if(Session::has('error'))
    swal(
                {
                    position: 'top-end',
                    type: 'error',
                    title: '{{Session::get('error')}}',
                    showConfirmButton: false,
                    timer: 1500
                }
            )
            @endif
</script>
