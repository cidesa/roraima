<?php


	
class RhclacurMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.RhclacurMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('rhclacur');
		$tMap->setPhpName('Rhclacur');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODCUR', 'Codcur', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('NUMCLA', 'Numcla', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('FECCLA', 'Feccla', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('HORINI', 'Horini', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('HORFIN', 'Horfin', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('NUMHOR', 'Numhor', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 