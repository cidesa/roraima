<?php



class NphojintMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NphojintMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('nphojint');
		$tMap->setPhpName('Nphojint');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('nphojint_SEQ');

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('RIFEMP', 'Rifemp', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('NOMEMP', 'Nomemp', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('CEDEMP', 'Cedemp', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('NUMCON', 'Numcon', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('EDOCIV', 'Edociv', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('NACEMP', 'Nacemp', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('SEXEMP', 'Sexemp', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('FECNAC', 'Fecnac', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('EDAEMP', 'Edaemp', 'double', CreoleTypes::NUMERIC, false, 2);

		$tMap->addColumn('LUGNAC', 'Lugnac', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('DIRHAB', 'Dirhab', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('CODCIU', 'Codciu', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('TELHAB', 'Telhab', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('CELEMP', 'Celemp', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('EMAEMP', 'Emaemp', 'string', CreoleTypes::VARCHAR, false, 40);

		$tMap->addColumn('CODPOS', 'Codpos', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('TALPAN', 'Talpan', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('TALCAM', 'Talcam', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('TALCAL', 'Talcal', 'double', CreoleTypes::NUMERIC, false, 2);

		$tMap->addColumn('DERZUR', 'Derzur', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('FECING', 'Fecing', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECRET', 'Fecret', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECREI', 'Fecrei', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECADMPUB', 'Fecadmpub', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('STAEMP', 'Staemp', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('FOTEMP', 'Fotemp', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('NUMSSO', 'Numsso', 'string', CreoleTypes::VARCHAR, false, 31);

		$tMap->addColumn('NUMPOLSEG', 'Numpolseg', 'string', CreoleTypes::VARCHAR, false, 31);

		$tMap->addColumn('FECCOTSSO', 'Feccotsso', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('ANOADMPUB', 'Anoadmpub', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CODTIPPAG', 'Codtippag', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('CODBAN', 'Codban', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('TIPCUE', 'Tipcue', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('NUMCUE', 'Numcue', 'string', CreoleTypes::VARCHAR, false, 31);

		$tMap->addColumn('OBSEMP', 'Obsemp', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('TIEFID', 'Tiefid', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('GRULAB', 'Grulab', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('GRUOTR', 'Gruotr', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('TRASLADO', 'Traslado', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('TRAOTR', 'Traotr', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('TIPVIV', 'Tipviv', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('VIVOTR', 'Vivotr', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('FORTEN', 'Forten', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('TENOTR', 'Tenotr', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('SERCON', 'Sercon', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('DIROTR', 'Dirotr', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('TELOTR', 'Telotr', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('CODPAI', 'Codpai', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODPA2', 'Codpa2', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODEST', 'Codest', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODES2', 'Codes2', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODCI2', 'Codci2', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODRAC', 'Codrac', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('CODNIV', 'Codniv', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('TELHA2', 'Telha2', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('TELOT2', 'Telot2', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('CODPROFES', 'Codprofes', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('HCMEXO', 'Hcmexo', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CODBANFID', 'Codbanfid', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('CODBANLPH', 'Codbanlph', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('NUMCUEFID', 'Numcuefid', 'string', CreoleTypes::VARCHAR, false, 31);

		$tMap->addColumn('NUMCUELPH', 'Numcuelph', 'string', CreoleTypes::VARCHAR, false, 31);

		$tMap->addColumn('CODEMPANT', 'Codempant', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('GRUSAN', 'Grusan', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('OBSGEN', 'Obsgen', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('CODREGPAI', 'Codregpai', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODREGEST', 'Codregest', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODREGCIU', 'Codregciu', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('FECGRA', 'Fecgra', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('GRUSANGRE', 'Grusangre', 'string', CreoleTypes::VARCHAR, false, 5);

		$tMap->addColumn('NUMGACETA', 'Numgaceta', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('FECGACETA', 'Fecgaceta', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('DIAGRA', 'Diagra', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('MESGRA', 'Mesgra', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('ANOGRA', 'Anogra', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('TEMPORAL', 'Temporal', 'double', CreoleTypes::NUMERIC, false, 1);

		$tMap->addColumn('DETEXP', 'Detexp', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('NUMEXP', 'Numexp', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('MODPAGCESTIC', 'Modpagcestic', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CODRET', 'Codret', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('SITUAC', 'Situac', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('PROFES', 'Profes', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CODNIVEDU', 'Codnivedu', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('FECCORACU', 'Feccoracu', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('CAPACTACU', 'Capactacu', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('INTACU', 'Intacu', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('ANTACU', 'Antacu', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('DIAACU', 'Diaacu', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('DIAADIACU', 'Diaadiacu', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('SEGHCM', 'Seghcm', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('PORSEGHCM', 'Porseghcm', 'double', CreoleTypes::NUMERIC, false, 3);

		$tMap->addColumn('UBIFIS', 'Ubifis', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('TIPCUEAHO', 'Tipcueaho', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('NUMCUEAHO', 'Numcueaho', 'string', CreoleTypes::VARCHAR, false, 31);

		$tMap->addColumn('CODTIPEMP', 'Codtipemp', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('NUMPUNCUE', 'Numpuncue', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 
