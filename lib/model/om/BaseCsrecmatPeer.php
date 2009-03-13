<?php


abstract class BaseCsrecmatPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'csrecmat';

	
	const CLASS_DEFAULT = 'lib.model.Csrecmat';

	
	const NUM_COLUMNS = 10;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODPROD = 'csrecmat.CODPROD';

	
	const CODFAS = 'csrecmat.CODFAS';

	
	const CODART = 'csrecmat.CODART';

	
	const TIPO = 'csrecmat.TIPO';

	
	const TIPMAT = 'csrecmat.TIPMAT';

	
	const CANMAT = 'csrecmat.CANMAT';

	
	const COSTOT = 'csrecmat.COSTOT';

	
	const NROORD = 'csrecmat.NROORD';

	
	const COSUNI = 'csrecmat.COSUNI';

	
	const ID = 'csrecmat.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codprod', 'Codfas', 'Codart', 'Tipo', 'Tipmat', 'Canmat', 'Costot', 'Nroord', 'Cosuni', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CsrecmatPeer::CODPROD, CsrecmatPeer::CODFAS, CsrecmatPeer::CODART, CsrecmatPeer::TIPO, CsrecmatPeer::TIPMAT, CsrecmatPeer::CANMAT, CsrecmatPeer::COSTOT, CsrecmatPeer::NROORD, CsrecmatPeer::COSUNI, CsrecmatPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codprod', 'codfas', 'codart', 'tipo', 'tipmat', 'canmat', 'costot', 'nroord', 'cosuni', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codprod' => 0, 'Codfas' => 1, 'Codart' => 2, 'Tipo' => 3, 'Tipmat' => 4, 'Canmat' => 5, 'Costot' => 6, 'Nroord' => 7, 'Cosuni' => 8, 'Id' => 9, ),
		BasePeer::TYPE_COLNAME => array (CsrecmatPeer::CODPROD => 0, CsrecmatPeer::CODFAS => 1, CsrecmatPeer::CODART => 2, CsrecmatPeer::TIPO => 3, CsrecmatPeer::TIPMAT => 4, CsrecmatPeer::CANMAT => 5, CsrecmatPeer::COSTOT => 6, CsrecmatPeer::NROORD => 7, CsrecmatPeer::COSUNI => 8, CsrecmatPeer::ID => 9, ),
		BasePeer::TYPE_FIELDNAME => array ('codprod' => 0, 'codfas' => 1, 'codart' => 2, 'tipo' => 3, 'tipmat' => 4, 'canmat' => 5, 'costot' => 6, 'nroord' => 7, 'cosuni' => 8, 'id' => 9, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/CsrecmatMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.CsrecmatMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CsrecmatPeer::getTableMap();
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
		return str_replace(CsrecmatPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CsrecmatPeer::CODPROD);

		$criteria->addSelectColumn(CsrecmatPeer::CODFAS);

		$criteria->addSelectColumn(CsrecmatPeer::CODART);

		$criteria->addSelectColumn(CsrecmatPeer::TIPO);

		$criteria->addSelectColumn(CsrecmatPeer::TIPMAT);

		$criteria->addSelectColumn(CsrecmatPeer::CANMAT);

		$criteria->addSelectColumn(CsrecmatPeer::COSTOT);

		$criteria->addSelectColumn(CsrecmatPeer::NROORD);

		$criteria->addSelectColumn(CsrecmatPeer::COSUNI);

		$criteria->addSelectColumn(CsrecmatPeer::ID);

	}

	const COUNT = 'COUNT(csrecmat.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT csrecmat.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CsrecmatPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CsrecmatPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CsrecmatPeer::doSelectRS($criteria, $con);
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
		$objects = CsrecmatPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CsrecmatPeer::populateObjects(CsrecmatPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CsrecmatPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CsrecmatPeer::getOMClass();
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
		return CsrecmatPeer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(CsrecmatPeer::ID);
			$selectCriteria->add(CsrecmatPeer::ID, $criteria->remove(CsrecmatPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CsrecmatPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CsrecmatPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Csrecmat) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CsrecmatPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Csrecmat $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CsrecmatPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CsrecmatPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CsrecmatPeer::DATABASE_NAME, CsrecmatPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CsrecmatPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CsrecmatPeer::DATABASE_NAME);

		$criteria->add(CsrecmatPeer::ID, $pk);


		$v = CsrecmatPeer::doSelect($criteria, $con);

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
			$criteria->add(CsrecmatPeer::ID, $pks, Criteria::IN);
			$objs = CsrecmatPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCsrecmatPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/CsrecmatMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.CsrecmatMapBuilder');
}
