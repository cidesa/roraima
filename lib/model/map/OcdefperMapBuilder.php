<?php


	
class OcdefperMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.OcdefperMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('ocdefper');
		$tMap->setPhpName('Ocdefper');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CEDPER', 'Cedper', 'string', CreoleTypes::VARCHAR, true, 15);

		$tMap->addColumn('NOMPER', 'Nomper', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('TELPER', 'Telper', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('CODTIPCAR', 'Codtipcar', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODTIPPRO', 'Codtippro', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 