<?php



class NpjuzgadosMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpjuzgadosMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npjuzgados');
		$tMap->setPhpName('Npjuzgados');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npjuzgados_SEQ');

		$tMap->addColumn('CODJUZ', 'Codjuz', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESJUZ', 'Desjuz', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('PERCONJUZ', 'Perconjuz', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('CARPERJUZ', 'Carperjuz', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('DIRJUZ', 'Dirjuz', 'string', CreoleTypes::VARCHAR, true, 200);

		$tMap->addColumn('TELJUZ', 'Teljuz', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 