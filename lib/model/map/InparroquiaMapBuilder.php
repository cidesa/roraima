<?php



class InparroquiaMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.InparroquiaMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('inparroquia');
		$tMap->setPhpName('Inparroquia');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('inparroquia_SEQ');

		$tMap->addForeignKey('INESTADO_ID', 'InestadoId', 'int', CreoleTypes::INTEGER, 'inestado', 'ID', false, null);

		$tMap->addForeignKey('INMUNICIPIO_ID', 'InmunicipioId', 'int', CreoleTypes::INTEGER, 'inmunicipio', 'ID', false, null);

		$tMap->addColumn('CODPAR', 'Codpar', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('NOMPAR', 'Nompar', 'string', CreoleTypes::VARCHAR, true, 30);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 