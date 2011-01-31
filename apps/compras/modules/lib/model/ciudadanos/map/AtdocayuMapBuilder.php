<?php



class AtdocayuMapBuilder {

	
	const CLASS_NAME = 'lib.model.ciudadanos.map.AtdocayuMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('atdocayu');
		$tMap->setPhpName('Atdocayu');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('atdocayu_SEQ');

		$tMap->addForeignKey('ATAYUDAS_ID', 'AtayudasId', 'int', CreoleTypes::INTEGER, 'atayudas', 'ID', false, null);

		$tMap->addColumn('IMAGE', 'Image', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('DESIMG', 'Desimg', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 