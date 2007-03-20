<?php


	
class Tabla32MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.Tabla32MapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('tabla32');
		$tMap->setPhpName('Tabla32');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('REFCOM', 'Refcom', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('TIPCOM', 'Tipcom', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('FECCOM', 'Feccom', 'int', CreoleTypes::DATE, true);

		$tMap->addColumn('ANOCOM', 'Anocom', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('REFPRC', 'Refprc', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('TIPPRC', 'Tipprc', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('DESCOM', 'Descom', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('DESANU', 'Desanu', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('MONCOM', 'Moncom', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('SALCAU', 'Salcau', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('SALPAG', 'Salpag', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('SALAJU', 'Salaju', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('STACOM', 'Stacom', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('FECANU', 'Fecanu', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('CEDRIF', 'Cedrif', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('TIPO', 'Tipo', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 