<?php


	
class TsretivaMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.TsretivaMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('tsretiva');
		$tMap->setPhpName('Tsretiva');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODRET', 'Codret', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('CODREC', 'Codrec', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('CODPAR', 'Codpar', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 