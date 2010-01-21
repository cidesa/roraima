<?php



class CcestcredMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcestcredMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccestcred');
		$tMap->setPhpName('Ccestcred');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccestcred_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('FECHA', 'Fecha', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('MEMO', 'Memo', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addForeignKey('CCESTATU_ID', 'CcestatuId', 'int', CreoleTypes::INTEGER, 'ccestatu', 'ID', true, null);

		$tMap->addForeignKey('CCSOLICI_ID', 'CcsoliciId', 'int', CreoleTypes::INTEGER, 'ccsolici', 'ID', true, null);

		$tMap->addForeignKey('CCUSUINT_ID', 'CcusuintId', 'int', CreoleTypes::INTEGER, 'ccusuint', 'ID', true, null);

		$tMap->addForeignKey('CCGERENCORI_ID', 'CcgerencoriId', 'int', CreoleTypes::INTEGER, 'ccgerenc', 'ID', true, null);

		$tMap->addForeignKey('CCGERENCDES_ID', 'CcgerencdesId', 'int', CreoleTypes::INTEGER, 'ccgerenc', 'ID', true, null);

		$tMap->addForeignKey('CCESTSIG_ID', 'CcestsigId', 'int', CreoleTypes::INTEGER, 'ccestatu', 'ID', false, null);

	} 
} 