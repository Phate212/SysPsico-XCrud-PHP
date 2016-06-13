<?php

include '../xcrud/xcrud.php';

    $xcrud = Xcrud::get_instance();
    $xcrud->table('acompanhamentopsicologo');
    $xcrud->where('status =', 'Agendado');

    $xcrud->table_name('Agendamentos - Psicólogo');
    $xcrud->order_by('data_agendamento');

#Configurações de colunas
    $xcrud->columns('data_agendamento, idAluno');
    $xcrud->column_width('data_agendamento','20%');

    $xcrud->column_cut(150,'idAluno') ->column_cut(150,'acompanhamento');


#Configurações de linhas
    $xcrud->limit(10);

#Configurações de botões
    $xcrud->hide_button('save_return, save_edit');
    $xcrud->set_lang('save_new', 'Salvar agendamento')
          ->set_lang('add', 'Novo agendamento')
          ->set_lang('return', 'Listar agendamentos');

    $xcrud->unset_view();

#Configurações de campos
    $xcrud->fields('idAluno, data_agendamento');

#Confugurações de labels
    $xcrud->label('idAluno','Curso / Aluno')->label('data_agendamento', 'Data do agendamento');

#Mostra no dropdown os alunos cadastrados no DB

    $xcrud->relation('idAluno','aluno','idAluno',array('curso','nome')); // campos dropdowns


#Configurações de validações
    $xcrud->validation_required('idAluno')->validation_required('acompanhamento')->validation_required('data_agendamento');

    $xcrud->change_type('data_agendamento', 'datetime');

#
    $xcrud->pass_var('status','Agendado', 'create');

    $xcrud->replace_insert('replace_insert_add_agendamento', '../functions/myFunctions.php');//Substitui a função add padrão

?>r
