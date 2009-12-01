<?php



class ContabaMapBuilder {

	
	const CLASS_NAME = 'lib.model.contabilidad.map.ContabaMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('contaba');
		$tMap->setPhpName('Contaba');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('contaba_SEQ');

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('LONCTA', 'Loncta', 'double', CreoleTypes::NUMERIC, true, 2);

		$tMap->addColumn('NUMRUP', 'Numrup', 'double', CreoleTypes::NUMERIC, true, 2);

		$tMap->addColumn('FORCTA', 'Forcta', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('SITFIN', 'Sitfin', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('SITFIS', 'Sitfis', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('GANPER', 'Ganper', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('EJEPRE', 'Ejepre', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('HACMUN', 'Hacmun', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CTLGAS', 'Ctlgas', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CTLING', 'Ctling', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('FECINI', 'Fecini', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('FECCIE', 'Feccie', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('CODTES', 'Codtes', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CODHAC', 'Codhac', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CODPRE', 'Codpre', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CODORD', 'Codord', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CODTESACT', 'Codtesact', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CODHACACT', 'Codhacact', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CODHACPAT', 'Codhacpat', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CODTESPAS', 'Codtespas', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CODHACPAS', 'Codhacpas', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CODIND', 'Codind', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CODINH', 'Codinh', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CODEGD', 'Codegd', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CODEGH', 'Codegh', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CODRES', 'Codres', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CODEJEPRE', 'Codejepre', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CODCTD', 'Codctd', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CODCTA', 'Codcta', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CODRESANT', 'Codresant', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('ETADEF', 'Etadef', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CODCTAGAS', 'Codctagas', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CODCTABAN', 'Codctaban', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CODCTARET', 'Codctaret', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CODCTABEN', 'Codctaben', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CODCTAART', 'Codctaart', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CODCTAGASHAS', 'Codctagashas', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CODCTABANHAS', 'Codctabanhas', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CODCTARETHAS', 'Codctarethas', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CODCTABENHAS', 'Codctabenhas', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CODCTAARTHAS', 'Codctaarthas', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CODCTAPAGEJE', 'Codctapageje', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CODCTAINGDEVN', 'Codctaingdevn', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CODCTAINGDEV', 'Codctaingdev', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('UNIDAD', 'Unidad', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('CORCOMP', 'Corcomp', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('BTNELICOMANU', 'Btnelicomanu', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('BTNMODCOM', 'Btnmodcom', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 