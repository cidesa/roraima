<?php



class FaciudadMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FaciudadMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('faciudad');
		$tMap->setPhpName('Faciudad');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('faciudad_SEQ');

		$tMap->addForeignKey('FAESTADO_ID', 'FaestadoId', 'int', CreoleTypes::INTEGER, 'faestado', 'ID', false, null);

		$tMap->addColumn('NOMCIU', 'Nomciu', 'string', CreoleTypes::VARCHAR, true, 30);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 