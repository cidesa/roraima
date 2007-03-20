<?php


	
class RhdefempMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.RhdefempMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('rhdefemp');
		$tMap->setPhpName('Rhdefemp');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('FAXEMP', 'Faxemp', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('PORCOM', 'Porcom', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('POROBJ', 'Porobj', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 