<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - @yield('title')</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    @livewireStyles

    <style>
        html, body {
            height: 100%;
            margin: 0;
        }
        #wrapper {
            display: flex;
            height: 100vh; /* Full viewport height */
        }
        #sidebar-wrapper {
            min-width: 250px;
            background-color: #212529;
            color: white;
            height: 100vh; /* Make sidebar full height */
            position: fixed; /* Keep fixed while scrolling */
            top: 0;
            left: 0;
            overflow-y: auto;
        }
        #page-content-wrapper {
            flex: 1;
            margin-left: 250px; /* Space for sidebar */
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const deleteButtons = document.querySelectorAll(".delete-btn");

            deleteButtons.forEach(button => {
                button.addEventListener("click", function (e) {
                    e.preventDefault();
                    let form = this.closest("form");

                    Swal.fire({
                        title: "Are you sure?",
                        text: "This action cannot be undone!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#d33",
                        cancelButtonColor: "#3085d6",
                        confirmButtonText: "Yes, delete it!",
                        cancelButtonText: "Cancel"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
     </script>

</head>
<body>
<div id="wrapper">

    {{-- Sidebar --}}
    <div id="sidebar-wrapper">
        <div class="sidebar-heading py-4 px-3 fs-4 fw-bold">
            Furni. 
        </div>
        <div class="list-group list-group-flush">
             <a href="{{ route('admin.dashboard') }}" class="list-group-item list-group-item-action bg-dark text-white">Dashboard</a>
            <a href="{{ route('products.index') }}" class="list-group-item list-group-item-action bg-dark text-white">Products</a>
            <a href="{{ route('promos.index') }}" class="list-group-item list-group-item-action bg-dark text-white">Promos</a>
            <a href="{{ route('orders.index') }}" class="list-group-item list-group-item-action bg-dark text-white">Orders</a>
            <a href="{{ route('blogs.index') }}" class="list-group-item list-group-item-action bg-dark text-white">Blogs</a>
            <a href="{{ route('messages.index') }}" class="list-group-item list-group-item-action bg-dark text-white">Messages</a>
            <a href="{{ route('subscriptions.index') }}" class="list-group-item list-group-item-action bg-dark text-white">Subscriptions</a>
            
        </div>
    </div>

    {{-- Page Content --}}
    <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
            <div class="container-fluid">
                <span class="navbar-brand">Furni.</span>
                <div class="ms-auto">
                    {{ auth()->user()->name }}
                    <a href="{{ route('logout') }}" 
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
                       class="btn btn-sm btn-outline-danger ms-2">
                       Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </nav>

        <div class="container-fluid py-4">
            @yield('content')
        </div>
    </div>
</div>
@livewireScripts
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
