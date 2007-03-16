<?php


abstract class BaseCaregart1Peer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'caregart1';

	
	const CLASS_DEFAULT = 'lib.model.Caregart1';

	
	const NUM_COLUMNS = 29;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODART = 'caregart1.CODART';

	
	const DESART = 'caregart1.DESART';

	
	const CODCTA = 'caregart1.CODCTA';

	
	const CODPAR = 'caregart1.CODPAR';

	
	const RAMART = 'caregart1.RAMART';

	
	const COSULT = 'caregart1.COSULT';

	
	const COSPRO = 'caregart1.COSPRO';

	
	const EXITOT = 'caregart1.EXITOT';

	
	const UNIMED = 'caregart1.UNIMED';

	
	const UNIALT = 'caregart1.UNIALT';

	
	const RELART = 'caregart1.RELART';

	
	const FECULT = 'caregart1.FECULT';

	
	const INVINI = 'caregart1.INVINI';

	
	const CODMAR = 'caregart1.CODMAR';

	
	const CODREF = 'caregart1.CODREF';

	
	const COSTOT = 'caregart1.COSTOT';

	
	const SIGECOF = 'caregart1.SIGECOF';

	
	const CODCLAART = 'caregart1.CODCLAART';

	
	const LOTUNI = 'caregart1.LOTUNI';

	
	const CTAVTA = 'caregart1.CTAVTA';

	
	const CTACOS = 'caregart1.CTACOS';

	
	const CTAPRO = 'caregart1.CTAPRO';

	
	const PREART = 'caregart1.PREART';

	
	const DISTOT = 'caregart1.DISTOT';

	
	const TIPO = 'caregart1.TIPO';

	
	const TIP0 = 'caregart1.TIP0';

	
	const CODING = 'caregart1.CODING';

	
	const MERCON = 'caregart1.MERCON';

	
	const ID = 'caregart1.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codart', 'Desart', 'Codcta', 'Codpar', 'Ramart', 'Cosult', 'Cospro', 'Exitot', 'Unimed', 'Unialt', 'Relart', 'Fecult', 'Invini', 'Codmar', 'Codref', 'Costot', 'Sigecof', 'Codclaart', 'Lotuni', 'Ctavta', 'Ctacos', 'Ctapro', 'Preart', 'Distot', 'Tipo', 'Tip0', 'Coding', 'Mercon', 'Id', ),
		BasePeer::TYPE_COLNAME => array (Caregart1Peer::CODART, Caregart1Peer::DESART, Caregart1Peer::CODCTA, Caregart1Peer::CODPAR, Caregart1Peer::RAMART, Caregart1Peer::COSULT, Caregart1Peer::COSPRO, Caregart1Peer::EXITOT, Caregart1Peer::UNIMED, Caregart1Peer::UNIALT, Caregart1Peer::RELART, Caregart1Peer::FECULT, Caregart1Peer::INVINI, Caregart1Peer::CODMAR, Caregart1Peer::CODREF, Caregart1Peer::COSTOT, Caregart1Peer::SIGECOF, Caregart1Peer::CODCLAART, Caregart1Peer::LOTUNI, Caregart1Peer::CTAVTA, Caregart1Peer::CTACOS, Caregart1Peer::CTAPRO, Caregart1Peer::PREART, Caregart1Peer::DISTOT, Caregart1Peer::TIPO, Caregart1Peer::TIP0, Caregart1Peer::CODING, Caregart1Peer::MERCON, Caregart1Peer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codart', 'desart', 'codcta', 'codpar', 'ramart', 'cosult', 'cospro', 'exitot', 'unimed', 'unialt', 'relart', 'fecult', 'invini', 'codmar', 'codref', 'costot', 'sigecof', 'codclaart', 'lotuni', 'ctavta', 'ctacos', 'ctapro', 'preart', 'distot', 'tipo', 'tip0', 'coding', 'mercon', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codart' => 0, 'Desart' => 1, 'Codcta' => 2, 'Codpar' => 3, 'Ramart' => 4, 'Cosult' => 5, 'Cospro' => 6, 'Exitot' => 7, 'Unimed' => 8, 'Unialt' => 9, 'Relart' => 10, 'Fecult' => 11, 'Invini' => 12, 'Codmar' => 13, 'Codref' => 14, 'Costot' => 15, 'Sigecof' => 16, 'Codclaart' => 17, 'Lotuni' => 18, 'Ctavta' => 19, 'Ctacos' => 20, 'Ctapro' => 21, 'Preart' => 22, 'Distot' => 23, 'Tipo' => 24, 'Tip0' => 25, 'Coding' => 26, 'Mercon' => 27, 'Id' => 28, ),
		BasePeer::TYPE_COLNAME => array (Caregart1Peer::CODART => 0, Caregart1Peer::DESART => 1, Caregart1Peer::CODCTA => 2, Caregart1Peer::CODPAR => 3, Caregart1Peer::RAMART => 4, Caregart1Peer::COSULT => 5, Caregart1Peer::COSPRO => 6, Caregart1Peer::EXITOT => 7, Caregart1Peer::UNIMED => 8, Caregart1Peer::UNIALT => 9, Caregart1Peer::RELART => 10, Caregart1Peer::FECULT => 11, Caregart1Peer::INVINI => 12, Caregart1Peer::CODMAR => 13, Caregart1Peer::CODREF => 14, Caregart1Peer::COSTOT => 15, Caregart1Peer::SIGECOF => 16, Caregart1Peer::CODCLAART => 17, Caregart1Peer::LOTUNI => 18, Caregart1Peer::CTAVTA => 19, Caregart1Peer::CTACOS => 20, Caregart1Peer::CTAPRO => 21, Caregart1Peer::PREART => 22, Caregart1Peer::DISTOT => 23, Caregart1Peer::TIPO => 24, Caregart1Peer::TIP0 => 25, Caregart1Peer::CODING => 26, Caregart1Peer::MERCON => 27, Caregart1Peer::ID => 28, ),
		BasePeer::TYPE_FIELDNAME => array ('codart' => 0, 'desart' => 1, 'codcta' => 2, 'codpar' => 3, 'ramart' => 4, 'cosult' => 5, 'cospro' => 6, 'exitot' => 7, 'unimed' => 8, 'unialt' => 9, 'relart' => 10, 'fecult' => 11, 'invini' => 12, 'codmar' => 13, 'codref' => 14, 'costot' => 15, 'sigecof' => 16, 'codclaart' => 17, 'lotuni' => 18, 'ctavta' => 19, 'ctacos' => 20, 'ctapro' => 21, 'preart' => 22, 'distot' => 23, 'tipo' => 24, 'tip0' => 25, 'coding' => 26, 'mercon' => 27, 'id' => 28, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/Caregart1MapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.Caregart1MapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = Caregart1Peer::getTableMap();
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
		return str_replace(Caregart1Peer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(Caregart1Peer::CODART);

		$criteria->addSelectColumn(Caregart1Peer::DESART);

		$criteria->addSelectColumn(Caregart1Peer::CODCTA);

		$criteria->addSelectColumn(Caregart1Peer::CODPAR);

		$criteria->addSelectColumn(Caregart1Peer::RAMART);

		$criteria->addSelectColumn(Caregart1Peer::COSULT);

		$criteria->addSelectColumn(Caregart1Peer::COSPRO);

		$criteria->addSelectColumn(Caregart1Peer::EXITOT);

		$criteria->addSelectColumn(Caregart1Peer::UNIMED);

		$criteria->addSelectColumn(Caregart1Peer::UNIALT);

		$criteria->addSelectColumn(Caregart1Peer::RELART);

		$criteria->addSelectColumn(Caregart1Peer::FECULT);

		$criteria->addSelectColumn(Caregart1Peer::INVINI);

		$criteria->addSelectColumn(Caregart1Peer::CODMAR);

		$criteria->addSelectColumn(Caregart1Peer::CODREF);

		$criteria->addSelectColumn(Caregart1Peer::COSTOT);

		$criteria->addSelectColumn(Caregart1Peer::SIGECOF);

		$criteria->addSelectColumn(Caregart1Peer::CODCLAART);

		$criteria->addSelectColumn(Caregart1Peer::LOTUNI);

		$criteria->addSelectColumn(Caregart1Peer::CTAVTA);

		$criteria->addSelectColumn(Caregart1Peer::CTACOS);

		$criteria->addSelectColumn(Caregart1Peer::CTAPRO);

		$criteria->addSelectColumn(Caregart1Peer::PREART);

		$criteria->addSelectColumn(Caregart1Peer::DISTOT);

		$criteria->addSelectColumn(Caregart1Peer::TIPO);

		$criteria->addSelectColumn(Caregart1Peer::TIP0);

		$criteria->addSelectColumn(Caregart1Peer::CODING);

		$criteria->addSelectColumn(Caregart1Peer::MERCON);

		$criteria->addSelectColumn(Caregart1Peer::ID);

	}

	const COUNT = 'COUNT(caregart1.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT caregart1.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(Caregart1Peer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(Caregart1Peer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = Caregart1Peer::doSelectRS($criteria, $con);
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
		$objects = Caregart1Peer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return Caregart1Peer::populateObjects(Caregart1Peer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			Caregart1Peer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = Caregart1Peer::getOMClass();
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
		return Caregart1Peer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(Caregart1Peer::ID);
			$selectCriteria->add(Caregart1Peer::ID, $criteria->remove(Caregart1Peer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(Caregart1Peer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(Caregart1Peer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Caregart1) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(Caregart1Peer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Caregart1 $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(Caregart1Peer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(Caregart1Peer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(Caregart1Peer::DATABASE_NAME, Caregart1Peer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = Caregart1Peer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(Caregart1Peer::DATABASE_NAME);

		$criteria->add(Caregart1Peer::ID, $pk);


		$v = Caregart1Peer::doSelect($criteria, $con);

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
			$criteria->add(Caregart1Peer::ID, $pks, Criteria::IN);
			$objs = Caregart1Peer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCaregart1Peer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/Caregart1MapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.Caregart1MapBuilder');
}
