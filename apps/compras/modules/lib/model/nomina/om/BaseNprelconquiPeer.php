<?php


abstract class BaseNprelconquiPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'nprelconqui';

	
	const CLASS_DEFAULT = 'lib.model.nomina.Nprelconqui';

	
	const NUM_COLUMNS = 12;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODEMP = 'nprelconqui.CODEMP';

	
	const CODNOM = 'nprelconqui.CODNOM';

	
	const CODCON = 'nprelconqui.CODCON';

	
	const CANTIDAD = 'nprelconqui.CANTIDAD';

	
	const MONTO = 'nprelconqui.MONTO';

	
	const FECINI = 'nprelconqui.FECINI';

	
	const FECEXP = 'nprelconqui.FECEXP';

	
	const CALCON = 'nprelconqui.CALCON';

	
	const ACTCON = 'nprelconqui.ACTCON';

	
	const NOMSUS = 'nprelconqui.NOMSUS';

	
	const CODPRE = 'nprelconqui.CODPRE';

	
	const ID = 'nprelconqui.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codemp', 'Codnom', 'Codcon', 'Cantidad', 'Monto', 'Fecini', 'Fecexp', 'Calcon', 'Actcon', 'Nomsus', 'Codpre', 'Id', ),
		BasePeer::TYPE_COLNAME => array (NprelconquiPeer::CODEMP, NprelconquiPeer::CODNOM, NprelconquiPeer::CODCON, NprelconquiPeer::CANTIDAD, NprelconquiPeer::MONTO, NprelconquiPeer::FECINI, NprelconquiPeer::FECEXP, NprelconquiPeer::CALCON, NprelconquiPeer::ACTCON, NprelconquiPeer::NOMSUS, NprelconquiPeer::CODPRE, NprelconquiPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codemp', 'codnom', 'codcon', 'cantidad', 'monto', 'fecini', 'fecexp', 'calcon', 'actcon', 'nomsus', 'codpre', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codemp' => 0, 'Codnom' => 1, 'Codcon' => 2, 'Cantidad' => 3, 'Monto' => 4, 'Fecini' => 5, 'Fecexp' => 6, 'Calcon' => 7, 'Actcon' => 8, 'Nomsus' => 9, 'Codpre' => 10, 'Id' => 11, ),
		BasePeer::TYPE_COLNAME => array (NprelconquiPeer::CODEMP => 0, NprelconquiPeer::CODNOM => 1, NprelconquiPeer::CODCON => 2, NprelconquiPeer::CANTIDAD => 3, NprelconquiPeer::MONTO => 4, NprelconquiPeer::FECINI => 5, NprelconquiPeer::FECEXP => 6, NprelconquiPeer::CALCON => 7, NprelconquiPeer::ACTCON => 8, NprelconquiPeer::NOMSUS => 9, NprelconquiPeer::CODPRE => 10, NprelconquiPeer::ID => 11, ),
		BasePeer::TYPE_FIELDNAME => array ('codemp' => 0, 'codnom' => 1, 'codcon' => 2, 'cantidad' => 3, 'monto' => 4, 'fecini' => 5, 'fecexp' => 6, 'calcon' => 7, 'actcon' => 8, 'nomsus' => 9, 'codpre' => 10, 'id' => 11, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/nomina/map/NprelconquiMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.nomina.map.NprelconquiMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = NprelconquiPeer::getTableMap();
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
		return str_replace(NprelconquiPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(NprelconquiPeer::CODEMP);

		$criteria->addSelectColumn(NprelconquiPeer::CODNOM);

		$criteria->addSelectColumn(NprelconquiPeer::CODCON);

		$criteria->addSelectColumn(NprelconquiPeer::CANTIDAD);

		$criteria->addSelectColumn(NprelconquiPeer::MONTO);

		$criteria->addSelectColumn(NprelconquiPeer::FECINI);

		$criteria->addSelectColumn(NprelconquiPeer::FECEXP);

		$criteria->addSelectColumn(NprelconquiPeer::CALCON);

		$criteria->addSelectColumn(NprelconquiPeer::ACTCON);

		$criteria->addSelectColumn(NprelconquiPeer::NOMSUS);

		$criteria->addSelectColumn(NprelconquiPeer::CODPRE);

		$criteria->addSelectColumn(NprelconquiPeer::ID);

	}

	const COUNT = 'COUNT(nprelconqui.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT nprelconqui.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(NprelconquiPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(NprelconquiPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = NprelconquiPeer::doSelectRS($criteria, $con);
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
		$objects = NprelconquiPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return NprelconquiPeer::populateObjects(NprelconquiPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			NprelconquiPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = NprelconquiPeer::getOMClass();
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
		return NprelconquiPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(NprelconquiPeer::ID); 

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
			$comparison = $criteria->getComparison(NprelconquiPeer::ID);
			$selectCriteria->add(NprelconquiPeer::ID, $criteria->remove(NprelconquiPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(NprelconquiPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(NprelconquiPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Nprelconqui) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(NprelconquiPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Nprelconqui $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(NprelconquiPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(NprelconquiPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(NprelconquiPeer::DATABASE_NAME, NprelconquiPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = NprelconquiPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(NprelconquiPeer::DATABASE_NAME);

		$criteria->add(NprelconquiPeer::ID, $pk);


		$v = NprelconquiPeer::doSelect($criteria, $con);

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
			$criteria->add(NprelconquiPeer::ID, $pks, Criteria::IN);
			$objs = NprelconquiPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseNprelconquiPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/nomina/map/NprelconquiMapBuilder.php';
	Propel::registerMapBuilder('lib.model.nomina.map.NprelconquiMapBuilder');
}
