<?php


	
class OpautpagMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.OpautpagMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('opautpag');
		$tMap->setPhpName('Opautpag');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('NUMORD', 'Numord', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('TIPCAU', 'Tipcau', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('FECEMI', 'Fecemi', 'int', CreoleTypes::DATE, true);

		$tMap->addColumn('CEDRIF', 'Cedrif', 'string', CreoleTypes::VARCHAR, true, 15);

		$tMap->addColumn('NOMBEN', 'Nomben', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addColumn('MONORD', 'Monord', 'double', CreoleTypes::NUMERIC, true);

		$tMap->addColumn('DESORD', 'Desord', 'string', CreoleTypes::VARCHAR, true, 1000);

		$tMap->addColumn('MONDES', 'Mondes', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('MONRET', 'Monret', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('NUMCHE', 'Numche', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('CTABAN', 'Ctaban', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('CTAPAG', 'Ctapag', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('NUMCOM', 'Numcom', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('STATUS', 'Status', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('CODUNI', 'Coduni', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('FECENVCON', 'Fecenvcon', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('FECENVFIN', 'Fecenvfin', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('CTAPAGFIN', 'Ctapagfin', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('NOMBENSUS', 'Nombensus', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('FECANU', 'Fecanu', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('FECRECFIN', 'Fecrecfin', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('ANOPRE', 'Anopre', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('FECPAG', 'Fecpag', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('MONPAG', 'Monpag', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('OBSORD', 'Obsord', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('NUMTIQ', 'Numtiq', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('PERAUT', 'Peraut', 'string', CreoleTypes::VARCHAR, false, 500);

		$tMap->addColumn('DESANU', 'Desanu', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('CEDAUT', 'Cedaut', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('NOMPER1', 'Nomper1', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('NOMPER2', 'Nomper2', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('HORCON', 'Horcon', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('FECCON', 'Feccon', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('NOMCAT', 'Nomcat', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 