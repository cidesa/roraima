<?php


abstract class BaseNphisconRPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'nphiscon_r';

	
	const CLASS_DEFAULT = 'lib.model.NphisconR';

	
	const NUM_COLUMNS = 14;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODNOM = 'nphiscon_r.CODNOM';

	
	const CODEMP = 'nphiscon_r.CODEMP';

	
	const CODCAR = 'nphiscon_r.CODCAR';

	
	const CODCON = 'nphiscon_r.CODCON';

	
	const FECNOM = 'nphiscon_r.FECNOM';

	
	const MONTO = 'nphiscon_r.MONTO';

	
	const CODCAT = 'nphiscon_r.CODCAT';

	
	const CODPAR = 'nphiscon_r.CODPAR';

	
	const CODESCUELA = 'nphiscon_r.CODESCUELA';

	
	const CODNIV = 'nphiscon_r.CODNIV';

	
	const CODTIPGAS = 'nphiscon_r.CODTIPGAS';

	
	const NOMCON = 'nphiscon_r.NOMCON';

	
	const NUMREC = 'nphiscon_r.NUMREC';

	
	const ID = 'nphiscon_r.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codnom', 'Codemp', 'Codcar', 'Codcon', 'Fecnom', 'Monto', 'Codcat', 'Codpar', 'Codescuela', 'Codniv', 'Codtipgas', 'Nomcon', 'Numrec', 'Id', ),
		BasePeer::TYPE_COLNAME => array (NphisconRPeer::CODNOM, NphisconRPeer::CODEMP, NphisconRPeer::CODCAR, NphisconRPeer::CODCON, NphisconRPeer::FECNOM, NphisconRPeer::MONTO, NphisconRPeer::CODCAT, NphisconRPeer::CODPAR, NphisconRPeer::CODESCUELA, NphisconRPeer::CODNIV, NphisconRPeer::CODTIPGAS, NphisconRPeer::NOMCON, NphisconRPeer::NUMREC, NphisconRPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codnom', 'codemp', 'codcar', 'codcon', 'fecnom', 'monto', 'codcat', 'codpar', 'codescuela', 'codniv', 'codtipgas', 'nomcon', 'numrec', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codnom' => 0, 'Codemp' => 1, 'Codcar' => 2, 'Codcon' => 3, 'Fecnom' => 4, 'Monto' => 5, 'Codcat' => 6, 'Codpar' => 7, 'Codescuela' => 8, 'Codniv' => 9, 'Codtipgas' => 10, 'Nomcon' => 11, 'Numrec' => 12, 'Id' => 13, ),
		BasePeer::TYPE_COLNAME => array (NphisconRPeer::CODNOM => 0, NphisconRPeer::CODEMP => 1, NphisconRPeer::CODCAR => 2, NphisconRPeer::CODCON => 3, NphisconRPeer::FECNOM => 4, NphisconRPeer::MONTO => 5, NphisconRPeer::CODCAT => 6, NphisconRPeer::CODPAR => 7, NphisconRPeer::CODESCUELA => 8, NphisconRPeer::CODNIV => 9, NphisconRPeer::CODTIPGAS => 10, NphisconRPeer::NOMCON => 11, NphisconRPeer::NUMREC => 12, NphisconRPeer::ID => 13, ),
		BasePeer::TYPE_FIELDNAME => array ('codnom' => 0, 'codemp' => 1, 'codcar' => 2, 'codcon' => 3, 'fecnom' => 4, 'monto' => 5, 'codcat' => 6, 'codpar' => 7, 'codescuela' => 8, 'codniv' => 9, 'codtipgas' => 10, 'nomcon' => 11, 'numrec' => 12, 'id' => 13, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/NphisconRMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.NphisconRMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = NphisconRPeer::getTableMap();
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
		return str_replace(NphisconRPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(NphisconRPeer::CODNOM);

		$criteria->addSelectColumn(NphisconRPeer::CODEMP);

		$criteria->addSelectColumn(NphisconRPeer::CODCAR);

		$criteria->addSelectColumn(NphisconRPeer::CODCON);

		$criteria->addSelectColumn(NphisconRPeer::FECNOM);

		$criteria->addSelectColumn(NphisconRPeer::MONTO);

		$criteria->addSelectColumn(NphisconRPeer::CODCAT);

		$criteria->addSelectColumn(NphisconRPeer::CODPAR);

		$criteria->addSelectColumn(NphisconRPeer::CODESCUELA);

		$criteria->addSelectColumn(NphisconRPeer::CODNIV);

		$criteria->addSelectColumn(NphisconRPeer::CODTIPGAS);

		$criteria->addSelectColumn(NphisconRPeer::NOMCON);

		$criteria->addSelectColumn(NphisconRPeer::NUMREC);

		$criteria->addSelectColumn(NphisconRPeer::ID);

	}

	const COUNT = 'COUNT(nphiscon_r.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT nphiscon_r.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(NphisconRPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(NphisconRPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = NphisconRPeer::doSelectRS($criteria, $con);
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
		$objects = NphisconRPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return NphisconRPeer::populateObjects(NphisconRPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			NphisconRPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = NphisconRPeer::getOMClass();
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
		return NphisconRPeer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(NphisconRPeer::ID);
			$selectCriteria->add(NphisconRPeer::ID, $criteria->remove(NphisconRPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(NphisconRPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(NphisconRPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof NphisconR) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(NphisconRPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(NphisconR $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(NphisconRPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(NphisconRPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(NphisconRPeer::DATABASE_NAME, NphisconRPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = NphisconRPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(NphisconRPeer::DATABASE_NAME);

		$criteria->add(NphisconRPeer::ID, $pk);


		$v = NphisconRPeer::doSelect($criteria, $con);

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
			$criteria->add(NphisconRPeer::ID, $pks, Criteria::IN);
			$objs = NphisconRPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseNphisconRPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/NphisconRMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.NphisconRMapBuilder');
}
