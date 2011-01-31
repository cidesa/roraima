<?php



class AtdetestMapBuilder {

	
	const CLASS_NAME = 'lib.model.ciudadanos.map.AtdetestMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('atdetest');
		$tMap->setPhpName('Atdetest');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('atdetest_SEQ');

		$tMap->addForeignKey('ATAYUDAS_ID', 'AtayudasId', 'int', CreoleTypes::INTEGER, 'atayudas', 'ID', false, null);

		$tMap->addForeignKey('ATESTAYU_DESDE', 'AtestayuDesde', 'int', CreoleTypes::INTEGER, 'atestayu', 'ID', false, null);

		$tMap->addForeignKey('ATESTAYU_HASTA', 'AtestayuHasta', 'int', CreoleTypes::INTEGER, 'atestayu', 'ID', false, null);

		$tMap->addColumn('USUARIO', 'Usuario', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 