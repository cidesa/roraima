<?php



class LiempofeMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.LiempofeMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('liempofe');
		$tMap->setPhpName('Liempofe');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('liempofe_SEQ');

		$tMap->addForeignKey('LIREGLIC_ID', 'LireglicId', 'int', CreoleTypes::INTEGER, 'lireglic', 'ID', true, null);

		$tMap->addColumn('CODLIC', 'Codlic', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('CODPRO', 'Codpro', 'string', CreoleTypes::VARCHAR, true, 15);

		$tMap->addColumn('FECINS', 'Fecins', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('PRECAL', 'Precal', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('MONTOT', 'Montot', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addColumn('OBSERVACIONES', 'Observaciones', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 