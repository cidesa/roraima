<?php


pake_desc('check database for current model');
pake_task('propel-check-database', 'project_exists');

function _propel_cidesa_convert_yml_schema($check_schema = true, $prefix = '')
{
  $finder = pakeFinder::type('file')->ignore_version_control()->name('*schema.yml');
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

function _propel_cidesa_convert_xml_schema($check_schema = true, $prefix = '')
{
  $finder = pakeFinder::type('file')->ignore_version_control()->name('*schema.xml');

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

function _propel_cidesa_copy_xml_schema_from_plugins($prefix = '')
{
  $schemas = pakeFinder::type('file')->ignore_version_control()->name('*schema.xml')->in(glob(sfConfig::get('sf_root_dir').'/plugins/*/config'));

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

/*
function run_propel_build_model($task, $args)
{
  _propel_convert_yml_schema(false, 'generated-');
  _propel_copy_xml_schema_from_plugins('generated-');
  _call_phing($task, 'om');
  $finder = pakeFinder::type('file')->ignore_version_control()->name('generated-*schema.xml');
  pake_remove($finder, array('config', 'plugins'));
}
*/
function run_propel_check_database($task, $args)
{
//  _call_cidesa_phing($task, 'creole', false);
//  $finder = pakeFinder::type('file')->ignore_version_control()->name('generated-*schema.xml');
//  pake_remove($finder, 'config');
//  $finder = pakeFinder::type('file')->ignore_version_control()->name('schema.xml');
//  pake_remove($finder, 'config');
  _propel_cidesa_convert_yml_schema(false, 'generated-');
  _propel_cidesa_copy_xml_schema_from_plugins('generated-');
  _call_cidesa_phing($task, 'sql');
  $finder = pakeFinder::type('file')->ignore_version_control()->name('generated-*schema.xml');
  pake_remove($finder, 'config');
}



function _call_cidesa_phing($task, $task_name, $check_schema = true)
{
  $schemas = pakeFinder::type('file')->ignore_version_control()->name('*schema.xml')->relative()->follow_link()->in('config');
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
