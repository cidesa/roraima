<?php



class OcreglicMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.OcreglicMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ocreglic');
		$tMap->setPhpName('Ocreglic');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ocreglic_SEQ');

		$tMap->addColumn('CODLIC', 'Codlic', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('CODTIPLIC', 'Codtiplic', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('DESLIC', 'Deslic', 'string', CreoleTypes::VARCHAR, true, 1000);

		$tMap->addColumn('SITACT', 'Sitact', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('ENTE', 'Ente', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('FECREG', 'Fecreg', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('FECEDI', 'Fecedi', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('CODOBR', 'Codobr', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('FECDISDES', 'Fecdisdes', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('FECDISHAS', 'Fecdishas', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('COSTO', 'Costo', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addColumn('FORPAG', 'Forpag', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('DECRETOS', 'Decretos', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('DIRRET', 'Dirret', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('PERCONTAC', 'Percontac', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('HORARET', 'Horaret', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('PERIODICO', 'Periodico', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('FECPUB', 'Fecpub', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('PAGINA', 'Pagina', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('CUERPO', 'Cuerpo', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('MES', 'Mes', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('CODPAIEFEC', 'Codpaiefec', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODPAIRECEP', 'Codpairecep', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODFIN', 'Codfin', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('FECOFER', 'Fecofer', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('HORAOFER', 'Horaofer', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('DIROFER', 'Dirofer', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('PERCONTACOFER', 'Percontacofer', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('CODCLACOMP', 'Codclacomp', 'string', CreoleTypes::VARCHAR, false, 5);

		$tMap->addColumn('OBSERVACIONES', 'Observaciones', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 