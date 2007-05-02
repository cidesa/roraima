<?php


	
class Fcreginm2MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.Fcreginm2MapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('fcreginm2');
		$tMap->setPhpName('Fcreginm2');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('NROINM', 'Nroinm', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('CODCATFIS', 'Codcatfis', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('CODUSO', 'Coduso', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('CODCARINM', 'Codcarinm', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('CODSITINM', 'Codsitinm', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('RIFCON', 'Rifcon', 'string', CreoleTypes::VARCHAR, false, 14);

		$tMap->addColumn('FECPAG', 'Fecpag', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('FECCAL', 'Feccal', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('FECREG', 'Fecreg', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('DIRINM', 'Dirinm', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('LINNOR', 'Linnor', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('LINSUR', 'Linsur', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('LINEST', 'Linest', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('LINOES', 'Linoes', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('MTRTER', 'Mtrter', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('MTRCON', 'Mtrcon', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('BSTER', 'Bster', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('BSCON', 'Bscon', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('DOCPRO', 'Docpro', 'string', CreoleTypes::VARCHAR, false, 200);

		$tMap->addColumn('RIFREP', 'Rifrep', 'string', CreoleTypes::VARCHAR, false, 14);

		$tMap->addColumn('FUNREC', 'Funrec', 'string', CreoleTypes::VARCHAR, false, 40);

		$tMap->addColumn('FECREC', 'Fecrec', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('ESTINM', 'Estinm', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('ESTDEC', 'Estdec', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CODCATINM', 'Codcatinm', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('NOMCON', 'Nomcon', 'string', CreoleTypes::VARCHAR, false, 120);

		$tMap->addColumn('DIRCON', 'Dircon', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('CLACON', 'Clacon', 'string', CreoleTypes::VARCHAR, false, 12);

		$tMap->addColumn('FECADQ', 'Fecadq', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('VALINM', 'Valinm', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('CODMAN', 'Codman', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODSEC', 'Codsec', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODPAR', 'Codpar', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('NROINMANT', 'Nroinmant', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('TOTTER', 'Totter', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('TOTCON', 'Totcon', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('TOTAL', 'Total', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 