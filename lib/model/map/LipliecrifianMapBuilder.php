<?php



class LipliecrifianMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.LipliecrifianMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('lipliecrifian');
		$tMap->setPhpName('Lipliecrifian');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('lipliecrifian_SEQ');

		$tMap->addColumn('NUMPLIE', 'Numplie', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('NUMEXP', 'Numexp', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('CODCOMRES', 'Codcomres', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('PUNTUA', 'Puntua', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('PORCEN', 'Porcen', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('EMPRESA', 'Empresa', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('FECEMI', 'Fecemi', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECVEN', 'Fecven', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('LIMIT', 'Limit', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 