<?php


	
class Tabla38MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.Tabla38MapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('tabla38');
		$tMap->setPhpName('Tabla38');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('REFPAG', 'Refpag', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('TIPPAG', 'Tippag', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('FECPAG', 'Fecpag', 'int', CreoleTypes::DATE, true);

		$tMap->addColumn('ANOPAG', 'Anopag', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('REFCAU', 'Refcau', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('TIPCAU', 'Tipcau', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('DESPAG', 'Despag', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('DESANU', 'Desanu', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('MONPAG', 'Monpag', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('SALAJU', 'Salaju', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('STAPAG', 'Stapag', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('FECANU', 'Fecanu', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('CEDRIF', 'Cedrif', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 