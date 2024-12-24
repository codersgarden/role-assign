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



    <style>
        body {
            background-color: #f9f9f9;
        }

        .table td,
        .table th {
            vertical-align: middle;
        }

        .header {
            background-color: white;
            padding: 10px 20px;
            border-bottom: 1px solid #ddd;
        }

        .header .logo {
            font-size: 24px;
            font-weight: bold;
        }


        .content {
            padding: 10px;
        }

        .btn-dark {
            border-radius: 50px;
        }

        .vl {
            border-left: 3px solid #ddd;
            height: 40px;
            margin-top: 10px;
        }


        .nav-link {
            color: #000;
            font-weight: 400;
            font-family: "Jost", sans-serif;
            font-size: 20px;
        }

        /* Styles for the active link */
        .nav-link.active {
            font-weight: 600;
            text-decoration: underline;
            color: #000;
            text-decoration-thickness: 2px;
            text-underline-offset: 12px;
        }


        .bg-color {
            background-color: #ededf3;
        }

        .br-11 {
            border-radius: 12px;
        }

        .title {
            font-weight: 500;
            font-size: 28px;
            font-family: jost, sans-serif;
        }

        .new_roles {
            color: #fff;
            font-weight: 500;
            font-size: 14px;
        }

        .table thead th {
            background-color: #ffffff;
            font-weight: 400;
            color: #000;
            font-size: 14px;
            border-bottom: 1px solid #e8e8e8;
            text-transform: uppercase;
            opacity: 0.5;
            padding: 15px 0px;
        }

        .table tbody tr td {
            background-color: #ededf3;
            color: #000;
            font-size: 16px;
            font-weight: 400;
            font-family: jost, sans-serif;
            padding: 15px 0px;
        }

        .pagination .page-item .page-link {
            color: black;
        }

        .pagination .page-item.active .page-link {
            background-color: black;
            border-color: black;
            color: white
        }

        .page-item {
            padding-right: 10px;

        }

        .page-item .page-link {
            border-radius: 5px;
        }

        .pagination {

            --bs-pagination-disabled-color: #F5F5F7;
            --bs-pagination-disabled-bg: #F5F5F7;
            --bs-pagination-disabled-border-color: #E8E6E2;

        }


    /* Toast message styles */
.toast-message {
    position: fixed;
    top: 20px; /* Position from the top */
    left: 50%;
    transform: translateX(-50%);
    background-color: #4CAF50; /* Green background */
    color: white;
    padding: 10px 20px; /* Increased padding */
    font-size: 18px; /* Increased font size */
    line-height: 1.4;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
    opacity: 0; /* Initially invisible */
    visibility: hidden; /* Initially hidden */
    z-index: 9999;
    transition: opacity 0.5s ease, visibility 0.5s ease;
}

/* Show the toast */
.toast-message.show-toast {
    opacity: 1;
    visibility: visible;
    animation: slideInOut 4s forwards;
}

/* Slide in and slide out animation */
@keyframes slideInOut {
    0% {
        transform: translateX(-50%) translateY(-20px); /* Start from above */
        opacity: 0;
    }
    20% {
        transform: translateX(-50%) translateY(0); /* Slide to normal position */
        opacity: 1;
    }
    80% {
        transform: translateX(-50%) translateY(0); /* Stay in place */
        opacity: 1;
    }
    100% {
        transform: translateX(-50%) translateY(-20px); /* Slide out upwards */
        opacity: 0;
    }
}

    </style>
</head>

<body>
    @include('roleassign::partials.header')
    @yield('content')

    @if (session('success'))
    <div id="success-message" class="toast-message show-toast">
        {{ session('success') }}
    </div>
   @endif

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
