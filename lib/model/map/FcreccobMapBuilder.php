<?php


	
class FcreccobMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FcreccobMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('fcreccob');
		$tMap->setPhpName('Fcreccob');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('NUMENT', 'Nument', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('FECENT', 'Fecent', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('CODCOB', 'Codcob', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 