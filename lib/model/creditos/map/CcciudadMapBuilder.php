<?php



class CcciudadMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcciudadMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccciudad');
		$tMap->setPhpName('Ccciudad');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccciudad_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NOMCIU', 'Nomciu', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addForeignKey('CCESTADO_ID', 'CcestadoId', 'int', CreoleTypes::INTEGER, 'ccestado', 'ID', true, null);

		$tMap->addForeignKey('CCREGION_ID', 'CcregionId', 'int', CreoleTypes::INTEGER, 'ccregion', 'ID', true, null);

	} 
} 