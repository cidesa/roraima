<?php



class CasolartMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CasolartMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('casolart');
		$tMap->setPhpName('Casolart');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('casolart_SEQ');

		$tMap->addColumn('REQART', 'Reqart', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('FECREQ', 'Fecreq', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('DESREQ', 'Desreq', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('MONREQ', 'Monreq', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('STAREQ', 'Stareq', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('MOTREQ', 'Motreq', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('BENREQ', 'Benreq', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('MONDES', 'Mondes', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('OBSREQ', 'Obsreq', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('UNIRES', 'Unires', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addForeignKey('TIPMON', 'Tipmon', 'string', CreoleTypes::VARCHAR, 'tsdesmon', 'CODMON', true, 3);

		$tMap->addColumn('VALMON', 'Valmon', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('FECANU', 'Fecanu', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('CODPRO', 'Codpro', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('REQCOM', 'Reqcom', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('TIPFIN', 'Tipfin', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('TIPREQ', 'Tipreq', 'string', CreoleTypes::CHAR, false, 1);

		$tMap->addColumn('APRREQ', 'Aprreq', 'string', CreoleTypes::CHAR, false, 1);

		$tMap->addColumn('USUAPR', 'Usuapr', 'string', CreoleTypes::CHAR, false, 1);

		$tMap->addColumn('FECAPR', 'Fecapr', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 