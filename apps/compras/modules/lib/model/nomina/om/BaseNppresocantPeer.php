<?php


abstract class BaseNppresocantPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'nppresocant';

	
	const CLASS_DEFAULT = 'lib.model.nomina.Nppresocant';

	
	const NUM_COLUMNS = 20;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODEMP = 'nppresocant.CODEMP';

	
	const FECCOR = 'nppresocant.FECCOR';

	
	const FECCAL = 'nppresocant.FECCAL';

	
	const CODCON = 'nppresocant.CODCON';

	
	const DIASER = 'nppresocant.DIASER';

	
	const MESSER = 'nppresocant.MESSER';

	
	const ANOSER = 'nppresocant.ANOSER';

	
	const DIATRA = 'nppresocant.DIATRA';

	
	const MESTRA = 'nppresocant.MESTRA';

	
	const ANOTRA = 'nppresocant.ANOTRA';

	
	const ANTACU = 'nppresocant.ANTACU';

	
	const INTACU = 'nppresocant.INTACU';

	
	const BONTRA = 'nppresocant.BONTRA';

	
	const ADEPRE = 'nppresocant.ADEPRE';

	
	const ADEINT = 'nppresocant.ADEINT';

	
	const MONPRE = 'nppresocant.MONPRE';

	
	const PASREGANT = 'nppresocant.PASREGANT';

	
	const STAPRE = 'nppresocant.STAPRE';

	
	const REGPRE = 'nppresocant.REGPRE';

	
	const ID = 'nppresocant.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codemp', 'Feccor', 'Feccal', 'Codcon', 'Diaser', 'Messer', 'Anoser', 'Diatra', 'Mestra', 'Anotra', 'Antacu', 'Intacu', 'Bontra', 'Adepre', 'Adeint', 'Monpre', 'Pasregant', 'Stapre', 'Regpre', 'Id', ),
		BasePeer::TYPE_COLNAME => array (NppresocantPeer::CODEMP, NppresocantPeer::FECCOR, NppresocantPeer::FECCAL, NppresocantPeer::CODCON, NppresocantPeer::DIASER, NppresocantPeer::MESSER, NppresocantPeer::ANOSER, NppresocantPeer::DIATRA, NppresocantPeer::MESTRA, NppresocantPeer::ANOTRA, NppresocantPeer::ANTACU, NppresocantPeer::INTACU, NppresocantPeer::BONTRA, NppresocantPeer::ADEPRE, NppresocantPeer::ADEINT, NppresocantPeer::MONPRE, NppresocantPeer::PASREGANT, NppresocantPeer::STAPRE, NppresocantPeer::REGPRE, NppresocantPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codemp', 'feccor', 'feccal', 'codcon', 'diaser', 'messer', 'anoser', 'diatra', 'mestra', 'anotra', 'antacu', 'intacu', 'bontra', 'adepre', 'adeint', 'monpre', 'pasregant', 'stapre', 'regpre', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codemp' => 0, 'Feccor' => 1, 'Feccal' => 2, 'Codcon' => 3, 'Diaser' => 4, 'Messer' => 5, 'Anoser' => 6, 'Diatra' => 7, 'Mestra' => 8, 'Anotra' => 9, 'Antacu' => 10, 'Intacu' => 11, 'Bontra' => 12, 'Adepre' => 13, 'Adeint' => 14, 'Monpre' => 15, 'Pasregant' => 16, 'Stapre' => 17, 'Regpre' => 18, 'Id' => 19, ),
		BasePeer::TYPE_COLNAME => array (NppresocantPeer::CODEMP => 0, NppresocantPeer::FECCOR => 1, NppresocantPeer::FECCAL => 2, NppresocantPeer::CODCON => 3, NppresocantPeer::DIASER => 4, NppresocantPeer::MESSER => 5, NppresocantPeer::ANOSER => 6, NppresocantPeer::DIATRA => 7, NppresocantPeer::MESTRA => 8, NppresocantPeer::ANOTRA => 9, NppresocantPeer::ANTACU => 10, NppresocantPeer::INTACU => 11, NppresocantPeer::BONTRA => 12, NppresocantPeer::ADEPRE => 13, NppresocantPeer::ADEINT => 14, NppresocantPeer::MONPRE => 15, NppresocantPeer::PASREGANT => 16, NppresocantPeer::STAPRE => 17, NppresocantPeer::REGPRE => 18, NppresocantPeer::ID => 19, ),
		BasePeer::TYPE_FIELDNAME => array ('codemp' => 0, 'feccor' => 1, 'feccal' => 2, 'codcon' => 3, 'diaser' => 4, 'messer' => 5, 'anoser' => 6, 'diatra' => 7, 'mestra' => 8, 'anotra' => 9, 'antacu' => 10, 'intacu' => 11, 'bontra' => 12, 'adepre' => 13, 'adeint' => 14, 'monpre' => 15, 'pasregant' => 16, 'stapre' => 17, 'regpre' => 18, 'id' => 19, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/nomina/map/NppresocantMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.nomina.map.NppresocantMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = NppresocantPeer::getTableMap();
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
		return str_replace(NppresocantPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(NppresocantPeer::CODEMP);

		$criteria->addSelectColumn(NppresocantPeer::FECCOR);

		$criteria->addSelectColumn(NppresocantPeer::FECCAL);

		$criteria->addSelectColumn(NppresocantPeer::CODCON);

		$criteria->addSelectColumn(NppresocantPeer::DIASER);

		$criteria->addSelectColumn(NppresocantPeer::MESSER);

		$criteria->addSelectColumn(NppresocantPeer::ANOSER);

		$criteria->addSelectColumn(NppresocantPeer::DIATRA);

		$criteria->addSelectColumn(NppresocantPeer::MESTRA);

		$criteria->addSelectColumn(NppresocantPeer::ANOTRA);

		$criteria->addSelectColumn(NppresocantPeer::ANTACU);

		$criteria->addSelectColumn(NppresocantPeer::INTACU);

		$criteria->addSelectColumn(NppresocantPeer::BONTRA);

		$criteria->addSelectColumn(NppresocantPeer::ADEPRE);

		$criteria->addSelectColumn(NppresocantPeer::ADEINT);

		$criteria->addSelectColumn(NppresocantPeer::MONPRE);

		$criteria->addSelectColumn(NppresocantPeer::PASREGANT);

		$criteria->addSelectColumn(NppresocantPeer::STAPRE);

		$criteria->addSelectColumn(NppresocantPeer::REGPRE);

		$criteria->addSelectColumn(NppresocantPeer::ID);

	}

	const COUNT = 'COUNT(nppresocant.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT nppresocant.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(NppresocantPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(NppresocantPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = NppresocantPeer::doSelectRS($criteria, $con);
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
		$objects = NppresocantPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return NppresocantPeer::populateObjects(NppresocantPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			NppresocantPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = NppresocantPeer::getOMClass();
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
		return NppresocantPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(NppresocantPeer::ID); 

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
			$comparison = $criteria->getComparison(NppresocantPeer::ID);
			$selectCriteria->add(NppresocantPeer::ID, $criteria->remove(NppresocantPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(NppresocantPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(NppresocantPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Nppresocant) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(NppresocantPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Nppresocant $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(NppresocantPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(NppresocantPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(NppresocantPeer::DATABASE_NAME, NppresocantPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = NppresocantPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(NppresocantPeer::DATABASE_NAME);

		$criteria->add(NppresocantPeer::ID, $pk);


		$v = NppresocantPeer::doSelect($criteria, $con);

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
			$criteria->add(NppresocantPeer::ID, $pks, Criteria::IN);
			$objs = NppresocantPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseNppresocantPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/nomina/map/NppresocantMapBuilder.php';
	Propel::registerMapBuilder('lib.model.nomina.map.NppresocantMapBuilder');
}
