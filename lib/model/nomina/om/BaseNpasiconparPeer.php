<?php


abstract class BaseNpasiconparPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'npasiconpar';

	
	const CLASS_DEFAULT = 'lib.model.nomina.Npasiconpar';

	
	const NUM_COLUMNS = 10;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODNOM = 'npasiconpar.CODNOM';

	
	const CODTIPCAR = 'npasiconpar.CODTIPCAR';

	
	const GRACAR = 'npasiconpar.GRACAR';

	
	const CODTIP = 'npasiconpar.CODTIP';

	
	const CODTIPCAT = 'npasiconpar.CODTIPCAT';

	
	const CODTIE = 'npasiconpar.CODTIE';

	
	const CODESTEMP = 'npasiconpar.CODESTEMP';

	
	const CODCON = 'npasiconpar.CODCON';

	
	const CODPAR = 'npasiconpar.CODPAR';

	
	const ID = 'npasiconpar.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codnom', 'Codtipcar', 'Gracar', 'Codtip', 'Codtipcat', 'Codtie', 'Codestemp', 'Codcon', 'Codpar', 'Id', ),
		BasePeer::TYPE_COLNAME => array (NpasiconparPeer::CODNOM, NpasiconparPeer::CODTIPCAR, NpasiconparPeer::GRACAR, NpasiconparPeer::CODTIP, NpasiconparPeer::CODTIPCAT, NpasiconparPeer::CODTIE, NpasiconparPeer::CODESTEMP, NpasiconparPeer::CODCON, NpasiconparPeer::CODPAR, NpasiconparPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codnom', 'codtipcar', 'gracar', 'codtip', 'codtipcat', 'codtie', 'codestemp', 'codcon', 'codpar', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codnom' => 0, 'Codtipcar' => 1, 'Gracar' => 2, 'Codtip' => 3, 'Codtipcat' => 4, 'Codtie' => 5, 'Codestemp' => 6, 'Codcon' => 7, 'Codpar' => 8, 'Id' => 9, ),
		BasePeer::TYPE_COLNAME => array (NpasiconparPeer::CODNOM => 0, NpasiconparPeer::CODTIPCAR => 1, NpasiconparPeer::GRACAR => 2, NpasiconparPeer::CODTIP => 3, NpasiconparPeer::CODTIPCAT => 4, NpasiconparPeer::CODTIE => 5, NpasiconparPeer::CODESTEMP => 6, NpasiconparPeer::CODCON => 7, NpasiconparPeer::CODPAR => 8, NpasiconparPeer::ID => 9, ),
		BasePeer::TYPE_FIELDNAME => array ('codnom' => 0, 'codtipcar' => 1, 'gracar' => 2, 'codtip' => 3, 'codtipcat' => 4, 'codtie' => 5, 'codestemp' => 6, 'codcon' => 7, 'codpar' => 8, 'id' => 9, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/nomina/map/NpasiconparMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.nomina.map.NpasiconparMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = NpasiconparPeer::getTableMap();
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
		return str_replace(NpasiconparPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(NpasiconparPeer::CODNOM);

		$criteria->addSelectColumn(NpasiconparPeer::CODTIPCAR);

		$criteria->addSelectColumn(NpasiconparPeer::GRACAR);

		$criteria->addSelectColumn(NpasiconparPeer::CODTIP);

		$criteria->addSelectColumn(NpasiconparPeer::CODTIPCAT);

		$criteria->addSelectColumn(NpasiconparPeer::CODTIE);

		$criteria->addSelectColumn(NpasiconparPeer::CODESTEMP);

		$criteria->addSelectColumn(NpasiconparPeer::CODCON);

		$criteria->addSelectColumn(NpasiconparPeer::CODPAR);

		$criteria->addSelectColumn(NpasiconparPeer::ID);

	}

	const COUNT = 'COUNT(npasiconpar.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT npasiconpar.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(NpasiconparPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(NpasiconparPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = NpasiconparPeer::doSelectRS($criteria, $con);
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
		$objects = NpasiconparPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return NpasiconparPeer::populateObjects(NpasiconparPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			NpasiconparPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = NpasiconparPeer::getOMClass();
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
		return NpasiconparPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(NpasiconparPeer::ID); 

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
			$comparison = $criteria->getComparison(NpasiconparPeer::ID);
			$selectCriteria->add(NpasiconparPeer::ID, $criteria->remove(NpasiconparPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(NpasiconparPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(NpasiconparPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Npasiconpar) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(NpasiconparPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Npasiconpar $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(NpasiconparPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(NpasiconparPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(NpasiconparPeer::DATABASE_NAME, NpasiconparPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = NpasiconparPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(NpasiconparPeer::DATABASE_NAME);

		$criteria->add(NpasiconparPeer::ID, $pk);


		$v = NpasiconparPeer::doSelect($criteria, $con);

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
			$criteria->add(NpasiconparPeer::ID, $pks, Criteria::IN);
			$objs = NpasiconparPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseNpasiconparPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/nomina/map/NpasiconparMapBuilder.php';
	Propel::registerMapBuilder('lib.model.nomina.map.NpasiconparMapBuilder');
}
