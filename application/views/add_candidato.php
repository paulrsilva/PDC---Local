<?php include 'inc/config.php'; $template['header']=''; $template['sidebar'] = 'sidebar-partial sidebar-alt-partial sidebar-no-animations' ?>
<?php include 'inc/template_start.php'; ?>
<?php include 'inc/page_head.php'; ?>

<!-- Pegando as cidades do estado selecionado -->
<?php $uf_cidades=$_GET['uf_cidades'] ?> 

<!-- Page content -->
<div id="page-content">
    <!-- Both Sidebars Partial Header -->
    <div class="content-header">
        <div class="header-section">
            <h1>
                <i class="gi gi-user_add"></i>Finalizar Cadastro<br><small>Adicione um Candidato para Iniciar a Campanha!</small>
            </h1>
        </div>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li>Configurações</li>
        <li>Cadastro</li>
        <li><a href="">Finalizar Cadastro</a></li>
    </ul>
    <!-- END Both Sidebars Partial Header -->

    <!-- Dummy Content -->
    <div class="block full block-alt-noborder">
    <!-- Clickable Wizard Block -->
    <div class="block">
        <!-- Clickable Wizard Title -->
        <div class="block-title">
            <h2><strong>Complete</strong> os dados de configuração</h2>
        </div>
        <!-- END Clickable Wizard Title -->

        <!-- Clickable Wizard Content -->
        <form id="clickable-wizard" action="<?=$_SERVER['PHP_SELF']?>" method="post" class="form-horizontal form-bordered">
            <!-- First Step -->
            <div id="clickable-first" class="step">
                <!-- Step Info -->
                <div class="form-group">
                    <div class="col-xs-12">
                        <ul class="nav nav-pills nav-justified clickable-steps">
                            <li class="active"><a href="javascript:void(0)" data-gotostep="clickable-first"><strong>1. Conta</strong></a></li>
                            <li><a href="javascript:void(0)" data-gotostep="clickable-second"><strong>2. Candidato</strong></a></li>
                            <li><a href="javascript:void(0)" data-gotostep="clickable-third"><strong>3. Plataforma</strong></a></li>
                            <li><a href="javascript:void(0)" data-gotostep="clickable-fourth"><strong>4. Equipe</strong></a></li>
                        </ul>
                    </div>
                </div>
                <!-- END Step Info -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="example-clickable-username">Usuário</label>
                    <div class="col-md-5">
                        <input type="text" id="example-clickable-username" name="example-clickable-username" class="form-control" placeholder="Escolha um nome de usuário">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="masked_phone">Celular</label>
                    <div class="col-md-5">
                        <input type="text" id="masked_phone" name="masked_phone" class="form-control" placeholder="(99)9999-9999">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="example-clickable-Estado">Estado</label>
                    <div class="col-md-5">
                        
                         <select id="user-UF" name="user-UF" class="select-chosen" data-placeholder="Selecione seu Estado" 
                                 style="width: 250px;" onchange="getval(this);" >
                            <option></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->  
                            
                                <?php foreach($estado as $uf):?>
                                    <option value="<?php echo $uf->idestado?>"><?php echo $uf->nome ?></option>
                                <?php endforeach;?>  
                                    
                                    <option selected="selected"><?php echo $uf_selecionada; ?></option>   
                         </select>
                        
                        <script type="text/javascript">
                            function getval(iduf) {
                              //alert(iduf.value);
                              //var uf_cidades = iduf.value;
                              
                              if (iduf.selectedIndex !=''){
                                  var uf_cidades = iduf.value;
                                  document.location=('./finalizaCadastro/' + uf_cidades); 
                              }    
                            }
                        </script>                     
                    </div>

                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="clickable-Cidade">Cidade</label>
                    <div class="col-md-5">                 
                         <select id="user-cidade" name="user-cidade" class="select-chosen" data-placeholder="Selecione sua Cidade" style="width: 250px;">
                              <option></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->  
 
                                <?php foreach($cidade as $cidade):?>
                                    <option value="<?php echo $cidade->idcidade?>"><?php echo $cidade->nome ?></option>
                                <?php endforeach;?>  

                         </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="example-clickable-Role">Eu Sou</label>
                    <div class="col-md-5">                 
                         <select id="user-role" name="user-role" class="select-chosen" data-placeholder="Forma de Atuação" style="width: 250px;">
                               
                                <option value="0">Tipo de Acesso</option>
                                <option value="3">Agência</option>
                                <option value="4">Candidato</option>
                                <option value="5">Consultor</option>
                                <option value="6">Equipe</option>
                                <option value="7">Partido/Franqueado</option>                              

                         </select>
                        <?php echo $role; ?>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-md-4 control-label" for="USER-CPF">CPF</label>
                    <div class="col-md-5">                 
                        <input type="text" id="masked_ssn" name="masked_ssn" class="form-control" placeholder="999-99-9999">  

                    </div>
                </div>
                
                
            </div>
            <!-- END First Step -->

            <!-- Second Step -->
            <div id="clickable-second" class="step">
                <!-- Step Info -->
                <div class="form-group">
                    <div class="col-xs-12">
                        <ul class="nav nav-pills nav-justified clickable-steps">
                            <li><a href="javascript:void(0)" data-gotostep="clickable-first"><i class="fa fa-check"></i> <strong>1. Conta</strong></a></li>
                            <li class="active"><a href="javascript:void(0)" data-gotostep="clickable-second"><strong>2. Candidato</strong></a></li>
                            <li><a href="javascript:void(0)" data-gotostep="clickable-third"><strong>3. Plataforma</strong></a></li>
                            <li><a href="javascript:void(0)" data-gotostep="clickable-fourth"><strong>4. Equipe</strong></a></li>
                        </ul>
                    </div>
                </div>
                <!-- END Step Info -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="clickable-NomeCandidato">Nome Candidato</label>
                    <div class="col-md-5">
                        <input type="text" id="clickable-NomeCandidato" name="clickable-NomeCandidato" class="form-control" placeholder="Nome Completo Candidato">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="clickable-NomeUrna">Nome Urna</label>
                    <div class="col-md-5">
                        <input type="text" id="clickable-NomeUrna" name="clickable-NomeUrna" class="form-control" placeholder="Nome Político (que aparecerá na urna)">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="cargo-disputa">Cargo de Disputa <span class="text-danger">*</span></label>
                    
                    
                    <div class="col-md-2">
                        <select id="pleito_disputa" name="pleito_disputa" class="form-control">
                            <option value="">Pleito</option>
                            <option value="2016">2016-2020</option>
                            <option value="2018" disabled="true">2018-2022</option>
                            <option value="2020" disabled="true">2020-2024</option> 
                        </select>
                    </div>
                    
                    <div class="col-md-3">
                        <select id="cargo_disputa" name="cargo_disputa" class="form-control">
                            <option value=""> Cargo de Campanha </option>
                            <option value="vereador">Vereador</option>
                            <option value="prefeito">Prefeito</option>
                            <option value="DepEstadual" disabled="true">Dep.Estadual</option>
                            <option value="DepFederal" disabled="true">Dep.Federal</option>
                            <option value="Senador" disabled="true">Senador</option>
                            <option value="Governador" disabled="true">Governador</option>
                           <option value="Presidente" disabled="true">Presidente</option>
                        </select>

                    </div>
                           
                    
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="clickable-localCampanha">Local Candidato</label>
                    
                    <div class="col-md-2">
                        
                      <select id="local_disputa_uf" name="local_disputa_uf" class="form-control">
                          <option selected="selected"><?php echo $uf_selecionada; ?></option>
                      </select>
                        
                    </div>
                    
                    <div class="col-md-3">
                        <select id="local_disputa_cidade" name="local_disputa_cidade" class="select-chosen" data-placeholder="Local de Campanha">
                            <option></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->  
                                <?php foreach($cidade as $cidade):?>
                                    <option value="<?php echo $cidade->idcidade?>"><?php echo $cidade->nome ?></option>
                                <?php endforeach;?>            
                        </select>
                        <!-- recuperar nomes de cidades -->
                    </div>  
                </div>
                
                
                <div class="form-group">
                    <label class="col-md-4 control-label" for="clickable-Partido">Partido e Nº do Candidato</label>
                    
                    <div class="col-md-2">
                        
                      <select id="cadidato_partido" name="cadidato_partido" class="select-chosen" data-placeholder="Partido" onchange="getval(this);">
                            <option></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->                          
                            <?php foreach($partidos as $partido):?>
                                <option value="<?php echo $partido->id_partido?>"><?php echo $partido->SiglaPartido ?></option>
                            <?php endforeach;?>    
                      </select>
                        
                       <script type="text/javascript">
                            function getval(idPD) {
                              alert(idPD.value);
                              //var uf_cidades = iduf.value;
                              
                              //
                              //if (iduf.selectedIndex !=''){
                              //    var uf_cidades = iduf.value;
                              //    document.location=('./finalizaCadastro/' + uf_cidades); 
                              //}    
                            }
                       </script>   
                       
                        
                        
                    </div>
                    
                    <div class="col-md-3">
                            <input type="text" id="clickable-NumCandidato" name="clickable-NumCandidato" class="form-control" placeholder="Nº do Candidato">
                    </div>  
                </div>
                
                
                
            </div>
            <!-- END Second Step -->

            <!-- Third Step -->
            <div id="clickable-third" class="step">
                <!-- Step Info -->
                <div class="form-group">
                    <div class="col-xs-12">
                        <ul class="nav nav-pills nav-justified clickable-steps">
                            <li><a href="javascript:void(0)" data-gotostep="clickable-first"><i class="fa fa-check"></i> <strong>1. Conta</strong></a></li>
                            <li><a href="javascript:void(0)" data-gotostep="clickable-second"><i class="fa fa-check"></i> <strong>2. Candidato</strong></a></li>
                            <li class="active"><a href="javascript:void(0)" data-gotostep="clickable-third"><strong>3. Plataforma</strong></a></li>
                            <li><a href="javascript:void(0)" data-gotostep="clickable-fourth"><strong>4. Equipe</strong></a></li>
                        </ul>
                    </div>
                </div>
                <!-- END Step Info -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="example-advanced-bio">Bio</label>
                    <div class="col-md-8">
                        <textarea id="example-clickable-bio" name="example-clickable-bio" rows="6" class="form-control" placeholder="Tell us your story.."></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="example-clickable-newsletter">Newsletter</label>
                    <div class="col-md-8">
                        <div class="checkbox">
                            <label for="example-clickable-newsletter">
                                <input type="checkbox" id="example-clickable-newsletter" name="example-clickable-newsletter">  Sign up
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label"><a href="#modal-terms" data-toggle="modal">Terms</a></label>
                    <div class="col-md-8">
                        <label class="switch switch-primary" for="example-clickable-terms">
                            <input type="checkbox" id="example-clickable-terms" name="example-clickable-terms" value="1">
                            <span data-toggle="tooltip" title="I agree to the terms!"></span>
                        </label>
                    </div>
                </div>
            </div>
            <!-- END Third Step -->
            
       <!-- Forth Step -->
            <div id="clickable-fourth" class="step">
                <!-- Step Info -->
                <div class="form-group">
                    <div class="col-xs-12">
                        <ul class="nav nav-pills nav-justified clickable-steps">
                            <li><a href="javascript:void(0)" data-gotostep="clickable-first"><i class="fa fa-check"></i> <strong>1. Conta</strong></a></li>
                            <li><a href="javascript:void(0)" data-gotostep="clickable-second"><i class="fa fa-check"></i> <strong>2. Candidato</strong></a></li>
                            <li><a href="javascript:void(0)" data-gotostep="clickable-third"><i class="fa fa-check"></i><strong>3. Plataforma</strong></a></li>
                            <li class="active"><a href="javascript:void(0)" data-gotostep="clickable-fourth"><strong>4. Equipe</strong></a></li>
                        </ul>
                    </div>
                </div>
                <!-- END Step Info -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="example-advanced-bio">Bio</label>
                    <div class="col-md-8">
                        <textarea id="example-clickable-bio" name="example-clickable-bio" rows="6" class="form-control" placeholder="Tell us your story.."></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="example-clickable-newsletter">Newsletter</label>
                    <div class="col-md-8">
                        <div class="checkbox">
                            <label for="example-clickable-newsletter">
                                <input type="checkbox" id="example-clickable-newsletter" name="example-clickable-newsletter">  Sign up
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label"><a href="#modal-terms" data-toggle="modal">Terms</a></label>
                    <div class="col-md-8">
                        <label class="switch switch-primary" for="example-clickable-terms">
                            <input type="checkbox" id="example-clickable-terms" name="example-clickable-terms" value="1">
                            <span data-toggle="tooltip" title="I agree to the terms!"></span>
                        </label>
                    </div>
                </div>
            </div>
            <!-- END Forth Step -->
            

            <!-- Form Buttons -->
            <div class="form-group form-actions">
                <div class="col-md-8 col-md-offset-4">
                    <button type="reset" class="btn btn-sm btn-warning" id="back4">Voltar</button>
                    <button type="submit" class="btn btn-sm btn-primary" id="next4">Avançar</button>
                </div>
            </div>
            <!-- END Form Buttons -->
        </form>
        <!-- END Clickable Wizard Content -->
    </div>
    <!-- END Clickable Wizard Block -->
    </div>
    
    
        <!-- Terms Modal -->
    <div id="modal-terms" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="modal-title"><i class="gi gi-pen"></i> Service Terms</h3>
                </div>
                <div class="modal-body">
                    <h4 class="sub-header">1.1 | General</h4>
                    <p>Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non. Suspendisse potenti. Pellentesque non accumsan orci. Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <h4 class="sub-header">1.2 | Account</h4>
                    <p>Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non. Suspendisse potenti. Pellentesque non accumsan orci. Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <h4 class="sub-header">1.3 | Service</h4>
                    <p>Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non. Suspendisse potenti. Pellentesque non accumsan orci. Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <h4 class="sub-header">1.4 | Payments</h4>
                    <p>Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non. Suspendisse potenti. Pellentesque non accumsan orci. Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Ok, I've read them!</button>
                </div>
            </div>
        </div>
    </div>
    <!-- END Terms Modal -->

<!-- END Page Content -->



<?php include 'inc/page_footer.php'; ?>
<?php include 'inc/template_scripts.php'; ?>

<!-- Load and execute javascript code used only in this page -->
<script src="<?php echo base_url(); ?>js/pages/formsWizard.js"></script>
<script>$(function(){ FormsWizard.init(); });</script>

<?php include 'inc/template_end.php'; ?>