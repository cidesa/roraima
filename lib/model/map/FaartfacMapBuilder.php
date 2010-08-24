<?php



class FaartfacMapBuilder {


	const CLASS_NAME = 'lib.model.map.FaartfacMapBuilder';


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

		$tMap = $this->dbMap->addTable('faartfac');
		$tMap->setPhpName('Faartfac');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('faartfac_SEQ');

		$tMap->addColumn('REFFAC', 'Reffac', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('CODART', 'Codart', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('DESART', 'Desart', 'string', CreoleTypes::VARCHAR, false, 1500);

		$tMap->addColumn('CODREF', 'Codref', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('CANTOT', 'Cantot', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('PRECIO', 'Precio', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONRGO', 'Monrgo', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONDES', 'Mondes', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('TOTART', 'Totart', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CANAJU', 'Canaju', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CANDES', 'Candes', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('NRONOT', 'Nronot', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('ORDDESPACHO', 'Orddespacho', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('GUIA', 'Guia', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('CONTENEDORES', 'Contenedores', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('BILLLEADING', 'Billleading', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('NUMTRANSP', 'Numtransp', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('PLACA', 'Placa', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('CHOFER', 'Chofer', 'string', CreoleTypes::VARCHAR, false, 200);

		$tMap->addColumn('FECSAL', 'Fecsal', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('HORSAL', 'Horsal', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('FECLLEG', 'Feclleg', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('HORLLEG', 'Horlleg', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('PROD', 'Prod', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('KG', 'Kg', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CAJAS', 'Cajas', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('ESTATUS', 'Estatus', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('OBSERVACIONES', 'Observaciones', 'string', CreoleTypes::VARCHAR, false, 500);

		$tMap->addColumn('TM', 'Tm', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('PREAJU', 'Preaju', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	}
}