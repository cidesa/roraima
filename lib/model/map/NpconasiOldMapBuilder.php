<?php


	
class NpconasiOldMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NpconasiOldMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('npconasi_old');
		$tMap->setPhpName('NpconasiOld');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODCON', 'Codcon', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('CODASI', 'Codasi', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('CODCPT', 'Codcpt', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 