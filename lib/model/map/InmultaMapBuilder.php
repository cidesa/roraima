<?php



class InmultaMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.InmultaMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('inmulta');
		$tMap->setPhpName('Inmulta');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('inmulta_SEQ');

		$tMap->addForeignKey('INSANCION_ID', 'InsancionId', 'int', CreoleTypes::INTEGER, 'insancion', 'ID', false, null);

		$tMap->addColumn('CODMUL', 'Codmul', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESMUL', 'Desmul', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addColumn('UNITRI', 'Unitri', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 