@extends('layouts.app')

@section('title', 'Funcionários')

@section('content')
<div class="flex justify-center mt-40">
    <div class="w-full max-w-7xl">
        <div class="bg-white overflow-hidden shadow-lg rounded-lg">
            <div class="p-6 text-gray-900">
                <x-buttons.create-button
                    id=""
                    icon="fas fa-user-plus"
                    label="Novo Funcionário"
                    onclick="Employee.openCreateModal()"
                />
            <div id="employees_table_container"></div>
            </div>
        </div>
    </div>
</div>
<div id="employees_form_container"></div>
<div id="employees_delete_container"></div>
@endsection

@push('scripts')
<script src="{{ asset('js/entities/employees.js') }}"></script>
<script src="{{ asset('js/views/employees/employees-index.js') }}"></script>
@endpush