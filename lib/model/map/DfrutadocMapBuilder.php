<?php


	
class DfrutadocMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.DfrutadocMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('dfrutadoc');
		$tMap->setPhpName('Dfrutadoc');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('RUTDOC', 'Rutdoc', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('TIPDOC', 'Tipdoc', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('NUMUNI1', 'Numuni1', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('DIAPER1', 'Diaper1', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('NUMUNI2', 'Numuni2', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('DIAPER2', 'Diaper2', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('NUMUNI3', 'Numuni3', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('DIAPER3', 'Diaper3', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('NUMUNI4', 'Numuni4', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('DIAPER4', 'Diaper4', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('NUMUNI5', 'Numuni5', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('DIAPER5', 'Diaper5', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('NUMUNI6', 'Numuni6', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('DIAPER6', 'Diaper6', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('NUMUNI7', 'Numuni7', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('DIAPER7', 'Diaper7', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 