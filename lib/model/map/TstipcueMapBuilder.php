<?php


	
class TstipcueMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.TstipcueMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('tstipcue');
		$tMap->setPhpName('Tstipcue');

		$tMap->setUseIdGenerator(false);

		$tMap->addPrimaryKey('CODTIP', 'Codtip', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('DESTIP', 'Destip', 'string', CreoleTypes::VARCHAR, true, 40);

		$tMap->addColumn('ID', 'Id', 'int', CreoleTypes::INTEGER, true);
				
    } 
} 