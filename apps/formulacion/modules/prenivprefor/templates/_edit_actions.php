<?php
// auto-generated by PropelCidesa
// date: 2010/02/02 16:13:55
?>
<?php

/**
 *
 * @package    Roraima
 * @subpackage vistas

 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: _edit_actions.php 32815 2009-09-08 16:52:04Z lhernandez $
 * @copyright  Copyright 2007, Cide S.A.
 *
 */
 ?>
<ul class="sf_admin_actions">
      <li><?php echo submit_tag_click(__('save'), array (
  'name' => 'save',
  'class' => 'sf_admin_action_save',
)) ?></li>
</ul>

<script type="text/javascript">
    var defcod='<? echo $fordefniv->getDefcod();?>';
    var nuevo='<? echo $fordefniv->getId();?>';
    var etadef='<? echo $fordefniv->getEtadef();?>';
    if (nuevo!="" && defcod=='S')
    {
      $('save').hide();
    }

</script>