<?php



class OpordpagMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.OpordpagMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('opordpag');
		$tMap->setPhpName('Opordpag');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('opordpag_SEQ');

		$tMap->addColumn('NUMORD', 'Numord', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('TIPCAU', 'Tipcau', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('FECEMI', 'Fecemi', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('CEDRIF', 'Cedrif', 'string', CreoleTypes::VARCHAR, true, 15);

		$tMap->addColumn('NOMBEN', 'Nomben', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addColumn('MONORD', 'Monord', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addColumn('DESORD', 'Desord', 'string', CreoleTypes::VARCHAR, true, 1000);

		$tMap->addColumn('MONDES', 'Mondes', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONRET', 'Monret', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('NUMCHE', 'Numche', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('CTABAN', 'Ctaban', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('CTAPAG', 'Ctapag', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('NUMCOM', 'Numcom', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('STATUS', 'Status', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('CODUNI', 'Coduni', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('FECENVCON', 'Fecenvcon', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECENVFIN', 'Fecenvfin', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('CTAPAGFIN', 'Ctapagfin', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('OBSORD', 'Obsord', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('FECVEN', 'Fecven', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECANU', 'Fecanu', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('DESANU', 'Desanu', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('MONPAG', 'Monpag', 'double', CreoleTypes::NUMERIC, false, 16);

		$tMap->addColumn('APROBA', 'Aproba', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('NOMBENSUS', 'Nombensus', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('FECRECFIN', 'Fecrecfin', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('ANOPRE', 'Anopre', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('FECPAG', 'Fecpag', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('NUMTIQ', 'Numtiq', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('PERAUT', 'Peraut', 'string', CreoleTypes::VARCHAR, false, 500);

		$tMap->addColumn('CEDAUT', 'Cedaut', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('NOMPER2', 'Nomper2', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('NOMPER1', 'Nomper1', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('HORCON', 'Horcon', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('FECCON', 'Feccon', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('NOMCAT', 'Nomcat', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('NUMFAC', 'Numfac', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('NUMCONFAC', 'Numconfac', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('NUMCORFAC', 'Numcorfac', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('FECHAFAC', 'Fechafac', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECFAC', 'Fecfac', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('TIPFIN', 'Tipfin', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('COMRET', 'Comret', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('FECCOMRET', 'Feccomret', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('COMRETISLR', 'Comretislr', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('FECCOMRETISLR', 'Feccomretislr', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('COMRETLTF', 'Comretltf', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('FECCOMRETLTF', 'Feccomretltf', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('NUMSIGECOF', 'Numsigecof', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('FECSIGECOF', 'Fecsigecof', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('EXPSIGECOF', 'Expsigecof', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 