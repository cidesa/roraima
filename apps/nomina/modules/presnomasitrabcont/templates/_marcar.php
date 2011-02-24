<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>

<br>
<?php echo radiobutton_tag('marca', '1', false, array('onClick'=> 'marcarTodo();'))."Marcar Todo ".'&nbsp;&nbsp;';
      echo radiobutton_tag('marca', '4', false, array('onClick'=> 'desmarcarTodo();'))."Desmarcar Todo".'&nbsp;&nbsp;';	?>