<?php


	
class FafecpedMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FafecpedMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('fafecped');
		$tMap->setPhpName('Fafecped');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('NROPED', 'Nroped', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('CODART', 'Codart', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('CANENT', 'Canent', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('CANAJU', 'Canaju', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('FECENT', 'Fecent', 'int', CreoleTypes::DATE, true);

		$tMap->addColumn('FECAJU', 'Fecaju', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('STAFEC', 'Stafec', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 