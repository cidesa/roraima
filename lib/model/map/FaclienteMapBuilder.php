<?php



class FaclienteMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FaclienteMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('facliente');
		$tMap->setPhpName('Facliente');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('facliente_SEQ');

		$tMap->addColumn('CODPRO', 'Codpro', 'string', CreoleTypes::VARCHAR, true, 15);

		$tMap->addColumn('NOMPRO', 'Nompro', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addColumn('RIFPRO', 'Rifpro', 'string', CreoleTypes::VARCHAR, true, 15);

		$tMap->addColumn('NITPRO', 'Nitpro', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('DIRPRO', 'Dirpro', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('TELPRO', 'Telpro', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('FAXPRO', 'Faxpro', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('EMAIL', 'Email', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('LIMCRE', 'Limcre', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CODCTA', 'Codcta', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('REGMER', 'Regmer', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('FECREG', 'Fecreg', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('TOMREG', 'Tomreg', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('FOLREG', 'Folreg', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('CAPSUS', 'Capsus', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CAPPAG', 'Cappag', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('RIFREPLEG', 'Rifrepleg', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('NOMREPLEG', 'Nomrepleg', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('DIRREPLEG', 'Dirrepleg', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('NROCEI', 'Nrocei', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('CODRAM', 'Codram', 'string', CreoleTypes::VARCHAR, false, 6);

		$tMap->addColumn('FECINSCIR', 'Fecinscir', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('NUMINSCIR', 'Numinscir', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('NACPRO', 'Nacpro', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CODORD', 'Codord', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CODPERCON', 'Codpercon', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CODTIPREC', 'Codtiprec', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODORDADI', 'Codordadi', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CODPERCONADI', 'Codperconadi', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('TIPO', 'Tipo', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('FECVEN', 'Fecven', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('CIUDAD', 'Ciudad', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('CODORDMERCON', 'Codordmercon', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CODPERMERCON', 'Codpermercon', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CODORDCONTRA', 'Codordcontra', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CODPERCONTRA', 'Codpercontra', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('TEMCODPRO', 'Temcodpro', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('TEMRIFPRO', 'Temrifpro', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('CODCTASEC', 'Codctasec', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CODTIPEMP', 'Codtipemp', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('TIPPER', 'Tipper', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('PAGWEB', 'Pagweb', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('TELREPLEG', 'Telrepleg', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('CORREPLEG', 'Correpleg', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('RIFPERCON', 'Rifpercon', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('NOMPERCON', 'Nompercon', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('DIRPERCON', 'Dirpercon', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('TELPERCON', 'Telpercon', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('CORPERCON', 'Corpercon', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addForeignKey('FATIPCTE_ID', 'FatipcteId', 'int', CreoleTypes::INTEGER, 'fatipcte', 'ID', false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 