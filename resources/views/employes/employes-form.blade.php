<div class="modal fade" id="employeModal" tabindex="-1" role="dialog" aria-labelledby="employeModal" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="employeModal" class="text-gray-700">Funcionário</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formFuncionario" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="flex mb-4 items-start">
                        <div class="w-1/4">
                            <div class="w-60 h-60 rounded-md shadow-sm border-gray-100 mb-2 relative">
                            <img id="previewFoto" src="" class="object-cover w-full h-full" />
                            <label for="foto" class="absolute bottom-2 left-1/2 transform -translate-x-1/2 cursor-pointer bg-white bg-opacity-75 rounded-full p-2 hover:bg-opacity-100 transition-shadow shadow">
                                <i class="fas fa-camera text-gray-700 text-xl"></i>
                            </label>
                            </div>
                            <input type="file" name="foto" id="foto" accept="image/*" class="hidden" />
                        </div>

                        <div class="flex flex-col flex-1 gap-4">
                            <div class="flex gap-4">
                                <div class="w-3/4">
                                    <label for="name" class="block text-sm font-medium text-gray-700">Nome</label>
                                    <input type="text" name="name" id="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                                </div>
                                <div class="w-1/4">
                                    <label for="cpf" class="block text-sm font-medium text-gray-700">CPF</label>
                                    <input type="text" name="cpf" id="cpf" maxlength="14" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                </div>
                            </div>

                            <div class="flex gap-4">
                                <div class="w-1/2">
                                    <label for="email" class="block text-sm font-medium text-gray-700">E-mail</label>
                                    <input type="email" name="email" id="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                                </div>
                                <div class="w-1/2">
                                    <label for="password" class="block text-sm font-medium text-gray-700">Senha</label>
                                    <div class="relative">
                                        <input type="password" name="password" id="password" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm pr-10" required>
                                        <span
                                            class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-500 cursor-pointer"
                                            id="togglePassword">
                                            <i class="fas fa-eye" id="iconPassword"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="flex gap-4">
                                <div class="w-1/2">
                                    <label for="date" class="block text-sm font-medium text-gray-700">Data de nascimento</label>
                                    <input type="date" name="birth_date" id="birth_date" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                                </div>
                                <div class="w-1/2">
                                    <label for="permission_id" class="block text-sm font-medium text-gray-700">Tipo de Cadastro</label>
                                    <select id="permission_id" name="permission_id" class="tom-select mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                        <option value="">Selecione</option>
                                        @foreach($permissions as $permission)
                                            <option value="{{ $permission->id }}">{{ $permission->type }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="flex flex-col flex-1 gap-4">
                        
                        <div class="flex gap-4">
                            <div class="w-1/6">
                                <label for="cep" class="block text-sm font-medium text-gray-700">CEP</label>
                                <input type="text" name="cep" id="cep" maxlength="8" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            </div>
                            <div class="w-3/6">
                                <label for="address" class="block text-sm font-medium text-gray-700">Endereço</label>
                                <input type="text" name="address" id="address" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            </div>
                            <div class="w-2/6">
                                <label for="neighborhood" class="block text-sm font-medium text-gray-700">Bairro</label>
                                <input type="text" name="neighborhood" id="neighborhood" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div class="w-1/6">
                                <label for="number" class="block text-sm font-medium text-gray-700">Número</label>
                                <input type="text" name="number" id="number" maxlength="20" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            </div>
                            <div class="w-2/6">
                                <label for="number" class="block text-sm font-medium text-gray-700">Complemento</label>
                                <input type="text" name="extra_info" id="extra_info" maxlength="20" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            </div>
                            <div class="w-1/6">
                                <label for="state" class="block text-sm font-medium text-gray-700">Estado</label>
                                <select id="state" name="state" class="tom-select mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                    <option value="">Selecione</option>
                                </select>
                            </div>
                            <div class="w-2/6">
                                <label for="city" class="block text-sm font-medium text-gray-700">Cidade</label>
                                <select id="city" name="city" class="tom-select mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                    <option value="">Selecione</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-end mt-4">
                        <x-buttons.close-button />
                        <x-buttons.save-button />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/masks.js') }}"></script>
<script src="{{ asset('js/employes/employes-form.js') }}"></script>
<script src="{{ asset('js/api/viacep.js') }}"></script>
<script src="{{ asset('js/api/ibge.js') }}"></script>