<?php


	
class CaordserMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CaordserMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('caordser');
		$tMap->setPhpName('Caordser');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('ORDSER', 'Ordser', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('FECSER', 'Fecser', 'int', CreoleTypes::DATE, true);

		$tMap->addColumn('CODPRO', 'Codpro', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('CODCAT', 'Codcat', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('DESORD', 'Desord', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('CRECON', 'Crecon', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('PLAENT', 'Plaent', 'string', CreoleTypes::VARCHAR, false, 25);

		$tMap->addColumn('TIECAN', 'Tiecan', 'string', CreoleTypes::VARCHAR, false, 25);

		$tMap->addColumn('MONORD', 'Monord', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('STAORD', 'Staord', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('AFEPRE', 'Afepre', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CEDRIF', 'Cedrif', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('REFCOM', 'Refcom', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('FECANU', 'Fecanu', 'int', CreoleTypes::DATE, false);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 