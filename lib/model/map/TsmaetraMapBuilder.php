<?php


	
class TsmaetraMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.TsmaetraMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('tsmaetra');
		$tMap->setPhpName('Tsmaetra');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('REFTRA', 'Reftra', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('FECTRA', 'Fectra', 'int', CreoleTypes::DATE, true);

		$tMap->addColumn('DESTRA', 'Destra', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('TOTTRA', 'Tottra', 'double', CreoleTypes::NUMERIC, true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 