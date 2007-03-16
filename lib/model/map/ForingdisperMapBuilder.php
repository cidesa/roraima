<?php


	
class ForingdisperMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ForingdisperMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('foringdisper');
		$tMap->setPhpName('Foringdisper');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODPAR', 'Codpar', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('PERPAR', 'Perpar', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('MONPAR', 'Monpar', 'double', CreoleTypes::NUMERIC, true);

		$tMap->addColumn('PORPER', 'Porper', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 