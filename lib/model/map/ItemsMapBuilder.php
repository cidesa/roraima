<?php



class ItemsMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ItemsMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('items');
		$tMap->setPhpName('Items');

		$tMap->setUseIdGenerator(false);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('AMOUNT', 'Amount', 'double', CreoleTypes::NUMERIC, false, null);

		$tMap->addColumn('PRICE', 'Price', 'double', CreoleTypes::NUMERIC, false, 3);

		$tMap->addColumn('COMMENTS', 'Comments', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('STATUS', 'Status', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('ORDER_ID', 'OrderId', 'double', CreoleTypes::NUMERIC, true, null);

		$tMap->addColumn('PRODUCT_ID', 'ProductId', 'double', CreoleTypes::NUMERIC, true, null);

	} 
} 