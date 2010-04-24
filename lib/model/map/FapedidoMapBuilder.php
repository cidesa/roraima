<?php



class FapedidoMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FapedidoMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fapedido');
		$tMap->setPhpName('Fapedido');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fapedido_SEQ');

		$tMap->addColumn('NROPED', 'Nroped', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('FECPED', 'Fecped', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('REFPED', 'Refped', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('TIPREF', 'Tipref', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('CODCLI', 'Codcli', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('DESPED', 'Desped', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('MONPED', 'Monped', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('OBSPED', 'Obsped', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('REAPOR', 'Reapor', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('STATUS', 'Status', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('FECANU', 'Fecanu', 'int', CreoleTypes::DATE, false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 