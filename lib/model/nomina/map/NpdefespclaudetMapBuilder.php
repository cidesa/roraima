<?php



class NpdefespclaudetMapBuilder {


	const CLASS_NAME = 'lib.model.nomina.map.NpdefespclaudetMapBuilder';


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

		$tMap = $this->dbMap->addTable('npdefespclaudet');
		$tMap->setPhpName('Npdefespclaudet');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npdefespclaudet_SEQ');

		$tMap->addColumn('CODNOM', 'Codnom', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('DESCRIPCLAU', 'Descripclau', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('CODPAR', 'Codpar', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CODRET', 'Codret', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('TOTRET', 'Totret', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('NUMDIAANT', 'Numdiaant', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('PORANOANT', 'Poranoant', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('APARTIRMES', 'Apartirmes', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('PORMESANT', 'Pormesant', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('TIPSALDIAANT', 'Tipsaldiaant', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('ADMPUB', 'Admpub', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	}
}