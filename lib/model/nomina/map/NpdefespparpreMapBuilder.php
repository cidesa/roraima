<?php



class NpdefespparpreMapBuilder {


	const CLASS_NAME = 'lib.model.nomina.map.NpdefespparpreMapBuilder';


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

		$tMap = $this->dbMap->addTable('npdefespparpre');
		$tMap->setPhpName('Npdefespparpre');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npdefespparpre_SEQ');

		$tMap->addColumn('CODNOM', 'Codnom', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('NUMDIAMES', 'Numdiames', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NUMDIAMAXANO', 'Numdiamaxano', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('TIPSALAJUNODEP', 'Tipsalajunodep', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('TIPSALBONFINANOFRA', 'Tipsalbonfinanofra', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('FACTORBONFINANOFRA', 'Factorbonfinanofra', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('TIPSALBONVACFRA', 'Tipsalbonvacfra', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('FACTORBONVACFRA', 'Factorbonvacfra', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('TIPSALVACVEN', 'Tipsalvacven', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('FACTORVACVEN', 'Factorvacven', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('DESCRIPCLAU', 'Descripclau', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('CODRET', 'Codret', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('NUMDIAANT', 'Numdiaant', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('PORANOANT', 'Poranoant', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('TIPSALDIAANT', 'Tipsaldiaant', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('CODPAR', 'Codpar', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('AGUICOM', 'Aguicom', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('APARTIRMES', 'Apartirmes', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	}
}