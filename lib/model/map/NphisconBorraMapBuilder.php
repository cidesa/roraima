<?php


	
class NphisconBorraMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NphisconBorraMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('nphiscon_borra');
		$tMap->setPhpName('NphisconBorra');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODNOM', 'Codnom', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('CODCAR', 'Codcar', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('CODCON', 'Codcon', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('FECNOM', 'Fecnom', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('MONTO', 'Monto', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('CODCAT', 'Codcat', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('CODPAR', 'Codpar', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('CODESCUELA', 'Codescuela', 'string', CreoleTypes::VARCHAR, false, 7);

		$tMap->addColumn('CODNIV', 'Codniv', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('CODTIPGAS', 'Codtipgas', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('NOMCON', 'Nomcon', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('NUMREC', 'Numrec', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('CANTIDAD', 'Cantidad', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('FECNOMDES', 'Fecnomdes', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('ESPECIAL', 'Especial', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('FECNOMESPDES', 'Fecnomespdes', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('FECNOMESPHAS', 'Fecnomesphas', 'int', CreoleTypes::DATE, false);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 