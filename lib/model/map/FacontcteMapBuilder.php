<?php


	
class FacontcteMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FacontcteMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('facontcte');
		$tMap->setPhpName('Facontcte');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODCLI', 'Codcli', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('CODCONT', 'Codcont', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('CORRCON', 'Corrcon', 'string', CreoleTypes::VARCHAR, true, 6);

		$tMap->addColumn('NOMCONT', 'Nomcont', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('CARCONT', 'Carcont', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('CELCONT', 'Celcont', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('TF1CONT', 'Tf1cont', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('TF2CONT', 'Tf2cont', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 