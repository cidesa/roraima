<?php


abstract class BaseNpliquidacionDetPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'npliquidacion_det';

	
	const CLASS_DEFAULT = 'lib.model.NpliquidacionDet';

	
	const NUM_COLUMNS = 9;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODEMP = 'npliquidacion_det.CODEMP';

	
	const CONCEPTO = 'npliquidacion_det.CONCEPTO';

	
	const MONTO = 'npliquidacion_det.MONTO';

	
	const ASIDED = 'npliquidacion_det.ASIDED';

	
	const NUMREG = 'npliquidacion_det.NUMREG';

	
	const CODPRE = 'npliquidacion_det.CODPRE';

	
	const CODCON = 'npliquidacion_det.CODCON';

	
	const NUMORD = 'npliquidacion_det.NUMORD';

	
	const ID = 'npliquidacion_det.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codemp', 'Concepto', 'Monto', 'Asided', 'Numreg', 'Codpre', 'Codcon', 'Numord', 'Id', ),
		BasePeer::TYPE_COLNAME => array (NpliquidacionDetPeer::CODEMP, NpliquidacionDetPeer::CONCEPTO, NpliquidacionDetPeer::MONTO, NpliquidacionDetPeer::ASIDED, NpliquidacionDetPeer::NUMREG, NpliquidacionDetPeer::CODPRE, NpliquidacionDetPeer::CODCON, NpliquidacionDetPeer::NUMORD, NpliquidacionDetPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codemp', 'concepto', 'monto', 'asided', 'numreg', 'codpre', 'codcon', 'numord', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codemp' => 0, 'Concepto' => 1, 'Monto' => 2, 'Asided' => 3, 'Numreg' => 4, 'Codpre' => 5, 'Codcon' => 6, 'Numord' => 7, 'Id' => 8, ),
		BasePeer::TYPE_COLNAME => array (NpliquidacionDetPeer::CODEMP => 0, NpliquidacionDetPeer::CONCEPTO => 1, NpliquidacionDetPeer::MONTO => 2, NpliquidacionDetPeer::ASIDED => 3, NpliquidacionDetPeer::NUMREG => 4, NpliquidacionDetPeer::CODPRE => 5, NpliquidacionDetPeer::CODCON => 6, NpliquidacionDetPeer::NUMORD => 7, NpliquidacionDetPeer::ID => 8, ),
		BasePeer::TYPE_FIELDNAME => array ('codemp' => 0, 'concepto' => 1, 'monto' => 2, 'asided' => 3, 'numreg' => 4, 'codpre' => 5, 'codcon' => 6, 'numord' => 7, 'id' => 8, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/NpliquidacionDetMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.NpliquidacionDetMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = NpliquidacionDetPeer::getTableMap();
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
		return str_replace(NpliquidacionDetPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(NpliquidacionDetPeer::CODEMP);

		$criteria->addSelectColumn(NpliquidacionDetPeer::CONCEPTO);

		$criteria->addSelectColumn(NpliquidacionDetPeer::MONTO);

		$criteria->addSelectColumn(NpliquidacionDetPeer::ASIDED);

		$criteria->addSelectColumn(NpliquidacionDetPeer::NUMREG);

		$criteria->addSelectColumn(NpliquidacionDetPeer::CODPRE);

		$criteria->addSelectColumn(NpliquidacionDetPeer::CODCON);

		$criteria->addSelectColumn(NpliquidacionDetPeer::NUMORD);

		$criteria->addSelectColumn(NpliquidacionDetPeer::ID);

	}

	const COUNT = 'COUNT(npliquidacion_det.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT npliquidacion_det.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(NpliquidacionDetPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(NpliquidacionDetPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = NpliquidacionDetPeer::doSelectRS($criteria, $con);
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
		$objects = NpliquidacionDetPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return NpliquidacionDetPeer::populateObjects(NpliquidacionDetPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			NpliquidacionDetPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = NpliquidacionDetPeer::getOMClass();
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
		return NpliquidacionDetPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}


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
			$comparison = $criteria->getComparison(NpliquidacionDetPeer::ID);
			$selectCriteria->add(NpliquidacionDetPeer::ID, $criteria->remove(NpliquidacionDetPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(NpliquidacionDetPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(NpliquidacionDetPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof NpliquidacionDet) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(NpliquidacionDetPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(NpliquidacionDet $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(NpliquidacionDetPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(NpliquidacionDetPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(NpliquidacionDetPeer::DATABASE_NAME, NpliquidacionDetPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = NpliquidacionDetPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(NpliquidacionDetPeer::DATABASE_NAME);

		$criteria->add(NpliquidacionDetPeer::ID, $pk);


		$v = NpliquidacionDetPeer::doSelect($criteria, $con);

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
			$criteria->add(NpliquidacionDetPeer::ID, $pks, Criteria::IN);
			$objs = NpliquidacionDetPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseNpliquidacionDetPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/NpliquidacionDetMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.NpliquidacionDetMapBuilder');
}
