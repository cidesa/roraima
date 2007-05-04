<?php


	
class FcpreingMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FcpreingMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('fcpreing');
		$tMap->setPhpName('Fcpreing');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODPAR', 'Codpar', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('NOMPAR', 'Nompar', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addColumn('ESTIMA', 'Estima', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('ESTCIE', 'Estcie', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('ACUM', 'Acum', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 