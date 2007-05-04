<?php


	
class FcpagosMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FcpagosMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('fcpagos');
		$tMap->setPhpName('Fcpagos');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('NUMPAG', 'Numpag', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('FECPAG', 'Fecpag', 'int', CreoleTypes::DATE, true);

		$tMap->addColumn('RIFCON', 'Rifcon', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('DESPAG', 'Despag', 'string', CreoleTypes::VARCHAR, false, 200);

		$tMap->addColumn('MONPAG', 'Monpag', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('MONEFE', 'Monefe', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('FUNPAG', 'Funpag', 'string', CreoleTypes::VARCHAR, true, 40);

		$tMap->addColumn('CODREC', 'Codrec', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('NUMPAGOLD', 'Numpagold', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('EDOPAG', 'Edopag', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('FECANU', 'Fecanu', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('MOTANU', 'Motanu', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('CEDANU', 'Cedanu', 'string', CreoleTypes::VARCHAR, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 