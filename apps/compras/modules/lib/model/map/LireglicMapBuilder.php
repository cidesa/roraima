<?php



class LireglicMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.LireglicMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('lireglic');
		$tMap->setPhpName('Lireglic');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('lireglic_SEQ');

		$tMap->addColumn('CODLIC', 'Codlic', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('DESLIC', 'Deslic', 'string', CreoleTypes::VARCHAR, true, 1000);

		$tMap->addForeignKey('LITIPLIC_ID', 'LitiplicId', 'int', CreoleTypes::INTEGER, 'litiplic', 'ID', true, null);

		$tMap->addForeignKey('LISICACT_ID', 'LisicactId', 'int', CreoleTypes::INTEGER, 'lisicact', 'ID', false, null);

		$tMap->addColumn('FECREG', 'Fecreg', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('FECEDI', 'Fecedi', 'int', CreoleTypes::DATE, false, null);

		$tMap->addForeignKey('LIREGSOL_ID', 'LiregsolId', 'int', CreoleTypes::INTEGER, 'liregsol', 'ID', true, null);

		$tMap->addColumn('PLAMODIFI', 'Plamodifi', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('PLAACLARA', 'Plaaclara', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('PLAPRORRO', 'Plaprorro', 'int', CreoleTypes::INTEGER, false, null);

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