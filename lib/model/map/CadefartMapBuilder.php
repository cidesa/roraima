<?php


	
class CadefartMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CadefartMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('cadefart');
		$tMap->setPhpName('Cadefart');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('LONART', 'Lonart', 'double', CreoleTypes::NUMERIC, true);

		$tMap->addColumn('RUPART', 'Rupart', 'double', CreoleTypes::NUMERIC, true);

		$tMap->addColumn('FORART', 'Forart', 'string', CreoleTypes::VARCHAR, true, 30);

		$tMap->addColumn('DESART', 'Desart', 'string', CreoleTypes::VARCHAR, true, 30);

		$tMap->addColumn('FORUBI', 'Forubi', 'string', CreoleTypes::VARCHAR, true, 30);

		$tMap->addColumn('DESUBI', 'Desubi', 'string', CreoleTypes::VARCHAR, true, 30);

		$tMap->addColumn('CORREQ', 'Correq', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('CORORD', 'Corord', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('CORREC', 'Correc', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('CORDES', 'Cordes', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('GENERAOP', 'Generaop', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('ASIPARREC', 'Asiparrec', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('GENERACOM', 'Generacom', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('MERCON', 'Mercon', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('CTADEV', 'Ctadev', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CTAVCO', 'Ctavco', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('UNIVTA', 'Univta', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('ARTVEN', 'Artven', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('ARTINS', 'Artins', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('ARTSER', 'Artser', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('CODALMVEN', 'Codalmven', 'string', CreoleTypes::VARCHAR, false, 6);

		$tMap->addColumn('RECART', 'Recart', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('ORDCOM', 'Ordcom', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('REQART', 'Reqart', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('DPHART', 'Dphart', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('ORDSER', 'Ordser', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('TIPIMPREC', 'Tipimprec', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('ARTVENHAS', 'Artvenhas', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('CORCOT', 'Corcot', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('SOLART', 'Solart', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('APLICLADES', 'Apliclades', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('SOLCOM', 'Solcom', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('UNIDAD', 'Unidad', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 