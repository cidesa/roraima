<?php


	
class FordefunimedMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FordefunimedMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('fordefunimed');
		$tMap->setPhpName('Fordefunimed');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODUNIMED', 'Codunimed', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('DESUNIMED', 'Desunimed', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('NOMABRUNIMED', 'Nomabrunimed', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 