<?php



class InventarioMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.InventarioMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('inventario');
		$tMap->setPhpName('Inventario');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('inventario_SEQ');

		$tMap->addColumn('CODART', 'Codart', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('DESCRI', 'Descri', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('COSPRO', 'Cospro', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('UNIMED', 'Unimed', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('CONTEO1', 'Conteo1', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CONTEO2', 'Conteo2', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('DIFE', 'Dife', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 