@if(!empty(session('notify')))
    <script>
        $(function () {
            mdui.snackbar({
                message: "{{session('notify')}}",
                position: 'top'
            });
        })
    </script>
@endif
