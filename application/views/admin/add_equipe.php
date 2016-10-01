<?php include 'inc/config.php'; ?>
<?php include 'inc/template_start.php'; ?>
<?php include 'inc/page_head.php'; ?>

<!-- Page content -->
<div id="page-content">
    <!-- Blank Header -->
    <div class="content-header">
        <div class="header-section">
            <h1>
                <i class="gi gi-group"></i>Equipe<br><small>Definir Equipe de Trabalho!!</small>
            </h1>
        </div>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li>Configurações</li>
        <li>Equipe</li>
        <li><a href="">Gestão de Equipe</a></li>
    </ul>
    <!-- END Blank Header -->
    <!-- Lista dinamica da equipe -->
    
    <div class="block">
        <div class="block-title">
            <h2>Lista de Membros <strong> Equipe </strong></h2>
        </div>
        
        <div class="table-responsive">
            <table class="table table-vcenter table-striped">
                <thead>
                    <tr>
                        <th style="width: 150px;" class="text-center"><i class="gi gi-user"></i></th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Acesso</th>
                        <th>Status</th>
                        <th style="width: 150px;" class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Substituido a lista de objetos (lista equipe) por um array formatado pelo controler -->
                    <?php foreach ($MembrosEquipe as $Equipe) { ?>
                        <tr>
                            <td class="text-center"><img src="<?php echo base_url().$Equipe['foto']; ?>" alt="avatar" class="img-circle" style="width:20px;height:20px"></td>
                            <td><a href="page_ready_user_profile.php"><?php  echo $Equipe['nome']; ?></a></td>
                            <td><?php  echo $Equipe['email']; ?></td>
                            <td><a href="javascript:void(0)" class="label label-warning"><?php echo $Equipe['Acesso']; ?></a></td>
                            <td><a href="javascript:void(0)" class="label label-success"> ok </a> </td>
                            <td class="text-center">
                                <div class="btn-group btn-group-xs">
                                    <?php $idM=$Equipe['id']; ?>
                                    <a href="<?php echo base_url()."dashboard/gerenciarEquipe/$idM" ; ?>" data-toggle="tooltip" title="Atualizar" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                                    <a href="<?php echo base_url()."dashboard/DeletaMembroEquipeCandidato/$idM" ; ?>" data-toggle="tooltip" title="Apagar" class="btn btn-danger"><i class="fa fa-times"></i></a>
                                </div>
                            </td>
                        </tr> 
                    <?php } ?>
                                 
                </tbody>
            </table> 
        </div>
            

    </div>
    <!-- Fim lista dinamica da equipe -->
    
    <!-- Example Block -->
    <div class="block">
        <!-- Example Title -->
        <div class="block-title">
            <h2>Adicionar Membro Equipe</h2>
        </div>
        <!-- END Example Title -->

        <!-- Formulário de Conteúdo para adicionar contato -->
        <!-- Add Contact Content -->
        
        
                <form action="<?php echo site_url('index.php/dashboard/adicionarEquipe'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
                    <div class="form-group">
                        
                        
                        <div class="col-xs-3">
                                <img src="<?php echo base_url().$Membro['foto']; ?>" alt="avatar" style="width:50px;height:50px" class="img-circle pull-right">          
                        </div>
                             
                        <div class="col-xs-9">
                            
                            <?php if($Membro['Id_MembroEquipe']!=""){echo "<i class='fa fa-fw fa-upload'></i> <a href='#modal-foto_membro' data-toggle='modal'>atualizar Foto</a><br>";} ?>
                            <?php if($Membro['Id_MembroEquipe']!=""){echo "<i class='fa fa-fw fa-picture-o'></i><a href='#'>Escolher da biblioteca</a>";} ?>
                            
                            <!-- OLD ONE - Sem o PHP
                            <i class="fa fa-fw fa-upload"></i> <a href="#modal-foto_membro" data-toggle="modal">Enviar Foto</a><br>
                            <i class="fa fa-fw fa-picture-o"></i> <a href="javascript:void(0)">Escolher da biblioteca</a>
                            -->
                            
                            <?php if($Membro['Id_MembroEquipe']==""){echo "<input type='file' title='enviar foto membro' id='MemberPicInput' name='MemberPicInput'>enviar foto Membro Equipe</input>"; } ?>
                          
                            <!--
                            <input type="file" title="enviar foto membro"  id="MemberPicInput" name="MemberPicInput">enviar foto Membro Equipe</input>
                            -->
                           
                            
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 control-label" for="add-membro-nome">Nome</label>
                        <div class="col-xs-6">
                            <input type="hidden" value="<?php echo $Membro['Id_MembroEquipe']; ?>" name="membro_id" />
                            <input type="text" id="add-contact-name" name="add-membro-nome" value="<?php echo $Membro['Nome']; ?>" class="form-control" placeholder="Nome Completo">
                        </div>
                        <div class="col-xs-3">
                            
                            <label class="radio-inline" for="sexo-inline-radio1">
                                <input type="radio" id="sexo-inline-radio1" name="sexo_membro"
                                       value="M" 
                                       <?php if($Membro['sexo']=="M") { echo "checked='TRUE'"; }?>> <i class="fa fa-child"> Masc.</i>
                            </label>
                        
                            <label class="radio-inline" for="sexo-inline-radio2">
                                <input type="radio" id="sexo-inline-radio2" name="sexo_membro" value="F"
                                       <?php if($Membro['sexo']=="F") { echo "checked='TRUE'"; }?>> <i class="fa fa-female"> Fem.</i>
                            </label>                          
                         </div>
                            
                    </div>
                     <div class="form-group">
                        <label class="col-xs-3 control-label" for="add-contact-CPF" >CPF</label>
                        <div class="col-xs-3">
                            <input type="text" id="add-contact-name" name="add-membro-CPF" value="<?php echo $Membro['CPF']; ?>" class="form-control" placeholder="CPF">
                        </div>
                        <label class="col-xs-3 control-label" for="masked_nasc_membro">Nascimento</label>
                        <div class="col-xs-3">
                            <?php 
                                if (isset($Membro['DataNascimento'])){
                                     $date = new DateTime($Membro['DataNascimento']);
                                     $dataNascimentoMembro = $date->format('d/m/Y');
                                } else {
                                    $dataNascimentoMembro = "";
                                }
                             ?>
                            <input type="text" id="masked_date" name="masked_nasc_membro" class="form-control" value="<?php echo $dataNascimentoMembro; ?>" placeholder="Data Nascimento">
                        </div>
                    </div>                   
                    <div class="form-group">
                        <label class="col-xs-3 control-label" for="add-membro-email">Email</label>
                        <div class="col-xs-9">
                            <input type="email" id="add-contact-email" name="add-membro-email" value="<?php echo $Membro['Email']; ?>" class="form-control" placeholder="Email do membro">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 control-label" for="add-membro-phone">Telefone</label>
                        <div class="col-xs-9">
                            <input type="text" id="add-contact-phone" name="add-membro-phone" value="<?php echo $Membro['Telefone']; ?>" class="form-control" placeholder="(41) 0000-0000">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 control-label" for="add-membro-mobile">Celular</label>
                        <div class="col-xs-9">
                            <input type="text" id="add-contact-mobile" name="add-membro-mobile" value="<?php echo $Membro['Celular']; ?>" class="form-control" placeholder="Insira o Celular">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 control-label" for="add-membro-Cidade">UF/Cidade</label>
                        <div class="col-xs-3">
                            <input type="text" id="add-contact-UF" name="edit-membro-UF" value="<?php echo $Membro['UF']; ?>" class="form-control" placeholder="UF">
                        </div>
                        <div class="col-xs-6">
                            <input type="text" id="add-contact-address" name="edit-membro-Cidade" value="<?php echo $Membro['Cidade']; ?>" class="form-control" placeholder="Cidade">
                        </div>
                    </div>                    
                    <div class="form-group">
                        <label class="col-xs-3 control-label" for="add-membro-address">CEP/Endereço</label>
                         <div class="col-xs-3">
                             <input type="text" id="add-contact-address" name="edit-membro-CEP"  class="form-control" value="<?php echo $Membro['CEP']; ?>" placeholder="CEP">
                        </div>
                        <div class="col-xs-6">
                            <input type="text" id="add-contact-address" name="edit-membro-address" value="<?php echo $Membro['Endereco']; ?>" class="form-control" placeholder="Endereço">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 control-label" for="add-membro-group">Grupos </label> <!-- Adicionar descritivo -->
                        <div class="col-xs-9">
                           <input type="text" id="add-contact-group" name="add-membro-group" class="input-tags" value="<?php echo $GruposMembro; ?>">
                        </div>
                    </div>
                    
                    
                    <div class="form-group">
                        <legend><i class="fa fa-angle-right"></i> Gestão de Direitos de Acesso</legend>
                        
                        <label class="col-xs-4 control-label" for="atrib_acesso"> Atribuições Membro </label>
                        <div class="col-xs-4">
                            <select id="membro-role" name="membro-role" class="select-chosen" data-placeholder="Função do Membro" style="width: 250px;">
                              <option></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->  

                                <?php foreach($atrib as $atribMembro):?>
                                    <option value="<?php echo $atribMembro->Funcao ?>"><?php echo $atribMembro->Funcao ?></option>
                                <?php endforeach;?>  
                                    
                                <option selected='selected'><?php echo $Membro['AtribMembro']; ?></option>    
                                    
                         </select>
                        </div>
                    </div>
                        
                        
                      <div class="form-group">   
                        <label class="col-xs-4 control-label" for="gestaoCampanha_ler"> Campanha </label> <!-- Adicionar descritivo -->
                        <div class="col-xs-8">
                                <label class="checkbox-inline" for="gestaoCampanha_ler">
                                    <input type="checkbox" id="gestaoCampanha_ler" name="gestaoCampanha_ler"
                                           <?php if($AcessoGestaoCampanha["R"]){ echo "checked='TRUE'"; } ?> value="4"> Ver Informações
                               </label>
                               <label class="checkbox-inline" for="gestaoCampanha_escrever">
                                   <input type="checkbox" id="gestaoCampanha_escrever"
                                          name="gestaoCampanha_escrever" <?php if($AcessoGestaoCampanha["W"]){ echo "checked='TRUE'"; } ?> value="2"> Incluir Dados
                               </label>
                               <label class="checkbox-inline" for="gestaoCampanha_executar">
                                   <input type="checkbox" id="gestaoCampanha_executar" 
                                          name="gestaoCampanha_executar" <?php if($AcessoGestaoCampanha["X"]){ echo "checked='TRUE'"; } ?> value="1"> Excluir/Executar Ações
                               </label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-xs-4 control-label" for="gestaoFinanceira_ler">Financeiro </label> <!-- Adicionar descritivo -->
                        <div class="col-xs-8">
                                <label class="checkbox-inline" for="gestaoFinanceira_ler">
                                    <input type="checkbox" id="gestaoFinanceira_ler" name="gestaoFinanceira_ler"
                                           <?php if($AcessoGestaoFinanceira["R"]){ echo "checked='TRUE'"; } ?> value="4"> Ver Informações
                               </label>
                               <label class="checkbox-inline" for="gestaoFinanceira_escrever">
                                   <input type="checkbox" id="gestaoFinanceira_escreverr"
                                          name="gestaoFinanceira_escrever" <?php if($AcessoGestaoFinanceira["W"]){ echo "checked='TRUE'"; } ?> value="2"> Incluir Dados
                               </label>
                               <label class="checkbox-inline" for="gestaoFinanceira_executar">
                                   <input type="checkbox" id="gestaoCampanha_executar" 
                                          name="gestaoFinanceira_executar" <?php if($AcessoGestaoFinanceira["X"]){ echo "checked='TRUE'"; } ?> value="1"> Excluir/Executar Ações
                               </label>
                        </div>
                    </div>
                    
                    
                    <div class="form-group">
                        <label class="col-xs-4 control-label" for="gestaoGabinente_ler">Gabinete </label> <!-- Adicionar descritivo -->
                        <div class="col-xs-8">
                                <label class="checkbox-inline" for="gestaoGabinente_ler">
                                    <input type="checkbox" id="gestaoGabinente_ler" name="gestaoGabinente_ler"
                                           <?php if($AcessoGestaoGabinete["R"]){ echo "checked='TRUE'"; } ?> value="4"> Ver Informações
                               </label>
                               <label class="checkbox-inline" for="gestaoGabinete_escrever">
                                   <input type="checkbox" id="gestaoCampanha_escrever"
                                          name="gestaoGabinete_escrever" <?php if($AcessoGestaoGabinete["W"]){ echo "checked='TRUE'"; } ?> value="2"> Incluir Dados
                               </label>
                               <label class="checkbox-inline" for="gestaoGabinete_executar">
                                   <input type="checkbox" id="gestaoGabinete_executar" 
                                          name="gestaoGabinete_executar" <?php if($AcessoGestaoGabinete["X"]){ echo "checked='TRUE'"; } ?> value="1"> Excluir/Executar Ações
                               </label>
                        </div>
                    </div>
                    
                    
                    <div class="form-group form-actions">

                        <div class="col-xs-8 col-xs-offset-4">  
                        
                        <?php //Se estiver atualizando muda o nome do botão de adicionar e inclui um botão excluir
                            if (isset($Membro['Nome'])){
                                $MsgButton = 'Atualizar Membro';
                                
                                $varURL =  base_url()."dashboard/DeletaMembroEquipeCandidato/".$Membro['Id_MembroEquipe'];
                                echo "<a class='btn btn-sm btn-danger' href='$varURL' ;' role='button'><i class='fa fa-eraser'></i>Apagar Membro</a>";
                                
                            } elseif(!isset($Membro['Nome']))  {
                               $MsgButton = 'Adicionar Membro'; 
                            }
                        ?>
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> <?php echo $MsgButton; ?></button>
                        </div>
                    </div>
                </form>

                <!-- END Add Contact Content -->
        
        
        <!-- Fim de formulário de conteúdo para adicionar contato -->
    </div>
    <!-- END Example Block -->
    <div class="block">
        <?php var_dump($GruposMembro); ?>
        ---
        <?php echo $AcessoGestao["W"]; ?>
        ---
        <?php var_dump($MembrosEquipe); ?>
        
        <?php foreach ($MembrosEquipe as $Equipe) { ?>
            <?php  echo $Equipe['nome']; ?>
        <?php } ?>
    </div>
   
</div>


 <!-- Enviar Foto Membro Modal -->
    <div id="modal-foto_membro" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="modal-title"><i class="gi gi-user_add"></i> Enviar Foto Membro Equipe</h3>
                </div>
                <div class="modal-body">
                    <?php $idExistente=$Membro['Id_MembroEquipe'] ?>
                    <?php echo $error;?> <!-- Error Message will show up here -->
                    <?php echo form_open_multipart('dashboard/enviaFoto');?>
                    <?php echo "<input type='hidden' name='quem' value='Membro' />"; ?>
                    <?php echo "<input type='hidden' name='idExistente' value='$idExistente' />"; ?>
                    <?php echo "<input type='file' name='userfile' size='20' />"; ?>
                    <?php echo "<input type='submit' name='submit' value='upload' /> ";?>
                    <?php echo "</form>"?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Finalizado</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Fim Enviar Foto Modal -->
<!-- END Page Content -->

<?php include 'inc/page_footer.php'; ?>
<?php include 'inc/template_scripts.php'; ?>
<?php include 'inc/template_end.php'; ?>