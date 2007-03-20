<?php


	
class Tabla39MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.Tabla39MapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('tabla39');
		$tMap->setPhpName('Tabla39');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('REFAJU', 'Refaju', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('TIPAJU', 'Tipaju', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('FECAJU', 'Fecaju', 'int', CreoleTypes::DATE, true);

		$tMap->addColumn('ANOAJU', 'Anoaju', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('REFERE', 'Refere', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('DESAJU', 'Desaju', 'string', CreoleTypes::VARCHAR, false, 500);

		$tMap->addColumn('DESANU', 'Desanu', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('TOTAJU', 'Totaju', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('STAAJU', 'Staaju', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('FECANU', 'Fecanu', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('NUMCOM', 'Numcom', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('CUOANU', 'Cuoanu', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('FECANUDES', 'Fecanudes', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('FECANUHAS', 'Fecanuhas', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('ORDPAG', 'Ordpag', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('FECENVCON', 'Fecenvcon', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('FECENVFIN', 'Fecenvfin', 'int', CreoleTypes::DATE, false);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 