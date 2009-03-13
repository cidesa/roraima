<?php



class InmunicipioMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.InmunicipioMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('inmunicipio');
		$tMap->setPhpName('Inmunicipio');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('inmunicipio_SEQ');

		$tMap->addForeignKey('INESTADO_ID', 'InestadoId', 'int', CreoleTypes::INTEGER, 'inestado', 'ID', false, null);

		$tMap->addColumn('CODMUN', 'Codmun', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('NOMMUN', 'Nommun', 'string', CreoleTypes::VARCHAR, true, 30);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 