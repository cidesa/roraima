<div id="detalle"></div>
<?php echo javascript_tag(
  remote_function(array(
    'update'  => 'detalle',
    'url'     => 'docpendet/list?dfatendoc='.$dfatendoc->getId(),
  ))
) ?>
<br></br>
<br></br>
<br></br>
<div id="observaciones"></div>
<?php echo javascript_tag(
  remote_function(array(
    'update'  => 'observaciones',
    'url'     => 'docobs/list?dfatendoc='.$dfatendoc->getId(),
  ))
) ?>
