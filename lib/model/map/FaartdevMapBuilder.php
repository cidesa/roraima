<?php


	
class FaartdevMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FaartdevMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('faartdev');
		$tMap->setPhpName('Faartdev');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('NRODEV', 'Nrodev', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('CODART', 'Codart', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('NUMLOT', 'Numlot', 'string', CreoleTypes::VARCHAR, true, 25);

		$tMap->addColumn('CANDES', 'Candes', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('CANDEV', 'Candev', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('PREART', 'Preart', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('TOTART', 'Totart', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 