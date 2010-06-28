<?php



class CaordcomMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CaordcomMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('caordcom');
		$tMap->setPhpName('Caordcom');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('caordcom_SEQ');

		$tMap->addColumn('ORDCOM', 'Ordcom', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('FECORD', 'Fecord', 'int', CreoleTypes::DATE, true, null);

		$tMap->addForeignKey('CODPRO', 'Codpro', 'string', CreoleTypes::VARCHAR, 'caprovee', 'CODPRO', true, 15);

		$tMap->addColumn('DESORD', 'Desord', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('CRECON', 'Crecon', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('PLAENT', 'Plaent', 'string', CreoleTypes::VARCHAR, false, 25);

		$tMap->addColumn('TIECAN', 'Tiecan', 'string', CreoleTypes::VARCHAR, false, 25);

		$tMap->addColumn('MONORD', 'Monord', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('DTOORD', 'Dtoord', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('REFCOM', 'Refcom', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('STAORD', 'Staord', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('AFEPRE', 'Afepre', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addForeignKey('CONPAG', 'Conpag', 'string', CreoleTypes::VARCHAR, 'caconpag', 'CODCONPAG', true, 1000);

		$tMap->addForeignKey('FORENT', 'Forent', 'string', CreoleTypes::VARCHAR, 'caforent', 'CODFORENT', true, 1000);

		$tMap->addColumn('FECANU', 'Fecanu', 'int', CreoleTypes::DATE, false, null);

		$tMap->addForeignKey('TIPMON', 'Tipmon', 'string', CreoleTypes::VARCHAR, 'tsdesmon', 'CODMON', true, 3);

		$tMap->addColumn('VALMON', 'Valmon', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('TIPCOM', 'Tipcom', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('TIPORD', 'Tipord', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('TIPO', 'Tipo', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CODUNI', 'Coduni', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('NOTORD', 'Notord', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('TIPDOC', 'Tipdoc', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('TIPPRO', 'Tippro', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('AFEPRO', 'Afepro', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('DOCCOM', 'Doccom', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('REFSOL', 'Refsol', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('TIPFIN', 'Tipfin', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('JUSTIF', 'Justif', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('REFPRC', 'Refprc', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CODMEDCOM', 'Codmedcom', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODPROCOM', 'Codprocom', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODPAI', 'Codpai', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODEDO', 'Codedo', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODMUN', 'Codmun', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('APLART', 'Aplart', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('APLART6', 'Aplart6', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('NUMSIGECOF', 'Numsigecof', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('FECSIGECOF', 'Fecsigecof', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('EXPSIGECOF', 'Expsigecof', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('CODCEN', 'Codcen', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('TIPOCOM', 'Tipocom', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('CEDDON', 'Ceddon', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('NOMDON', 'Nomdon', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('FECDON', 'Fecdon', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('SEXDON', 'Sexdon', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('EDADON', 'Edadon', 'double', CreoleTypes::NUMERIC, false, 2);

		$tMap->addColumn('SERDON', 'Serdon', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('MOTANU', 'Motanu', 'string', CreoleTypes::VARCHAR, false, 500);

		$tMap->addColumn('USUANU', 'Usuanu', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 
