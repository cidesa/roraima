<?php echo use_javascript(sfConfig::get('sf_prototype_web_dir').'/js/prototype') ?>
<h1>Proyecto "<?php echo $project_name ?>" - Panel de Control del SIGA </h1>
<div id="navigation">
  <ul>
    <li><?php echo link_to_unless($action == 'taskManager', 'Tareas', 'sfControlPanel/taskManager') ?></li>
    <li><?php echo link_to_unless($action == 'configShow', 'Configuración', 'sfControlPanel/configShow') ?></li>
    <li><?php echo link_to_unless($action == 'dataManager' || substr($module, 0, 4) == 'auto', 'Modelo de Datos', 'sfControlPanel/dataManager') ?></li>
  </ul>
</div>