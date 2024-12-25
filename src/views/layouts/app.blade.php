@php
    // Define the list of authorized emails (this could also be passed from the controller)
    $aclConfig = config('custom.acl_users');

    // Ensure ACL_USERS is treated as an array
    $aclEmails = is_array($aclConfig)
        ? $aclConfig
        : array_map(function ($email) {
            return trim($email, "'\"");
        }, explode(',', trim($aclConfig, '[]')));
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Laravel App')</title>

    <!-- Bootstrap Bundle JS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ url('roleassign/resources/css/style.css') }}">
   
</head>

<body>
    @include('roleassign::partials.header')
    @yield('content')

    @if (session('success') || session('error'))
    <div id="toast-message" 
         class="toast-message show-toast" 
         style="background-color: {{ session('success') ? '#4CAF50' : '#F44336' }};">
        {{ session('success') ?? session('error') }}
    </div>
@endif

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const deleteButtons = document.querySelectorAll('.delete-role-button');
    
            deleteButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const form = this.closest('form');
                    const deleteType = this.dataset.deleteType; // Fetch the data-delete-type attribute
    
                    Swal.fire({
                        title: '<span style="color:black;">Are you Sure ?</span>',
                        html: '<p>Are you sure you want to delete this?</p>',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#1f88c0',
                        cancelButtonColor: '#c0513a',
                        background: '#f9f9f9',
                        customClass: {
                            popup: 'custom-swal-popup',
                            title: 'custom-swal-title',
                            htmlContainer: 'custom-swal-html',
                        },
                    }).then((result) => {
                        if (result.isConfirmed) {
                            const messages = {
                                role: 'The role has been deleted.',
                                permission: 'The permission has been deleted.',
                                permissionGroup: 'The permission group has been deleted.',
                            };
    
                            Swal.fire({
                                title: 'Deleted!',
                                text: messages[deleteType] || 'The item has been deleted.',
                                icon: 'success',
                                timer: 2000,
                                showConfirmButton: false
                            });
    
                            setTimeout(() => {
                                form.submit();
                            }, 2000); // Wait for 2 seconds before submitting the form
                        }
                    });
                });
            });
        });
    </script>
</body>

</html>
