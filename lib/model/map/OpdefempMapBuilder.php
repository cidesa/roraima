<?php


	
class OpdefempMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.OpdefempMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('opdefemp');
		$tMap->setPhpName('Opdefemp');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('CTAPAG', 'Ctapag', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('CTADES', 'Ctades', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('NUMINI', 'Numini', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('ORDNOM', 'Ordnom', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('ORDOBR', 'Ordobr', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('UNITRI', 'Unitri', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('VERCOMRET', 'Vercomret', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('GENCTAORD', 'Genctaord', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('FORUBI', 'Forubi', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('TIPAJU', 'Tipaju', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('TIPEJE', 'Tipeje', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('NUMAUT', 'Numaut', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('TIPMOV', 'Tipmov', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CORIVA', 'Coriva', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('CTABONO', 'Ctabono', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CTAVACA', 'Ctavaca', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('GENCAUBON', 'Gencaubon', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('GENCOMADI', 'Gencomadi', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('UNIDAD', 'Unidad', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('ORDLIQ', 'Ordliq', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 