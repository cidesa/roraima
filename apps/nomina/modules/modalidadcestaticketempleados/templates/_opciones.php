<?php echo javascript_include_tag('nomina/modalidadcestaticketempleados') ?>

<?php
echo '<br>';
echo '<br>';
echo radiobutton_tag('marca', '1', false, array('onClick'=> 'MarcarTodos("K");'))."  Marcar Todo Opción TICKET".'&nbsp;&nbsp;';
echo '<br>';
echo radiobutton_tag('marca', '2', false, array('onClick'=> 'MarcarTodos("T");'))."  Marcar Todo Opción TARJETA".'&nbsp;&nbsp;';
echo '<br>';
echo radiobutton_tag('marca', '4', false, array('onClick'=> 'desmarcarTodo();'))."  Desmarcar Todo".'&nbsp;&nbsp;';
echo '<br>';
?>
