<?php


	
class OpconincMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.OpconincMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('opconinc');
		$tMap->setPhpName('Opconinc');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('REFAJU', 'Refaju', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('NUMCOM', 'Numcom', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('FECAJU', 'Fecaju', 'int', CreoleTypes::DATE, false);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 