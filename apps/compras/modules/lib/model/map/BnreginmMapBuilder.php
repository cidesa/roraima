<?php



class BnreginmMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.BnreginmMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('bnreginm');
		$tMap->setPhpName('Bnreginm');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('bnreginm_SEQ');

		$tMap->addColumn('CODACT', 'Codact', 'string', CreoleTypes::VARCHAR, true, 30);

		$tMap->addColumn('CODINM', 'Codinm', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('DESINM', 'Desinm', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('CODPRO', 'Codpro', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('ORDCOM', 'Ordcom', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('FECREG', 'Fecreg', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECCOM', 'Feccom', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECDEP', 'Fecdep', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECAJU', 'Fecaju', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECACT', 'Fecact', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECEXP', 'Fecexp', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('ORDRCP', 'Ordrcp', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('FOTINM', 'Fotinm', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('DENINM', 'Deninm', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('NROEXP', 'Nroexp', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('DETINM', 'Detinm', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('CODUBI', 'Codubi', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('AVAACT', 'Avaact', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CLAFUN', 'Clafun', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('AVACOM', 'Avacom', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('EDOLEG', 'Edoleg', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('VIDUTI', 'Viduti', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('OBSINM', 'Obsinm', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('LINNOR', 'Linnor', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('LINSUR', 'Linsur', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('LINEST', 'Linest', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('LINOES', 'Linoes', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('ARETER', 'Areter', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('ARECUB', 'Arecub', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('ARECON', 'Arecon', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('AREOTR', 'Areotr', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('ARETOT', 'Aretot', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('EDOINM', 'Edoinm', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('MUNINM', 'Muninm', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('DEPINM', 'Depinm', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('DIRINM', 'Dirinm', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('MESDEP', 'Mesdep', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('VALINI', 'Valini', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('VALRES', 'Valres', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('VALLIB', 'Vallib', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('VALREX', 'Valrex', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('COSREP', 'Cosrep', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('DEPMEN', 'Depmen', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('DEPACU', 'Depacu', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('STAINM', 'Stainm', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CODALT', 'Codalt', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('CODDIS', 'Coddis', 'string', CreoleTypes::VARCHAR, false, 25);

		$tMap->addColumn('VALADIS', 'Valadis', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('NUMREG', 'Numreg', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('NUMFOL', 'Numfol', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('FECREGINM', 'Fecreginm', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('OFIREG', 'Ofireg', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('PROTOCOLO', 'Protocolo', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('TOMO', 'Tomo', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('TRIMESTRE', 'Trimestre', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('NUMORD', 'Numord', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 
