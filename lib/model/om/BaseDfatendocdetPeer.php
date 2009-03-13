<?php


abstract class BaseDfatendocdetPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'dfatendocdet';

	
	const CLASS_DEFAULT = 'lib.model.Dfatendocdet';

	
	const NUM_COLUMNS = 12;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID_DFATENDOC = 'dfatendocdet.ID_DFATENDOC';

	
	const ID_USUARIO = 'dfatendocdet.ID_USUARIO';

	
	const DESATE = 'dfatendocdet.DESATE';

	
	const FECREC = 'dfatendocdet.FECREC';

	
	const FECATE = 'dfatendocdet.FECATE';

	
	const ID_ACUNIDAD_ORI = 'dfatendocdet.ID_ACUNIDAD_ORI';

	
	const ID_ACUNIDAD_DES = 'dfatendocdet.ID_ACUNIDAD_DES';

	
	const ID_DFRUTADOC = 'dfatendocdet.ID_DFRUTADOC';

	
	const ID_DFMEDTRA = 'dfatendocdet.ID_DFMEDTRA';

	
	const DIAENT = 'dfatendocdet.DIAENT';

	
	const TOTDIA = 'dfatendocdet.TOTDIA';

	
	const ID = 'dfatendocdet.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('IdDfatendoc', 'IdUsuario', 'Desate', 'Fecrec', 'Fecate', 'IdAcunidadOri', 'IdAcunidadDes', 'IdDfrutadoc', 'IdDfmedtra', 'Diaent', 'Totdia', 'Id', ),
		BasePeer::TYPE_COLNAME => array (DfatendocdetPeer::ID_DFATENDOC, DfatendocdetPeer::ID_USUARIO, DfatendocdetPeer::DESATE, DfatendocdetPeer::FECREC, DfatendocdetPeer::FECATE, DfatendocdetPeer::ID_ACUNIDAD_ORI, DfatendocdetPeer::ID_ACUNIDAD_DES, DfatendocdetPeer::ID_DFRUTADOC, DfatendocdetPeer::ID_DFMEDTRA, DfatendocdetPeer::DIAENT, DfatendocdetPeer::TOTDIA, DfatendocdetPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id_dfatendoc', 'id_usuario', 'desate', 'fecrec', 'fecate', 'id_acunidad_ori', 'id_acunidad_des', 'id_dfrutadoc', 'id_dfmedtra', 'diaent', 'totdia', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('IdDfatendoc' => 0, 'IdUsuario' => 1, 'Desate' => 2, 'Fecrec' => 3, 'Fecate' => 4, 'IdAcunidadOri' => 5, 'IdAcunidadDes' => 6, 'IdDfrutadoc' => 7, 'IdDfmedtra' => 8, 'Diaent' => 9, 'Totdia' => 10, 'Id' => 11, ),
		BasePeer::TYPE_COLNAME => array (DfatendocdetPeer::ID_DFATENDOC => 0, DfatendocdetPeer::ID_USUARIO => 1, DfatendocdetPeer::DESATE => 2, DfatendocdetPeer::FECREC => 3, DfatendocdetPeer::FECATE => 4, DfatendocdetPeer::ID_ACUNIDAD_ORI => 5, DfatendocdetPeer::ID_ACUNIDAD_DES => 6, DfatendocdetPeer::ID_DFRUTADOC => 7, DfatendocdetPeer::ID_DFMEDTRA => 8, DfatendocdetPeer::DIAENT => 9, DfatendocdetPeer::TOTDIA => 10, DfatendocdetPeer::ID => 11, ),
		BasePeer::TYPE_FIELDNAME => array ('id_dfatendoc' => 0, 'id_usuario' => 1, 'desate' => 2, 'fecrec' => 3, 'fecate' => 4, 'id_acunidad_ori' => 5, 'id_acunidad_des' => 6, 'id_dfrutadoc' => 7, 'id_dfmedtra' => 8, 'diaent' => 9, 'totdia' => 10, 'id' => 11, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/DfatendocdetMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.DfatendocdetMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = DfatendocdetPeer::getTableMap();
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
		return str_replace(DfatendocdetPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(DfatendocdetPeer::ID_DFATENDOC);

		$criteria->addSelectColumn(DfatendocdetPeer::ID_USUARIO);

		$criteria->addSelectColumn(DfatendocdetPeer::DESATE);

		$criteria->addSelectColumn(DfatendocdetPeer::FECREC);

		$criteria->addSelectColumn(DfatendocdetPeer::FECATE);

		$criteria->addSelectColumn(DfatendocdetPeer::ID_ACUNIDAD_ORI);

		$criteria->addSelectColumn(DfatendocdetPeer::ID_ACUNIDAD_DES);

		$criteria->addSelectColumn(DfatendocdetPeer::ID_DFRUTADOC);

		$criteria->addSelectColumn(DfatendocdetPeer::ID_DFMEDTRA);

		$criteria->addSelectColumn(DfatendocdetPeer::DIAENT);

		$criteria->addSelectColumn(DfatendocdetPeer::TOTDIA);

		$criteria->addSelectColumn(DfatendocdetPeer::ID);

	}

	const COUNT = 'COUNT(dfatendocdet.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT dfatendocdet.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(DfatendocdetPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(DfatendocdetPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = DfatendocdetPeer::doSelectRS($criteria, $con);
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
		$objects = DfatendocdetPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return DfatendocdetPeer::populateObjects(DfatendocdetPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			DfatendocdetPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = DfatendocdetPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinDfatendoc(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(DfatendocdetPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(DfatendocdetPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(DfatendocdetPeer::ID_DFATENDOC, DfatendocPeer::ID);

		$rs = DfatendocdetPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(DfatendocdetPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(DfatendocdetPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(DfatendocdetPeer::ID_USUARIO, UsuariosPeer::ID);

		$rs = DfatendocdetPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAcunidadRelatedByIdAcunidadOri(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(DfatendocdetPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(DfatendocdetPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(DfatendocdetPeer::ID_ACUNIDAD_ORI, AcunidadPeer::ID);

		$rs = DfatendocdetPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAcunidadRelatedByIdAcunidadDes(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(DfatendocdetPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(DfatendocdetPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(DfatendocdetPeer::ID_ACUNIDAD_DES, AcunidadPeer::ID);

		$rs = DfatendocdetPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinDfrutadoc(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(DfatendocdetPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(DfatendocdetPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(DfatendocdetPeer::ID_DFRUTADOC, DfrutadocPeer::ID);

		$rs = DfatendocdetPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinDfmedtra(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(DfatendocdetPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(DfatendocdetPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(DfatendocdetPeer::ID_DFMEDTRA, DfmedtraPeer::ID);

		$rs = DfatendocdetPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinDfatendoc(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		DfatendocdetPeer::addSelectColumns($c);
		$startcol = (DfatendocdetPeer::NUM_COLUMNS - DfatendocdetPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		DfatendocPeer::addSelectColumns($c);

		$c->addJoin(DfatendocdetPeer::ID_DFATENDOC, DfatendocPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = DfatendocdetPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = DfatendocPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getDfatendoc(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addDfatendocdet($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initDfatendocdets();
				$obj2->addDfatendocdet($obj1); 			}
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

		DfatendocdetPeer::addSelectColumns($c);
		$startcol = (DfatendocdetPeer::NUM_COLUMNS - DfatendocdetPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		UsuariosPeer::addSelectColumns($c);

		$c->addJoin(DfatendocdetPeer::ID_USUARIO, UsuariosPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = DfatendocdetPeer::getOMClass();

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
										$temp_obj2->addDfatendocdet($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initDfatendocdets();
				$obj2->addDfatendocdet($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAcunidadRelatedByIdAcunidadOri(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		DfatendocdetPeer::addSelectColumns($c);
		$startcol = (DfatendocdetPeer::NUM_COLUMNS - DfatendocdetPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		AcunidadPeer::addSelectColumns($c);

		$c->addJoin(DfatendocdetPeer::ID_ACUNIDAD_ORI, AcunidadPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = DfatendocdetPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = AcunidadPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getAcunidadRelatedByIdAcunidadOri(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addDfatendocdetRelatedByIdAcunidadOri($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initDfatendocdetsRelatedByIdAcunidadOri();
				$obj2->addDfatendocdetRelatedByIdAcunidadOri($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAcunidadRelatedByIdAcunidadDes(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		DfatendocdetPeer::addSelectColumns($c);
		$startcol = (DfatendocdetPeer::NUM_COLUMNS - DfatendocdetPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		AcunidadPeer::addSelectColumns($c);

		$c->addJoin(DfatendocdetPeer::ID_ACUNIDAD_DES, AcunidadPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = DfatendocdetPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = AcunidadPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getAcunidadRelatedByIdAcunidadDes(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addDfatendocdetRelatedByIdAcunidadDes($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initDfatendocdetsRelatedByIdAcunidadDes();
				$obj2->addDfatendocdetRelatedByIdAcunidadDes($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinDfrutadoc(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		DfatendocdetPeer::addSelectColumns($c);
		$startcol = (DfatendocdetPeer::NUM_COLUMNS - DfatendocdetPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		DfrutadocPeer::addSelectColumns($c);

		$c->addJoin(DfatendocdetPeer::ID_DFRUTADOC, DfrutadocPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = DfatendocdetPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = DfrutadocPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getDfrutadoc(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addDfatendocdet($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initDfatendocdets();
				$obj2->addDfatendocdet($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinDfmedtra(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		DfatendocdetPeer::addSelectColumns($c);
		$startcol = (DfatendocdetPeer::NUM_COLUMNS - DfatendocdetPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		DfmedtraPeer::addSelectColumns($c);

		$c->addJoin(DfatendocdetPeer::ID_DFMEDTRA, DfmedtraPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = DfatendocdetPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = DfmedtraPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getDfmedtra(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addDfatendocdet($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initDfatendocdets();
				$obj2->addDfatendocdet($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(DfatendocdetPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(DfatendocdetPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(DfatendocdetPeer::ID_DFATENDOC, DfatendocPeer::ID);

		$criteria->addJoin(DfatendocdetPeer::ID_USUARIO, UsuariosPeer::ID);

		$criteria->addJoin(DfatendocdetPeer::ID_ACUNIDAD_ORI, AcunidadPeer::ID);

		$criteria->addJoin(DfatendocdetPeer::ID_ACUNIDAD_DES, AcunidadPeer::ID);

		$criteria->addJoin(DfatendocdetPeer::ID_DFRUTADOC, DfrutadocPeer::ID);

		$criteria->addJoin(DfatendocdetPeer::ID_DFMEDTRA, DfmedtraPeer::ID);

		$rs = DfatendocdetPeer::doSelectRS($criteria, $con);
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

		DfatendocdetPeer::addSelectColumns($c);
		$startcol2 = (DfatendocdetPeer::NUM_COLUMNS - DfatendocdetPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		DfatendocPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + DfatendocPeer::NUM_COLUMNS;

		UsuariosPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + UsuariosPeer::NUM_COLUMNS;

		AcunidadPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + AcunidadPeer::NUM_COLUMNS;

		AcunidadPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + AcunidadPeer::NUM_COLUMNS;

		DfrutadocPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + DfrutadocPeer::NUM_COLUMNS;

		DfmedtraPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + DfmedtraPeer::NUM_COLUMNS;

		$c->addJoin(DfatendocdetPeer::ID_DFATENDOC, DfatendocPeer::ID);

		$c->addJoin(DfatendocdetPeer::ID_USUARIO, UsuariosPeer::ID);

		$c->addJoin(DfatendocdetPeer::ID_ACUNIDAD_ORI, AcunidadPeer::ID);

		$c->addJoin(DfatendocdetPeer::ID_ACUNIDAD_DES, AcunidadPeer::ID);

		$c->addJoin(DfatendocdetPeer::ID_DFRUTADOC, DfrutadocPeer::ID);

		$c->addJoin(DfatendocdetPeer::ID_DFMEDTRA, DfmedtraPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = DfatendocdetPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = DfatendocPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getDfatendoc(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addDfatendocdet($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initDfatendocdets();
				$obj2->addDfatendocdet($obj1);
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
					$temp_obj3->addDfatendocdet($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initDfatendocdets();
				$obj3->addDfatendocdet($obj1);
			}


					
			$omClass = AcunidadPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4 = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getAcunidadRelatedByIdAcunidadOri(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addDfatendocdetRelatedByIdAcunidadOri($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj4->initDfatendocdetsRelatedByIdAcunidadOri();
				$obj4->addDfatendocdetRelatedByIdAcunidadOri($obj1);
			}


					
			$omClass = AcunidadPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5 = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getAcunidadRelatedByIdAcunidadDes(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addDfatendocdetRelatedByIdAcunidadDes($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj5->initDfatendocdetsRelatedByIdAcunidadDes();
				$obj5->addDfatendocdetRelatedByIdAcunidadDes($obj1);
			}


					
			$omClass = DfrutadocPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6 = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getDfrutadoc(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addDfatendocdet($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj6->initDfatendocdets();
				$obj6->addDfatendocdet($obj1);
			}


					
			$omClass = DfmedtraPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7 = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getDfmedtra(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addDfatendocdet($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj7->initDfatendocdets();
				$obj7->addDfatendocdet($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptDfatendoc(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(DfatendocdetPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(DfatendocdetPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(DfatendocdetPeer::ID_USUARIO, UsuariosPeer::ID);

		$criteria->addJoin(DfatendocdetPeer::ID_ACUNIDAD_ORI, AcunidadPeer::ID);

		$criteria->addJoin(DfatendocdetPeer::ID_ACUNIDAD_DES, AcunidadPeer::ID);

		$criteria->addJoin(DfatendocdetPeer::ID_DFRUTADOC, DfrutadocPeer::ID);

		$criteria->addJoin(DfatendocdetPeer::ID_DFMEDTRA, DfmedtraPeer::ID);

		$rs = DfatendocdetPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(DfatendocdetPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(DfatendocdetPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(DfatendocdetPeer::ID_DFATENDOC, DfatendocPeer::ID);

		$criteria->addJoin(DfatendocdetPeer::ID_ACUNIDAD_ORI, AcunidadPeer::ID);

		$criteria->addJoin(DfatendocdetPeer::ID_ACUNIDAD_DES, AcunidadPeer::ID);

		$criteria->addJoin(DfatendocdetPeer::ID_DFRUTADOC, DfrutadocPeer::ID);

		$criteria->addJoin(DfatendocdetPeer::ID_DFMEDTRA, DfmedtraPeer::ID);

		$rs = DfatendocdetPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptAcunidadRelatedByIdAcunidadOri(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(DfatendocdetPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(DfatendocdetPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(DfatendocdetPeer::ID_DFATENDOC, DfatendocPeer::ID);

		$criteria->addJoin(DfatendocdetPeer::ID_USUARIO, UsuariosPeer::ID);

		$criteria->addJoin(DfatendocdetPeer::ID_DFRUTADOC, DfrutadocPeer::ID);

		$criteria->addJoin(DfatendocdetPeer::ID_DFMEDTRA, DfmedtraPeer::ID);

		$rs = DfatendocdetPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptAcunidadRelatedByIdAcunidadDes(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(DfatendocdetPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(DfatendocdetPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(DfatendocdetPeer::ID_DFATENDOC, DfatendocPeer::ID);

		$criteria->addJoin(DfatendocdetPeer::ID_USUARIO, UsuariosPeer::ID);

		$criteria->addJoin(DfatendocdetPeer::ID_DFRUTADOC, DfrutadocPeer::ID);

		$criteria->addJoin(DfatendocdetPeer::ID_DFMEDTRA, DfmedtraPeer::ID);

		$rs = DfatendocdetPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptDfrutadoc(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(DfatendocdetPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(DfatendocdetPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(DfatendocdetPeer::ID_DFATENDOC, DfatendocPeer::ID);

		$criteria->addJoin(DfatendocdetPeer::ID_USUARIO, UsuariosPeer::ID);

		$criteria->addJoin(DfatendocdetPeer::ID_ACUNIDAD_ORI, AcunidadPeer::ID);

		$criteria->addJoin(DfatendocdetPeer::ID_ACUNIDAD_DES, AcunidadPeer::ID);

		$criteria->addJoin(DfatendocdetPeer::ID_DFMEDTRA, DfmedtraPeer::ID);

		$rs = DfatendocdetPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptDfmedtra(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(DfatendocdetPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(DfatendocdetPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(DfatendocdetPeer::ID_DFATENDOC, DfatendocPeer::ID);

		$criteria->addJoin(DfatendocdetPeer::ID_USUARIO, UsuariosPeer::ID);

		$criteria->addJoin(DfatendocdetPeer::ID_ACUNIDAD_ORI, AcunidadPeer::ID);

		$criteria->addJoin(DfatendocdetPeer::ID_ACUNIDAD_DES, AcunidadPeer::ID);

		$criteria->addJoin(DfatendocdetPeer::ID_DFRUTADOC, DfrutadocPeer::ID);

		$rs = DfatendocdetPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptDfatendoc(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		DfatendocdetPeer::addSelectColumns($c);
		$startcol2 = (DfatendocdetPeer::NUM_COLUMNS - DfatendocdetPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		UsuariosPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + UsuariosPeer::NUM_COLUMNS;

		AcunidadPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + AcunidadPeer::NUM_COLUMNS;

		AcunidadPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + AcunidadPeer::NUM_COLUMNS;

		DfrutadocPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + DfrutadocPeer::NUM_COLUMNS;

		DfmedtraPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + DfmedtraPeer::NUM_COLUMNS;

		$c->addJoin(DfatendocdetPeer::ID_USUARIO, UsuariosPeer::ID);

		$c->addJoin(DfatendocdetPeer::ID_ACUNIDAD_ORI, AcunidadPeer::ID);

		$c->addJoin(DfatendocdetPeer::ID_ACUNIDAD_DES, AcunidadPeer::ID);

		$c->addJoin(DfatendocdetPeer::ID_DFRUTADOC, DfrutadocPeer::ID);

		$c->addJoin(DfatendocdetPeer::ID_DFMEDTRA, DfmedtraPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = DfatendocdetPeer::getOMClass();

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
					$temp_obj2->addDfatendocdet($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initDfatendocdets();
				$obj2->addDfatendocdet($obj1);
			}

			$omClass = AcunidadPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getAcunidadRelatedByIdAcunidadOri(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addDfatendocdetRelatedByIdAcunidadOri($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initDfatendocdetsRelatedByIdAcunidadOri();
				$obj3->addDfatendocdetRelatedByIdAcunidadOri($obj1);
			}

			$omClass = AcunidadPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getAcunidadRelatedByIdAcunidadDes(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addDfatendocdetRelatedByIdAcunidadDes($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initDfatendocdetsRelatedByIdAcunidadDes();
				$obj4->addDfatendocdetRelatedByIdAcunidadDes($obj1);
			}

			$omClass = DfrutadocPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getDfrutadoc(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addDfatendocdet($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initDfatendocdets();
				$obj5->addDfatendocdet($obj1);
			}

			$omClass = DfmedtraPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getDfmedtra(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addDfatendocdet($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initDfatendocdets();
				$obj6->addDfatendocdet($obj1);
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

		DfatendocdetPeer::addSelectColumns($c);
		$startcol2 = (DfatendocdetPeer::NUM_COLUMNS - DfatendocdetPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		DfatendocPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + DfatendocPeer::NUM_COLUMNS;

		AcunidadPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + AcunidadPeer::NUM_COLUMNS;

		AcunidadPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + AcunidadPeer::NUM_COLUMNS;

		DfrutadocPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + DfrutadocPeer::NUM_COLUMNS;

		DfmedtraPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + DfmedtraPeer::NUM_COLUMNS;

		$c->addJoin(DfatendocdetPeer::ID_DFATENDOC, DfatendocPeer::ID);

		$c->addJoin(DfatendocdetPeer::ID_ACUNIDAD_ORI, AcunidadPeer::ID);

		$c->addJoin(DfatendocdetPeer::ID_ACUNIDAD_DES, AcunidadPeer::ID);

		$c->addJoin(DfatendocdetPeer::ID_DFRUTADOC, DfrutadocPeer::ID);

		$c->addJoin(DfatendocdetPeer::ID_DFMEDTRA, DfmedtraPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = DfatendocdetPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = DfatendocPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getDfatendoc(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addDfatendocdet($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initDfatendocdets();
				$obj2->addDfatendocdet($obj1);
			}

			$omClass = AcunidadPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getAcunidadRelatedByIdAcunidadOri(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addDfatendocdetRelatedByIdAcunidadOri($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initDfatendocdetsRelatedByIdAcunidadOri();
				$obj3->addDfatendocdetRelatedByIdAcunidadOri($obj1);
			}

			$omClass = AcunidadPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getAcunidadRelatedByIdAcunidadDes(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addDfatendocdetRelatedByIdAcunidadDes($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initDfatendocdetsRelatedByIdAcunidadDes();
				$obj4->addDfatendocdetRelatedByIdAcunidadDes($obj1);
			}

			$omClass = DfrutadocPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getDfrutadoc(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addDfatendocdet($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initDfatendocdets();
				$obj5->addDfatendocdet($obj1);
			}

			$omClass = DfmedtraPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getDfmedtra(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addDfatendocdet($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initDfatendocdets();
				$obj6->addDfatendocdet($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptAcunidadRelatedByIdAcunidadOri(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		DfatendocdetPeer::addSelectColumns($c);
		$startcol2 = (DfatendocdetPeer::NUM_COLUMNS - DfatendocdetPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		DfatendocPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + DfatendocPeer::NUM_COLUMNS;

		UsuariosPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + UsuariosPeer::NUM_COLUMNS;

		DfrutadocPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + DfrutadocPeer::NUM_COLUMNS;

		DfmedtraPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + DfmedtraPeer::NUM_COLUMNS;

		$c->addJoin(DfatendocdetPeer::ID_DFATENDOC, DfatendocPeer::ID);

		$c->addJoin(DfatendocdetPeer::ID_USUARIO, UsuariosPeer::ID);

		$c->addJoin(DfatendocdetPeer::ID_DFRUTADOC, DfrutadocPeer::ID);

		$c->addJoin(DfatendocdetPeer::ID_DFMEDTRA, DfmedtraPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = DfatendocdetPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = DfatendocPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getDfatendoc(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addDfatendocdet($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initDfatendocdets();
				$obj2->addDfatendocdet($obj1);
			}

			$omClass = UsuariosPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getUsuarios(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addDfatendocdet($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initDfatendocdets();
				$obj3->addDfatendocdet($obj1);
			}

			$omClass = DfrutadocPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getDfrutadoc(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addDfatendocdet($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initDfatendocdets();
				$obj4->addDfatendocdet($obj1);
			}

			$omClass = DfmedtraPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getDfmedtra(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addDfatendocdet($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initDfatendocdets();
				$obj5->addDfatendocdet($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptAcunidadRelatedByIdAcunidadDes(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		DfatendocdetPeer::addSelectColumns($c);
		$startcol2 = (DfatendocdetPeer::NUM_COLUMNS - DfatendocdetPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		DfatendocPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + DfatendocPeer::NUM_COLUMNS;

		UsuariosPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + UsuariosPeer::NUM_COLUMNS;

		DfrutadocPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + DfrutadocPeer::NUM_COLUMNS;

		DfmedtraPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + DfmedtraPeer::NUM_COLUMNS;

		$c->addJoin(DfatendocdetPeer::ID_DFATENDOC, DfatendocPeer::ID);

		$c->addJoin(DfatendocdetPeer::ID_USUARIO, UsuariosPeer::ID);

		$c->addJoin(DfatendocdetPeer::ID_DFRUTADOC, DfrutadocPeer::ID);

		$c->addJoin(DfatendocdetPeer::ID_DFMEDTRA, DfmedtraPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = DfatendocdetPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = DfatendocPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getDfatendoc(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addDfatendocdet($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initDfatendocdets();
				$obj2->addDfatendocdet($obj1);
			}

			$omClass = UsuariosPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getUsuarios(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addDfatendocdet($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initDfatendocdets();
				$obj3->addDfatendocdet($obj1);
			}

			$omClass = DfrutadocPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getDfrutadoc(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addDfatendocdet($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initDfatendocdets();
				$obj4->addDfatendocdet($obj1);
			}

			$omClass = DfmedtraPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getDfmedtra(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addDfatendocdet($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initDfatendocdets();
				$obj5->addDfatendocdet($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptDfrutadoc(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		DfatendocdetPeer::addSelectColumns($c);
		$startcol2 = (DfatendocdetPeer::NUM_COLUMNS - DfatendocdetPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		DfatendocPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + DfatendocPeer::NUM_COLUMNS;

		UsuariosPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + UsuariosPeer::NUM_COLUMNS;

		AcunidadPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + AcunidadPeer::NUM_COLUMNS;

		AcunidadPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + AcunidadPeer::NUM_COLUMNS;

		DfmedtraPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + DfmedtraPeer::NUM_COLUMNS;

		$c->addJoin(DfatendocdetPeer::ID_DFATENDOC, DfatendocPeer::ID);

		$c->addJoin(DfatendocdetPeer::ID_USUARIO, UsuariosPeer::ID);

		$c->addJoin(DfatendocdetPeer::ID_ACUNIDAD_ORI, AcunidadPeer::ID);

		$c->addJoin(DfatendocdetPeer::ID_ACUNIDAD_DES, AcunidadPeer::ID);

		$c->addJoin(DfatendocdetPeer::ID_DFMEDTRA, DfmedtraPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = DfatendocdetPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = DfatendocPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getDfatendoc(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addDfatendocdet($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initDfatendocdets();
				$obj2->addDfatendocdet($obj1);
			}

			$omClass = UsuariosPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getUsuarios(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addDfatendocdet($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initDfatendocdets();
				$obj3->addDfatendocdet($obj1);
			}

			$omClass = AcunidadPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getAcunidadRelatedByIdAcunidadOri(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addDfatendocdetRelatedByIdAcunidadOri($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initDfatendocdetsRelatedByIdAcunidadOri();
				$obj4->addDfatendocdetRelatedByIdAcunidadOri($obj1);
			}

			$omClass = AcunidadPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getAcunidadRelatedByIdAcunidadDes(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addDfatendocdetRelatedByIdAcunidadDes($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initDfatendocdetsRelatedByIdAcunidadDes();
				$obj5->addDfatendocdetRelatedByIdAcunidadDes($obj1);
			}

			$omClass = DfmedtraPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getDfmedtra(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addDfatendocdet($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initDfatendocdets();
				$obj6->addDfatendocdet($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptDfmedtra(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		DfatendocdetPeer::addSelectColumns($c);
		$startcol2 = (DfatendocdetPeer::NUM_COLUMNS - DfatendocdetPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		DfatendocPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + DfatendocPeer::NUM_COLUMNS;

		UsuariosPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + UsuariosPeer::NUM_COLUMNS;

		AcunidadPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + AcunidadPeer::NUM_COLUMNS;

		AcunidadPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + AcunidadPeer::NUM_COLUMNS;

		DfrutadocPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + DfrutadocPeer::NUM_COLUMNS;

		$c->addJoin(DfatendocdetPeer::ID_DFATENDOC, DfatendocPeer::ID);

		$c->addJoin(DfatendocdetPeer::ID_USUARIO, UsuariosPeer::ID);

		$c->addJoin(DfatendocdetPeer::ID_ACUNIDAD_ORI, AcunidadPeer::ID);

		$c->addJoin(DfatendocdetPeer::ID_ACUNIDAD_DES, AcunidadPeer::ID);

		$c->addJoin(DfatendocdetPeer::ID_DFRUTADOC, DfrutadocPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = DfatendocdetPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = DfatendocPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getDfatendoc(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addDfatendocdet($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initDfatendocdets();
				$obj2->addDfatendocdet($obj1);
			}

			$omClass = UsuariosPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getUsuarios(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addDfatendocdet($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initDfatendocdets();
				$obj3->addDfatendocdet($obj1);
			}

			$omClass = AcunidadPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getAcunidadRelatedByIdAcunidadOri(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addDfatendocdetRelatedByIdAcunidadOri($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initDfatendocdetsRelatedByIdAcunidadOri();
				$obj4->addDfatendocdetRelatedByIdAcunidadOri($obj1);
			}

			$omClass = AcunidadPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getAcunidadRelatedByIdAcunidadDes(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addDfatendocdetRelatedByIdAcunidadDes($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initDfatendocdetsRelatedByIdAcunidadDes();
				$obj5->addDfatendocdetRelatedByIdAcunidadDes($obj1);
			}

			$omClass = DfrutadocPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getDfrutadoc(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addDfatendocdet($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initDfatendocdets();
				$obj6->addDfatendocdet($obj1);
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
		return DfatendocdetPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(DfatendocdetPeer::ID); 

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
			$comparison = $criteria->getComparison(DfatendocdetPeer::ID);
			$selectCriteria->add(DfatendocdetPeer::ID, $criteria->remove(DfatendocdetPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(DfatendocdetPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(DfatendocdetPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Dfatendocdet) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(DfatendocdetPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Dfatendocdet $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(DfatendocdetPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(DfatendocdetPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(DfatendocdetPeer::DATABASE_NAME, DfatendocdetPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = DfatendocdetPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(DfatendocdetPeer::DATABASE_NAME);

		$criteria->add(DfatendocdetPeer::ID, $pk);


		$v = DfatendocdetPeer::doSelect($criteria, $con);

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
			$criteria->add(DfatendocdetPeer::ID, $pks, Criteria::IN);
			$objs = DfatendocdetPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseDfatendocdetPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/DfatendocdetMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.DfatendocdetMapBuilder');
}
