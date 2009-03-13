<?php



class InciudadMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.InciudadMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('inciudad');
		$tMap->setPhpName('Inciudad');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('inciudad_SEQ');

		$tMap->addForeignKey('INPAIS_ID', 'InpaisId', 'int', CreoleTypes::INTEGER, 'inpais', 'ID', false, null);

		$tMap->addForeignKey('INESTADO_ID', 'InestadoId', 'int', CreoleTypes::INTEGER, 'inestado', 'ID', false, null);

		$tMap->addColumn('CODCIU', 'Codciu', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('NOMCIU', 'Nomciu', 'string', CreoleTypes::VARCHAR, true, 30);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 