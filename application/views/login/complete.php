<div class="col-lg-4 col-lg-offset-4">
    <h2>Quase lá</h2>
    <h5>Olá <span><?php echo $firstName; ?></span>. Vc está validando o email <span><?php echo $email;?></span></h5>
    <small>Confirme sua senha para completar seu cadastro no PDC</small>
 
<?php 
    $fattr = array('class' => 'form-signin');
    echo form_open(site_url().'dashboard/complete/token/'.$token, $fattr); ?>
    <div class="form-group">
      <?php echo form_password(array('name'=>'password', 'id'=> 'password', 'placeholder'=>'Password', 'class'=>'form-control', 'value' => set_value('password'))); ?>
      <?php echo form_error('password') ?>
    </div>
    <div class="form-group">
      <?php echo form_password(array('name'=>'passconf', 'id'=> 'passconf', 'placeholder'=>'Confirm Password', 'class'=>'form-control', 'value'=> set_value('passconf'))); ?>
      <?php echo form_error('passconf') ?>
    </div>
    <?php echo form_hidden('user_id', $user_id);?>
    <?php echo form_submit(array('value'=>'Complete', 'class'=>'btn btn-lg btn-primary btn-block')); ?>
    <?php echo form_close(); ?>
   
</div>