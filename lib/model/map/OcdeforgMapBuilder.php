<?php


	
class OcdeforgMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.OcdeforgMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('ocdeforg');
		$tMap->setPhpName('Ocdeforg');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODORG', 'Codorg', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESORG', 'Desorg', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addColumn('CODTIPORG', 'Codtiporg', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('ENTORG', 'Entorg', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('DIRORG', 'Dirorg', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('CODPAI', 'Codpai', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODEDO', 'Codedo', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODCIU', 'Codciu', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('TELORG', 'Telorg', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('FAXORG', 'Faxorg', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('EMAORG', 'Emaorg', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 