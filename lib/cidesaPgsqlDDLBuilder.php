<?php

/**
 * cidesaPgsqlDDLBuilder: modificacion del SQL DDL-building class for PostgreSQL, para
 * generar archivos .sql de las tablas de la base de datos.
 *
 * @package    Roraima
 * @subpackage lib
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: cidesaPgsqlDDLBuilder.php 33085 2009-09-15 15:14:30Z lhernandez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */

require_once 'propel/engine/builder/sql/pgsql/PgsqlDDLBuilder.php';

class cidesaPgsqlDDLBuilder extends PgsqlDDLBuilder {


	/**
	 * Builds the SQL for current table and returns it as a string.
	 *
	 * This is the main entry point and defines a basic structure that classes should follow.
	 * In most cases this method will not need to be overridden by subclasses.
	 *
	 * @return     string The resulting SQL DDL.
	 */
	public function build()
	{
	  if(isset($GLOBALS["check"])){
	    if($GLOBALS["check"]==true){
  	    $script = "";
        $this->checkdatabase(&$script);
        return $script;
	    }elseif($GLOBALS["trim"]){
  	    if($GLOBALS["trim"]==true){
    	    $script = "";
          $this->trimdatabase(&$script);
          return $script;
  	    }
      }
	  }elseif($GLOBALS["trim"]){
	    if($GLOBALS["trim"]==true){
  	    $script = "";
        $this->trimdatabase(&$script);
        return $script;
	    }
	  }

		$script = "";
		$this->addTable($script);
		$this->addIndices($script);
		$this->addForeignKeys($script);
		return $script;
    
	}


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
  protected function addDropStatements(&$script, $exist=true)
  {
    $table = $this->getTable();
    $platform = $this->getPlatform();
    if($exist){
    $script .= "
DROP TABLE IF EXISTS ".$this->quoteIdentifier($table->getName())." CASCADE;
";
    if ($table->getIdMethod() == "native") {
      $script .= "
DROP SEQUENCE IF EXISTS ".$this->quoteIdentifier(strtolower($table->getSequenceName())).";
";
    }
    
    }else{
    $script .= "
DROP TABLE ".$this->quoteIdentifier($table->getName())." CASCADE;
";
      if ($table->getIdMethod() == "native") {
      $script .= "
DROP SEQUENCE ".$this->quoteIdentifier(strtolower($table->getSequenceName())).";
";

      }
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
  protected function addTable__(&$script)
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

      }
    }

    //$this->addColumnComments($script);

    //$script .= "\nSET search_path TO ".$this->getSchema().";";
    //$script .= " ".print_r($this).";";

  }

  /**
   *
   * @see        parent::addColumns()
   */
  protected function addTable(&$script, $exist=true, $drop=true)
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

    if($drop) $this->addDropStatements($script,$exist);
    $this->addSequences($script);

    $script .= "

CREATE TABLE ".$this->quoteIdentifier($table->getName())."
(
  ";

    $lines = array();

    foreach ($table->getColumns() as $col) {
      if($col->getName()=='id'){
        $lines[] = $this->getColumnDDL($col)." DEFAULT nextval('".(strtolower($table->getSequenceName()))."'::regclass)";
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

    //$script .= "\nSET search_path TO ".$this->getSchema().";";
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
  
  /**
   *
   * @see        parent::addForeignKeys()
   */
  protected function addForeignKeysByColumn($column, &$script)
  {
    $table = $this->getTable();
    $platform = $this->getPlatform();

    foreach ($table->getForeignKeys() as $fk) {
      if($this->getColumnList($fk->getLocalColumns())==strtolower($column)){

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
  
  protected function addColumn($colname, &$script)
  {

    $table = $this->getTable();
    $platform = $this->getPlatform();

    foreach ($table->getColumns() as $col) {
      if($col->getName() == $colname){
        if($col->getName()=='id'){
          $lines = $this->getColumnDDL($col)." DEFAULT nextval('".(strtolower($table->getSequenceName()))."'::regclass)";
        }else $lines = $this->getColumnDDL($col);
        
        $script .= "
ALTER TABLE ".$this->quoteIdentifier($table->getName())." ADD ".$lines.";
        ";
        
        
      }
    }
    
    
  }

  protected function addTrimColumn($colname, &$script)
  {

    $table = $this->getTable();
    $platform = $this->getPlatform();

    foreach ($table->getColumns() as $col) {
      if($col->getName() == $colname){
        $script .= "
UPDATE ".$this->quoteIdentifier($table->getName())." SET ".$col->getName()." = TRIM(".$col->getName().");
        ";
        
        
      }
    }
    
    
  }

	/**
	 * Adds comments for the columns.
	 *
	 */
	protected function addColumnCommentsByColumn($column, &$script)
	{
		$table = $this->getTable();
		$platform = $this->getPlatform();

		foreach ($this->getTable()->getColumns() as $col) {
		  if($column == $col->getName()){
  			if( $col->getDescription() != '' ) {
	  			$script .= "
COMMENT ON COLUMN ".$this->quoteIdentifier($table->getName()).".".$this->quoteIdentifier($col->getName())." IS '".$platform->escapeText($col->getDescription()) ."';
";
		    
		    }
			}
		}
	}
  
	/**
	 * Get column Type
	 * @return     string
	 */
	public function getColumnType(Column $col)
	{
		$domain = $col->getDomain();

		return $domain->getSqlType();
	}
  
  protected function checkdatabase(&$script)
  {
    $remotas = $GLOBALS["checktablas"];
    $locales = $this->getTable()->getColumns();
    $objtabla = $this->getTable();
    $tabla = $this->getTable()->getName();
    
    // Se verifica las diferencias entre las tablas del modelo y las de la base de datos
    if(array_key_exists(strtolower($tabla), $remotas)){
      // Existe en el modelo y la base de datos
      // Se verifica si la estrucura esta correcta
      $tablaok = true;
      foreach($locales as $col){
        $columnname = $col->getName();
        if(!array_key_exists($columnname,$remotas[strtolower($tabla)])){
          
          // El campo no existe en la base de datos
          // Se debe crear el campo nuevos en la tabla
          $this->addColumn($columnname,&$script);
        }else{
          
          // El campo existe en la base de datos
          // reviso si tiene foreingkeys
          foreach ($objtabla->getForeignKeys() as $fk) {
            if($this->getColumnList($fk->getLocalColumns())==strtolower($columnname)){
              if(!array_key_exists('foreignTable',$remotas[strtolower($tabla)][$columnname])){
                $this->addForeignKeysByColumn(strtolower($columnname),&$script);
              }
            }
          }
        }
      } // Foreach Columns

      // Reviso si la tabla tiene indices          
      if(count($objtabla->getIndices())>0){
        if(!array_key_exists('_indexes',$remotas[strtolower($tabla)])){
          $this->addIndices(&$script);
        }
      }
      
    }else{
      // Existe en el modelo pero no existe en la base de datos
      $this->addTable(&$script,false,false);
    }

  }

  protected function trimdatabase(&$script)
  {
    $locales = $this->getTable()->getColumns();
    $objtabla = $this->getTable();
    $tabla = $this->getTable()->getName();
    
    foreach($locales as $col){
      $columnname = $col->getName();
      $columntype = $this->getColumnType($col);
      // verifico tipo de columna
      if(strstr($columntype,'VARCHAR')!=''){
        // Se debe crear el campo nuevos en la tabla
        $this->addTrimColumn($columnname,&$script);        
      }
    } // Foreach Columns

  }


}
