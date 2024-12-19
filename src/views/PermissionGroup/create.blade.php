<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Permission Group</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Create Permission Group</h1>

        <form action="{{ route('permission-groups.store') }}" method="post" class="w-50 mx-auto p-4 rounded">
            @csrf
            <div class="mb-3">
                <label for="role" class="form-label">Permission Group</label>
                <input type="text" id="Permission Group" name="name" placeholder="Enter Permission Group"
                    class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Submit</button>

        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
