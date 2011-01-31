<?php



class FaartfacproMapBuilder {


	const CLASS_NAME = 'lib.model.map.FaartfacproMapBuilder';


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

		$tMap = $this->dbMap->addTable('faartfacpro');
		$tMap->setPhpName('Faartfacpro');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('faartfacpro_SEQ');

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

		$tMap->addColumn('PLACA', 'Placa', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('RIFPRO', 'Rifpro', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('FECSAL', 'Fecsal', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('HORSAL', 'Horsal', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('FECLLEG', 'Feclleg', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('HORLLEG', 'Horlleg', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('CODPROD', 'Codprod', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('KG', 'Kg', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CAJAS', 'Cajas', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('ESTATUS', 'Estatus', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('OBSERVACIONES', 'Observaciones', 'string', CreoleTypes::VARCHAR, false, 500);

		$tMap->addColumn('TM', 'Tm', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CEDRIF', 'Cedrif', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('NOTENTDIG', 'Notentdig', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('TIPOV', 'Tipov', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('FECLLCA', 'Fecllca', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('HORLLCA', 'Horllca', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('FECDESC', 'Fecdesc', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('HORDESC', 'Hordesc', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('KGENT', 'Kgent', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('DIFKG', 'Difkg', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CAJASENT', 'Cajasent', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('DIFCAJ', 'Difcaj', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('TMENT', 'Tment', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('DIFTON', 'Difton', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('IER', 'Ier', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('NUMFAC', 'Numfac', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	}
}
