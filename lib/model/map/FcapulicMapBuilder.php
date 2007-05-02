<?php


	
class FcapulicMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FcapulicMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('fcapulic');
		$tMap->setPhpName('Fcapulic');

		$tMap->setUseIdGenerator(false);

		$tMap->addPrimaryKey('NROCON', 'Nrocon', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('FECREG', 'Fecreg', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('RIFCON', 'Rifcon', 'string', CreoleTypes::VARCHAR, false, 14);

		$tMap->addColumn('TIPAPU', 'Tipapu', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('DESAPU', 'Desapu', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('MONAPU', 'Monapu', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('MONIMP', 'Monimp', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('FUNREC', 'Funrec', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('FECREC', 'Fecrec', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('RIFREP', 'Rifrep', 'string', CreoleTypes::VARCHAR, false, 14);

		$tMap->addColumn('STAAPU', 'Staapu', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('STADEC', 'Stadec', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('NOMCON', 'Nomcon', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('DIRCON', 'Dircon', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('ID', 'Id', 'int', CreoleTypes::INTEGER, false);
				
    } 
} 