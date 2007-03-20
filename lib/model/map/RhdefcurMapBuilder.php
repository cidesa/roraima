<?php


	
class RhdefcurMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.RhdefcurMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('rhdefcur');
		$tMap->setPhpName('Rhdefcur');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODCUR', 'Codcur', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('DESCUR', 'Descur', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('CODTIPCUR', 'Codtipcur', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('CODPRO', 'Codpro', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('FECINI', 'Fecini', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('FECFIN', 'Fecfin', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('NOTAPR', 'Notapr', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('DURCUR', 'Durcur', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('CODTIT', 'Codtit', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('TURCUR', 'Turcur', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 