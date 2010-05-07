<?php

class cidesaPropelDatabaseSchema extends sfPropelDatabaseSchema {

  public function loadYAML($file)
  {
    $schema = sfYamlNew::load($file);

    if (count($schema) > 1)
    {
      throw new sfException('A schema.yml must only contain 1 database entry.');
    }

    $tmp = array_keys($schema);
    $this->connection_name = array_shift($tmp);
    if ($this->connection_name)
    {
      $this->database = $schema[$this->connection_name];

      $this->fixYAMLDatabase();
      $this->fixYAMLI18n();
      $this->fixYAMLColumns();
    }
  }

  public function asYAML()
  {
    return sfYamlNew::dump(array($this->connection_name => $this->database));
  }

}
?>
