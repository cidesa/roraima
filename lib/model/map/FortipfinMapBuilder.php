<?php


	
class FortipfinMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FortipfinMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('fortipfin');
		$tMap->setPhpName('Fortipfin');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODFIN', 'Codfin', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('NOMEXT', 'Nomext', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('NOMABR', 'Nomabr', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('APOFIS', 'Apofis', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('TIPFIN', 'Tipfin', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('MONTOING', 'Montoing', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('MONTODIS', 'Montodis', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('MONTODISAUX', 'Montodisaux', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 