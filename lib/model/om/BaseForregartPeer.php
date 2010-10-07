<?php


abstract class BaseForregartPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'forregart';

	
	const CLASS_DEFAULT = 'lib.model.Forregart';

	
	const NUM_COLUMNS = 30;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODART = 'forregart.CODART';

	
	const DESART = 'forregart.DESART';

	
	const CODCTA = 'forregart.CODCTA';

	
	const CODPAR = 'forregart.CODPAR';

	
	const RAMART = 'forregart.RAMART';

	
	const COSULT = 'forregart.COSULT';

	
	const COSPRO = 'forregart.COSPRO';

	
	const EXITOT = 'forregart.EXITOT';

	
	const UNIMED = 'forregart.UNIMED';

	
	const UNIALT = 'forregart.UNIALT';

	
	const RELART = 'forregart.RELART';

	
	const FECULT = 'forregart.FECULT';

	
	const INVINI = 'forregart.INVINI';

	
	const CODMAR = 'forregart.CODMAR';

	
	const CODREF = 'forregart.CODREF';

	
	const COSTOT = 'forregart.COSTOT';

	
	const SIGECOF = 'forregart.SIGECOF';

	
	const CODCLAART = 'forregart.CODCLAART';

	
	const LOTUNI = 'forregart.LOTUNI';

	
	const CTAVTA = 'forregart.CTAVTA';

	
	const CTACOS = 'forregart.CTACOS';

	
	const CTAPRO = 'forregart.CTAPRO';

	
	const PREART = 'forregart.PREART';

	
	const DISTOT = 'forregart.DISTOT';

	
	const TIPO = 'forregart.TIPO';

	
	const TIP0 = 'forregart.TIP0';

	
	const CODING = 'forregart.CODING';

	
	const MERCON = 'forregart.MERCON';

	
	const CODARTSNC = 'forregart.CODARTSNC';

	
	const ID = 'forregart.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codart', 'Desart', 'Codcta', 'Codpar', 'Ramart', 'Cosult', 'Cospro', 'Exitot', 'Unimed', 'Unialt', 'Relart', 'Fecult', 'Invini', 'Codmar', 'Codref', 'Costot', 'Sigecof', 'Codclaart', 'Lotuni', 'Ctavta', 'Ctacos', 'Ctapro', 'Preart', 'Distot', 'Tipo', 'Tip0', 'Coding', 'Mercon', 'Codartsnc', 'Id', ),
		BasePeer::TYPE_COLNAME => array (ForregartPeer::CODART, ForregartPeer::DESART, ForregartPeer::CODCTA, ForregartPeer::CODPAR, ForregartPeer::RAMART, ForregartPeer::COSULT, ForregartPeer::COSPRO, ForregartPeer::EXITOT, ForregartPeer::UNIMED, ForregartPeer::UNIALT, ForregartPeer::RELART, ForregartPeer::FECULT, ForregartPeer::INVINI, ForregartPeer::CODMAR, ForregartPeer::CODREF, ForregartPeer::COSTOT, ForregartPeer::SIGECOF, ForregartPeer::CODCLAART, ForregartPeer::LOTUNI, ForregartPeer::CTAVTA, ForregartPeer::CTACOS, ForregartPeer::CTAPRO, ForregartPeer::PREART, ForregartPeer::DISTOT, ForregartPeer::TIPO, ForregartPeer::TIP0, ForregartPeer::CODING, ForregartPeer::MERCON, ForregartPeer::CODARTSNC, ForregartPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codart', 'desart', 'codcta', 'codpar', 'ramart', 'cosult', 'cospro', 'exitot', 'unimed', 'unialt', 'relart', 'fecult', 'invini', 'codmar', 'codref', 'costot', 'sigecof', 'codclaart', 'lotuni', 'ctavta', 'ctacos', 'ctapro', 'preart', 'distot', 'tipo', 'tip0', 'coding', 'mercon', 'codartsnc', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codart' => 0, 'Desart' => 1, 'Codcta' => 2, 'Codpar' => 3, 'Ramart' => 4, 'Cosult' => 5, 'Cospro' => 6, 'Exitot' => 7, 'Unimed' => 8, 'Unialt' => 9, 'Relart' => 10, 'Fecult' => 11, 'Invini' => 12, 'Codmar' => 13, 'Codref' => 14, 'Costot' => 15, 'Sigecof' => 16, 'Codclaart' => 17, 'Lotuni' => 18, 'Ctavta' => 19, 'Ctacos' => 20, 'Ctapro' => 21, 'Preart' => 22, 'Distot' => 23, 'Tipo' => 24, 'Tip0' => 25, 'Coding' => 26, 'Mercon' => 27, 'Codartsnc' => 28, 'Id' => 29, ),
		BasePeer::TYPE_COLNAME => array (ForregartPeer::CODART => 0, ForregartPeer::DESART => 1, ForregartPeer::CODCTA => 2, ForregartPeer::CODPAR => 3, ForregartPeer::RAMART => 4, ForregartPeer::COSULT => 5, ForregartPeer::COSPRO => 6, ForregartPeer::EXITOT => 7, ForregartPeer::UNIMED => 8, ForregartPeer::UNIALT => 9, ForregartPeer::RELART => 10, ForregartPeer::FECULT => 11, ForregartPeer::INVINI => 12, ForregartPeer::CODMAR => 13, ForregartPeer::CODREF => 14, ForregartPeer::COSTOT => 15, ForregartPeer::SIGECOF => 16, ForregartPeer::CODCLAART => 17, ForregartPeer::LOTUNI => 18, ForregartPeer::CTAVTA => 19, ForregartPeer::CTACOS => 20, ForregartPeer::CTAPRO => 21, ForregartPeer::PREART => 22, ForregartPeer::DISTOT => 23, ForregartPeer::TIPO => 24, ForregartPeer::TIP0 => 25, ForregartPeer::CODING => 26, ForregartPeer::MERCON => 27, ForregartPeer::CODARTSNC => 28, ForregartPeer::ID => 29, ),
		BasePeer::TYPE_FIELDNAME => array ('codart' => 0, 'desart' => 1, 'codcta' => 2, 'codpar' => 3, 'ramart' => 4, 'cosult' => 5, 'cospro' => 6, 'exitot' => 7, 'unimed' => 8, 'unialt' => 9, 'relart' => 10, 'fecult' => 11, 'invini' => 12, 'codmar' => 13, 'codref' => 14, 'costot' => 15, 'sigecof' => 16, 'codclaart' => 17, 'lotuni' => 18, 'ctavta' => 19, 'ctacos' => 20, 'ctapro' => 21, 'preart' => 22, 'distot' => 23, 'tipo' => 24, 'tip0' => 25, 'coding' => 26, 'mercon' => 27, 'codartsnc' => 28, 'id' => 29, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/ForregartMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.ForregartMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = ForregartPeer::getTableMap();
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
		return str_replace(ForregartPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(ForregartPeer::CODART);

		$criteria->addSelectColumn(ForregartPeer::DESART);

		$criteria->addSelectColumn(ForregartPeer::CODCTA);

		$criteria->addSelectColumn(ForregartPeer::CODPAR);

		$criteria->addSelectColumn(ForregartPeer::RAMART);

		$criteria->addSelectColumn(ForregartPeer::COSULT);

		$criteria->addSelectColumn(ForregartPeer::COSPRO);

		$criteria->addSelectColumn(ForregartPeer::EXITOT);

		$criteria->addSelectColumn(ForregartPeer::UNIMED);

		$criteria->addSelectColumn(ForregartPeer::UNIALT);

		$criteria->addSelectColumn(ForregartPeer::RELART);

		$criteria->addSelectColumn(ForregartPeer::FECULT);

		$criteria->addSelectColumn(ForregartPeer::INVINI);

		$criteria->addSelectColumn(ForregartPeer::CODMAR);

		$criteria->addSelectColumn(ForregartPeer::CODREF);

		$criteria->addSelectColumn(ForregartPeer::COSTOT);

		$criteria->addSelectColumn(ForregartPeer::SIGECOF);

		$criteria->addSelectColumn(ForregartPeer::CODCLAART);

		$criteria->addSelectColumn(ForregartPeer::LOTUNI);

		$criteria->addSelectColumn(ForregartPeer::CTAVTA);

		$criteria->addSelectColumn(ForregartPeer::CTACOS);

		$criteria->addSelectColumn(ForregartPeer::CTAPRO);

		$criteria->addSelectColumn(ForregartPeer::PREART);

		$criteria->addSelectColumn(ForregartPeer::DISTOT);

		$criteria->addSelectColumn(ForregartPeer::TIPO);

		$criteria->addSelectColumn(ForregartPeer::TIP0);

		$criteria->addSelectColumn(ForregartPeer::CODING);

		$criteria->addSelectColumn(ForregartPeer::MERCON);

		$criteria->addSelectColumn(ForregartPeer::CODARTSNC);

		$criteria->addSelectColumn(ForregartPeer::ID);

	}

	const COUNT = 'COUNT(forregart.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT forregart.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ForregartPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ForregartPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = ForregartPeer::doSelectRS($criteria, $con);
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
		$objects = ForregartPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return ForregartPeer::populateObjects(ForregartPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			ForregartPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = ForregartPeer::getOMClass();
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
		return ForregartPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(ForregartPeer::ID); 

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
			$comparison = $criteria->getComparison(ForregartPeer::ID);
			$selectCriteria->add(ForregartPeer::ID, $criteria->remove(ForregartPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(ForregartPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(ForregartPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Forregart) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(ForregartPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Forregart $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(ForregartPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(ForregartPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(ForregartPeer::DATABASE_NAME, ForregartPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = ForregartPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(ForregartPeer::DATABASE_NAME);

		$criteria->add(ForregartPeer::ID, $pk);


		$v = ForregartPeer::doSelect($criteria, $con);

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
			$criteria->add(ForregartPeer::ID, $pks, Criteria::IN);
			$objs = ForregartPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseForregartPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/ForregartMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.ForregartMapBuilder');
}
