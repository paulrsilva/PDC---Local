<?php include 'inc/config.php'; ?>
<?php include 'inc/template_start.php'; ?>
<?php include 'inc/page_head.php'; ?>

<!-- Page content -->
<div id="page-content">
    <!-- Blank Header -->
    <div class="content-header">
        <div class="header-section">
            <h1>
                <i class="gi gi-group"></i>Equipe<br><small>Definir Equipe de Trabalho!</small>
            </h1>
        </div>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li>Configurações</li>
        <li>Equipe</li>
        <li><a href="">Gestão de Equipe</a></li>
    </ul>
    <!-- END Blank Header -->

    <!-- Example Block -->
    <div class="block">
        <!-- Example Title -->
        <div class="block-title">
            <h2>Block Title</h2>
        </div>
        <!-- END Example Title -->

        <!-- Example Content -->
        <p>Your content..</p>
        <!-- END Example Content -->
    </div>
    <!-- END Example Block -->
    
    <div class="block">
        <!-- Título Tabela Equipe -->
        <div class="block-title">
            <h2>Lista de Membros <strong> Equipe </strong></h2>
        </div>
        <!-- END Example Title -->

        <!-- Tabela responsiva de membros equipe  -->
        <div class="table-responsive">
            <table class="table table-vcenter table-striped">
                <thead>
                    <tr>
                        <th style="width: 150px;" class="text-center"><i class="gi gi-user"></i></th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Acesso</th>
                        <th style="width: 150px;" class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center"><img src="img/placeholders/avatars/avatar<?php echo rand(1, 16); ?>.jpg" alt="avatar" class="img-circle"></td>
                        <td><a href="page_ready_user_profile.php">client1</a></td>
                        <td>client1@example.com</td>
                        <td><a href="javascript:void(0)" class="label label-warning">Trial</a></td>
                        <td class="text-center">
                            <div class="btn-group btn-group-xs">
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Edit" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Delete" class="btn btn-danger"><i class="fa fa-times"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center"><img src="img/placeholders/avatars/avatar<?php echo rand(1, 16); ?>.jpg" alt="avatar" class="img-circle"></td>
                        <td><a href="page_ready_user_profile.php">client2</a></td>
                        <td>client2@example.com</td>
                        <td><a href="javascript:void(0)" class="label label-success">VIP</a></td>
                        <td class="text-center">
                            <div class="btn-group btn-group-xs">
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Edit" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Delete" class="btn btn-danger"><i class="fa fa-times"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center"><img src="img/placeholders/avatars/avatar<?php echo rand(1, 16); ?>.jpg" alt="avatar" class="img-circle"></td>
                        <td><a href="page_ready_user_profile.php">client3</a></td>
                        <td>client3@example.com</td>
                        <td><a href="javascript:void(0)" class="label label-info">Business</a></td>
                        <td class="text-center">
                            <div class="btn-group btn-group-xs">
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Edit" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Delete" class="btn btn-danger"><i class="fa fa-times"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center"><img src="img/placeholders/avatars/avatar<?php echo rand(1, 16); ?>.jpg" alt="avatar" class="img-circle"></td>
                        <td><a href="page_ready_user_profile.php">client4</a></td>
                        <td>client4@example.com</td>
                        <td><a href="javascript:void(0)" class="label label-success">VIP</a></td>
                        <td class="text-center">
                            <div class="btn-group btn-group-xs">
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Edit" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Delete" class="btn btn-danger"><i class="fa fa-times"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center"><img src="img/placeholders/avatars/avatar<?php echo rand(1, 16); ?>.jpg" alt="avatar" class="img-circle"></td>
                        <td><a href="page_ready_user_profile.php">client5</a></td>
                        <td>client5@example.com</td>
                        <td><a href="javascript:void(0)" class="label label-primary">Personal</a></td>
                        <td class="text-center">
                            <div class="btn-group btn-group-xs">
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Edit" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Delete" class="btn btn-danger"><i class="fa fa-times"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center"><img src="img/placeholders/avatars/avatar<?php echo rand(1, 16); ?>.jpg" alt="avatar" class="img-circle"></td>
                        <td><a href="page_ready_user_profile.php">client6</a></td>
                        <td>client6@example.com</td>
                        <td><a href="javascript:void(0)" class="label label-info">Business</a></td>
                        <td class="text-center">
                            <div class="btn-group btn-group-xs">
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Edit" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Delete" class="btn btn-danger"><i class="fa fa-times"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center"><img src="img/placeholders/avatars/avatar<?php echo rand(1, 16); ?>.jpg" alt="avatar" class="img-circle"></td>
                        <td><a href="page_ready_user_profile.php">client7</a></td>
                        <td>client7@example.com</td>
                        <td><a href="javascript:void(0)" class="label label-primary">Personal</a></td>
                        <td class="text-center">
                            <div class="btn-group btn-group-xs">
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Edit" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Delete" class="btn btn-danger"><i class="fa fa-times"></i></a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- END Responsive Full Content -->
        
        
        
    </div>
    <!-- END Example Block -->
    
    
    
    
</div>
<!-- END Page Content -->




   


<?php include 'inc/page_footer.php'; ?>
<?php include 'inc/template_scripts.php'; ?>
<?php include 'inc/template_end.php'; ?>