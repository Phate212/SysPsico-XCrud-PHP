<?php

include '../xcrud/xcrud.php';
    
    $xcrud = Xcrud::get_instance();
    $xcrud->table('acompanhamentopsicologo');
    $xcrud->table_name('Acompanhamentos - Pscicólogo');
    $xcrud->order_by('status, data_agendamento');
    
#Configurações de colunas
    
    $xcrud->columns('status, data_agendamento , idAluno, acompanhamento');
    $xcrud->column_width('data_agendamento','14%')->column_width('acompanhamento', '25%');
    
    $xcrud->column_cut(250,'idAluno') ->column_cut(10,'acompanhamento');
    
    $xcrud->highlight('status', '=', 'Agendado', '#FFD700')
           ->highlight('status', '=', 'Realizado', '#32CD32');
   
#Configurações de botões
    
    $xcrud->hide_button('save_new, save_return, edit'); //ocultamos o edit para o 'Realizar Acompanhamento funcionar'
    $xcrud->set_lang('save_edit', 'Salvar acompanhamento');
    
    $xcrud->button('#', 'Adicionar/Editar descrição do acompanhamento', 'icon-quill', 'xcrud-action', 
        array('data-task' => 'edit', 'data-primary' => '{idAcompanhamento}'));
    
    $xcrud->unset_add();
    
#Configurações de campos
    
    $xcrud->fields('idAluno, data_agendamento, acompanhamento');
    $xcrud->change_type('data_agendamento', 'datetime');
    
    $xcrud->disabled('idAluno','edit')//desabilita o campo ao relizar um edição
          ->disabled('data_agendamento', 'edit'); 
    
#Confugurações de labels
    
    $xcrud->label('idAluno','Curso / Aluno')->label('data_agendamento', 'Data do agendamento')
          ->label('acompanhamento', 'Acompanhamento / Descrição');
   
#Mostra no dropdown os alunos cadastrados no DB
    
    $xcrud->relation('idAluno','aluno','idAluno',array('curso','nome')); // campos dropdowns
           
    
#Configurações de validações
    
    $xcrud->validation_required('idAluno')->validation_required('acompanhamento')->validation_required('data_agendamento');
      
#--
    $xcrud->after_update('after_saveConfirmation', '../functions/myFunctions.php'); //Confirma com alert o salvamento
    $xcrud->pass_var('status','Realizado', 'edit');
   
    
    

    
