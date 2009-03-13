<?php



class AtmunicipiosMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.AtmunicipiosMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('atmunicipios');
		$tMap->setPhpName('Atmunicipios');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('atmunicipios_SEQ');

		$tMap->addForeignKey('ATESTADOS_ID', 'AtestadosId', 'int', CreoleTypes::INTEGER, 'atestados', 'ID', false, null);

		$tMap->addColumn('DESMUN', 'Desmun', 'string', CreoleTypes::VARCHAR, true, 30);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 