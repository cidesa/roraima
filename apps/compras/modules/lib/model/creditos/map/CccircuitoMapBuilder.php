<?php



class CccircuitoMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CccircuitoMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cccircuito');
		$tMap->setPhpName('Cccircuito');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cccircuito_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NOMCIRCUITO', 'Nomcircuito', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('DESCIRCUITO', 'Descircuito', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addForeignKey('CCESTADO_ID', 'CcestadoId', 'int', CreoleTypes::INTEGER, 'ccestado', 'ID', true, null);

	} 
} 