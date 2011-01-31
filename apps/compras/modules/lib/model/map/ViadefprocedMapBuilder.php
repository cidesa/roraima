<?php



class ViadefprocedMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ViadefprocedMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('viadefproced');
		$tMap->setPhpName('Viadefproced');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('viadefproced_SEQ');

		$tMap->addColumn('CODPROCED', 'Codproced', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('DESPROCED', 'Desproced', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('APROBACION', 'Aprobacion', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CODNIVAPR', 'Codnivapr', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('PRIORIAPR', 'Prioriapr', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 