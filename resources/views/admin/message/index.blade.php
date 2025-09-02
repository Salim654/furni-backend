@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="mb-4">Messages</h1>

    @if(session('success'))
        toastr.success("{{ session('success') }}");
    @endif

    @if(session('error'))
        toastr.error("{{ session('error') }}");
    @endif

    @livewire('message-table')
</div>
@endsection
