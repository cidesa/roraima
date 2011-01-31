<?php

/*
 * This file is part of the symfony package.
 * (c) 2004-2006 Fabien Potencier <fabien.potencier@symfony-project.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

pake_desc('create classes for current model');
pake_task('propel-build-model-v2', 'project_exists');

pake_desc('create sql for current model');
pake_task('propel-build-sql-v2', 'project_exists');

pake_desc('create a schema from existing database');
pake_task('propel-build-schema-v2', 'project_exists');

pake_desc('create schema.xml from schema.yml');
pake_task('propel-convert-yml-schema-v2', 'project_exists');

pake_desc('create schema.yml from schema.xml');
pake_task('propel-convert-xml-schema-v2', 'project_exists');

pake_desc('insert sql for current model');
pake_task('propel-insert-sql-v2', 'project_exists');

function run_propel_convert_yml_schema_v2($task, $args)
{
  _propel_convert_yml_schema_v2(true);
}

function run_propel_convert_xml_schema_v2($task, $args)
{
  _propel_convert_xml_schema_v2(true);
}

function _propel_convert_yml_schema_v2($check_schema = true, $prefix = '')
{
  $finder = pakeFinder::type('file')->ignore_version_control()->name('*schema.yml')->prune('doctrine');
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

function _propel_convert_xml_schema_v2($check_schema = true, $prefix = '')
{
  $finder = pakeFinder::type('file')->ignore_version_control()->name('*schema.xml')->prune('doctrine');

  $schemas = array_merge($finder->in('config'), $finder->in(glob(sfConfig::get('sf_root_dir').'/plugins/*/config')));
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

function _propel_copy_xml_schema_from_plugins_v2($prefix = '')
{
  $schemas = pakeFinder::type('file')->ignore_version_control()->name('*schema.xml')->prune('doctrine')->in(glob(sfConfig::get('sf_root_dir').'/plugins/*/config'));
  $s = pakeFinder::type('file')->ignore_version_control()->name('*schema.xml')->prune('doctrine')->in(glob(sfConfig::get('sf_root_dir').'/config/schemas'));

  $schemas = array_merge($schemas, $s);

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

function run_propel_build_model_v2($task, $args)
{
  _propel_convert_yml_schema_v2(false, 'generated-');
  _propel_copy_xml_schema_from_plugins_v2('generated-');
  _call_phing_v2($task, 'om');
  $finder = pakeFinder::type('file')->ignore_version_control()->name('generated-*schema*.xml');
  pake_remove($finder, array('config', 'plugins'));
}

function run_propel_build_sql_v2($task, $args)
{
  _propel_convert_yml_schema_v2(false, 'generated-');
  _propel_copy_xml_schema_from_plugins_v2('generated-');
  _call_phing_v2($task, 'sql');
  $finder = pakeFinder::type('file')->ignore_version_control()->name('generated-*schema*.xml');
  pake_remove($finder, 'config');
}

function run_propel_insert_sql_v2($task, $args)
{
  _propel_convert_yml_schema_v2(false, 'generated-');
  _propel_copy_xml_schema_from_plugins_v2('generated-');
  _call_phing_v2($task, 'insert-sql');
  $finder = pakeFinder::type('file')->ignore_version_control()->name('generated-*schema*.xml');
  pake_remove($finder, 'config');
}

function run_propel_build_schema_v2($task, $args)
{
  _call_phing_v2($task, 'creole', false);

  // fix database name
  if (file_exists('config/schema.xml'))
  {
    $schema = file_get_contents('config/schema.xml');
    $schema = preg_replace('/<database\s+name="[^"]+"/s', '<database name="propel" package="lib.model"', $schema);
    file_put_contents('config/schema.xml', $schema);
  }

  if (!isset($args[0]) || $args[0] != 'xml')
  {
    _propel_convert_xml_schema(false, '');
    $finder = pakeFinder::type('file')->ignore_version_control()->name('schema.xml');
    pake_remove($finder, 'config');
  }
}

/**
 * Dumps yml database data to fixtures directory.
 *
 * @example symfony dump-data frontend data.yml
 * @example symfony dump-data frontend data.yml dev
 *
 * @param object $task
 * @param array $args
 */
function run_propel_dump_data_v2($task, $args)
{
  if (!count($args))
  {
    throw new Exception('You must provide the app.');
  }

  $app = $args[0];

  if (!is_dir(sfConfig::get('sf_app_dir').DIRECTORY_SEPARATOR.$app))
  {
    throw new Exception('The app "'.$app.'" does not exist.');
  }

  if (!isset($args[1]))
  {
    throw new Exception('You must provide a filename.');
  }

  $filename = $args[1];

  $env = empty($args[2]) ? 'dev' : $args[2];

  // define constants
  define('SF_ROOT_DIR',    sfConfig::get('sf_root_dir'));
  define('SF_APP',         $app);
  define('SF_ENVIRONMENT', $env);
  define('SF_DEBUG',       true);

  // get configuration
  require_once SF_ROOT_DIR.DIRECTORY_SEPARATOR.'apps'.DIRECTORY_SEPARATOR.SF_APP.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'config.php';

  $databaseManager = new sfDatabaseManager();
  $databaseManager->initialize();

  if (!sfToolkit::isPathAbsolute($filename))
  {
    $dir = sfConfig::get('sf_data_dir').DIRECTORY_SEPARATOR.'fixtures';
    pake_mkdirs($dir);
    $filename = $dir.DIRECTORY_SEPARATOR.$filename;
  }

  pake_echo_action('propel', sprintf('dumping data to "%s"', $filename));

  $data = new sfPropelData();
  $data->dumpData($filename);
}

function _call_phing_v2($task, $task_name, $check_schema = true)
{
  $schemas = pakeFinder::type('file')->ignore_version_control()->name('*schema.xml')->prune('doctrine')->relative()->follow_link()->in('config');
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
