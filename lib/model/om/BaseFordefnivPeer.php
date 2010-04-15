<?php


abstract class BaseFordefnivPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'fordefniv';

	
	const CLASS_DEFAULT = 'lib.model.Fordefniv';

	
	const NUM_COLUMNS = 18;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODEMP = 'fordefniv.CODEMP';

	
	const LONCOD = 'fordefniv.LONCOD';

	
	const RUPCAT = 'fordefniv.RUPCAT';

	
	const RUPPAR = 'fordefniv.RUPPAR';

	
	const NIVDIS = 'fordefniv.NIVDIS';

	
	const FORPRE = 'fordefniv.FORPRE';

	
	const ASIPER = 'fordefniv.ASIPER';

	
	const NUMPER = 'fordefniv.NUMPER';

	
	const PERACT = 'fordefniv.PERACT';

	
	const FECPER = 'fordefniv.FECPER';

	
	const FECINI = 'fordefniv.FECINI';

	
	const FECCIE = 'fordefniv.FECCIE';

	
	const ETADEF = 'fordefniv.ETADEF';

	
	const STAPRC = 'fordefniv.STAPRC';

	
	const CORAEP = 'fordefniv.CORAEP';

	
	const NIVOBR = 'fordefniv.NIVOBR';

	
	const CARAEP = 'fordefniv.CARAEP';

	
	const ID = 'fordefniv.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codemp', 'Loncod', 'Rupcat', 'Ruppar', 'Nivdis', 'Forpre', 'Asiper', 'Numper', 'Peract', 'Fecper', 'Fecini', 'Feccie', 'Etadef', 'Staprc', 'Coraep', 'Nivobr', 'Caraep', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FordefnivPeer::CODEMP, FordefnivPeer::LONCOD, FordefnivPeer::RUPCAT, FordefnivPeer::RUPPAR, FordefnivPeer::NIVDIS, FordefnivPeer::FORPRE, FordefnivPeer::ASIPER, FordefnivPeer::NUMPER, FordefnivPeer::PERACT, FordefnivPeer::FECPER, FordefnivPeer::FECINI, FordefnivPeer::FECCIE, FordefnivPeer::ETADEF, FordefnivPeer::STAPRC, FordefnivPeer::CORAEP, FordefnivPeer::NIVOBR, FordefnivPeer::CARAEP, FordefnivPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codemp', 'loncod', 'rupcat', 'ruppar', 'nivdis', 'forpre', 'asiper', 'numper', 'peract', 'fecper', 'fecini', 'feccie', 'etadef', 'staprc', 'coraep', 'nivobr', 'caraep', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codemp' => 0, 'Loncod' => 1, 'Rupcat' => 2, 'Ruppar' => 3, 'Nivdis' => 4, 'Forpre' => 5, 'Asiper' => 6, 'Numper' => 7, 'Peract' => 8, 'Fecper' => 9, 'Fecini' => 10, 'Feccie' => 11, 'Etadef' => 12, 'Staprc' => 13, 'Coraep' => 14, 'Nivobr' => 15, 'Caraep' => 16, 'Id' => 17, ),
		BasePeer::TYPE_COLNAME => array (FordefnivPeer::CODEMP => 0, FordefnivPeer::LONCOD => 1, FordefnivPeer::RUPCAT => 2, FordefnivPeer::RUPPAR => 3, FordefnivPeer::NIVDIS => 4, FordefnivPeer::FORPRE => 5, FordefnivPeer::ASIPER => 6, FordefnivPeer::NUMPER => 7, FordefnivPeer::PERACT => 8, FordefnivPeer::FECPER => 9, FordefnivPeer::FECINI => 10, FordefnivPeer::FECCIE => 11, FordefnivPeer::ETADEF => 12, FordefnivPeer::STAPRC => 13, FordefnivPeer::CORAEP => 14, FordefnivPeer::NIVOBR => 15, FordefnivPeer::CARAEP => 16, FordefnivPeer::ID => 17, ),
		BasePeer::TYPE_FIELDNAME => array ('codemp' => 0, 'loncod' => 1, 'rupcat' => 2, 'ruppar' => 3, 'nivdis' => 4, 'forpre' => 5, 'asiper' => 6, 'numper' => 7, 'peract' => 8, 'fecper' => 9, 'fecini' => 10, 'feccie' => 11, 'etadef' => 12, 'staprc' => 13, 'coraep' => 14, 'nivobr' => 15, 'caraep' => 16, 'id' => 17, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/FordefnivMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.FordefnivMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FordefnivPeer::getTableMap();
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
		return str_replace(FordefnivPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FordefnivPeer::CODEMP);

		$criteria->addSelectColumn(FordefnivPeer::LONCOD);

		$criteria->addSelectColumn(FordefnivPeer::RUPCAT);

		$criteria->addSelectColumn(FordefnivPeer::RUPPAR);

		$criteria->addSelectColumn(FordefnivPeer::NIVDIS);

		$criteria->addSelectColumn(FordefnivPeer::FORPRE);

		$criteria->addSelectColumn(FordefnivPeer::ASIPER);

		$criteria->addSelectColumn(FordefnivPeer::NUMPER);

		$criteria->addSelectColumn(FordefnivPeer::PERACT);

		$criteria->addSelectColumn(FordefnivPeer::FECPER);

		$criteria->addSelectColumn(FordefnivPeer::FECINI);

		$criteria->addSelectColumn(FordefnivPeer::FECCIE);

		$criteria->addSelectColumn(FordefnivPeer::ETADEF);

		$criteria->addSelectColumn(FordefnivPeer::STAPRC);

		$criteria->addSelectColumn(FordefnivPeer::CORAEP);

		$criteria->addSelectColumn(FordefnivPeer::NIVOBR);

		$criteria->addSelectColumn(FordefnivPeer::CARAEP);

		$criteria->addSelectColumn(FordefnivPeer::ID);

	}

	const COUNT = 'COUNT(fordefniv.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT fordefniv.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FordefnivPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FordefnivPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FordefnivPeer::doSelectRS($criteria, $con);
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
		$objects = FordefnivPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FordefnivPeer::populateObjects(FordefnivPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FordefnivPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FordefnivPeer::getOMClass();
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
		return FordefnivPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(FordefnivPeer::ID); 

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
			$comparison = $criteria->getComparison(FordefnivPeer::ID);
			$selectCriteria->add(FordefnivPeer::ID, $criteria->remove(FordefnivPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FordefnivPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FordefnivPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Fordefniv) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FordefnivPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Fordefniv $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FordefnivPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FordefnivPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FordefnivPeer::DATABASE_NAME, FordefnivPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FordefnivPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FordefnivPeer::DATABASE_NAME);

		$criteria->add(FordefnivPeer::ID, $pk);


		$v = FordefnivPeer::doSelect($criteria, $con);

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
			$criteria->add(FordefnivPeer::ID, $pks, Criteria::IN);
			$objs = FordefnivPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFordefnivPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/FordefnivMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.FordefnivMapBuilder');
}
