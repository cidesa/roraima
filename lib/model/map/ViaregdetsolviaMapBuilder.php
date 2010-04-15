<?php



class ViaregdetsolviaMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ViaregdetsolviaMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('viaregdetsolvia');
		$tMap->setPhpName('Viaregdetsolvia');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('viaregdetsolvia_SEQ');

		$tMap->addForeignKey('VIAREGSOLVIA_ID', 'ViaregsolviaId', 'int', CreoleTypes::INTEGER, 'viaregsolvia', 'ID', false, null);

		$tMap->addForeignKey('VIAREGENTE_ID', 'ViaregenteId', 'int', CreoleTypes::INTEGER, 'viaregente', 'ID', false, null);

		$tMap->addForeignKey('VIAREGACT_ID', 'ViaregactId', 'int', CreoleTypes::INTEGER, 'viaregact', 'ID', false, null);

		$tMap->addForeignKey('OCCIUDAD_ID', 'OcciudadId', 'int', CreoleTypes::INTEGER, 'occiudad', 'ID', false, null);

		$tMap->addColumn('CODMON', 'Codmon', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('VALMON', 'Valmon', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('FECHA_SAL', 'FechaSal', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('FECHA_REG', 'FechaReg', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('NUM_DIA', 'NumDia', 'double', CreoleTypes::NUMERIC, false, 2);

		$tMap->addColumn('MONTO', 'Monto', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 