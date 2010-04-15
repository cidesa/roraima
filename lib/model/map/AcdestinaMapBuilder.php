<?php



class AcdestinaMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.AcdestinaMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('acdestina');
		$tMap->setPhpName('Acdestina');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('acdestina_SEQ');

		$tMap->addColumn('CEDRIF', 'Cedrif', 'string', CreoleTypes::VARCHAR, true, 15);

		$tMap->addColumn('NOMDES', 'Nomdes', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addColumn('DIRDES', 'Dirdes', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('TELDES', 'Teldes', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('NITDES', 'Nitdes', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 