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
        <form id="clickable-wizard" action="<?php echo site_url('index.php/dashboard/atualiza_usuario'); ?>" method="post" class="form-horizontal form-bordered">
            <!-- First Step  -->
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
                    <label class="col-md-4 control-label" for="nome_usuario">Nome/Sobrenome</label>
                    <div class="col-md-3">
                            <div class="input-group">
                                <input type="text" id="primeiroNome_usuario" name="primeiroNome_usuario" value="<?php echo $usuario->first_name; ?>" class="form-control">
                            </div>
                    </div>
                    <div class="col-md-3">
                            <div class="input-group">
                                <input type="text" id="sobrenome_usuario" name="sobrenome_usuario" value="<?php echo $usuario->last_name; ?>" class="form-control">
                            </div>
                    </div> 

 
                    
                </div>
                
                
                <div class="form-group">
                    <label class="col-md-4 control-label" for="nome_usuario">Nome de Usuário</label>
                    <div class="col-md-3">
                            <div class="input-group">
                                
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" id="nome_usuario" name="nome_usuario" value="<?php echo $usuario->username; ?>" class="form-control">
                            </div>
                    </div>
                    
                    <div class="col-md-3">
                            <label class="radio-inline" for="sexo-inline-radio1">
                                <input type="radio" id="sexo-inline-radio1" name="sexo_user"
                                       value="M" 
                                       <?php if($usuario->sexo=="M") { echo "checked='TRUE'"; }?>> <i class="fa fa-child"> Masc.</i>
                            </label>
                        
                            <label class="radio-inline" for="sexo-inline-radio2">
                                <input type="radio" id="sexo-inline-radio2" name="sexo_user" value="F"
                                       <?php if($usuario->sexo=="F") { echo "checked='TRUE'"; }?>> <i class="fa fa-female"> Fem.</i>
                            </label>                          
                    </div>
 
                    
                </div>
                
                <div class="form-group">
                    <label class="col-md-4 control-label" for="masked_cpf">CPF</label> <!-- O controle está no formValidation.js -->
                    <div class="col-md-3">
                             <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
                                <input type="text" id="masked_cpf" name="masked_cpf_user" value="<?php echo $usuario->CPF; ?>" class="form-control" maxlength="14"  />
                            </div>    
                    </div>
                    
                    <?php 
                       if (isset($usuario->Data_Nascimento)){
                            $date = new DateTime($usuario->Data_Nascimento);
                            $dataNascimentoUser = $date->format('d/m/Y');
                       } else {
                           $dataNascimentoUser = "";
                       }
                    ?>
                    <div class="col-md-3">
                        <input type="text" id="masked_date" name="masked_nasc_user" class="form-control" placeholder="Data Nascimento" value="<?php echo $dataNascimentoUser;?>">
                    </div>
                    
                    
                    
                </div>
               
                
                <div class="form-group">
                    <label class="col-md-4 control-label" for="masked_cel">Celular/Fixo</label>
                    <div class="col-md-3">
                        <div class="input-group">
                             <span class="input-group-addon"><i class="fa fa-mobile"></i></span>
                            <input type="text" id="masked_cel" name="masked_cel_user" class="form-control" 
                                   data-toggle="popover" data-placement="top" title="Nº de Celular "
                                   data-content="Se seu celular não tem um digito '9' adicional, coloque '0' na frente "
                                   value="<?php echo $usuario->NumCelular; ?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                            <input type="text" id="masked_phone" name="masked_phone_user" class="form-control" 
                                   value="<?php echo $usuario->NumFixo; ?>">
                        </div>
                    </div> 
                    
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="user-UF">UF/Cidade</label>
                    
                    <div class="col-md-3">
                        
                         <select id="user-UF" name="user-UF" class="select-chosen" data-placeholder="Selecione seu Estado" 
                                 style="width: 250px;" onchange="getval(this);" >
                            <option></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->  
                            
                                <?php foreach($estado as $uf):?>
                                    <option value="<?php echo $uf->idestado?>"><?php echo $uf->nome ?></option>
                                <?php endforeach;?>  
                                 
                                
                            <option selected='selected'><?php echo $uf_selecionada; ?></option>
          
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
                    
                    <div class="col-md-3">                 
                         <select id="user-cidade" name="user-cidade" class="select-chosen" data-placeholder="Selecione sua Cidade" style="width: 250px;">
                              <option></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->  
 
                                <?php foreach($cidade as $cidade):?>
                                    <option value="<?php echo $cidade->nome ?>"><?php echo $cidade->nome ?></option>
                                <?php endforeach;?>  
                                    
                                <?php 
                                        if (isset($usuario->Cidade)){
                                            echo "<option selected='selected'> $usuario->Cidade </option>";
                                        }                  
                                ?>
                                    
                            
                         </select>
                    </div>

                </div> 
                <div class="form-group">
                    <label class="col-md-4 control-label" for="masked_CEP">Endereço</label>
                    <div class="col-md-2">
                        <input type="text" id="masked_CEP" name="masked_CEP_user" placeholder="CEP" value="<?php echo $usuario->CEP; ?>"class="form-control" >
                    </div> 
                    <div class="col-md-4">
                        <input type="text" id="user_end" name="user_end" placeholder="Endereço" value="<?php echo $usuario->End; ?>" class="form-control" >
                    </div>   
                </div>
                
                <div class="form-group">
                    <label class="col-md-4 control-label" for="user_role">Eu Sou</label>
                    <div class="col-md-6">                 
                         <select id="user_role" name="user_role" class="form-control" >
                                <option value="">Tipo de Acesso</option>
                                <option value="Agência">Agência</option>
                                <option value="Candidato">Candidato</option>
                                <option value="Consultor">Consultor</option>
                                <option value="Equipe">Equipe</option>
                                <option value="Gestor">Gestor Público</option>
                                <option value="Partido">Partido/Franqueado</option>
         
                                <option selected='selected'><?php echo $usuario->role; ?></option>
                         </select>
                        
                                
                    </div>
                </div>
                
                <div class="form-group">
                         
 
                    <div class="col-md-4">
                      <img src="<?php echo base_url().$Usuario[foto]; ?>" align='right' style="width:50px;height:50px" alt="Avatar">  
                    </div>
                    
                    <div class="col-md-6">
                        <i class="fa fa-fw fa-upload"></i> <a href="#modal-foto_user" data-toggle="modal">Enviar Foto</a><br>
                        <i class="fa fa-fw fa-picture-o"></i> <a href="javascript:void(0)">Escolher da biblioteca</a>
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
                
               <!-- <legend><i class="fa fa-angle-right"></i> Dados do Candidato</legend> -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="nome_candidato">Nome Candidato <span class="text-danger">*</span></label>
                    <div class="col-md-4">
                        <input type="text" id="clickable-NomeCandidato" name="nome_candidato" 
                               value="<?php if(isset($CandidatoDB->NomeCandidato)) {echo $CandidatoDB->NomeCandidato;} ?>" class="form-control"
                               placeholder="Nome Completo do Candidato">
                    </div>
                    
                 
                        
                    <!-- <label class="col-md-2 control-label"><a href="#modal-foto_candidato" data-toggle="modal">Foto do Candidato</a></label> -->
                    <div class="col-md-2 gallery-image">
                        
                        <img src="<?php echo base_url().$fotoEnviadaCandidato; ?>" style="width:50px;height:50px" alt="Avatar">
                        <div class="gallery-image-options text-center">
                            <div class="btn-group btn-group-sm">
                                <a href="<?php echo base_url().$fotoEnviadaCandidato; ?>" class="gallery-link btn btn-sm btn-alt btn-default" title="Image Info">Visualizar</a>
                                <a href="#modal-foto_candidato" class="btn btn-sm btn-alt btn-default" data-toggle="modal" title="Alterar foto"><i class="fa fa-pencil"></i></a>
                               
                            </div>
                        </div>
                        
                        
                    </div>

                    
                    
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="NomeUrna_candidato">Nome Urna <span class="text-danger">*</span></label>
                    <div class="col-md-3">
                        <input type="text" id="clickable-NomeUrna" name="NomeUrna_candidato" class="form-control" value="<?php echo $CandidatoDB->ApelidoPolitico; ?>" placeholder="Nome Político (que aparecerá na urna)">
                    </div>
                    <div class="col-md-3">
                            <label class="radio-inline" for="example-inline-radio1">
                                <input type="radio" id="sexoCandidato-inline-radio1" name="sexo_candidato" 
                                       value="M" <?php if($CandidatoDB->Sexo=="M") { echo "checked='TRUE'"; }?>> <i class="fa fa-child"> Masc.</i>
                            </label>
                        
                            <label class="radio-inline" for="example-inline-radio2">
                                <input type="radio" id="sexoCandidato-inline-radio2" name="sexo_candidato" 
                                       value="F" <?php if($CandidatoDB->Sexo=="F") { echo "checked='TRUE'"; }?>> <i class="fa fa-female"> Fem.</i>
                            </label>                          
                    </div>        
                </div>
                
                <div class="form-group">
                    <label class="col-md-4 control-label" for="masked_cpf_candidato">CPF</label> <!-- O controle está no formValidation.js -->
                    <div class="col-md-3">
                             <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
                                <input type="text" id="masked_cpf_candidato"
                                       name="masked_cpf_candidato" value="<?php echo $CandidatoDB->CPF_Candidato; ?>" class="form-control" maxlength="14"  />
                            </div>    
                    </div>
                    <div class="col-md-3">
                        <?php 
                            if (isset($CandidatoDB->data_nascimento))
                            {      
                                $date2 = new DateTime($CandidatoDB->data_nascimento);
                                $dataNascimentoCandidato = $date2->format('d/m/Y');
                            }
                        ?>
                        <input type="text" id="masked_nasc_cand" name="masked_nasc_cand"
                               value="<?php if(isset($dataNascimentoCandidato)){ echo $dataNascimentoCandidato; } ?>" 
                               class="form-control" placeholder="Data de Nasc.">
                    </div>
                    
                </div>
                
                <div class="form-group"> 
                    <label class="col-md-4 control-label" for="email_candidato">End. Eletrônicos<span class="text-danger">*</span></label>   
                    <div class="col-md-3">
                       <div class="input-group">
                           <span class="input-group-addon"><i class="gi gi-envelope"></i></span>
                           <input type="text" id="val_email" name="email_candidato"
                                  value="<?php echo $CandidatoDB->Email_candidato; ?>" class="form-control" placeholder="candidato@pagina.com.br">
                       </div>
                    </div>
                    
                    <div class="col-md-3">
                        <div class="input-group">
                           <span class="input-group-addon"><i class="gi gi-globe"></i></span>
                           <input type="text" id="val_website" 
                                  name="website_canditato" class="form-control" value="<?php echo $CandidatoDB->site; ?>">    
                       </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-md-4 control-label" for="masked_cel">Celular/Fixo</label>
                    <div class="col-md-3">
                        <div class="input-group">
                             <span class="input-group-addon"><i class="fa fa-mobile"></i></span>
                            <input type="text" id="masked_cel_candidato" 
                                   name="masked_cel_candidato" value="<?php echo $CandidatoDB->Celular; ?>" class="form-control" >
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                            <input type="text" id="masked_phone_candidato" 
                                   name="masked_phone_candidato" value="<?php echo $CandidatoDB->Telefone; ?>" class="form-control" >
                        </div>
                    </div> 
                    
                </div>
                
                <div class="form-group">
                    <label class="col-md-4 control-label" for="cargo-disputa">Cargo de Disputa <span class="text-danger">*</span></label>
                    
                    
                    <div class="col-md-3">
                        <select id="pleito_disputa" name="pleito_disputa" class="form-control">
                            <option value="">Pleito</option>
                            <option value="2016">2016-2020</option>
                            <option value="2018" disabled="true">2018-2022</option>
                            <option value="2020" disabled="true">2020-2024</option>
                            
                            <option selected='selected'><?php echo $CandidatoDB->Pleito; ?></option>
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
                           
                            <option selected='selected'><?php echo $CandidatoDB->CargoDisputa; ?></option>
                        </select>

                    </div>
            
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="clickable-localCampanha" title="Local de Campanha">Local Candidato <span class="text-danger">*</span></label>
                    
                    <div class="col-md-3">
                        
                      <select id="local_disputa_uf" name="local_disputa_uf" class="form-control">
                          
                           <?php foreach($estado as $uf):?>
                               <option value="<?php echo $uf->idestado?>"><?php echo $uf->nome ?></option>
                           <?php endforeach;?>  

                                
                            <option selected='selected'><?php echo $uf_selecionada; ?></option>                         
                      </select>
                        
                    </div>
                    
                    <div class="col-md-3">
                        <select id="local_disputa_cidade" name="local_disputa_cidade" class="select-chosen" data-placeholder="Local de Campanha">
                            <option></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->  
                                <?php foreach($cidadeCandidato as $cidadeCandidato):?>
                                    <option value="<?php echo $cidadeCandidato->nome?>"><?php echo $cidadeCandidato->nome ?></option>
                                <?php endforeach;?>            
                        </select>
                        <!-- recuperar nomes de cidades -->
                    </div>  
                </div>
                
                
                <div class="form-group">
                    <label class="col-md-4 control-label" for="partido_candidato">Partido e Nº do Candidato</label>
                    
                    <div class="col-md-3">
                        
                      <select id="partido_candidato" name="partido_candidato" class="select-chosen" data-placeholder="Partido" >
                            <option></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->                          
                            <?php foreach($partidos as $partido):?>
                                <option value="<?php echo $partido->id_Partido?>"><?php echo $partido->SiglaPartido ?></option>
                            <?php endforeach;?>    
                             
                                
                            <?php foreach($partidos as $partido):
                                if ($partido->id_Partido===$CandidatoDB->id_Partido){
                                    $PartidoArmazenado=$partido->SiglaPartido;
                                }
                                
                            endforeach; 
                            ?>    
                                
                             <option selected="<?php echo $CandidatoDB->id_Partido ?>"><?php echo $PartidoArmazenado; ?></option>
                            
                      </select>
                      
                       
                      <!-- colocar o numero inicial do candidato automaticamente -->
                        
                        <!--
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
                        -->                       
                    </div>
                    
                    <div class="col-md-3">
                            <input type="text" id="clickable-NumCandidato" 
                                   name="NumCandidato" value="<?php echo $CandidatoDB->Numero_Candidato ?>" class="form-control" placeholder="Nº do Candidato">
                    </div>  
                </div>
                
                <div class="form-group">
                    <label class="col-md-4 control-label" for="Col_Candidato">Coligações</label>
                                   <!-- Jquery Tags Input (class is initialized in js/app.js -> uiInit()), for extra usage examples you can check out https://github.com/xoxco/jQuery-Tags-Input -->
                    <fieldset>
                            <?php 
                                if (isset($CandidatoDB->Coligacao)){
                                    $coligacoes=$CandidatoDB->Coligacao;
                                } else {
                                    $coligacoes="PSDB, PT, DEM";
                                }              
                            ?>
                        
                            <div class="col-md-6">
                                <input type="text" id="coligacoes-tags" 
                                       name="coligacoes-tags" class="input-tags" value="<?php echo $coligacoes; ?>">
                            </div>

                    </fieldset>     

                </div>
                
                <div class="form-group">  
                   <label class="col-md-4 control-label" for="example-inline-checkbox1">Histórico</label> 
                   <div class="col-md-6">
                                <label class="checkbox-inline" for="example-inline-checkbox1">
                                    <input type="checkbox" id="example-inline-checkbox1" 
                                           name="cb_exerceCargo" value="1" <?php if($CandidatoDB->ExerceCargo==='1'){echo "checked=true";} ?> > Exerce Cargo Eletivo
                               </label>
                               <label class="checkbox-inline" for="example-inline-checkbox2">
                                   <input type="checkbox" id="example-inline-checkbox2" 
                                          name="cb_reeleicao" value="1" <?php if($CandidatoDB->Reeleicao==='1'){echo "checked=true";} ?> > Disputando Reeleição
                               </label>
                               <label class="checkbox-inline" for="example-inline-checkbox3">
                                   <input type="checkbox" id="example-inline-checkbox3"
                                          name="cb_jaconcorreu" value="1" <?php if($CandidatoDB->JaConcorreu==='1'){echo "checked=true";} ?>> Já Concorreu 
                               </label>
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
                    <label class="col-md-4 control-label" for="example-advanced-bio">Resumo Candidato</label>
                    <div class="col-md-6">
                        <textarea id="example-clickable-bio" name="example-clickable-bio" 
                                  rows="6" class="form-control" 
                                  placeholder="Faça um Pequeno resumo do candidato.."> <?php echo $CandidatoDB->Resumo; ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="example-clickable-newsletter">Palavras Chave</label>
                        
                        <fieldset>
                                <div class="col-md-6">
                                    <label for="palavras_chave-tag">Palavras Chave da Campanha
                                        <input type="text" id="palavras_chave-tags" name="palavras_chave-tags"
                                               title="Adicione as 10 palavras que identificam melhor as propostas" 
                                               class="input-tags" value="<?php echo $PalavrasChave; ?>">
                                        <span class="help-block">Que mais identifiquem as propostas do candidato</span>
                                    </label>
                                </div>
                        </fieldset>                    

                </div>
                
                <div class="form-group">
                        <fieldset>
                            <legend><i class="fa fa-angle-right"></i> Adicionar Redes Sociais</legend>
                            <br>
                            <label class="col-md-1 control-label"> </label>
                            <div class="col-md-5">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="si si-facebook"></i></span>
                                  <input type="text" id="val_facebook" name="val_facebook" class="form-control" value="<?php echo $CandidatoDB->facebook; ?>">    
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="si si-twitter"></i></span>
                                  <input type="text" id="val_twitter" name="val_twitter" class="form-control" value="<?php echo $CandidatoDB->twitter; ?>">    
                                </div>
                            </div>
                        </fieldset>
                    
                        <fieldset> 
                            <label class="col-md-1 control-label"> </label>
                            <div class="col-md-5">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="si si-google_plus"></i></span>
                                  <input type="text" id="val_google" name="val_google" class="form-control" value="<?php echo $CandidatoDB->google ; ?>">    
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="si si-instagram"></i></span>
                                  <input type="text" id="val_instagram" name="val_instagram" class="form-control" value="<?php echo $CandidatoDB->instagram; ?>">    
                                </div>
                            </div>
                        </fieldset>
   
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
                    <fieldset>
                        <legend><i class="fa fa-angle-right"></i> Adicionar Membros Equipe</legend>
                        <br>
                        <label class="col-md-2 control-label" for="nome_membro_eq">Dados</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" id="nome_usuario" name="nome_membro_eq" class="form-control" placeholder="Nome Membro">
                            </div>                            
                        </div>   
                        
                         
                        <div class="col-md-4">
                           <div class="input-group">
                               <span class="input-group-addon"><i class="gi gi-envelope"></i></span>
                               <input type="text" id="val_email" name="email_membro_eq" class="form-control" placeholder="Email Membro">
                           </div>                       
                    </fieldset>                   
                </div>
                        
                <div class="form-group">
                    <fieldset>
                    <label class="col-md-2 control-label" for="masked_cel">Celular<span class="text-danger"> *</span></label>
                    <div class="col-md-4">
                        <div class="input-group">
                             <span class="input-group-addon"><i class="fa fa-mobile"></i></span>
                            <input type="text" id="masked_cel" name="masked_cel_membro" class="form-control" 
                                   data-toggle="popover" data-placement="top" title="ex. +55(NN)CELULAR">
                        </div>
                    </div>
 
                    <div class="col-md-4">                 
                         <select id="user-role" name="user-role" class="select-chosen" data-placeholder="Tipo de Acesso">                      
                                <option value="0">Admin. Campanha</option>
                                <option value="1">Agência</option>
                                <option value="2">Equipe</option>
                                <option value="4">Func. Interno</option>
                                <option value="5">Consultor Ext.</option>
                                <option value="6">Comitê</option>                              
                                <option value="7">Mobilizador</option>  
                                <option value="7">Outro</option> 
                         </select>
                        <span class="help-block">Função do Membro na Campanha</span>
                        
                    </div>                   
                    </fieldset>                   
                </div>                        
                
                <div class="form-group">   
                    
                       <label class="col-md-2 control-label" for="regras_campanha">Nível de Acesso</label> 
                         <div class="col-md-8">
                       
                               <label class="checkbox-inline" for="example-inline-checkbox1">
                                   <input type="checkbox" id="example-inline-checkbox1" name="example-inline-checkbox1" value="option1"> Ver Informações
                               </label>
                               <label class="checkbox-inline" for="example-inline-checkbox2">
                                   <input type="checkbox" id="example-inline-checkbox2" name="example-inline-checkbox2" value="option2"> Atualizar Dados
                               </label>
                               <label class="checkbox-inline" for="example-inline-checkbox3">
                                   <input type="checkbox" id="example-inline-checkbox3" name="example-inline-checkbox3" value="option3"> Excluir Dados
                               </label>
                         </div>     
 
                </div>
                        
                <div class="form-group">      
                       <label class="col-md-2 control-label" for="regras_campanha">Gestão Campanha</label> 
                         <div class="col-md-8">
                               <label class="checkbox-inline" for="example-inline-checkbox3">
                                   <input type="checkbox" id="example-inline-checkbox3" name="example-inline-checkbox3" value="option4"> Criar Campanhas
                               </label>
                               <label class="checkbox-inline" for="example-inline-checkbox3">
                                   <input type="checkbox" id="example-inline-checkbox3" name="example-inline-checkbox3" value="option5"> Gestão Financeira
                               </label>
                               <label class="checkbox-inline" for="example-inline-checkbox3">
                                   <input type="checkbox" id="example-inline-checkbox3" name="example-inline-checkbox3" value="option6"> Enviar Mensagens
                               </label>
                         </div>     
                </div>                        
                        
                

                <div class="form-group">
                    <label class="col-md-8 control-label"><a href="#modal-terms" data-toggle="modal">Termos de Uso</a></label>
                    <div class="col-md-2">
                        <label class="switch switch-primary" for="example-clickable-terms">
                            <input type="checkbox" id="example-clickable-terms" name="example-clickable-terms" value="1">
                            <span data-toggle="tooltip" title="Estou de Acordo com os Termos de Uso!"></span>
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
    
    <!-- Enviar Foto Modal -->
    <div id="modal-foto_user" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="modal-title"><i class="gi gi-user_add"></i> Enviar Foto do Usuário</h3>
                </div>
                <div class="modal-body">
                    <?php echo $error;?> <!-- Error Message will show up here -->
                    <?php echo form_open_multipart('dashboard/do_upload');?>
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
    
        <!-- Enviar Foto Candidato Modal -->
    <div id="modal-foto_candidato" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="modal-title"><i class="gi gi-user_add"></i> Enviar Foto do Candidato</h3>
                </div>
                <div class="modal-body">
                    <?php echo $error;?> <!-- Error Message will show up here -->
                    <?php echo form_open_multipart('dashboard/enviaFoto');?>
                    <?php echo "<input type='hidden' name='quem' value='Candidato' />"; ?>
                    <?php echo "<input type='file' name='userfile' size='20' />"; ?>
                    <?php echo "<input type='submit' name='submit' value='upload' /> ";?>
                    <?php echo "</form>"?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Fim Enviar Foto Modal -->
    

<!-- END Page Content -->



<?php include 'inc/page_footer.php'; ?>
<?php include 'inc/template_scripts.php'; ?>

<!-- Load and execute javascript code used only in this page -->
<script src="<?php echo base_url(); ?>js/pages/formsWizard.js"></script>
<script>$(function(){ FormsWizard.init(); });</script>-->

<script src="<?php echo base_url(); ?>js/pages/formsValidation.js"></script>
<script>$(function() { FormsValidation.init(); });</script>

<script src="<?php echo base_url(); ?>js/pages/formsGeneral.js"></script>
<script>$(function(){ FormsGeneral.init(); });</script>

<?php include 'inc/template_end.php'; ?>