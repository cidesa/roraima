<?php


	
class OctartipMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.OctartipMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('octartip');
		$tMap->setPhpName('Octartip');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('EXPPRO', 'Exppro', 'double', CreoleTypes::NUMERIC, true);

		$tMap->addColumn('VALHOR', 'Valhor', 'double', CreoleTypes::NUMERIC, true);

		$tMap->addColumn('NUMNIV', 'Numniv', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('CODTIPPRO', 'Codtippro', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('NIVPRO', 'Nivpro', 'string', CreoleTypes::VARCHAR, false, 6);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 