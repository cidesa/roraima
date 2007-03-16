<?php


	
class CprelapaMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CprelapaMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('cprelapa');
		$tMap->setPhpName('Cprelapa');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('REFREL', 'Refrel', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('TIPREL', 'Tiprel', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('FECREL', 'Fecrel', 'int', CreoleTypes::DATE, true);

		$tMap->addColumn('REFAPA', 'Refapa', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('DESREL', 'Desrel', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('DESANU', 'Desanu', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('MONREL', 'Monrel', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('SALAJU', 'Salaju', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('STAREL', 'Starel', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('FECANU', 'Fecanu', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('CEDRIF', 'Cedrif', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('NUMCOM', 'Numcom', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 