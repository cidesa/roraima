<?php


	
class BnreginmMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.BnreginmMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('bnreginm');
		$tMap->setPhpName('Bnreginm');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODACT', 'Codact', 'string', CreoleTypes::VARCHAR, true, 30);

		$tMap->addColumn('CODINM', 'Codinm', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('DESINM', 'Desinm', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('CODPRO', 'Codpro', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('ORDCOM', 'Ordcom', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('FECREG', 'Fecreg', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('FECCOM', 'Feccom', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('FECDEP', 'Fecdep', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('FECAJU', 'Fecaju', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('FECACT', 'Fecact', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('FECEXP', 'Fecexp', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('ORDRCP', 'Ordrcp', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('FOTINM', 'Fotinm', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('DENINM', 'Deninm', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('NROEXP', 'Nroexp', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('DETINM', 'Detinm', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('CODUBI', 'Codubi', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('AVAACT', 'Avaact', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('CLAFUN', 'Clafun', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('AVACOM', 'Avacom', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('EDOLEG', 'Edoleg', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('VIDUTI', 'Viduti', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('OBSINM', 'Obsinm', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('LINNOR', 'Linnor', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('LINSUR', 'Linsur', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('LINEST', 'Linest', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('LINOES', 'Linoes', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('ARETER', 'Areter', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('ARECUB', 'Arecub', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('ARECON', 'Arecon', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('AREOTR', 'Areotr', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('ARETOT', 'Aretot', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('EDOINM', 'Edoinm', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('MUNINM', 'Muninm', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('DEPINM', 'Depinm', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('DIRINM', 'Dirinm', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('MESDEP', 'Mesdep', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('VALINI', 'Valini', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('VALRES', 'Valres', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('VALLIB', 'Vallib', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('VALREX', 'Valrex', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('COSREP', 'Cosrep', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('DEPMEN', 'Depmen', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('DEPACU', 'Depacu', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('STAINM', 'Stainm', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 