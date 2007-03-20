<?php


	
class OpfacturMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.OpfacturMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('opfactur');
		$tMap->setPhpName('Opfactur');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('NUMORD', 'Numord', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('FECFAC', 'Fecfac', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('NUMFAC', 'Numfac', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('NUMCTR', 'Numctr', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('TIPTRA', 'Tiptra', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('TOTFAC', 'Totfac', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('EXEIVA', 'Exeiva', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('BASIMP', 'Basimp', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('PORIVA', 'Poriva', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('MONIVA', 'Moniva', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('MONRET', 'Monret', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('BASLTF', 'Basltf', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('PORLTF', 'Porltf', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('MONLTF', 'Monltf', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('BASISLR', 'Basislr', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('PORISLR', 'Porislr', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('MONISLR', 'Monislr', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('CODISLR', 'Codislr', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('RIFALT', 'Rifalt', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('FACAFE', 'Facafe', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 