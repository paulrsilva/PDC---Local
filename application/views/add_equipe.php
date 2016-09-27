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
            <h2>Adicionar Membro Equipe</h2>
        </div>
        <!-- END Example Title -->

        <!-- Formulário de Conteúdo para adicionar contato -->
        
        <!-- Add Contact Content -->
                <form action="page_ready_contacts.php" method="post" class="form-horizontal form-bordered" onsubmit="return false;">
                    <div class="form-group">
                        <label class="col-xs-3 control-label text-muted">Sem Imagem</label>
                        <div class="col-xs-9">
                            <i class="fa fa-fw fa-upload"></i> <a href="javascript:void(0)">Enviar Foto</a><br>
                            <i class="fa fa-fw fa-picture-o"></i> <a href="javascript:void(0)">Escolher da biblioteca</a>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 control-label" for="add-membro-nome">Nome</label>
                        <div class="col-xs-9">
                            <input type="text" id="add-contact-name" name="add-membro-nome" class="form-control" placeholder="Nome Completo">
                        </div>
                    </div>
                     <div class="form-group">
                        <label class="col-xs-3 control-label" for="add-contact-CPF">CPF</label>
                        <div class="col-xs-9">
                            <input type="text" id="add-contact-name" name="add-membro-CPF" class="form-control" placeholder="CPF">
                        </div>
                    </div>                   
                    <div class="form-group">
                        <label class="col-xs-3 control-label" for="add-membro-email">Email</label>
                        <div class="col-xs-9">
                            <input type="email" id="add-contact-email" name="add-membro-email" class="form-control" placeholder="Email do membro">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 control-label" for="add-membro-phone">Telefone</label>
                        <div class="col-xs-9">
                            <input type="text" id="add-contact-phone" name="add-membro-phone" class="form-control" placeholder="(41) 0000-0000">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 control-label" for="add-membro-mobile">Celular</label>
                        <div class="col-xs-9">
                            <input type="text" id="add-contact-mobile" name="add-membro-mobile" class="form-control" placeholder="Insira o Celular">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 control-label" for="add-membro-Cidade">Cidade/UF</label>
                        <div class="col-xs-6">
                            <input type="text" id="add-contact-address" name="edit-membro-Cidade" class="form-control" placeholder="Cidade">
                        </div>
                        <div class="col-xs-3">
                            <input type="text" id="add-contact-UF" name="edit-membro-UF" class="form-control" placeholder="UF">
                        </div>
                    </div>                    
                    <div class="form-group">
                        <label class="col-xs-3 control-label" for="add-membro-address">Endereço</label>
                        <div class="col-xs-9">
                            <input type="text" id="add-contact-address" name="edit-membro-address" class="form-control" placeholder="Endereço">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 control-label" for="add-membro-group">Grupo</label>
                        <div class="col-xs-9">
                            <input type="text" id="add-contact-group" name="add-membro-group" class="input-tags" value="All Contacts">
                        </div>
                    </div>
                    <div class="form-group form-actions">
                        <div class="col-xs-9 col-xs-offset-3">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Adicionar Membro</button>
                        </div>
                    </div>
                </form>
                <!-- END Add Contact Content -->
        
        
        <!-- Fim de formulário de conteúdo para adicionar contato -->
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