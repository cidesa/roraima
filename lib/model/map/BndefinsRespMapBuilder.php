<?php


	
class BndefinsRespMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.BndefinsRespMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('bndefins_resp');
		$tMap->setPhpName('BndefinsResp');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODINS', 'Codins', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('NOMINS', 'Nomins', 'string', CreoleTypes::VARCHAR, false, 35);

		$tMap->addColumn('DIRINS', 'Dirins', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('TELINS', 'Telins', 'string', CreoleTypes::VARCHAR, false, 25);

		$tMap->addColumn('FAXINS', 'Faxins', 'string', CreoleTypes::VARCHAR, false, 25);

		$tMap->addColumn('EMAIL', 'Email', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('EDOINS', 'Edoins', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('MUNINS', 'Munins', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('PAQINS', 'Paqins', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('FORACT', 'Foract', 'string', CreoleTypes::VARCHAR, false, 25);

		$tMap->addColumn('DESACT', 'Desact', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('LONACT', 'Lonact', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('FORUBI', 'Forubi', 'string', CreoleTypes::VARCHAR, false, 25);

		$tMap->addColumn('DESUBI', 'Desubi', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('LONUBI', 'Lonubi', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('FECPER', 'Fecper', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('FECEJE', 'Feceje', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('CODDES', 'Coddes', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('PORREV', 'Porrev', 'string', CreoleTypes::VARCHAR, false, 5);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 