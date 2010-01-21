<?php



class CccreusuMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CccreusuMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cccreusu');
		$tMap->setPhpName('Cccreusu');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cccreusu_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addForeignKey('CCUSUARIO_ID', 'CcusuarioId', 'int', CreoleTypes::INTEGER, 'ccusuario', 'ID', true, null);

		$tMap->addForeignKey('CCCREDEN_ID', 'CccredenId', 'int', CreoleTypes::INTEGER, 'cccreden', 'ID', true, null);

	} 
} 