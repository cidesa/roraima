<?php


	
class NpimppresocantMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NpimppresocantMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('npimppresocant');
		$tMap->setPhpName('Npimppresocant');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('FECCOR', 'Feccor', 'int', CreoleTypes::DATE, true);

		$tMap->addColumn('FECINI', 'Fecini', 'int', CreoleTypes::DATE, true);

		$tMap->addColumn('FECFIN', 'Fecfin', 'int', CreoleTypes::DATE, true);

		$tMap->addColumn('SALEMP', 'Salemp', 'double', CreoleTypes::NUMERIC, true);

		$tMap->addColumn('TASINT', 'Tasint', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('CAPEMP', 'Capemp', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('INTDEV', 'Intdev', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('ANTACUM', 'Antacum', 'double', CreoleTypes::NUMERIC, true);

		$tMap->addColumn('ANOSER', 'Anoser', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('ADEANT', 'Adeant', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('INTACUM', 'Intacum', 'double', CreoleTypes::NUMERIC, true);

		$tMap->addColumn('DIADIF', 'Diadif', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('REGPRE', 'Regpre', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('DIAART108', 'Diaart108', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('VALART108', 'Valart108', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('ADEPRE', 'Adepre', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 