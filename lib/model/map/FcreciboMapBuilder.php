<?php


	
class FcreciboMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FcreciboMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('fcrecibo');
		$tMap->setPhpName('Fcrecibo');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODREC', 'Codrec', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('FECREC', 'Fecrec', 'int', CreoleTypes::DATE, true);

		$tMap->addColumn('DESREC', 'Desrec', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addColumn('NUMLIC', 'Numlic', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('RIFCON', 'Rifcon', 'string', CreoleTypes::VARCHAR, true, 15);

		$tMap->addColumn('MONREC', 'Monrec', 'double', CreoleTypes::NUMERIC, true);

		$tMap->addColumn('NOMCON', 'Nomcon', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('DIRCON', 'Dircon', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('FECHA', 'Fecha', 'int', CreoleTypes::DATE, false);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 