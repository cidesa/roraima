<?php


	
class CacotizaMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CacotizaMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('cacotiza');
		$tMap->setPhpName('Cacotiza');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('REFCOT', 'Refcot', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('FECCOT', 'Feccot', 'int', CreoleTypes::DATE, true);

		$tMap->addColumn('CODPRO', 'Codpro', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('DESCOT', 'Descot', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('REFSOL', 'Refsol', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('MONCOT', 'Moncot', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('CONPAG', 'Conpag', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('FORENT', 'Forent', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('PRIORI', 'Priori', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('MONDES', 'Mondes', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('MONREC', 'Monrec', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('TIPMON', 'Tipmon', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('VALMON', 'Valmon', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('REFPRO', 'Refpro', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('CORREL', 'Correl', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 