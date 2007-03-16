<?php


	
class DfatendocMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.DfatendocMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('dfatendoc');
		$tMap->setPhpName('Dfatendoc');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODIGO', 'Codigo', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('LOGUSE', 'Loguse', 'string', CreoleTypes::VARCHAR, true, 15);

		$tMap->addColumn('ESTADO', 'Estado', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('FECREC', 'Fecrec', 'int', CreoleTypes::DATE, true);

		$tMap->addColumn('HORREC', 'Horrec', 'int', CreoleTypes::DATE, true);

		$tMap->addColumn('FECATE', 'Fecate', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('HORATE', 'Horate', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('NUMUNI', 'Numuni', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('NUMUNIORI', 'Numuniori', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('OBSDOC', 'Obsdoc', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('STAATE', 'Staate', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('TABLA', 'Tabla', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('ANUATE', 'Anuate', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CHKUNI1', 'Chkuni1', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CHKUNI2', 'Chkuni2', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CHKUNI3', 'Chkuni3', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CHKUNI4', 'Chkuni4', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CHKUNI5', 'Chkuni5', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CHKUNI6', 'Chkuni6', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CHKUNI7', 'Chkuni7', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 