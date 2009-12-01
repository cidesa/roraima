<?php 
/**
 * Funciones para chequear el modelo de datos
 *
 * @package    Roraima
 * @subpackage checkdatabase
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
?>

<?php

$check = false;
$checktablas = array();
$tablasschemas = array();
$trim = false;
$seq = false;

pake_desc('check database for current model');
pake_task('propel-check-database', 'project_exists');

pake_desc('trim all string columns on database for current model');
pake_task('propel-trim-database', 'project_exists');

pake_desc('create sequenses for all tables on database for current model');
pake_task('propel-seq-database', 'project_exists');

pake_desc('execute sql por customs database functions and triggers');
pake_task('propel-update-script', 'project_exists');

function convert_yml_schema($check_schema = true, $prefix = '')
{
  $finder = pakeFinder::type('file')->ignore_version_control()->name($prefix.'*schema.yml');
  $dirs = array('config');
  if ($pluginDirs = glob(sfConfig::get('sf_root_dir').'/plugins/*/config'))
  {
    $dirs = array_merge($dirs, $pluginDirs);
  }
  $schemas = $finder->in($dirs);
  if ($check_schema && !count($schemas))
  {
    throw new Exception('You must create a schema.yml file.');
  }

  $db_schema = new sfPropelDatabaseSchema();
  $ymls = array();
  foreach ($schemas as $schema)
  {
    $db_schema->loadYAML($schema);

    pake_echo_action('schema', 'cargando "'.$schema.'"'.' ');

    $tablas = $db_schema->getTables();
    foreach($tablas as $k => $t){
      $ymls[$k] = $t;  
    }
    
  }
  return $ymls;
}

function _propel_cidesa_convert_yml_schema($check_schema = true, $prefix = '')
{
  $finder = pakeFinder::type('file')->ignore_version_control()->name($prefix.'*schema.yml')->prune('doctrine');
  $dirs = array('config/schemas');
  if ($pluginDirs = glob(sfConfig::get('sf_root_dir').'/plugins/*/config'))
  {
    $dirs = array_merge($dirs, $pluginDirs);
  }
  $schemas = $finder->in($dirs);
  if ($check_schema && !count($schemas))
  {
    throw new Exception('You must create a schema.yml file.');
  }

  $db_schema = new sfPropelDatabaseSchema();
  foreach ($schemas as $schema)
  {
    $db_schema->loadYAML($schema);

    pake_echo_action('schema', 'converting "'.$schema.'"'.' to XML');

    $localprefix = $prefix;

    // change prefix for plugins
    if (preg_match('#plugins[/\\\\]([^/\\\\]+)[/\\\\]#', $schema, $match))
    {
      $localprefix = $prefix.$match[1].'-';
    }

    // save converted xml files in original directories
    $xml_file_name = str_replace('.yml', '.xml', basename($schema));

    $file = str_replace(basename($schema), $localprefix.$xml_file_name,  $schema);
    pake_echo_action('schema', 'putting '.$file);
    file_put_contents($file, $db_schema->asXML());
  }
}

function _propel_cidesa_convert_xml_schema($check_schema = true, $prefix = '')
{
  $finder = pakeFinder::type('file')->ignore_version_control()->name('*schema.xml');

  $schemas = $finder->in(glob(sfConfig::get('sf_root_dir').'/plugins/*/config'));
  $s = $finder->in(glob(sfConfig::get('sf_root_dir').'/config'));
  
  $schemas = array_merge($s, $finder->in(glob(sfConfig::get('sf_root_dir').'/plugins/*/config')));
  
  if ($check_schema && !count($schemas))
  {
    throw new Exception('You must create a schema.xml file.');
  }

  $db_schema = new sfPropelDatabaseSchema();
  foreach ($schemas as $schema)
  {
    $db_schema->loadXML($schema);

    $localprefix = $prefix;

    // change prefix for plugins
    if (preg_match('#plugins[/\\\\]([^/\\\\]+)[/\\\\]#', $schema, $match))
    {
      $localprefix = $prefix.$match[1].'-';
    }

    // save converted xml files in original directories
    $yml_file_name = str_replace('.xml', '.yml', basename($schema));

    $file = str_replace(basename($schema), $prefix.$yml_file_name,  $schema);
    pake_echo_action('schema', 'putting '.$file);
    file_put_contents($file, $db_schema->asYAML());
  }
}

function _propel_cidesa_copy_xml_schema_from_plugins($prefix = '')
{
  $schemas = pakeFinder::type('file')->ignore_version_control()->name('*schema.xml')->in(glob(sfConfig::get('sf_root_dir').'/plugins/*/config'));

  $t = pakeFinder::type('file')->ignore_version_control()->name('*schema.xml')->prune('doctrine')->in(glob(sfConfig::get('sf_root_dir').'/config/schemas'));
  $schemas = array_merge($schemas, $t);

  foreach ($schemas as $schema)
  {
    // reset local prefix
    $localprefix = '';

    // change prefix for plugins
    if (preg_match('#plugins[/\\\\]([^/\\\\]+)[/\\\\]#', $schema, $match))
    {
      // if the plugin name is not in the schema filename, add it
      if (!strstr(basename($schema), $match[1]))
      {
        $localprefix = $match[1].'-';
      }
    }

    // if the prefix is not in the schema filename, add it
    if (!strstr(basename($schema), $prefix))
    {
      $localprefix = $prefix.$localprefix;
    }

    pake_copy($schema, 'config'.DIRECTORY_SEPARATOR.$localprefix.basename($schema));
    if ('' === $localprefix)
    {
      pake_remove($schema, '');
    }
  }
}

function run_propel_update_script($task, $args)
{

  if (count($args) < 1)
  {
    throw new Exception('Debes proveer el nombre del script a ejecutar (dentro de data/update).');
  }
  pake_echo_action('update_database_functions', 'Limpiando entorno de ejecución');

  $finder = pakeFinder::type('file')->ignore_version_control()->name('*.*');
  pake_remove($finder, 'data/sql');

  pake_echo_action('update_database_functions', 'Copiando script a ejecutar');
  if(isset($args[0])) $script = $args[0];
  else $script = '';

  copy('data/updates/'.$script.'.sql','data/sql/'.$script.'.sql');

  $info = "# Sqlfile -> Database map
$script.sql=propel";

  $fp = fopen('data/sql/sqldb.map', 'w');
  fwrite($fp, $info);
  fclose($fp);

  _propel_cidesa_convert_yml_schema(false, 'generated-');
  _propel_cidesa_copy_xml_schema_from_plugins('generated-');
  _call_cidesa_phing($task, 'insert-sql');

  $finder = pakeFinder::type('file')->ignore_version_control()->name('generated-*schema*.xml');
  pake_remove($finder, 'config');
  $finder = pakeFinder::type('file')->ignore_version_control()->name('generated-*schema*.yml');
  pake_remove($finder, 'config');
  $finder = pakeFinder::type('file')->ignore_version_control()->name('*schema*.xml');
  pake_remove($finder, 'config');
  $finder = pakeFinder::type('file')->ignore_version_control()->name('*.*');
  pake_remove($finder, 'data/sql');

}

function run_propel_check_database($task, $args)
{
  global $checktablas;
  global $tablasschemas;  
  global $check;
  $check = true;
  $ymlsremoto = array();

  pake_echo_action('check_database', 'Limpiando entorno de analisis');

  $finder = pakeFinder::type('file')->ignore_version_control()->name('*.*');
  pake_remove($finder, 'data/sql');
  $finder = pakeFinder::type('file')->ignore_version_control()->name('generated-*schema*.xml');
  pake_remove($finder, 'config');
  $finder = pakeFinder::type('file')->ignore_version_control()->name('generated-*schema*.yml');
  pake_remove($finder, 'config');

  $finder = pakeFinder::type('file')->ignore_version_control()->name('*schema*.xml');
  pake_remove($finder, 'config/schemas');
  $finder = pakeFinder::type('file')->ignore_version_control()->name('*schema*.xml');
  pake_remove($finder, 'config');


  pake_echo_action('check_database', 'Analizando la base de datos');
  
  _propel_cidesa_build_schema($task,$args);

  pake_echo_action('check_database', 'Cargando Modelo de la Base de Datos');
  $ymlsremoto = sfYaml::load('config/schema.yml');
  $ymlsremoto = $ymlsremoto['propel'];
  
  $checktablas = $ymlsremoto;
  if(isset($args[0])) $schema = $args[0];
  else $schema = '';
  pake_echo_action('check_database', 'Analizando las tablas');
  _propel_cidesa_convert_yml_schema(false, $schema);
  _propel_cidesa_copy_xml_schema_from_plugins($schema);
  
  _call_cidesa_phing($task, 'sql', false);
    
  
  $finder = pakeFinder::type('file')->ignore_version_control()->name('schema.*');
  pake_remove($finder, 'config');
  
  $tablasschemas = convert_yml_schema(false, 'generated-');
  
  checkDropTables();

  pake_echo_action('check_database', 'Tablas Schema '.count($tablasschemas));
  pake_echo_action('check_database', 'Tablas Base Datos '.count($checktablas));

  //checkdatabase($ymlslocal,$ymlsremoto);

  $finder = pakeFinder::type('file')->ignore_version_control()->name('generated-*schema*.xml');
  pake_remove($finder, 'config');
  $finder = pakeFinder::type('file')->ignore_version_control()->name('generated-*schema*.yml');
  pake_remove($finder, 'config');
  $finder = pakeFinder::type('file')->ignore_version_control()->name('*schema*.xml');
  pake_remove($finder, 'config');
}

function run_propel_trim_database($task, $args)
{
  global $trim;
  $trim = true;

  pake_echo_action('trim_database', 'Limpiando Carpeta config');
  $finder = pakeFinder::type('file')->ignore_version_control()->name('*schema*.xml');
  pake_remove($finder, 'config');


  pake_echo_action('trim_database', 'Analizando las tablas');

  _propel_cidesa_convert_yml_schema(false, '');
  _propel_cidesa_copy_xml_schema_from_plugins('');
  
  _call_cidesa_phing($task, 'sql', false);
  
  $finder = pakeFinder::type('file')->ignore_version_control()->name('schema.*');
  pake_remove($finder, 'config');

  $finder = pakeFinder::type('file')->ignore_version_control()->name('*schema*.xml');
  pake_remove($finder, 'config');
}

function run_propel_seq_database($task, $args)
{
  global $seq;
  $seq = true;

  pake_echo_action('seq_database', 'Limpiando Carpeta config');
  $finder = pakeFinder::type('file')->ignore_version_control()->name('*schema*.xml');
  pake_remove($finder, 'config');


  pake_echo_action('seq_database', 'Analizando las tablas');
  _propel_cidesa_convert_yml_schema(false, '');
  _propel_cidesa_copy_xml_schema_from_plugins('');

  _call_cidesa_phing($task, 'sql', false);

  $finder = pakeFinder::type('file')->ignore_version_control()->name('schema.*');
  pake_remove($finder, 'config');

  $finder = pakeFinder::type('file')->ignore_version_control()->name('*schema*.xml');
  pake_remove($finder, 'config');
}

function checkDropTables()
{
  global $checktablas;
  global $tablasschemas;  
  $remotas = $checktablas;
  $locales = $tablasschemas;

    $sql = '';
    $sql .= "-- Tablas Basura (Que no existen en los yml del modelo)
    ";
    // Se verifica las tablas "Basura" que pueda tener la base de datos.
    foreach($remotas as $tablaname => $tabla){
  
      if($tablaname!='_attributes'){
        if(!array_key_exists($tablaname, $locales)){
          $sql .= "-- DROP TABLE \"$tablaname\" CASCADE; DROP SEQUENCE ".$tablaname."_seq;
    ";
        }
        
      }
    }
    
    $fp = fopen('data/sql/diff_drop.sql', 'w');
    fwrite($fp, $sql);
    fclose($fp);

}

function _propel_cidesa_build_schema($task, $args)
{
  _call_cidesa_phing($task, 'creole', false);

  // fix database name
  if (file_exists('config/schema.xml'))
  {
    $schema = file_get_contents('config/schema.xml');
    $schema = preg_replace('/<database\s+name="[^"]+"/s', '<database name="propel" package="lib.model"', $schema);
    file_put_contents('config/schema.xml', $schema);
  }

  if (!isset($args[0]) || $args[0] != 'xml')
  {
    _propel_cidesa_convert_xml_schema(false, '');
    $finder = pakeFinder::type('file')->ignore_version_control()->name('schema.xml');
    pake_remove($finder, 'config');
  }
}


function _call_cidesa_phing($task, $task_name, $check_schema = true)
{
  $schemas = pakeFinder::type('file')->ignore_version_control()->name('*schema.yml')->relative()->follow_link()->in('config/schemas/');

  if ($check_schema && !$schemas)
  {
    throw new Exception('You must create a schema.yml or schema.xml file.');
  }

  // call phing targets
  pake_import('Phing', false);
  if (false === strpos('propel-generator', get_include_path()))
  {
    set_include_path(sfConfig::get('sf_symfony_lib_dir').'/vendor/propel-generator/classes'.PATH_SEPARATOR.get_include_path());
  }
  set_include_path(sfConfig::get('sf_root_dir').PATH_SEPARATOR.get_include_path());

  // needed to include the right Propel builders
  set_include_path(sfConfig::get('sf_symfony_lib_dir').PATH_SEPARATOR.get_include_path());

  $options = array(
    'project.dir'       => sfConfig::get('sf_root_dir').'/config',
    'build.properties'  => 'propel.ini',
    'propel.output.dir' => sfConfig::get('sf_root_dir'),
  );
  pakePhingTask::call_phing($task, array($task_name), sfConfig::get('sf_symfony_lib_dir').'/vendor/propel-generator/build.xml', $options);

  chdir(sfConfig::get('sf_root_dir'));
}
