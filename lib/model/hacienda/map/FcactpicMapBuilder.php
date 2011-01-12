<?php



class FcactpicMapBuilder {

	
	const CLASS_NAME = 'lib.model.hacienda.map.FcactpicMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fcactpic');
		$tMap->setPhpName('Fcactpic');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fcactpic_SEQ');

		$tMap->addColumn('NUMDOC', 'Numdoc', 'string', CreoleTypes::VARCHAR, false, 12);

		$tMap->addColumn('CODACT', 'Codact', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('EXONER', 'Exoner', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('MONACT', 'Monact', 'double', CreoleTypes::NUMERIC, false, 32);

		$tMap->addColumn('POREXO', 'Porexo', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('ESTACT', 'Estact', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('EXENTO', 'Exento', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('REBAJA', 'Rebaja', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('PORREB', 'Porreb', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONANT', 'Monant', 'double', CreoleTypes::NUMERIC, false, 32);

		$tMap->addColumn('IMPUESTO', 'Impuesto', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('FECVEN', 'Fecven', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('ANODEC', 'Anodec', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('MODO', 'Modo', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('MONREB', 'Monreb', 'double', CreoleTypes::NUMERIC, false, 32);

		$tMap->addColumn('MONEXO', 'Monexo', 'double', CreoleTypes::NUMERIC, false, 32);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 