<?php


	
class RemovtraMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.RemovtraMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('removtra');
		$tMap->setPhpName('Removtra');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('REFTRA', 'Reftra', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('CODORI', 'Codori', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('CODDES', 'Coddes', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('MONMOV', 'Monmov', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('STAMOV', 'Stamov', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 