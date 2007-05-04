<?php


	
class FcprolicMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FcprolicMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('fcprolic');
		$tMap->setPhpName('Fcprolic');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('NROCON', 'Nrocon', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('FECREG', 'Fecreg', 'int', CreoleTypes::DATE, true);

		$tMap->addColumn('RIFCON', 'Rifcon', 'string', CreoleTypes::VARCHAR, true, 14);

		$tMap->addColumn('TIPPRO', 'Tippro', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('DESPRO', 'Despro', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('DIRPRO', 'Dirpro', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('MONPRO', 'Monpro', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('MONIMP', 'Monimp', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('FUNREC', 'Funrec', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('FECREC', 'Fecrec', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('RIFREP', 'Rifrep', 'string', CreoleTypes::VARCHAR, false, 14);

		$tMap->addColumn('STAPRO', 'Stapro', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('STADEC', 'Stadec', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('NOMCON', 'Nomcon', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('DIRCON', 'Dircon', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('SEMDIA', 'Semdia', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 