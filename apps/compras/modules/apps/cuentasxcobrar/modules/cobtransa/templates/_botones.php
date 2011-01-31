<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
<ul class="sf_admin_actions" >
<li class="float-center">
<input id="actualizar" class="sf_admin_action_save" type="button" value="Actualizar" onClick="actualiza();">
</li>
<li class="float-center">
<input id="salir" class="sf_admin_action_cancel" type="button" value="Cancelar" onClick="$('sf_fieldset_none').hide();">
</li>
</ul>