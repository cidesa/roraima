<?php


abstract class BaseNpnomcalTempPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'npnomcal_temp';

	
	const CLASS_DEFAULT = 'lib.model.nomina.NpnomcalTemp';

	
	const NUM_COLUMNS = 16;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODNOM = 'npnomcal_temp.CODNOM';

	
	const CODEMP = 'npnomcal_temp.CODEMP';

	
	const CODCAR = 'npnomcal_temp.CODCAR';

	
	const CODCON = 'npnomcal_temp.CODCON';

	
	const FRECON = 'npnomcal_temp.FRECON';

	
	const ASIDED = 'npnomcal_temp.ASIDED';

	
	const FECNOM = 'npnomcal_temp.FECNOM';

	
	const NOMCON = 'npnomcal_temp.NOMCON';

	
	const NOMNOM = 'npnomcal_temp.NOMNOM';

	
	const CANTIDAD = 'npnomcal_temp.CANTIDAD';

	
	const MONTO = 'npnomcal_temp.MONTO';

	
	const ACUCON = 'npnomcal_temp.ACUCON';

	
	const ACUMULADO = 'npnomcal_temp.ACUMULADO';

	
	const SALDO = 'npnomcal_temp.SALDO';

	
	const NUMREC = 'npnomcal_temp.NUMREC';

	
	const ID = 'npnomcal_temp.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codnom', 'Codemp', 'Codcar', 'Codcon', 'Frecon', 'Asided', 'Fecnom', 'Nomcon', 'Nomnom', 'Cantidad', 'Monto', 'Acucon', 'Acumulado', 'Saldo', 'Numrec', 'Id', ),
		BasePeer::TYPE_COLNAME => array (NpnomcalTempPeer::CODNOM, NpnomcalTempPeer::CODEMP, NpnomcalTempPeer::CODCAR, NpnomcalTempPeer::CODCON, NpnomcalTempPeer::FRECON, NpnomcalTempPeer::ASIDED, NpnomcalTempPeer::FECNOM, NpnomcalTempPeer::NOMCON, NpnomcalTempPeer::NOMNOM, NpnomcalTempPeer::CANTIDAD, NpnomcalTempPeer::MONTO, NpnomcalTempPeer::ACUCON, NpnomcalTempPeer::ACUMULADO, NpnomcalTempPeer::SALDO, NpnomcalTempPeer::NUMREC, NpnomcalTempPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codnom', 'codemp', 'codcar', 'codcon', 'frecon', 'asided', 'fecnom', 'nomcon', 'nomnom', 'cantidad', 'monto', 'acucon', 'acumulado', 'saldo', 'numrec', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codnom' => 0, 'Codemp' => 1, 'Codcar' => 2, 'Codcon' => 3, 'Frecon' => 4, 'Asided' => 5, 'Fecnom' => 6, 'Nomcon' => 7, 'Nomnom' => 8, 'Cantidad' => 9, 'Monto' => 10, 'Acucon' => 11, 'Acumulado' => 12, 'Saldo' => 13, 'Numrec' => 14, 'Id' => 15, ),
		BasePeer::TYPE_COLNAME => array (NpnomcalTempPeer::CODNOM => 0, NpnomcalTempPeer::CODEMP => 1, NpnomcalTempPeer::CODCAR => 2, NpnomcalTempPeer::CODCON => 3, NpnomcalTempPeer::FRECON => 4, NpnomcalTempPeer::ASIDED => 5, NpnomcalTempPeer::FECNOM => 6, NpnomcalTempPeer::NOMCON => 7, NpnomcalTempPeer::NOMNOM => 8, NpnomcalTempPeer::CANTIDAD => 9, NpnomcalTempPeer::MONTO => 10, NpnomcalTempPeer::ACUCON => 11, NpnomcalTempPeer::ACUMULADO => 12, NpnomcalTempPeer::SALDO => 13, NpnomcalTempPeer::NUMREC => 14, NpnomcalTempPeer::ID => 15, ),
		BasePeer::TYPE_FIELDNAME => array ('codnom' => 0, 'codemp' => 1, 'codcar' => 2, 'codcon' => 3, 'frecon' => 4, 'asided' => 5, 'fecnom' => 6, 'nomcon' => 7, 'nomnom' => 8, 'cantidad' => 9, 'monto' => 10, 'acucon' => 11, 'acumulado' => 12, 'saldo' => 13, 'numrec' => 14, 'id' => 15, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/nomina/map/NpnomcalTempMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.nomina.map.NpnomcalTempMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = NpnomcalTempPeer::getTableMap();
			$columns = $map->getColumns();
			$nameMap = array();
			foreach ($columns as $column) {
				$nameMap[$column->getPhpName()] = $column->getColumnName();
			}
			self::$phpNameMap = $nameMap;
		}
		return self::$phpNameMap;
	}
	
	static public function translateFieldName($name, $fromType, $toType)
	{
		$toNames = self::getFieldNames($toType);
		$key = isset(self::$fieldKeys[$fromType][$name]) ? self::$fieldKeys[$fromType][$name] : null;
		if ($key === null) {
			throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(self::$fieldKeys[$fromType], true));
		}
		return $toNames[$key];
	}

	

	static public function getFieldNames($type = BasePeer::TYPE_PHPNAME)
	{
		if (!array_key_exists($type, self::$fieldNames)) {
			throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants TYPE_PHPNAME, TYPE_COLNAME, TYPE_FIELDNAME, TYPE_NUM. ' . $type . ' was given.');
		}
		return self::$fieldNames[$type];
	}

	
	public static function alias($alias, $column)
	{
		return str_replace(NpnomcalTempPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(NpnomcalTempPeer::CODNOM);

		$criteria->addSelectColumn(NpnomcalTempPeer::CODEMP);

		$criteria->addSelectColumn(NpnomcalTempPeer::CODCAR);

		$criteria->addSelectColumn(NpnomcalTempPeer::CODCON);

		$criteria->addSelectColumn(NpnomcalTempPeer::FRECON);

		$criteria->addSelectColumn(NpnomcalTempPeer::ASIDED);

		$criteria->addSelectColumn(NpnomcalTempPeer::FECNOM);

		$criteria->addSelectColumn(NpnomcalTempPeer::NOMCON);

		$criteria->addSelectColumn(NpnomcalTempPeer::NOMNOM);

		$criteria->addSelectColumn(NpnomcalTempPeer::CANTIDAD);

		$criteria->addSelectColumn(NpnomcalTempPeer::MONTO);

		$criteria->addSelectColumn(NpnomcalTempPeer::ACUCON);

		$criteria->addSelectColumn(NpnomcalTempPeer::ACUMULADO);

		$criteria->addSelectColumn(NpnomcalTempPeer::SALDO);

		$criteria->addSelectColumn(NpnomcalTempPeer::NUMREC);

		$criteria->addSelectColumn(NpnomcalTempPeer::ID);

	}

	const COUNT = 'COUNT(npnomcal_temp.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT npnomcal_temp.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(NpnomcalTempPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(NpnomcalTempPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = NpnomcalTempPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}
	
	public static function doSelectOne(Criteria $criteria, $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = NpnomcalTempPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return NpnomcalTempPeer::populateObjects(NpnomcalTempPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			NpnomcalTempPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = NpnomcalTempPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}
	
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	
	public static function getOMClass()
	{
		return NpnomcalTempPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(NpnomcalTempPeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
			$comparison = $criteria->getComparison(NpnomcalTempPeer::ID);
			$selectCriteria->add(NpnomcalTempPeer::ID, $criteria->remove(NpnomcalTempPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}
		$affectedRows = 0; 		try {
									$con->begin();
			$affectedRows += BasePeer::doDeleteAll(NpnomcalTempPeer::TABLE_NAME, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	 public static function doDelete($values, $con = null)
	 {
		if ($con === null) {
			$con = Propel::getConnection(NpnomcalTempPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof NpnomcalTemp) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(NpnomcalTempPeer::ID, (array) $values, Criteria::IN);
		}

				$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; 
		try {
									$con->begin();
			
			$affectedRows += BasePeer::doDelete($criteria, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public static function doValidate(NpnomcalTemp $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(NpnomcalTempPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(NpnomcalTempPeer::TABLE_NAME);

			if (! is_array($cols)) {
				$cols = array($cols);
			}

			foreach($cols as $colName) {
				if ($tableMap->containsColumn($colName)) {
					$get = 'get' . $tableMap->getColumn($colName)->getPhpName();
					$columns[$colName] = $obj->$get();
				}
			}
		} else {

		}

		$res =  BasePeer::doValidate(NpnomcalTempPeer::DATABASE_NAME, NpnomcalTempPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = NpnomcalTempPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
            $request->setError($col, $failed->getMessage());
        }
    }

    return $res;
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(NpnomcalTempPeer::DATABASE_NAME);

		$criteria->add(NpnomcalTempPeer::ID, $pk);


		$v = NpnomcalTempPeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	
	public static function retrieveByPKs($pks, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria();
			$criteria->add(NpnomcalTempPeer::ID, $pks, Criteria::IN);
			$objs = NpnomcalTempPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseNpnomcalTempPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/nomina/map/NpnomcalTempMapBuilder.php';
	Propel::registerMapBuilder('lib.model.nomina.map.NpnomcalTempMapBuilder');
}
