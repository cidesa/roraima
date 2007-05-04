<?php


	
class FcdefinsMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FcdefinsMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('fcdefins');
		$tMap->setPhpName('Fcdefins');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('LONCODACT', 'Loncodact', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('LONCODVEH', 'Loncodveh', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('LONCODCAT', 'Loncodcat', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('LONCODUBIFIS', 'Loncodubifis', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('LONCODUBIMAG', 'Loncodubimag', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('RUPACT', 'Rupact', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('RUPVEH', 'Rupveh', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('RUPCAT', 'Rupcat', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('RUPUBIFIS', 'Rupubifis', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('RUPUBIMAG', 'Rupubimag', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('FORACT', 'Foract', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('FORVEH', 'Forveh', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('FORCAT', 'Forcat', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('FORUBIFIS', 'Forubifis', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('FORUBIMAG', 'Forubimag', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('PORPIC', 'Porpic', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('PORVEH', 'Porveh', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('PORINM', 'Porinm', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('UNIPIC', 'Unipic', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('VALUNITRI', 'Valunitri', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('UNITAS', 'Unitas', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CODPIC', 'Codpic', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('CODVEH', 'Codveh', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('CODINM', 'Codinm', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('CODPRO', 'Codpro', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('CODESP', 'Codesp', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('CODAPU', 'Codapu', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('CODAJUPIC', 'Codajupic', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 