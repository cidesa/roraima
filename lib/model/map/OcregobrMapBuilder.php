<?php


	
class OcregobrMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.OcregobrMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('ocregobr');
		$tMap->setPhpName('Ocregobr');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODOBR', 'Codobr', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('CODTIPOBR', 'Codtipobr', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESOBR', 'Desobr', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addColumn('FECINI', 'Fecini', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('FECFIN', 'Fecfin', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('UNOCON', 'Unocon', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CODPRE', 'Codpre', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CODPAI', 'Codpai', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('CODEDO', 'Codedo', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('CODMUN', 'Codmun', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('CODPAR', 'Codpar', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('CODSEC', 'Codsec', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('DIROBR', 'Dirobr', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addColumn('MONOBR', 'Monobr', 'double', CreoleTypes::NUMERIC, true);

		$tMap->addColumn('STAOBR', 'Staobr', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('DESPRE', 'Despre', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('SUBTOT', 'Subtot', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('MONIVA', 'Moniva', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('IVAOBR', 'Ivaobr', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 