<?php

/**
 * cidesaIdsPgsqlDDLBuilder: modificacion del SQL DDL-building class for PostgreSQL, para
 * generar archivos .sql de los indices o campos Ids de las tablas.
 * Esto es usado en migración de bases de datos de la version de Visual Basic a la de
 * php con postgres.
 *
 * @package    Roraima
 * @subpackage lib
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */

require_once 'propel/engine/builder/sql/pgsql/PgsqlDDLBuilder.php';

class cidesaIdsPgsqlDDLBuilder extends PgsqlDDLBuilder {


  /**
   * Array that keeps track of already
   * added schema names
   *
   * @var        Array of schema names
   */
  protected static $addedSchemas = array();

  /**
   * Get the schema for the current table
   *
   * @author     Markus Lervik <markus.lervik@necora.fi>
   * @access     protected
   * @return     schema name if table has one, else
   *         null
   **/
  protected function getSchema()
  {

    $table = $this->getTable();

    $schema = $table->getVendorSpecificInfo();


    if (!empty($schema) && isset($schema['schema'])) {
      return $schema['schema'];
    }

    return null;

  }

  /**
   * Add a schema to the generated SQL script
   *
   * @author     Markus Lervik <markus.lervik@necora.fi>
   * @access     protected
   * @return     string with CREATE SCHEMA statement if
   *         applicable, else empty string
   **/
  protected function addSchema()
  {

    $schemaName = $this->getSchema();

    if ($schemaName !== null) {

      if (!in_array($schemaName, self::$addedSchemas)) {
    $platform = $this->getPlatform();
        self::$addedSchemas[] = $schemaName;
    return "\nCREATE SCHEMA " . $this->quoteIdentifier($schemaName) . ";\n";
      }
    }

    return '';

  }

  /**
   *
   * @see        parent::addDropStatement()
   */
  protected function addDropStatements(&$script)
  {
    $table = $this->getTable();
    $platform = $this->getPlatform();

    $script .= "
DROP TABLE IF EXISTS ".$this->quoteIdentifier($table->getName())." CASCADE;
";
    if ($table->getIdMethod() == "native") {
      $script .= "
DROP SEQUENCE IF EXISTS ".$this->quoteIdentifier(strtolower($table->getSequenceName())).";
";
    }
  }

  /**
   *
   * @see        parent::addDropStatement()
   */
  protected function addDropSchema(&$script)
  {
    $table = $this->getTable();
    $platform = $this->getPlatform();

    if ($table->getIdMethod() == "native") {
      $script .= "
DROP SEQUENCE IF EXISTS ".$this->quoteIdentifier(strtolower($table->getSequenceName()))." CASCADE;
";
    }
  }

  /**
   *
   * @see        parent::addColumns()
   */
  protected function addTable(&$script)
  {
    $table = $this->getTable();
    $platform = $this->getPlatform();

    $script .= "
-----------------------------------------------------------------------------
-- ".$table->getName()."
-----------------------------------------------------------------------------
";

//    $script .= $this->addSchema();

//    $schemaName = $this->getSchema();
//    if ($schemaName !== null) {
//      $script .= "\nSET search_path TO " . $this->quoteIdentifier($schemaName) . ";\n";
//    }

    $this->addDropSchema($script);
    $this->addSequences($script);


    $script .= "

ALTER TABLE ".$this->quoteIdentifier($table->getName())." DROP COLUMN ID;

                ";


    $lines = array();

    foreach ($table->getColumns() as $col) {
      if($col->getName()=='id'){
            $script .= "

ALTER TABLE ".$this->quoteIdentifier($table->getName())." ADD COLUMN ".$this->getColumnDDL($col)." DEFAULT nextval('".strtolower($table->getSequenceName())."'::regclass)".";

    ";

/*
            $script .= "

ALTER TABLE ".$this->quoteIdentifier($table->getName())." ADD PRIMARY KEY (".$this->getColumnDDL($col).");

    ";
*/

      }
    }

    if ($table->hasPrimaryKey()) {
      $script .= "
ALTER TABLE ".$this->quoteIdentifier($table->getName())." ADD PRIMARY KEY (".$this->getColumnList($table->getPrimaryKey()).");
              ";
    }

    foreach ($table->getUnices() as $unique ) {
      $script .= "
ALTER TABLE ".$this->quoteIdentifier($table->getName())." ADD CONSTRAINT ".$this->quoteIdentifier($unique->getName())." UNIQUE (".$this->getColumnList($unique->getColumns()).");
              ";
    }



    //$this->addColumnComments($script);

    //$script .= "\nSET search_path TO ".$this->getSchema().";";
    //$script .= " ".print_r($this).";";

  }

  /**
   *
   * @see        parent::addColumns()
   */
  protected function addTable__(&$script)
  {
    $table = $this->getTable();
    $platform = $this->getPlatform();

    $script .= "
-----------------------------------------------------------------------------
-- ".$table->getName()."
-----------------------------------------------------------------------------
";

    $script .= $this->addSchema();

    $schemaName = $this->getSchema();

    $this->addDropStatements($script);
    $this->addSequences($script);

    $script .= "

CREATE TABLE ".$this->quoteIdentifier($table->getName())."
(
  ";

    $lines = array();

    foreach ($table->getColumns() as $col) {
      if($col->getName()=='id'){
        $lines[] = $this->getColumnDDL($col)." DEFAULT nextval(".$this->quoteIdentifier(strtolower($table->getSequenceName()))."::regclass)";
      }else $lines[] = $this->getColumnDDL($col);
    }

    if ($table->hasPrimaryKey()) {
      $lines[] = "PRIMARY KEY (".$this->getColumnList($table->getPrimaryKey()).")";
    }

    foreach ($table->getUnices() as $unique ) {
      $lines[] = "CONSTRAINT ".$this->quoteIdentifier($unique->getName())." UNIQUE (".$this->getColumnList($unique->getColumns()).")";
    }

    $sep = ",
  ";
    $script .= implode($sep, $lines);
    $script .= "
);

COMMENT ON TABLE ".$this->quoteIdentifier($table->getName())." IS '" . $platform->escapeText($table->getDescription())."';

";

    $this->addColumnComments($script);

    $script .= "\nSET search_path TO ".$this->getSchema().";";
    //$script .= " ".print_r($this).";";

  }

  /**
   * Adds comments for the columns.
   *
   */
  protected function addColumnComments(&$script)
  {
    $table = $this->getTable();
    $platform = $this->getPlatform();

    foreach ($this->getTable()->getColumns() as $col) {
      if( $col->getDescription() != '' ) {
        $script .= "
COMMENT ON COLUMN ".$this->quoteIdentifier($table->getName()).".".$this->quoteIdentifier($col->getName())." IS '".$platform->escapeText($col->getDescription()) ."';
";
      }
    }
  }

  /**
   * Adds CREATE SEQUENCE statements for this table.
   *
   */
  protected function addSequences(&$script)
  {
    $table = $this->getTable();
    $platform = $this->getPlatform();

    if ($table->getIdMethod() == "native") {
      $script .= "
CREATE SEQUENCE ".$this->quoteIdentifier(strtolower($table->getSequenceName())).";
";
    }
  }


  /**
   * Adds CREATE INDEX statements for this table.
   * @see        parent::addIndices()
   */
  protected function addIndices(&$script)
  {
    $table = $this->getTable();
    $platform = $this->getPlatform();

    foreach ($table->getIndices() as $index) {
      $script .= "
CREATE ";
      if($index->getIsUnique()) {
        $script .= "UNIQUE";
      }
      $script .= "INDEX ".$this->quoteIdentifier($index->getName())." ON ".$this->quoteIdentifier($table->getName())." (".$this->getColumnList($index->getColumns()).");
";
    }
  }

  /**
   *
   * @see        parent::addForeignKeys()
   */
  protected function addForeignKeys(&$script)
  {
    $table = $this->getTable();
    $platform = $this->getPlatform();

    foreach ($table->getForeignKeys() as $fk) {
      $script .= "
ALTER TABLE ".$this->quoteIdentifier($table->getName())." ADD CONSTRAINT ".$this->quoteIdentifier($fk->getName())." FOREIGN KEY (".$this->getColumnList($fk->getLocalColumns()) .") REFERENCES ".$this->quoteIdentifier($fk->getForeignTableName())." (".$this->getColumnList($fk->getForeignColumns()).")";
      if ($fk->hasOnUpdate()) {
        $script .= " ON UPDATE ".$fk->getOnUpdate();
      }
      if ($fk->hasOnDelete()) {
        $script .= " ON DELETE ".$fk->getOnDelete();
      }
      $script .= ";
";
    }
  }

}
