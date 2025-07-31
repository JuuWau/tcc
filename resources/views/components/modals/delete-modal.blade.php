@props([
    'modalId' => 'modalDelete',
    'title' => 'Confirmar exclusão',
    'message' => 'Tem certeza que deseja excluir?',
    'confirmId' => null,
    'confirmLabel' => 'Excluir',
    'confirmOnclick' => null,
])

<div class="modal fade" id="{{ $modalId }}" tabindex="-1" role="dialog" aria-labelledby="{{ $modalId }}Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="{{ $modalId }}Label">{{ $title }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body p-4">
                {{ $message }}
            </div>

            <div class="modal-footer">
                <div class="flex justify-end">
                    <x-buttons.close-button />
                    <x-buttons.delete-modal-button
                        :id="$confirmId"
                        :label="$confirmLabel"
                        :onclick="$confirmOnclick" />
                </div>
            </div>
        </div>
    </div>
</div>