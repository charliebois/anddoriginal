<?php include 'theme-variables.php'; ?>



<?php wp_footer(); ?>

<script src="<?php echo $javascript_url; ?>jquery.slicknav.js"></script>
<script src="<?php echo $javascript_url; ?>jquery.cycle2.min.js"></script>
<script src="<?php echo $javascript_url; ?>jquery.cycle2.swipe.min.js"></script>

<script type="text/javascript">

jQuery( document ).ready(function($) {

$('#menu').slicknav();
   
$( ".slider-111" ).each(function( index ) {
var url = $(this).get(0).src;
$(this).before( "<div style='width:100%; height:100%; background-size:contain; background-position:center center; background-image:url("+ url +");'></div>" );
$(this).remove();
});
    
    $( ".slider-198" ).each(function( index ) {
var url = $(this).get(0).src;
$(this).before( "<div style='width:100%; height:100%; background-size:contain; background-position:center center; background-image:url("+ url +");'></div>" );
$(this).remove();
});



});







</script>

</body>

</html>

