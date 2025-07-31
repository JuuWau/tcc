<table id="employees_table" class="table table-striped table-hover mx-auto mt-6">
    <thead>
        <tr class="bg-white text-black">
            <th class="w-3/8">Foto</th>
            <th class="w-1/5">Nome</th>
            <th class="w-2/5">Email</th>
            <th class="w-1/6">Permissão</th>
            <th class="w-1/6">Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($employees as $employee)
            <tr>
                <td>
                @if($employee->photo)
                    <img src="{{ asset('storage/' . $employee->photo) }}" alt="Foto de {{ $employee->name }}" class="w-12 h-12 rounded-full object-cover">
                @else
                    <div class="w-12 h-12 rounded-full bg-gray-300 flex items-center justify-center">
                        <i class="text-gray-500 fa-solid fa-user"></i>
                    </div>
                @endif
            </td>
                <td>{{ $employee->name }}</td>
                <td>{{ $employee->email }}</td>
                <td><span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-lg">{{ $employee->permission_type }}</span>
                </td>
                <td>
                    <x-buttons.edit-button
                        id="btnEditEmployee"
                        icon="fas fa-user-plus"
                        label="Novo Funcionário"
                        onclick="Employee.openEditModal({{ $employee->id }})"
                    />
                    <x-buttons.delete-button
                        id="btnDeleteEmployee"
                        icon="fas fa-user-plus"
                        label="Deletar"
                        onclick="Employee.openDeleteModal({{ $employee->id }})"
                    />
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<script src="{{ asset('js/views/employees/employees-table.js') }}"></script>