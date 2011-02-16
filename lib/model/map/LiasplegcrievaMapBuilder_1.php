<?php



class LiasplegcrievaMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.LiasplegcrievaMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('liasplegcrieva');
		$tMap->setPhpName('Liasplegcrieva');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('liasplegcrieva_SEQ');

		$tMap->addForeignKey('LIREGLIC_ID', 'LireglicId', 'int', CreoleTypes::INTEGER, 'lireglic', 'ID', true, null);

		$tMap->addColumn('CODLIC', 'Codlic', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('CODPRO', 'Codpro', 'string', CreoleTypes::VARCHAR, true, 15);

		$tMap->addForeignKey('LIRECAUD_ID', 'LirecaudId', 'int', CreoleTypes::INTEGER, 'lirecaud', 'ID', true, null);

		$tMap->addColumn('PUNTAJE', 'Puntaje', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 