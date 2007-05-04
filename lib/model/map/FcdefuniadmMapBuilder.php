<?php


	
class FcdefuniadmMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FcdefuniadmMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('fcdefuniadm');
		$tMap->setPhpName('Fcdefuniadm');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODUNIADM', 'Coduniadm', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('NOMUNIADM', 'Nomuniadm', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 