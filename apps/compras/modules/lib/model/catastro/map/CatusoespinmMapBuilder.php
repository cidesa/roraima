<?php



class CatusoespinmMapBuilder {

	
	const CLASS_NAME = 'lib.model.catastro.map.CatusoespinmMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('catusoespinm');
		$tMap->setPhpName('Catusoespinm');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('catusoespinm_SEQ');

		$tMap->addForeignKey('CATREGINM_ID', 'CatreginmId', 'int', CreoleTypes::INTEGER, 'catreginm', 'ID', false, null);

		$tMap->addForeignKey('CATUSOESP_ID', 'CatusoespId', 'int', CreoleTypes::INTEGER, 'catusoesp', 'ID', false, null);

		$tMap->addColumn('TIPO', 'Tipo', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('VALOR', 'Valor', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 