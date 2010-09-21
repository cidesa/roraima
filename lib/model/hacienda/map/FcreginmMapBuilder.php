<?php



class FcreginmMapBuilder {

	
	const CLASS_NAME = 'lib.model.hacienda.map.FcreginmMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fcreginm');
		$tMap->setPhpName('Fcreginm');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fcreginm_SEQ');

		$tMap->addColumn('NROINM', 'Nroinm', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('CODCATFIS', 'Codcatfis', 'string', CreoleTypes::VARCHAR, true, 30);

		$tMap->addColumn('CODUSO', 'Coduso', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('CODCARINM', 'Codcarinm', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('CODSITINM', 'Codsitinm', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('RIFCON', 'Rifcon', 'string', CreoleTypes::VARCHAR, false, 14);

		$tMap->addColumn('FECPAG', 'Fecpag', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECCAL', 'Feccal', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECREG', 'Fecreg', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('DIRINM', 'Dirinm', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('LINNOR', 'Linnor', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('LINSUR', 'Linsur', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('LINEST', 'Linest', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('LINOES', 'Linoes', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('MTRTER', 'Mtrter', 'double', CreoleTypes::NUMERIC, false, 20);

		$tMap->addColumn('MTRCON', 'Mtrcon', 'double', CreoleTypes::NUMERIC, false, 20);

		$tMap->addColumn('BSTER', 'Bster', 'double', CreoleTypes::NUMERIC, false, 20);

		$tMap->addColumn('BSCON', 'Bscon', 'double', CreoleTypes::NUMERIC, false, 20);

		$tMap->addColumn('RIFREP', 'Rifrep', 'string', CreoleTypes::VARCHAR, false, 14);

		$tMap->addColumn('FUNREC', 'Funrec', 'string', CreoleTypes::VARCHAR, false, 40);

		$tMap->addColumn('FECREC', 'Fecrec', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('ESTINM', 'Estinm', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('ESTDEC', 'Estdec', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CODCATINM', 'Codcatinm', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('NOMCON', 'Nomcon', 'string', CreoleTypes::VARCHAR, false, 120);

		$tMap->addColumn('DIRCON', 'Dircon', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('VALINM', 'Valinm', 'double', CreoleTypes::NUMERIC, false, 20);

		$tMap->addColumn('FOLIO', 'Folio', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('TOMO', 'Tomo', 'string', CreoleTypes::VARCHAR, false, 5);

		$tMap->addColumn('NUMDOC', 'Numdoc', 'string', CreoleTypes::VARCHAR, false, 12);

		$tMap->addColumn('FECDOC', 'Fecdoc', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('USOINM', 'Usoinm', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('AVEINM', 'Aveinm', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('NROCIV', 'Nrociv', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('URBINM', 'Urbinm', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('TIPOPE', 'Tipope', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('PRODOC', 'Prodoc', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('TRIDOC', 'Tridoc', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('AREDOC', 'Aredoc', 'double', CreoleTypes::NUMERIC, false, 32);

		$tMap->addColumn('LINNORDOC', 'Linnordoc', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('LINSURDOC', 'Linsurdoc', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('LINESTDOC', 'Linestdoc', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('LINOESDOC', 'Linoesdoc', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 