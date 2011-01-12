<?php



class FcretencionMapBuilder {

	
	const CLASS_NAME = 'lib.model.hacienda.map.FcretencionMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fcretencion');
		$tMap->setPhpName('Fcretencion');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fcretencion_SEQ');

		$tMap->addColumn('NUMRET', 'Numret', 'string', CreoleTypes::VARCHAR, true, 15);

		$tMap->addColumn('FUEING', 'Fueing', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('FECRET', 'Fecret', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECREG', 'Fecreg', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('MONRET', 'Monret', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('NUMREL', 'Numrel', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('DESRET', 'Desret', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('MONSAL', 'Monsal', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 