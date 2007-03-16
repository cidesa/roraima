<?php


	
class ConsolidadoNuevoMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ConsolidadoNuevoMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('consolidado_nuevo');
		$tMap->setPhpName('ConsolidadoNuevo');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('IDENTI', 'Identi', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('TIPMOV', 'Tipmov', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('REFPRC', 'Refprc', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('REFCOM', 'Refcom', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('REFCAU', 'Refcau', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('REFPAG', 'Refpag', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('FECMOV', 'Fecmov', 'int', CreoleTypes::DATE, false);

		$tMap->addColumn('CEDRIF', 'Cedrif', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('MONMOV', 'Monmov', 'double', CreoleTypes::NUMERIC, false);

		$tMap->addColumn('DESMOV', 'Desmov', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('AFEDIS', 'Afedis', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CODPRE', 'Codpre', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('NOMPRE', 'Nompre', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);
				
    } 
} 