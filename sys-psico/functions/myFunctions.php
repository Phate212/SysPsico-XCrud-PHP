<?php

# Functions - Agendamentos

function replace_insert_add_agendamento($postdata, $xcrud){
    
    date_default_timezone_set('America/Sao_Paulo');
    $dtAtual = date('Y-m-d H:i:s');
    
    $dtAgendamento  = $postdata->get("data_agendamento");    
    $acompanhamento = addslashes($postdata->get("acompanhamento")); 
    $aluno          = $postdata->get("idAluno");
    $status         = $postdata->get("status");
    
    $xcrud = Xcrud_db::get_instance();
    
    $xcrud->query('SELECT COUNT(*) data_agendamento FROM acompanhamentopsicologo WHERE ' . 'data_agendamento ='. " '$dtAgendamento'");
    $row = $xcrud->row();
    $count = $row['data_agendamento'];
        
    if($count == 0){ //Se não existir uma consulta agendada para a data inserida
        if($dtAgendamento > $dtAtual){
            $xcrud->query('INSERT INTO acompanhamentopsicologo (data_agendamento, acompanhamento, idAluno, status)'
                        . 'VALUES ("'.$dtAgendamento.'", "'.$acompanhamento.'", "'.$aluno.'", "'.$status.'")');
            echo "<script>alert ('Agendamento salvo com sucesso');</script>";
        }else{
            echo "<script>alert('ERRO! A data de agendamento não pode ser menor que a data atual.');</script>";
        }
    }else{
        echo "<script>alert ('ERRO! Já existe um agendamento para a data e horário informados.');</script>";
    }    
}

# Functions - Acompanhamentos

function after_saveConfirmation(){
    echo "<script>alert ('Acompanhamento salvo com sucesso.');</script>";
}