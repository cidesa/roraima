<?php


	
class FcconpagMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FcconpagMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('fcconpag');
		$tMap->setPhpName('Fcconpag');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('REFCON', 'Refcon', 'string', CreoleTypes::VARCHAR, true, 15);

		$tMap->addColumn('FECCON', 'Feccon', 'int', CreoleTypes::DATE, true);

		$tMap->addColumn('MONCON', 'Moncon', 'double', CreoleTypes::NUMERIC, true);

		$tMap->addColumn('NUMCUO', 'Numcuo', 'double', CreoleTypes::NUMERIC, true);

		$tMap->addColumn('MONINI', 'Monini', 'double', CreoleTypes::NUMERIC, true);

		$tMap->addColumn('ESTCON', 'Estcon', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('RIFCON', 'Rifcon', 'string', CreoleTypes::VARCHAR, true, 14);

		$tMap->addColumn('OBSCON', 'Obscon', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('FUNREC', 'Funrec', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('FECREC', 'Fecrec', 'int', CreoleTypes::DATE, false);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 