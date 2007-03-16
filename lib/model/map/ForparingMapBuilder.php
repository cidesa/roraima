<?php


	
class ForparingMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ForparingMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('forparing');
		$tMap->setPhpName('Forparing');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODPARING', 'Codparing', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('MONTOING', 'Montoing', 'double', CreoleTypes::NUMERIC, true);

		$tMap->addColumn('CODTIPFIN', 'Codtipfin', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('OBSERV', 'Observ', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('MONTODIS', 'Montodis', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 