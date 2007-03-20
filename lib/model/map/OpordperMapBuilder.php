<?php


	
class OpordperMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.OpordperMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('opordper');
		$tMap->setPhpName('Opordper');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('REFOPP', 'Refopp', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('DESOPP', 'Desopp', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addColumn('FECEMI', 'Fecemi', 'int', CreoleTypes::DATE, true);

		$tMap->addColumn('NUMCUO', 'Numcuo', 'double', CreoleTypes::NUMERIC, true);

		$tMap->addColumn('FREOPP', 'Freopp', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('CEDRIF', 'Cedrif', 'string', CreoleTypes::VARCHAR, true, 15);

		$tMap->addColumn('MONOPP', 'Monopp', 'double', CreoleTypes::NUMERIC, true);

		$tMap->addColumn('STAORD', 'Staord', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('NUMCUE', 'Numcue', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('CTABAN', 'Ctaban', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('TIPDOC', 'Tipdoc', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('REFERE', 'Refere', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('CODUNI', 'Coduni', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('TIPPAG', 'Tippag', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('NUMTIQ', 'Numtiq', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('PERAUT', 'Peraut', 'string', CreoleTypes::VARCHAR, false, 40);

		$tMap->addColumn('CEDAUT', 'Cedaut', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 