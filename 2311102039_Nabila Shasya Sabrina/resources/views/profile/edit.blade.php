<x-app-layout>

<style>
    body {
        font-family: 'Poppins', sans-serif;
        background: #0f0000;
    }

    .container-box {
        max-width: 900px;
        margin: auto;
        padding: 20px;
    }

    .card-modern {
        background: #1a0000;
        border: 1px solid #3a0000;
        border-radius: 16px;
        padding: 20px;
        margin-bottom: 20px;
        color: white;
        box-shadow: 0 10px 30px rgba(0,0,0,0.3);
    }

    h2 {
        color: white;
    }

    h3 {
        color: #ffffff;
        margin-bottom: 15px;
    }

    /* override Laravel input style */
    input, select {
        width: 100%;
        padding: 10px;
        border-radius: 10px;
        border: 1px solid #4a0000;
        background: #2a0000;
        color: white;
    }

    label {
        color: #ccc;
    }

    button {
        background: #6b0000 !important;
        color: white !important;
        border-radius: 10px !important;
        padding: 8px 14px;
        border: none;
        transition: 0.3s;
    }

    button:hover {
        background: #8b0000 !important;
    }
</style>

<!-- HEADER -->
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-100 leading-tight">
        Profile Settings
    </h2>
</x-slot>

<div class="container-box py-10">

    <!-- PROFILE INFO -->
    <div class="card-modern">
        <h3>Profile Information</h3>
        @include('profile.partials.update-profile-information-form')
    </div>

    <!-- PASSWORD -->
    <div class="card-modern">
        <h3>Update Password</h3>
        @include('profile.partials.update-password-form')
    </div>

    <!-- DELETE ACCOUNT -->
    <div class="card-modern">
        <h3>Delete Account</h3>
        @include('profile.partials.delete-user-form')
    </div>

</div>

</x-app-layout>