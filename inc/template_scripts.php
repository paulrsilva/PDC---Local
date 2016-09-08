<?php
/**
 * template_scripts.php
 *
 * Author: pixelcave
 *
 * All vital JS scripts are included here
 *
 */
 $this->load->helper('url');
?>

<!-- Include Jquery library from Google's CDN but if something goes wrong get Jquery from local file (Remove 'http:' if you have SSL) -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>!window.jQuery && document.write(decodeURI('%3Cscript src="js/vendor/jquery-1.11.1.min.js"%3E%3C/script%3E'));</script>

<!-- Bootstrap.js, Jquery plugins and Custom JS code -->
<script src="<?php echo base_url(); ?>js/vendor/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>js/plugins.js"></script>
<script src="<?php echo base_url(); ?>js/app.js"></script>

<!-- Validador de CPF by Paul 
<script>  function formatar(mascara, documento){   var i = documento.value.length;   var saida = mascara.substring(0,1);
    var texto = mascara.substring(i)     if (texto.substring(0,1) != saida){    documento.value += texto.substring(0,1);   }    }
</script>
-->




