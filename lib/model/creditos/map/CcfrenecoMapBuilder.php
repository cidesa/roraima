<?php



class CcfrenecoMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcfrenecoMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccfreneco');
		$tMap->setPhpName('Ccfreneco');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccfreneco_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NOMFRE', 'Nomfre', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('DESFRE', 'Desfre', 'string', CreoleTypes::VARCHAR, false, null);

	} 
} 