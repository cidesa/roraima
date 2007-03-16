<?php


	
class FordefaccespMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FordefaccespMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('fordefaccesp');
		$tMap->setPhpName('Fordefaccesp');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODPRO', 'Codpro', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('CODACCESP', 'Codaccesp', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('DESACCESP', 'Desaccesp', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('NOMABRACCESP', 'Nomabraccesp', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('CODEMPRES', 'Codempres', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 