<?php


abstract class BaseOpfacturPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'opfactur';

	
	const CLASS_DEFAULT = 'lib.model.Opfactur';

	
	const NUM_COLUMNS = 22;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMORD = 'opfactur.NUMORD';

	
	const FECFAC = 'opfactur.FECFAC';

	
	const NUMFAC = 'opfactur.NUMFAC';

	
	const NUMCTR = 'opfactur.NUMCTR';

	
	const TIPTRA = 'opfactur.TIPTRA';

	
	const TOTFAC = 'opfactur.TOTFAC';

	
	const EXEIVA = 'opfactur.EXEIVA';

	
	const BASIMP = 'opfactur.BASIMP';

	
	const PORIVA = 'opfactur.PORIVA';

	
	const MONIVA = 'opfactur.MONIVA';

	
	const MONRET = 'opfactur.MONRET';

	
	const BASLTF = 'opfactur.BASLTF';

	
	const PORLTF = 'opfactur.PORLTF';

	
	const MONLTF = 'opfactur.MONLTF';

	
	const BASISLR = 'opfactur.BASISLR';

	
	const PORISLR = 'opfactur.PORISLR';

	
	const MONISLR = 'opfactur.MONISLR';

	
	const CODISLR = 'opfactur.CODISLR';

	
	const RIFALT = 'opfactur.RIFALT';

	
	const FACAFE = 'opfactur.FACAFE';

	
	const OBSERVACION = 'opfactur.OBSERVACION';

	
	const ID = 'opfactur.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numord', 'Fecfac', 'Numfac', 'Numctr', 'Tiptra', 'Totfac', 'Exeiva', 'Basimp', 'Poriva', 'Moniva', 'Monret', 'Basltf', 'Porltf', 'Monltf', 'Basislr', 'Porislr', 'Monislr', 'Codislr', 'Rifalt', 'Facafe', 'Observacion', 'Id', ),
		BasePeer::TYPE_COLNAME => array (OpfacturPeer::NUMORD, OpfacturPeer::FECFAC, OpfacturPeer::NUMFAC, OpfacturPeer::NUMCTR, OpfacturPeer::TIPTRA, OpfacturPeer::TOTFAC, OpfacturPeer::EXEIVA, OpfacturPeer::BASIMP, OpfacturPeer::PORIVA, OpfacturPeer::MONIVA, OpfacturPeer::MONRET, OpfacturPeer::BASLTF, OpfacturPeer::PORLTF, OpfacturPeer::MONLTF, OpfacturPeer::BASISLR, OpfacturPeer::PORISLR, OpfacturPeer::MONISLR, OpfacturPeer::CODISLR, OpfacturPeer::RIFALT, OpfacturPeer::FACAFE, OpfacturPeer::OBSERVACION, OpfacturPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numord', 'fecfac', 'numfac', 'numctr', 'tiptra', 'totfac', 'exeiva', 'basimp', 'poriva', 'moniva', 'monret', 'basltf', 'porltf', 'monltf', 'basislr', 'porislr', 'monislr', 'codislr', 'rifalt', 'facafe', 'observacion', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numord' => 0, 'Fecfac' => 1, 'Numfac' => 2, 'Numctr' => 3, 'Tiptra' => 4, 'Totfac' => 5, 'Exeiva' => 6, 'Basimp' => 7, 'Poriva' => 8, 'Moniva' => 9, 'Monret' => 10, 'Basltf' => 11, 'Porltf' => 12, 'Monltf' => 13, 'Basislr' => 14, 'Porislr' => 15, 'Monislr' => 16, 'Codislr' => 17, 'Rifalt' => 18, 'Facafe' => 19, 'Observacion' => 20, 'Id' => 21, ),
		BasePeer::TYPE_COLNAME => array (OpfacturPeer::NUMORD => 0, OpfacturPeer::FECFAC => 1, OpfacturPeer::NUMFAC => 2, OpfacturPeer::NUMCTR => 3, OpfacturPeer::TIPTRA => 4, OpfacturPeer::TOTFAC => 5, OpfacturPeer::EXEIVA => 6, OpfacturPeer::BASIMP => 7, OpfacturPeer::PORIVA => 8, OpfacturPeer::MONIVA => 9, OpfacturPeer::MONRET => 10, OpfacturPeer::BASLTF => 11, OpfacturPeer::PORLTF => 12, OpfacturPeer::MONLTF => 13, OpfacturPeer::BASISLR => 14, OpfacturPeer::PORISLR => 15, OpfacturPeer::MONISLR => 16, OpfacturPeer::CODISLR => 17, OpfacturPeer::RIFALT => 18, OpfacturPeer::FACAFE => 19, OpfacturPeer::OBSERVACION => 20, OpfacturPeer::ID => 21, ),
		BasePeer::TYPE_FIELDNAME => array ('numord' => 0, 'fecfac' => 1, 'numfac' => 2, 'numctr' => 3, 'tiptra' => 4, 'totfac' => 5, 'exeiva' => 6, 'basimp' => 7, 'poriva' => 8, 'moniva' => 9, 'monret' => 10, 'basltf' => 11, 'porltf' => 12, 'monltf' => 13, 'basislr' => 14, 'porislr' => 15, 'monislr' => 16, 'codislr' => 17, 'rifalt' => 18, 'facafe' => 19, 'observacion' => 20, 'id' => 21, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/OpfacturMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.OpfacturMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = OpfacturPeer::getTableMap();
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
		return str_replace(OpfacturPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(OpfacturPeer::NUMORD);

		$criteria->addSelectColumn(OpfacturPeer::FECFAC);

		$criteria->addSelectColumn(OpfacturPeer::NUMFAC);

		$criteria->addSelectColumn(OpfacturPeer::NUMCTR);

		$criteria->addSelectColumn(OpfacturPeer::TIPTRA);

		$criteria->addSelectColumn(OpfacturPeer::TOTFAC);

		$criteria->addSelectColumn(OpfacturPeer::EXEIVA);

		$criteria->addSelectColumn(OpfacturPeer::BASIMP);

		$criteria->addSelectColumn(OpfacturPeer::PORIVA);

		$criteria->addSelectColumn(OpfacturPeer::MONIVA);

		$criteria->addSelectColumn(OpfacturPeer::MONRET);

		$criteria->addSelectColumn(OpfacturPeer::BASLTF);

		$criteria->addSelectColumn(OpfacturPeer::PORLTF);

		$criteria->addSelectColumn(OpfacturPeer::MONLTF);

		$criteria->addSelectColumn(OpfacturPeer::BASISLR);

		$criteria->addSelectColumn(OpfacturPeer::PORISLR);

		$criteria->addSelectColumn(OpfacturPeer::MONISLR);

		$criteria->addSelectColumn(OpfacturPeer::CODISLR);

		$criteria->addSelectColumn(OpfacturPeer::RIFALT);

		$criteria->addSelectColumn(OpfacturPeer::FACAFE);

		$criteria->addSelectColumn(OpfacturPeer::OBSERVACION);

		$criteria->addSelectColumn(OpfacturPeer::ID);

	}

	const COUNT = 'COUNT(opfactur.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT opfactur.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(OpfacturPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(OpfacturPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = OpfacturPeer::doSelectRS($criteria, $con);
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
		$objects = OpfacturPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return OpfacturPeer::populateObjects(OpfacturPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			OpfacturPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = OpfacturPeer::getOMClass();
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
		return OpfacturPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(OpfacturPeer::ID); 

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
			$comparison = $criteria->getComparison(OpfacturPeer::ID);
			$selectCriteria->add(OpfacturPeer::ID, $criteria->remove(OpfacturPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(OpfacturPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(OpfacturPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Opfactur) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(OpfacturPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Opfactur $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(OpfacturPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(OpfacturPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(OpfacturPeer::DATABASE_NAME, OpfacturPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = OpfacturPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(OpfacturPeer::DATABASE_NAME);

		$criteria->add(OpfacturPeer::ID, $pk);


		$v = OpfacturPeer::doSelect($criteria, $con);

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
			$criteria->add(OpfacturPeer::ID, $pks, Criteria::IN);
			$objs = OpfacturPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseOpfacturPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/OpfacturMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.OpfacturMapBuilder');
}
