<?php


	
class Tabla37MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.Tabla37MapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('tabla37');
		$tMap->setPhpName('Tabla37');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('REFCAU', 'Refcau', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('TIPCAU', 'Tipcau', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('FECCAU', 'Feccau', 'int', CreoleTypes::DATE, true);

		$tMap->addColumn('ANOCAU', 'Anocau', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('REFCOM', 'Refcom', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('TIPCOM', 'Tipcom', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('DESCAU', 'Descau', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('DESANU', 'Desanu', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('MONCAU', 'Moncau', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('SALPAG', 'Salpag', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('SALAJU', 'Salaju', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('STACAU', 'Stacau', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('FECANU', 'Fecanu', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('CEDRIF', 'Cedrif', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 