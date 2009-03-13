<?php



class FcabonosMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FcabonosMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fcabonos');
		$tMap->setPhpName('Fcabonos');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fcabonos_SEQ');

		$tMap->addColumn('NUMPAG', 'Numpag', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('FECPAG', 'Fecpag', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('RIFCON', 'Rifcon', 'string', CreoleTypes::VARCHAR, true, 14);

		$tMap->addColumn('FUEING', 'Fueing', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('DESPAG', 'Despag', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('MONPAG', 'Monpag', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONEFE', 'Monefe', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('FUNPAG', 'Funpag', 'string', CreoleTypes::VARCHAR, true, 40);

		$tMap->addColumn('CODREC', 'Codrec', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('SALPAG', 'Salpag', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('STAPAG', 'Stapag', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('FECREC', 'Fecrec', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('NUMPAG2', 'Numpag2', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('NUMREF', 'Numref', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 