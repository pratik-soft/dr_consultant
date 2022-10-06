    @if (session('success'))    
    <script>
        var toastIcon = 'success';
        var toastTitle = '{{ session('success') }}';
        toastrMsg(toastIcon, toastTitle);
    </script>
    @endif
    
    @if (session('error'))
    <script>
        var toastIcon = 'error';
        var toastTitle = '{{ session('error') }}';
        toastrMsg(toastIcon, toastTitle);
    </script>
    @endif
    
    @if (session('warning'))
    <script>
        var toastIcon = 'warning';
        var toastTitle = '{{ session('warning') }}';
        toastrMsg(toastIcon, toastTitle);
    </script>
    @endif
    
    @if (session('info'))
    <script>
        var toastIcon = 'info';
        var toastTitle = '{{ session('info') }}';
        toastrMsg(toastIcon, toastTitle);
    </script>
    @endif