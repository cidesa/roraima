<?php



class AtdetayuMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.AtdetayuMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('atdetayu');
		$tMap->setPhpName('Atdetayu');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('atdetayu_SEQ');

		$tMap->addForeignKey('ATAYUDAS_ID', 'AtayudasId', 'int', CreoleTypes::INTEGER, 'atayudas', 'ID', false, null);

		$tMap->addForeignKey('ATDONACIONES_ID', 'AtdonacionesId', 'int', CreoleTypes::INTEGER, 'atdonaciones', 'ID', false, null);

		$tMap->addColumn('CANTIDAD', 'Cantidad', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('CANAPR', 'Canapr', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('APROBADO', 'Aprobado', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('PRECIO', 'Precio', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('UNIDAD', 'Unidad', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 