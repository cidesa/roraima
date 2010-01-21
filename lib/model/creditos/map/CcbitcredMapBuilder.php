<?php



class CcbitcredMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcbitcredMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccbitcred');
		$tMap->setPhpName('Ccbitcred');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccbitcred_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('FECVIG', 'Fecvig', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECVEN', 'Fecven', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('NOMESTATU', 'Nomestatu', 'string', CreoleTypes::VARCHAR, false, 150);

		$tMap->addColumn('NOMGERENC', 'Nomgerenc', 'string', CreoleTypes::VARCHAR, false, 150);

		$tMap->addForeignKey('CCESTATU_ID', 'CcestatuId', 'int', CreoleTypes::INTEGER, 'ccestatu', 'ID', true, null);

		$tMap->addForeignKey('CCCREDIT_ID', 'CccreditId', 'int', CreoleTypes::INTEGER, 'cccredit', 'ID', true, null);

		$tMap->addForeignKey('CCUSUARIO_ID', 'CcusuarioId', 'int', CreoleTypes::INTEGER, 'ccusuario', 'ID', true, null);

	} 
} 