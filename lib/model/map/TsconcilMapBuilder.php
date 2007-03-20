<?php


	
class TsconcilMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.TsconcilMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('tsconcil');
		$tMap->setPhpName('Tsconcil');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('NUMCUE', 'Numcue', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('MESCON', 'Mescon', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('ANOCON', 'Anocon', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('REFERE', 'Refere', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('MOVLIB', 'Movlib', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('MOVBAN', 'Movban', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('FECLIB', 'Feclib', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('FECBAN', 'Fecban', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('DESREF', 'Desref', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('MONLIB', 'Monlib', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('MONBAN', 'Monban', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('RESULT', 'Result', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 