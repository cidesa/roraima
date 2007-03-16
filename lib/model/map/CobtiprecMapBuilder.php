<?php


	
class CobtiprecMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CobtiprecMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('cobtiprec');
		$tMap->setPhpName('Cobtiprec');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODREC', 'Codrec', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('DESREC', 'Desrec', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('CODCON', 'Codcon', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('TIPREC', 'Tiprec', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('VALREC', 'Valrec', 'double', CreoleTypes::NUMERIC, true);

		$tMap->addColumn('DIAREC', 'Diarec', 'double', CreoleTypes::NUMERIC, true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 