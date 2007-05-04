<?php


	
class FcactcomMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FcactcomMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('fcactcom');
		$tMap->setPhpName('Fcactcom');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODACT', 'Codact', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('DESACT', 'Desact', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('MINTRI', 'Mintri', 'double', CreoleTypes::NUMERIC, true);

		$tMap->addColumn('EXONER', 'Exoner', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('MINOFAC', 'Minofac', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('TIPALI', 'Tipali', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('PORREB', 'Porreb', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('EXEPTO', 'Exepto', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('REBAJA', 'Rebaja', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('EXENTO', 'Exento', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('TEM', 'Tem', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('AFOACT', 'Afoact', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('ANOACT', 'Anoact', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 