<?php



class AplicacionMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.AplicacionMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap('sima_user');

		$tMap = $this->dbMap->addTable('aplicacion');
		$tMap->setPhpName('Aplicacion');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('aplicacion_SEQ');

		$tMap->addColumn('CODAPL', 'Codapl', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('NOMAPL', 'Nomapl', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('NOMUSE', 'Nomuse', 'string', CreoleTypes::VARCHAR, true, 30);

		$tMap->addColumn('APLACT', 'Aplact', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('APLPRI', 'Aplpri', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('NOMYML', 'Nomyml', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 