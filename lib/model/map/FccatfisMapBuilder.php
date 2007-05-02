<?php


	
class FccatfisMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FccatfisMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('fccatfis');
		$tMap->setPhpName('Fccatfis');

		$tMap->setUseIdGenerator(false);

		$tMap->addPrimaryKey('CODCATFIS', 'Codcatfis', 'string', CreoleTypes::VARCHAR, true, 30);

		$tMap->addColumn('NOMCATFIS', 'Nomcatfis', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('LINNOR', 'Linnor', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('LINSUR', 'Linsur', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('LINEST', 'Linest', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('LINOES', 'Linoes', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('ID', 'Id', 'int', CreoleTypes::INTEGER, false);
				
    } 
} 