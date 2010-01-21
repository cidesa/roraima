<?php



class CcinformMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcinformMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccinform');
		$tMap->setPhpName('Ccinform');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccinform_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('TITULO', 'Titulo', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('CONTEN', 'Conten', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('FECREC', 'Fecrec', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECENT', 'Fecent', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECCUL', 'Feccul', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('PUNTUACION', 'Puntuacion', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addForeignKey('CCGERENC_ID', 'CcgerencId', 'int', CreoleTypes::INTEGER, 'ccgerenc', 'ID', true, null);

		$tMap->addForeignKey('CCANALIS_ID', 'CcanalisId', 'int', CreoleTypes::INTEGER, 'ccanalis', 'ID', true, null);

		$tMap->addForeignKey('CCCLAINF_ID', 'CcclainfId', 'int', CreoleTypes::INTEGER, 'ccclainf', 'ID', true, null);

		$tMap->addForeignKey('CCSOLICI_ID', 'CcsoliciId', 'int', CreoleTypes::INTEGER, 'ccsolici', 'ID', true, null);

		$tMap->addForeignKey('CCRESBAR_ID', 'CcresbarId', 'int', CreoleTypes::INTEGER, 'ccgerenc', 'ID', false, null);

	} 
} 