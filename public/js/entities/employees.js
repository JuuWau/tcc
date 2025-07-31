const Employee = {
    loadEmployeesTable: function () {
        $.post({
            url: '/employees-table',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(retorno) {
                $("#employees_table_container").html(retorno);
            },
            fail: function(xhr) {
                console.error("Erro:", xhr.status, xhr.statusText);
            }
        });
    },

    createEmployee: function () {
        let form = document.getElementById('formEmployee');
        let formData = new FormData(form);
        console.log("Form Data:", formData);
        $.ajax({
            url: '/employees',
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                toastr.success('Funcionário criado com sucesso!');
                Employee.loadEmployeesTable();
                $('#employeeModal').modal('hide');
            },
            error: function (xhr) {
                if (xhr.status === 422) {
                    let errors = xhr.responseJSON.errors;
                    $.each(errors, function (field, messages) {
                        messages.forEach(function (msg) {
                            toastr.error(msg);
                        });
                    });
                } else {
                    toastr.error('Erro ao salvar funcionário.');
                }
            }
        });
    },

    editEmployee: function () {
        let form = document.getElementById('formEmployee');
        let formData = new FormData(form);
        let id = formData.get('id');
        formData.append('_method', 'PATCH');

        $.ajax({
            url: `/employees/${id}`,
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                toastr.success('Funcionário atualizado com sucesso!');
                Employee.loadEmployeesTable();
                $('#employeeModal').modal('hide');
            },
            error: function (xhr) {
                if (xhr.status === 422) {
                    let errors = xhr.responseJSON.errors;
                    $.each(errors, function (field, messages) {
                        messages.forEach(function (msg) {
                            toastr.error(msg);
                        });
                    });
                } else {
                    toastr.error('Erro ao salvar funcionário.');
                }
            }
        });
    },

    deleteEmployee: function (id) {
        $.ajax({
            url: `/employees/${id}/delete`,
            method: 'DELETE',
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                toastr.success('Funcionário deletado com sucesso!');
                Employee.loadEmployeesTable();
                $('#modalDelete').modal('hide');
            },
            error: function (xhr) {
                if (xhr.status === 422) {
                    let errors = xhr.responseJSON.errors;
                    $.each(errors, function (field, messages) {
                        messages.forEach(function (msg) {
                            toastr.error(msg);
                        });
                    });
                } else {
                    toastr.error('Erro ao salvar funcionário.');
                }
            }
        });
    },

    openEditModal: function(id) {
        $.get(`/employees/${id}/edit`, function(html) {
            $('#employees_form_container').html(html);
            $('#employeeModal').modal('show');
        }).fail(function(xhr) {
            toastr.error('Erro ao carregar funcionário.');
        });
    },

    openCreateModal: function() {
        $.get(`/employees/create`, function(html) {
            $('#employees_form_container').html(html);
            $('#employeeModal').modal('show');
        }).fail(function(xhr) {
            toastr.error('Erro ao carregar modal.');
        });
    },

    openDeleteModal: function(id) {
        $.get(`/employees/${id}/delete`, function(html) {
            $('#employees_delete_container').html(html);
            $('#modalDelete').modal('show');
        }).fail(function(xhr) {
            toastr.error('Erro ao carregar modal.');
        });
    },
};
