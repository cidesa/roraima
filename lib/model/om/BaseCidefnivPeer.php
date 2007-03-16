<?php


abstract class BaseCidefnivPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'cidefniv';

	
	const CLASS_DEFAULT = 'lib.model.Cidefniv';

	
	const NUM_COLUMNS = 16;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODEMP = 'cidefniv.CODEMP';

	
	const LONCOD = 'cidefniv.LONCOD';

	
	const RUPCAT = 'cidefniv.RUPCAT';

	
	const RUPPAR = 'cidefniv.RUPPAR';

	
	const NIVDIS = 'cidefniv.NIVDIS';

	
	const FORPRE = 'cidefniv.FORPRE';

	
	const ASIPER = 'cidefniv.ASIPER';

	
	const NUMPER = 'cidefniv.NUMPER';

	
	const PERACT = 'cidefniv.PERACT';

	
	const FECPER = 'cidefniv.FECPER';

	
	const FECINI = 'cidefniv.FECINI';

	
	const FECCIE = 'cidefniv.FECCIE';

	
	const ETADEF = 'cidefniv.ETADEF';

	
	const STAPRC = 'cidefniv.STAPRC';

	
	const CORAEP = 'cidefniv.CORAEP';

	
	const ID = 'cidefniv.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codemp', 'Loncod', 'Rupcat', 'Ruppar', 'Nivdis', 'Forpre', 'Asiper', 'Numper', 'Peract', 'Fecper', 'Fecini', 'Feccie', 'Etadef', 'Staprc', 'Coraep', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CidefnivPeer::CODEMP, CidefnivPeer::LONCOD, CidefnivPeer::RUPCAT, CidefnivPeer::RUPPAR, CidefnivPeer::NIVDIS, CidefnivPeer::FORPRE, CidefnivPeer::ASIPER, CidefnivPeer::NUMPER, CidefnivPeer::PERACT, CidefnivPeer::FECPER, CidefnivPeer::FECINI, CidefnivPeer::FECCIE, CidefnivPeer::ETADEF, CidefnivPeer::STAPRC, CidefnivPeer::CORAEP, CidefnivPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codemp', 'loncod', 'rupcat', 'ruppar', 'nivdis', 'forpre', 'asiper', 'numper', 'peract', 'fecper', 'fecini', 'feccie', 'etadef', 'staprc', 'coraep', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codemp' => 0, 'Loncod' => 1, 'Rupcat' => 2, 'Ruppar' => 3, 'Nivdis' => 4, 'Forpre' => 5, 'Asiper' => 6, 'Numper' => 7, 'Peract' => 8, 'Fecper' => 9, 'Fecini' => 10, 'Feccie' => 11, 'Etadef' => 12, 'Staprc' => 13, 'Coraep' => 14, 'Id' => 15, ),
		BasePeer::TYPE_COLNAME => array (CidefnivPeer::CODEMP => 0, CidefnivPeer::LONCOD => 1, CidefnivPeer::RUPCAT => 2, CidefnivPeer::RUPPAR => 3, CidefnivPeer::NIVDIS => 4, CidefnivPeer::FORPRE => 5, CidefnivPeer::ASIPER => 6, CidefnivPeer::NUMPER => 7, CidefnivPeer::PERACT => 8, CidefnivPeer::FECPER => 9, CidefnivPeer::FECINI => 10, CidefnivPeer::FECCIE => 11, CidefnivPeer::ETADEF => 12, CidefnivPeer::STAPRC => 13, CidefnivPeer::CORAEP => 14, CidefnivPeer::ID => 15, ),
		BasePeer::TYPE_FIELDNAME => array ('codemp' => 0, 'loncod' => 1, 'rupcat' => 2, 'ruppar' => 3, 'nivdis' => 4, 'forpre' => 5, 'asiper' => 6, 'numper' => 7, 'peract' => 8, 'fecper' => 9, 'fecini' => 10, 'feccie' => 11, 'etadef' => 12, 'staprc' => 13, 'coraep' => 14, 'id' => 15, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/CidefnivMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.CidefnivMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CidefnivPeer::getTableMap();
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
		return str_replace(CidefnivPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CidefnivPeer::CODEMP);

		$criteria->addSelectColumn(CidefnivPeer::LONCOD);

		$criteria->addSelectColumn(CidefnivPeer::RUPCAT);

		$criteria->addSelectColumn(CidefnivPeer::RUPPAR);

		$criteria->addSelectColumn(CidefnivPeer::NIVDIS);

		$criteria->addSelectColumn(CidefnivPeer::FORPRE);

		$criteria->addSelectColumn(CidefnivPeer::ASIPER);

		$criteria->addSelectColumn(CidefnivPeer::NUMPER);

		$criteria->addSelectColumn(CidefnivPeer::PERACT);

		$criteria->addSelectColumn(CidefnivPeer::FECPER);

		$criteria->addSelectColumn(CidefnivPeer::FECINI);

		$criteria->addSelectColumn(CidefnivPeer::FECCIE);

		$criteria->addSelectColumn(CidefnivPeer::ETADEF);

		$criteria->addSelectColumn(CidefnivPeer::STAPRC);

		$criteria->addSelectColumn(CidefnivPeer::CORAEP);

		$criteria->addSelectColumn(CidefnivPeer::ID);

	}

	const COUNT = 'COUNT(cidefniv.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT cidefniv.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CidefnivPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CidefnivPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CidefnivPeer::doSelectRS($criteria, $con);
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
		$objects = CidefnivPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CidefnivPeer::populateObjects(CidefnivPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CidefnivPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CidefnivPeer::getOMClass();
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
		return CidefnivPeer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(CidefnivPeer::ID);
			$selectCriteria->add(CidefnivPeer::ID, $criteria->remove(CidefnivPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CidefnivPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CidefnivPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Cidefniv) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CidefnivPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Cidefniv $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CidefnivPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CidefnivPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CidefnivPeer::DATABASE_NAME, CidefnivPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CidefnivPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CidefnivPeer::DATABASE_NAME);

		$criteria->add(CidefnivPeer::ID, $pk);


		$v = CidefnivPeer::doSelect($criteria, $con);

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
			$criteria->add(CidefnivPeer::ID, $pks, Criteria::IN);
			$objs = CidefnivPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCidefnivPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/CidefnivMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.CidefnivMapBuilder');
}
