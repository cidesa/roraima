<?php


abstract class BaseDfatendocobsPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'dfatendocobs';

	
	const CLASS_DEFAULT = 'lib.model.documentos.Dfatendocobs';

	
	const NUM_COLUMNS = 5;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const DESOBS = 'dfatendocobs.DESOBS';

	
	const ID_DFATENDOCDET = 'dfatendocobs.ID_DFATENDOCDET';

	
	const ID_USUARIO = 'dfatendocobs.ID_USUARIO';

	
	const FECOBS = 'dfatendocobs.FECOBS';

	
	const ID = 'dfatendocobs.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Desobs', 'IdDfatendocdet', 'IdUsuario', 'Fecobs', 'Id', ),
		BasePeer::TYPE_COLNAME => array (DfatendocobsPeer::DESOBS, DfatendocobsPeer::ID_DFATENDOCDET, DfatendocobsPeer::ID_USUARIO, DfatendocobsPeer::FECOBS, DfatendocobsPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('desobs', 'id_dfatendocdet', 'id_usuario', 'fecobs', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Desobs' => 0, 'IdDfatendocdet' => 1, 'IdUsuario' => 2, 'Fecobs' => 3, 'Id' => 4, ),
		BasePeer::TYPE_COLNAME => array (DfatendocobsPeer::DESOBS => 0, DfatendocobsPeer::ID_DFATENDOCDET => 1, DfatendocobsPeer::ID_USUARIO => 2, DfatendocobsPeer::FECOBS => 3, DfatendocobsPeer::ID => 4, ),
		BasePeer::TYPE_FIELDNAME => array ('desobs' => 0, 'id_dfatendocdet' => 1, 'id_usuario' => 2, 'fecobs' => 3, 'id' => 4, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/documentos/map/DfatendocobsMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.documentos.map.DfatendocobsMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = DfatendocobsPeer::getTableMap();
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
		return str_replace(DfatendocobsPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(DfatendocobsPeer::DESOBS);

		$criteria->addSelectColumn(DfatendocobsPeer::ID_DFATENDOCDET);

		$criteria->addSelectColumn(DfatendocobsPeer::ID_USUARIO);

		$criteria->addSelectColumn(DfatendocobsPeer::FECOBS);

		$criteria->addSelectColumn(DfatendocobsPeer::ID);

	}

	const COUNT = 'COUNT(dfatendocobs.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT dfatendocobs.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(DfatendocobsPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(DfatendocobsPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = DfatendocobsPeer::doSelectRS($criteria, $con);
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
		$objects = DfatendocobsPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return DfatendocobsPeer::populateObjects(DfatendocobsPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			DfatendocobsPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = DfatendocobsPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinDfatendocdet(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(DfatendocobsPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(DfatendocobsPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(DfatendocobsPeer::ID_DFATENDOCDET, DfatendocdetPeer::ID);

		$rs = DfatendocobsPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinUsuarios(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(DfatendocobsPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(DfatendocobsPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(DfatendocobsPeer::ID_USUARIO, UsuariosPeer::ID);

		$rs = DfatendocobsPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinDfatendocdet(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		DfatendocobsPeer::addSelectColumns($c);
		$startcol = (DfatendocobsPeer::NUM_COLUMNS - DfatendocobsPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		DfatendocdetPeer::addSelectColumns($c);

		$c->addJoin(DfatendocobsPeer::ID_DFATENDOCDET, DfatendocdetPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = DfatendocobsPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = DfatendocdetPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getDfatendocdet(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addDfatendocobs($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initDfatendocobss();
				$obj2->addDfatendocobs($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinUsuarios(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		DfatendocobsPeer::addSelectColumns($c);
		$startcol = (DfatendocobsPeer::NUM_COLUMNS - DfatendocobsPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		UsuariosPeer::addSelectColumns($c);

		$c->addJoin(DfatendocobsPeer::ID_USUARIO, UsuariosPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = DfatendocobsPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = UsuariosPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getUsuarios(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addDfatendocobs($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initDfatendocobss();
				$obj2->addDfatendocobs($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(DfatendocobsPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(DfatendocobsPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(DfatendocobsPeer::ID_DFATENDOCDET, DfatendocdetPeer::ID);

		$criteria->addJoin(DfatendocobsPeer::ID_USUARIO, UsuariosPeer::ID);

		$rs = DfatendocobsPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAll(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		DfatendocobsPeer::addSelectColumns($c);
		$startcol2 = (DfatendocobsPeer::NUM_COLUMNS - DfatendocobsPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		DfatendocdetPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + DfatendocdetPeer::NUM_COLUMNS;

		UsuariosPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + UsuariosPeer::NUM_COLUMNS;

		$c->addJoin(DfatendocobsPeer::ID_DFATENDOCDET, DfatendocdetPeer::ID);

		$c->addJoin(DfatendocobsPeer::ID_USUARIO, UsuariosPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = DfatendocobsPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = DfatendocdetPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getDfatendocdet(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addDfatendocobs($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initDfatendocobss();
				$obj2->addDfatendocobs($obj1);
			}


					
			$omClass = UsuariosPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getUsuarios(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addDfatendocobs($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initDfatendocobss();
				$obj3->addDfatendocobs($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptDfatendocdet(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(DfatendocobsPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(DfatendocobsPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(DfatendocobsPeer::ID_USUARIO, UsuariosPeer::ID);

		$rs = DfatendocobsPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptUsuarios(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(DfatendocobsPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(DfatendocobsPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(DfatendocobsPeer::ID_DFATENDOCDET, DfatendocdetPeer::ID);

		$rs = DfatendocobsPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptDfatendocdet(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		DfatendocobsPeer::addSelectColumns($c);
		$startcol2 = (DfatendocobsPeer::NUM_COLUMNS - DfatendocobsPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		UsuariosPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + UsuariosPeer::NUM_COLUMNS;

		$c->addJoin(DfatendocobsPeer::ID_USUARIO, UsuariosPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = DfatendocobsPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = UsuariosPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getUsuarios(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addDfatendocobs($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initDfatendocobss();
				$obj2->addDfatendocobs($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptUsuarios(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		DfatendocobsPeer::addSelectColumns($c);
		$startcol2 = (DfatendocobsPeer::NUM_COLUMNS - DfatendocobsPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		DfatendocdetPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + DfatendocdetPeer::NUM_COLUMNS;

		$c->addJoin(DfatendocobsPeer::ID_DFATENDOCDET, DfatendocdetPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = DfatendocobsPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = DfatendocdetPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getDfatendocdet(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addDfatendocobs($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initDfatendocobss();
				$obj2->addDfatendocobs($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}

	
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	
	public static function getOMClass()
	{
		return DfatendocobsPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(DfatendocobsPeer::ID); 

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
			$comparison = $criteria->getComparison(DfatendocobsPeer::ID);
			$selectCriteria->add(DfatendocobsPeer::ID, $criteria->remove(DfatendocobsPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(DfatendocobsPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(DfatendocobsPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Dfatendocobs) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(DfatendocobsPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Dfatendocobs $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(DfatendocobsPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(DfatendocobsPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(DfatendocobsPeer::DATABASE_NAME, DfatendocobsPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = DfatendocobsPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(DfatendocobsPeer::DATABASE_NAME);

		$criteria->add(DfatendocobsPeer::ID, $pk);


		$v = DfatendocobsPeer::doSelect($criteria, $con);

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
			$criteria->add(DfatendocobsPeer::ID, $pks, Criteria::IN);
			$objs = DfatendocobsPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseDfatendocobsPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/documentos/map/DfatendocobsMapBuilder.php';
	Propel::registerMapBuilder('lib.model.documentos.map.DfatendocobsMapBuilder');
}
