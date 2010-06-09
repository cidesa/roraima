<?php echo select_tag('npasiconpar[codestemp]', options_for_select(NpestempPeer::getEstatus(),$npasiconpar->getCodestemp(),'include_custom=Seleccione una'),array()) ?>

<script type="text/javascript">
$('divgracar').hide()
$('divcodtip').hide()
$('divcodtipcat').hide()
</script>