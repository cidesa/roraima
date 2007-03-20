<?php


	
class NpintfecrefdanielMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NpintfecrefdanielMapBuilder';	

    
    private $dbMap;

	
    public function isBuilt()
    {
        return ($this->dbMap !== null);
    }

	
    public function getDatabaseMap()
    {
        return $this->dbMap;
    }

    
    public function doBuild()
    {
		$this->dbMap = Propel::getDatabaseMap('propel');
		
		$tMap = $this->dbMap->addTable('npintfecrefdaniel');
		$tMap->setPhpName('Npintfecrefdaniel');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('FECINIREF', 'Feciniref', 'int', CreoleTypes::DATE, true);

		$tMap->addColumn('FECFINREF', 'Fecfinref', 'int', CreoleTypes::DATE, true);

		$tMap->addColumn('TASINT', 'Tasint', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('TASINTPRO', 'Tasintpro', 'double', CreoleTypes::NUMERIC, true);

		$tMap->addColumn('TASINTPAS', 'Tasintpas', 'double', CreoleTypes::NUMERIC, true);

		$tMap->addColumn('TASINTACT', 'Tasintact', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 