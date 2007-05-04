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

		$tMap->addColumn('CODPAR', 'Codpar', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('CODMUN', 'Codmun', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('CODEDO', 'Codedo', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addForeignKey('CODPAI', 'Codpai', 'string', CreoleTypes::VARCHAR, 'fcmunici', 'CODPAI', true, 4);

		$tMap->addColumn('NOMPAR', 'Nompar', 'string', CreoleTypes::VARCHAR, true, 30);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 