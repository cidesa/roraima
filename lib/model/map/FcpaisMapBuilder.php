<?php


	
class FcpaisMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FcpaisMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('fcpais');
		$tMap->setPhpName('Fcpais');

		$tMap->setUseIdGenerator(false);

		$tMap->addPrimaryKey('CODPAI', 'Codpai', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('NOMPAI', 'Nompai', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('ID', 'Id', 'int', CreoleTypes::INTEGER, false);
				
    } 
} 