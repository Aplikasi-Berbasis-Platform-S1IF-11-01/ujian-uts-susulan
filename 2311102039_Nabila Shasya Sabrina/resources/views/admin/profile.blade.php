<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container py-5">

    <div class="card shadow p-4">

        <h3 class="mb-3">Admin Profile</h3>

        <!-- FORM EDIT -->
        <input id="name" class="form-control mb-2" placeholder="Name">
        <textarea id="description" class="form-control mb-2" placeholder="Description"></textarea>

        <button class="btn btn-primary" onclick="updateData()">
            Update
        </button>

        <p id="status" class="mt-3"></p>

    </div>

</div>

<script>
    // 📥 READ (ambil data)
    fetch('/api/admin/profile')
        .then(res => res.json())
        .then(data => {
            document.getElementById('name').value = data.name;
            document.getElementById('description').value = data.description;
        });

    // ✏️ UPDATE (CRUD update)
    function updateData() {
        fetch('/api/admin/profile', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                name: document.getElementById('name').value,
                description: document.getElementById('description').value
            })
        })
        .then(res => res.json())
        .then(data => {
            document.getElementById('status').innerHTML =
                "<span class='text-success'>" + data.message + "</span>";
        });
    }
</script>

</body>
</html>