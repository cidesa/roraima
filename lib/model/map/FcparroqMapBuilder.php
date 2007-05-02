<?php


	
class FcparroqMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FcparroqMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('fcparroq');
		$tMap->setPhpName('Fcparroq');

		$tMap->setUseIdGenerator(false);

		$tMap->addPrimaryKey('CODPAR', 'Codpar', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addPrimaryKey('CODMUN', 'Codmun', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addPrimaryKey('CODEDO', 'Codedo', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addForeignPrimaryKey('CODPAI', 'Codpai', 'string' , CreoleTypes::VARCHAR, 'fcmunici', 'CODPAI', true, 4);

		$tMap->addColumn('NOMPAR', 'Nompar', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('ID', 'Id', 'int', CreoleTypes::INTEGER, false);
				
    } 
} 