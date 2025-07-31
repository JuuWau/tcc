<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Address;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $employees = User::select('users.*', 'permissions.type as permission_type')
            ->join('permissions', 'users.permission_id', '=', 'permissions.id')
            ->paginate(10);

        return view('employees.employees', compact('employees'));
    }

    public function table()
    {
        $employees = User::select('users.*', 'permissions.type as permission_type')
            ->join('permissions', 'users.permission_id', '=', 'permissions.id')
            ->paginate(10);

        return view('employees.employees-table', compact('employees'));
    }

    public function create()
    {
        $permissions = Permission::all();

        return view('employees.employees-form', compact('permissions'));
    }

    public function store(StoreUserRequest $request)
    {
        $data = $request->validated();

        $address = Address::create([
            'cep' => $data['cep'],
            'address' => $data['address'],
            'neighborhood' => $data['neighborhood'],
            'number' => $data['number'],
            'extra_info' => $data['extra_info'] ?? null,
            'state' => $data['state'],
            'city' => $data['city'],
        ]);

        unset(
            $data['cep'], $data['address'], $data['neighborhood'],
            $data['number'], $data['extra_info'], $data['state'], $data['city']
        );

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('employees', 'public');
        }

        $data['password'] = Hash::make($data['password']);

        $data['address_id'] = $address->id;

        $employee = User::create($data);

        return response()->json([
            'message' => 'Usuário criado com sucesso!',
            'employee' => $employee,
        ]);
    }

    public function edit($id)
    {
        $employee = User::with('address')->findOrFail($id);
        $permissions = Permission::all();

        return view('employees.employees-form', compact('employee', 'permissions'));
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::findOrFail($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->cpf = $request->cpf;
        $user->birth_date = $request->birth_date;
        $user->permission_id = $request->permission_id;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('employees', 'public');
            $user->photo = $path;
        }

        if ($user->address_id && $user->address) {
            $user->address->update([
                'cep' => $request->cep,
                'address' => $request->address,
                'neighborhood' => $request->neighborhood,
                'number' => $request->number,
                'extra_info' => $request->extra_info,
                'state' => $request->state,
                'city' => $request->city,
            ]);
        } else {
            $address = Address::create([
                'cep' => $request->cep,
                'address' => $request->address,
                'neighborhood' => $request->neighborhood,
                'number' => $request->number,
                'extra_info' => $request->extra_info,
                'state' => $request->state,
                'city' => $request->city,
            ]);

            $user->address_id = $address->id;
        }

        $user->save();

        return response()->json(['success' => true, 'message' => 'Usuário atualizado com sucesso!']);
    }

    public function deleteModal($id)
    {
        $employee = User::findOrFail($id);
        return view('components.modals.delete-modal', [
            'modalId' => 'modalDelete',
            'title' => 'Excluir funcionário',
            'message' => 'Tem certeza que deseja excluir este funcionário?',
            'confirmId' => 'btnDeleteEmployeeConfirm',
            'confirmLabel' => 'Excluir',
            'confirmOnclick' => "Employee.deleteEmployee({$employee->id})",
        ]);
    }

    public function destroy($id)
    {
        $user = User::with('address')->findOrFail($id);

        $user->delete();

        if ($user->address) {
            $user->address->delete();
        }

        return response()->json([
            'success' => true,
            'message' => 'Usuário excluído com sucesso!',
        ]);
    }
}
