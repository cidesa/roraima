<?php



class CcresusuMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcresusuMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccresusu');
		$tMap->setPhpName('Ccresusu');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccresusu_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('RESPUE', 'Respue', 'string', CreoleTypes::VARCHAR, false, 150);

		$tMap->addForeignKey('CCPREGUN_ID', 'CcpregunId', 'int', CreoleTypes::INTEGER, 'ccpregun', 'ID', true, null);

		$tMap->addForeignKey('CCUSUARIO_ID', 'CcusuarioId', 'int', CreoleTypes::INTEGER, 'ccusuario', 'ID', true, null);

	} 
} 