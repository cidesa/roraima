<?php

pake_task('schema_exists');


function run_schema_exists($task, $args)
{
  if (!count($args))
  {
    throw new Exception('you must provide a schema name');
  }

  foreach($args as $arg)
  {
    if (!is_file(getcwd().'/config/schemas/'.$arg.'_schema.yml'))
    {
      throw new Exception('schema "'.$arg.'_schema.yml" does not exist');
    }    
  }

}


?>