<?php


	
class FcmodespMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FcmodespMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('fcmodesp');
		$tMap->setPhpName('Fcmodesp');

		$tMap->setUseIdGenerator(false);

		$tMap->addPrimaryKey('REFMOD', 'Refmod', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addForeignKey('NROCON', 'Nrocon', 'string', CreoleTypes::VARCHAR, 'fcesppub', 'NROCON', false, 8);

		$tMap->addColumn('FECMOD', 'Fecmod', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('NOMESP', 'Nomesp', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('DIRESP', 'Diresp', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('FECESP', 'Fecesp', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('HORESP', 'Horesp', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('TIPESP', 'Tipesp', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('NROENT', 'Nroent', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('MONENT', 'Monent', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('MONIMP', 'Monimp', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('NOMRES', 'Nomres', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('DIRRES', 'Dirres', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('TELRES', 'Telres', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('NOMESPANT', 'Nomespant', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('DIRESPANT', 'Direspant', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('FECESPANT', 'Fecespant', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('HORESPANT', 'Horespant', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('TIPESPANT', 'Tipespant', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('NROENTANT', 'Nroentant', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('MONENTANT', 'Monentant', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('MONIMPANT', 'Monimpant', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('NOMRESANT', 'Nomresant', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('DIRRESANT', 'Dirresant', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('TELRESANT', 'Telresant', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('FUNREC', 'Funrec', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('ID', 'Id', 'int', CreoleTypes::INTEGER, false);
				
    } 
} 