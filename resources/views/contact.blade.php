@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <h1 class="mb-4">Контакты</h1>

        <!-- Livewire компонент -->
        <livewire:contact-form />

        <!-- Или использовать с секцией -->
        {{-- @include('components.contact-section') --}}
    </div>
@endsection
