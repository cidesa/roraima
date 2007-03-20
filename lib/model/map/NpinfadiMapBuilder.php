<?php


	
class NpinfadiMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NpinfadiMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('npinfadi');
		$tMap->setPhpName('Npinfadi');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('NOMTIT', 'Nomtit', 'string', CreoleTypes::VARCHAR, false, 40);

		$tMap->addColumn('DESCUR', 'Descur', 'string', CreoleTypes::VARCHAR, false, 60);

		$tMap->addColumn('INSTIT', 'Instit', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('DURCUR', 'Durcur', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('FECINI', 'Fecini', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('FECFIN', 'Fecfin', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('NIVEST', 'Nivest', 'string', CreoleTypes::VARCHAR, false, 40);

		$tMap->addColumn('DIAINI', 'Diaini', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('MESINI', 'Mesini', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('ANOINI', 'Anoini', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('DIAFIN', 'Diafin', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('MESFIN', 'Mesfin', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('ANOFIN', 'Anofin', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 