<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #f9f9f9; /* Lighter background color */
        }

        .dashboard-btn {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 15px;
            font-size: 16px;
            font-weight: 500;
            text-align: center;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Light shadow for subtle elevation */
            transition: transform 0.3s ease-in-out;
        }

        .btn-custom {
            width: 100%;
            text-decoration: none;
        }

        .btn-custom:hover {
            transform: scale(1.05);
        }

        .dashboard-header {
            font-size: 36px;
            font-weight: 600;
            color: #333;
            margin-bottom: 40px;
        }

        .row {
            margin-bottom: 20px;
        }

        .col-md-4 {
            margin-bottom: 20px;
        }

        /* Button styles for lighter colors */
        .btn-light-blue {
            background-color: #add8e6; /* Lighter blue */
            border-color: #add8e6;
            color: #333;
        }

        .btn-light-blue:hover {
            background-color: #7ec8e5; /* Slightly darker blue for hover */
            border-color: #7ec8e5;
        }

        .btn-light-green {
            background-color: #b2e0a7; /* Lighter green */
            border-color: #b2e0a7;
            color: #333;
        }

        .btn-light-green:hover {
            background-color: #8ac97d; /* Slightly darker green for hover */
            border-color: #8ac97d;
        }

        .btn-light-yellow {
            background-color: #e7e0a6; /* Lighter yellow */
            border-color: #fff9c4;
            color: #333;
        }

        .btn-light-yellow:hover {
            background-color: #f8f48d; /* Slightly darker yellow for hover */
            border-color: #f8f48d;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center dashboard-header">Dashboard</h1>

        <div class="row justify-content-center">
            <!-- Role Button -->
            <div class="col-md-4">
                <a href="{{ route('roles.index') }}" class="btn btn-light-blue btn-custom dashboard-btn">
                    <i class="bi bi-person-fill"></i> Role
                </a>
            </div>

            <!-- Permission Button -->
            <div class="col-md-4">
                <a href="{{ route('permissions.index') }}" class="btn btn-light-green btn-custom dashboard-btn">
                    <i class="bi bi-shield-lock-fill"></i> Permission
                </a>
            </div>

            <!-- Permission Group Button -->
            <div class="col-md-4">
                <a href="{{ route('permission-groups.index') }}" class="btn btn-light-yellow btn-custom dashboard-btn">
                    <i class="bi bi-file-earmark-lock-fill"></i> Permission Group
                </a>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS and Icons -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
