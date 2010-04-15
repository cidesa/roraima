<?php


abstract class BaseNpmaeembPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'npmaeemb';

	
	const CLASS_DEFAULT = 'lib.model.nomina.Npmaeemb';

	
	const NUM_COLUMNS = 10;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODEMB = 'npmaeemb.CODEMB';

	
	const DESEMB = 'npmaeemb.DESEMB';

	
	const CODJUZ = 'npmaeemb.CODJUZ';

	
	const CODEMP = 'npmaeemb.CODEMP';

	
	const FECREGEMB = 'npmaeemb.FECREGEMB';

	
	const CODCONEMB = 'npmaeemb.CODCONEMB';

	
	const TIPDIS = 'npmaeemb.TIPDIS';

	
	const TIPCAL = 'npmaeemb.TIPCAL';

	
	const MONTOTEMB = 'npmaeemb.MONTOTEMB';

	
	const ID = 'npmaeemb.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codemb', 'Desemb', 'Codjuz', 'Codemp', 'Fecregemb', 'Codconemb', 'Tipdis', 'Tipcal', 'Montotemb', 'Id', ),
		BasePeer::TYPE_COLNAME => array (NpmaeembPeer::CODEMB, NpmaeembPeer::DESEMB, NpmaeembPeer::CODJUZ, NpmaeembPeer::CODEMP, NpmaeembPeer::FECREGEMB, NpmaeembPeer::CODCONEMB, NpmaeembPeer::TIPDIS, NpmaeembPeer::TIPCAL, NpmaeembPeer::MONTOTEMB, NpmaeembPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codemb', 'desemb', 'codjuz', 'codemp', 'fecregemb', 'codconemb', 'tipdis', 'tipcal', 'montotemb', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codemb' => 0, 'Desemb' => 1, 'Codjuz' => 2, 'Codemp' => 3, 'Fecregemb' => 4, 'Codconemb' => 5, 'Tipdis' => 6, 'Tipcal' => 7, 'Montotemb' => 8, 'Id' => 9, ),
		BasePeer::TYPE_COLNAME => array (NpmaeembPeer::CODEMB => 0, NpmaeembPeer::DESEMB => 1, NpmaeembPeer::CODJUZ => 2, NpmaeembPeer::CODEMP => 3, NpmaeembPeer::FECREGEMB => 4, NpmaeembPeer::CODCONEMB => 5, NpmaeembPeer::TIPDIS => 6, NpmaeembPeer::TIPCAL => 7, NpmaeembPeer::MONTOTEMB => 8, NpmaeembPeer::ID => 9, ),
		BasePeer::TYPE_FIELDNAME => array ('codemb' => 0, 'desemb' => 1, 'codjuz' => 2, 'codemp' => 3, 'fecregemb' => 4, 'codconemb' => 5, 'tipdis' => 6, 'tipcal' => 7, 'montotemb' => 8, 'id' => 9, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/nomina/map/NpmaeembMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.nomina.map.NpmaeembMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = NpmaeembPeer::getTableMap();
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
		return str_replace(NpmaeembPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(NpmaeembPeer::CODEMB);

		$criteria->addSelectColumn(NpmaeembPeer::DESEMB);

		$criteria->addSelectColumn(NpmaeembPeer::CODJUZ);

		$criteria->addSelectColumn(NpmaeembPeer::CODEMP);

		$criteria->addSelectColumn(NpmaeembPeer::FECREGEMB);

		$criteria->addSelectColumn(NpmaeembPeer::CODCONEMB);

		$criteria->addSelectColumn(NpmaeembPeer::TIPDIS);

		$criteria->addSelectColumn(NpmaeembPeer::TIPCAL);

		$criteria->addSelectColumn(NpmaeembPeer::MONTOTEMB);

		$criteria->addSelectColumn(NpmaeembPeer::ID);

	}

	const COUNT = 'COUNT(npmaeemb.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT npmaeemb.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(NpmaeembPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(NpmaeembPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = NpmaeembPeer::doSelectRS($criteria, $con);
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
		$objects = NpmaeembPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return NpmaeembPeer::populateObjects(NpmaeembPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			NpmaeembPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = NpmaeembPeer::getOMClass();
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
		return NpmaeembPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(NpmaeembPeer::ID); 

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
			$comparison = $criteria->getComparison(NpmaeembPeer::ID);
			$selectCriteria->add(NpmaeembPeer::ID, $criteria->remove(NpmaeembPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(NpmaeembPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(NpmaeembPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Npmaeemb) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(NpmaeembPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Npmaeemb $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(NpmaeembPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(NpmaeembPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(NpmaeembPeer::DATABASE_NAME, NpmaeembPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = NpmaeembPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(NpmaeembPeer::DATABASE_NAME);

		$criteria->add(NpmaeembPeer::ID, $pk);


		$v = NpmaeembPeer::doSelect($criteria, $con);

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
			$criteria->add(NpmaeembPeer::ID, $pks, Criteria::IN);
			$objs = NpmaeembPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseNpmaeembPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/nomina/map/NpmaeembMapBuilder.php';
	Propel::registerMapBuilder('lib.model.nomina.map.NpmaeembMapBuilder');
}
