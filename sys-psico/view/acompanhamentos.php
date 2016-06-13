<?php
    include_once '../controller/acompanhamentosController.php';
?>

<!DOCTYPE HTML>
<html>
<head>
    <meta name="description" content="IFCE: Intranet Campus Quixadá" /> 
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="assets/css/menu.css">
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
    <title>IFCE | Quixadá | Psicologia | Acompanhamento Pscicólogo</title>
</head>
 
<body>
    <aside class="sidebar-left">
        <a class="company-logo" href="#"><i class="fa fa-users"></i></a>
        <div class="sidebar-links">
            <a class="link-blue" href="index.php"><i class="fa fa-calendar"></i>Agendamentos</a>
            <a class="link-green selected" href="#"><i class="fa fa-comments-o"></i>Acompanhamentos</a>
            <a class="link-red" href="#"><i class="fa fa-power-off"></i>Sair</a>
	</div>
    </aside>

    <div class="main-content">
        <?php echo $xcrud->render(); ?>
    </div>
    
    <script type="text/javascript" src="../plugins/ckeditor/ckeditor.js"></script>
</body>
</html>