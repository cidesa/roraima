<?php



class AtestsocecoMapBuilder {

	
	const CLASS_NAME = 'lib.model.ciudadanos.map.AtestsocecoMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('atestsoceco');
		$tMap->setPhpName('Atestsoceco');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('atestsoceco_SEQ');

		$tMap->addForeignKey('ATAYUDAS_ID', 'AtayudasId', 'int', CreoleTypes::INTEGER, 'atayudas', 'ID', false, null);

		$tMap->addForeignKey('ATCIUDADANO_ID', 'AtciudadanoId', 'int', CreoleTypes::INTEGER, 'atciudadano', 'ID', false, null);

		$tMap->addForeignKey('ATTIPVIV_ID', 'AttipvivId', 'int', CreoleTypes::INTEGER, 'attipviv', 'ID', false, null);

		$tMap->addForeignKey('ATTIPPROVIV_ID', 'AttipprovivId', 'int', CreoleTypes::INTEGER, 'attipproviv', 'ID', false, null);

		$tMap->addColumn('CARVIVSAL', 'Carvivsal', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('CARVIVCOM', 'Carvivcom', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('CARVIVHAB', 'Carvivhab', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('CARVIVCOC', 'Carvivcoc', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('CARVIVBAN', 'Carvivban', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('CARVIVPAT', 'Carvivpat', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('CARVIVAREVER', 'Carvivarever', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('CARVIVPIS', 'Carvivpis', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('CARVIVPAR', 'Carvivpar', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('CARVIVTEC', 'Carvivtec', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('ANASOCECO', 'Anasoceco', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('ANAFAM', 'Anafam', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('OTROS', 'Otros', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('MOTVIS', 'Motvis', 'string', CreoleTypes::VARCHAR, false, 5000);

		$tMap->addColumn('PARFRI', 'Parfri', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('PARINTEXT', 'Parintext', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('OBSPAR', 'Obspar', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('PARSINFRI', 'Parsinfri', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('PARSININTEXT', 'Parsinintext', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('PARMAD', 'Parmad', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('PARZIN', 'Parzin', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('PARMATDES', 'Parmatdes', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('SUECEMRUS', 'Suecemrus', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('SUECEMPUL', 'Suecempul', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('SUETIE', 'Suetie', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('SUECER', 'Suecer', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('SUEGRA', 'Suegra', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('SUEPAR', 'Suepar', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('SUELIN', 'Suelin', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('OBSSUE', 'Obssue', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('TECZIN', 'Teczin', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('TECMATDES', 'Tecmatdes', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('TECACE', 'Tecace', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('TECCAR', 'Teccar', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('TECTEJ', 'Tectej', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('TECADO', 'Tecado', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('OBSTEC', 'Obstec', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('VIVNROAMB', 'Vivnroamb', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('VIVNROHAB', 'Vivnrohab', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('VIVNROBAN', 'Vivnroban', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('BANDENVIV', 'Bandenviv', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('BANFUEVIV', 'Banfueviv', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('VIVLET', 'Vivlet', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('VIVWAT', 'Vivwat', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('VIVOTR', 'Vivotr', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('VIVDUC', 'Vivduc', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('VIVLAV', 'Vivlav', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('VIVPAR', 'Vivpar', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('VIVPIS', 'Vivpis', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('VIVSAL', 'Vivsal', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('VIVCOM', 'Vivcom', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('VIVSALCOM', 'Vivsalcom', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('VIVCOCDENVIV', 'Vivcocdenviv', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('VIVCOCFUEVIV', 'Vivcocfueviv', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('VIAACCVIVASF', 'Viaaccvivasf', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('VIAACCVIVTIE', 'Viaaccvivtie', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('VIAACCVIVESC', 'Viaaccvivesc', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('TRAMET', 'Tramet', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('TRAFER', 'Trafer', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('TRACAM', 'Tracam', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('TRAJEE', 'Trajee', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('TRALAN', 'Tralan', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('TRABAR', 'Trabar', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('TRACAMI', 'Tracami', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('AGUFREDIA', 'Agufredia', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('AGUFREINT', 'Agufreint', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('AGUFRESEM', 'Agufresem', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('AGUFRE15D', 'Agufre15d', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('AGUPORTUB', 'Aguportub', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('AGUPORDEP', 'Agupordep', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('AGUSERDES', 'Aguserdes', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('AGUSERPOZ', 'Aguserpoz', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('ASEURBDIA', 'Aseurbdia', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('ASEURBINT', 'Aseurbint', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('ASEURBSEM', 'Aseurbsem', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('ASEURB15D', 'Aseurb15d', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('ELEPAG', 'Elepag', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('ELEPAR', 'Elepar', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('GASBOM', 'Gasbom', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('GASDIR', 'Gasdir', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('TOTING', 'Toting', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('EGRVIV', 'Egrviv', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('EGRTRA', 'Egrtra', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('EGREDU', 'Egredu', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('EGRALI', 'Egrali', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('EGRTEL', 'Egrtel', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('EGRLUZASE', 'Egrluzase', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('EGRAGU', 'Egragu', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('EGRGAS', 'Egrgas', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('EGROTR', 'Egrotr', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('TOTEGR', 'Totegr', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('DIASOC', 'Diasoc', 'string', CreoleTypes::VARCHAR, false, 5000);

		$tMap->addColumn('TRASOC', 'Trasoc', 'string', CreoleTypes::VARCHAR, false, 5000);

		$tMap->addColumn('RECOME', 'Recome', 'string', CreoleTypes::VARCHAR, false, 5000);

		$tMap->addColumn('OBSERV', 'Observ', 'string', CreoleTypes::VARCHAR, false, 5000);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 