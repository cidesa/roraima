<?php


	
class OcasiactMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.OcasiactMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('ocasiact');
		$tMap->setPhpName('Ocasiact');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODCON', 'Codcon', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('CODTIPACT', 'Codtipact', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('NUMOFI', 'Numofi', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('FECACT', 'Fecact', 'int', CreoleTypes::DATE, true);

		$tMap->addColumn('OBSACT', 'Obsact', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 