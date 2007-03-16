<?php


	
class TsdesmonMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.TsdesmonMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('tsdesmon');
		$tMap->setPhpName('Tsdesmon');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODMON', 'Codmon', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('NOMMON', 'Nommon', 'string', CreoleTypes::VARCHAR, true, 40);

		$tMap->addColumn('VALMON', 'Valmon', 'double', CreoleTypes::NUMERIC, true);

		$tMap->addColumn('AUMDIS', 'Aumdis', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('FECMON', 'Fecmon', 'int', CreoleTypes::DATE, true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 