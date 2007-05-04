<?php


	
class FcmodproMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FcmodproMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('fcmodpro');
		$tMap->setPhpName('Fcmodpro');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('REFMOD', 'Refmod', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addForeignKey('NROCON', 'Nrocon', 'string', CreoleTypes::VARCHAR, 'fcprolic', 'NROCON', true, 8);

		$tMap->addColumn('FECMOD', 'Fecmod', 'int', CreoleTypes::DATE, true);

		$tMap->addColumn('TIPPRO', 'Tippro', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('DESPRO', 'Despro', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('DIRPRO', 'Dirpro', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('MONPRO', 'Monpro', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('MONIMP', 'Monimp', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('TIPPROANT', 'Tipproant', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('DESPROANT', 'Desproant', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('DIRPROANT', 'Dirproant', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('MONPROANT', 'Monproant', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('MONIMPANT', 'Monimpant', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('FUNREC', 'Funrec', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 