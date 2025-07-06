@extends('layouts.app')

@section('title', 'Funcionários')

@section('content')
<div class="flex justify-center mt-40">
    <div class="w-full max-w-7xl">
        <div class="bg-white overflow-hidden shadow-lg rounded-lg">
            <div class="p-6 text-gray-900">
                <x-buttons.create-button
                    id="btnNewEmployee"
                    icon="fas fa-user-plus"
                    label="Novo Funcionário"
                />
                <table id="employes_table" class="table table-striped table-hover mx-auto mt-6">
                    <thead>
                        <tr class="bg-white text-black">
                            <th class="w-2/5">Nome</th>
                            <th class="w-1/4">Email</th>
                            <th class="w-1/5">Permissão</th>
                            <th class="w-1/5">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employes as $employee)
                            <tr>
                                <td>{{ $employee->name }}</td>
                                <td>{{ $employee->email }}</td>
                                <td><span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-lg">{{ $employee->permission_type }}</span>
                                </td>
                                <td>
                                    <x-buttons.edit-button
                                        id="btnEditEmployee"
                                        icon="fas fa-user-plus"
                                        label="Novo Funcionário"
                                        onclick="editEmployee({{ $employee->id }})"
                                    />
                                    <button class="gap-3 px-4 py-3 bg-gray-200 rounded-lg hover:bg-gray-300 focus:outline-none">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div id="employes_form_container"></div>
@endsection

@push('scripts')
<script src="{{ asset('js/employes/employes-table.js') }}"></script>
@endpush