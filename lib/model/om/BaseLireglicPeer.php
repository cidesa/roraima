<?php


abstract class BaseLireglicPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'lireglic';

	
	const CLASS_DEFAULT = 'lib.model.Lireglic';

	
	const NUM_COLUMNS = 33;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODLIC = 'lireglic.CODLIC';

	
	const DESLIC = 'lireglic.DESLIC';

	
	const LITIPLIC_ID = 'lireglic.LITIPLIC_ID';

	
	const LISICACT_ID = 'lireglic.LISICACT_ID';

	
	const FECREG = 'lireglic.FECREG';

	
	const FECEDI = 'lireglic.FECEDI';

	
	const LIREGSOL_ID = 'lireglic.LIREGSOL_ID';

	
	const PLAMODIFI = 'lireglic.PLAMODIFI';

	
	const PLAACLARA = 'lireglic.PLAACLARA';

	
	const PLAPRORRO = 'lireglic.PLAPRORRO';

	
	const FECDISDES = 'lireglic.FECDISDES';

	
	const FECDISHAS = 'lireglic.FECDISHAS';

	
	const COSTO = 'lireglic.COSTO';

	
	const FORPAG = 'lireglic.FORPAG';

	
	const DECRETOS = 'lireglic.DECRETOS';

	
	const DIRRET = 'lireglic.DIRRET';

	
	const PERCONTAC = 'lireglic.PERCONTAC';

	
	const HORARET = 'lireglic.HORARET';

	
	const PERIODICO = 'lireglic.PERIODICO';

	
	const FECPUB = 'lireglic.FECPUB';

	
	const PAGINA = 'lireglic.PAGINA';

	
	const CUERPO = 'lireglic.CUERPO';

	
	const MES = 'lireglic.MES';

	
	const CODPAIEFEC = 'lireglic.CODPAIEFEC';

	
	const CODPAIRECEP = 'lireglic.CODPAIRECEP';

	
	const CODFIN = 'lireglic.CODFIN';

	
	const FECOFER = 'lireglic.FECOFER';

	
	const HORAOFER = 'lireglic.HORAOFER';

	
	const DIROFER = 'lireglic.DIROFER';

	
	const PERCONTACOFER = 'lireglic.PERCONTACOFER';

	
	const CODCLACOMP = 'lireglic.CODCLACOMP';

	
	const OBSERVACIONES = 'lireglic.OBSERVACIONES';

	
	const ID = 'lireglic.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codlic', 'Deslic', 'LitiplicId', 'LisicactId', 'Fecreg', 'Fecedi', 'LiregsolId', 'Plamodifi', 'Plaaclara', 'Plaprorro', 'Fecdisdes', 'Fecdishas', 'Costo', 'Forpag', 'Decretos', 'Dirret', 'Percontac', 'Horaret', 'Periodico', 'Fecpub', 'Pagina', 'Cuerpo', 'Mes', 'Codpaiefec', 'Codpairecep', 'Codfin', 'Fecofer', 'Horaofer', 'Dirofer', 'Percontacofer', 'Codclacomp', 'Observaciones', 'Id', ),
		BasePeer::TYPE_COLNAME => array (LireglicPeer::CODLIC, LireglicPeer::DESLIC, LireglicPeer::LITIPLIC_ID, LireglicPeer::LISICACT_ID, LireglicPeer::FECREG, LireglicPeer::FECEDI, LireglicPeer::LIREGSOL_ID, LireglicPeer::PLAMODIFI, LireglicPeer::PLAACLARA, LireglicPeer::PLAPRORRO, LireglicPeer::FECDISDES, LireglicPeer::FECDISHAS, LireglicPeer::COSTO, LireglicPeer::FORPAG, LireglicPeer::DECRETOS, LireglicPeer::DIRRET, LireglicPeer::PERCONTAC, LireglicPeer::HORARET, LireglicPeer::PERIODICO, LireglicPeer::FECPUB, LireglicPeer::PAGINA, LireglicPeer::CUERPO, LireglicPeer::MES, LireglicPeer::CODPAIEFEC, LireglicPeer::CODPAIRECEP, LireglicPeer::CODFIN, LireglicPeer::FECOFER, LireglicPeer::HORAOFER, LireglicPeer::DIROFER, LireglicPeer::PERCONTACOFER, LireglicPeer::CODCLACOMP, LireglicPeer::OBSERVACIONES, LireglicPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codlic', 'deslic', 'litiplic_id', 'lisicact_id', 'fecreg', 'fecedi', 'liregsol_id', 'plamodifi', 'plaaclara', 'plaprorro', 'fecdisdes', 'fecdishas', 'costo', 'forpag', 'decretos', 'dirret', 'percontac', 'horaret', 'periodico', 'fecpub', 'pagina', 'cuerpo', 'mes', 'codpaiefec', 'codpairecep', 'codfin', 'fecofer', 'horaofer', 'dirofer', 'percontacofer', 'codclacomp', 'observaciones', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codlic' => 0, 'Deslic' => 1, 'LitiplicId' => 2, 'LisicactId' => 3, 'Fecreg' => 4, 'Fecedi' => 5, 'LiregsolId' => 6, 'Plamodifi' => 7, 'Plaaclara' => 8, 'Plaprorro' => 9, 'Fecdisdes' => 10, 'Fecdishas' => 11, 'Costo' => 12, 'Forpag' => 13, 'Decretos' => 14, 'Dirret' => 15, 'Percontac' => 16, 'Horaret' => 17, 'Periodico' => 18, 'Fecpub' => 19, 'Pagina' => 20, 'Cuerpo' => 21, 'Mes' => 22, 'Codpaiefec' => 23, 'Codpairecep' => 24, 'Codfin' => 25, 'Fecofer' => 26, 'Horaofer' => 27, 'Dirofer' => 28, 'Percontacofer' => 29, 'Codclacomp' => 30, 'Observaciones' => 31, 'Id' => 32, ),
		BasePeer::TYPE_COLNAME => array (LireglicPeer::CODLIC => 0, LireglicPeer::DESLIC => 1, LireglicPeer::LITIPLIC_ID => 2, LireglicPeer::LISICACT_ID => 3, LireglicPeer::FECREG => 4, LireglicPeer::FECEDI => 5, LireglicPeer::LIREGSOL_ID => 6, LireglicPeer::PLAMODIFI => 7, LireglicPeer::PLAACLARA => 8, LireglicPeer::PLAPRORRO => 9, LireglicPeer::FECDISDES => 10, LireglicPeer::FECDISHAS => 11, LireglicPeer::COSTO => 12, LireglicPeer::FORPAG => 13, LireglicPeer::DECRETOS => 14, LireglicPeer::DIRRET => 15, LireglicPeer::PERCONTAC => 16, LireglicPeer::HORARET => 17, LireglicPeer::PERIODICO => 18, LireglicPeer::FECPUB => 19, LireglicPeer::PAGINA => 20, LireglicPeer::CUERPO => 21, LireglicPeer::MES => 22, LireglicPeer::CODPAIEFEC => 23, LireglicPeer::CODPAIRECEP => 24, LireglicPeer::CODFIN => 25, LireglicPeer::FECOFER => 26, LireglicPeer::HORAOFER => 27, LireglicPeer::DIROFER => 28, LireglicPeer::PERCONTACOFER => 29, LireglicPeer::CODCLACOMP => 30, LireglicPeer::OBSERVACIONES => 31, LireglicPeer::ID => 32, ),
		BasePeer::TYPE_FIELDNAME => array ('codlic' => 0, 'deslic' => 1, 'litiplic_id' => 2, 'lisicact_id' => 3, 'fecreg' => 4, 'fecedi' => 5, 'liregsol_id' => 6, 'plamodifi' => 7, 'plaaclara' => 8, 'plaprorro' => 9, 'fecdisdes' => 10, 'fecdishas' => 11, 'costo' => 12, 'forpag' => 13, 'decretos' => 14, 'dirret' => 15, 'percontac' => 16, 'horaret' => 17, 'periodico' => 18, 'fecpub' => 19, 'pagina' => 20, 'cuerpo' => 21, 'mes' => 22, 'codpaiefec' => 23, 'codpairecep' => 24, 'codfin' => 25, 'fecofer' => 26, 'horaofer' => 27, 'dirofer' => 28, 'percontacofer' => 29, 'codclacomp' => 30, 'observaciones' => 31, 'id' => 32, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/LireglicMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.LireglicMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = LireglicPeer::getTableMap();
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
		return str_replace(LireglicPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(LireglicPeer::CODLIC);

		$criteria->addSelectColumn(LireglicPeer::DESLIC);

		$criteria->addSelectColumn(LireglicPeer::LITIPLIC_ID);

		$criteria->addSelectColumn(LireglicPeer::LISICACT_ID);

		$criteria->addSelectColumn(LireglicPeer::FECREG);

		$criteria->addSelectColumn(LireglicPeer::FECEDI);

		$criteria->addSelectColumn(LireglicPeer::LIREGSOL_ID);

		$criteria->addSelectColumn(LireglicPeer::PLAMODIFI);

		$criteria->addSelectColumn(LireglicPeer::PLAACLARA);

		$criteria->addSelectColumn(LireglicPeer::PLAPRORRO);

		$criteria->addSelectColumn(LireglicPeer::FECDISDES);

		$criteria->addSelectColumn(LireglicPeer::FECDISHAS);

		$criteria->addSelectColumn(LireglicPeer::COSTO);

		$criteria->addSelectColumn(LireglicPeer::FORPAG);

		$criteria->addSelectColumn(LireglicPeer::DECRETOS);

		$criteria->addSelectColumn(LireglicPeer::DIRRET);

		$criteria->addSelectColumn(LireglicPeer::PERCONTAC);

		$criteria->addSelectColumn(LireglicPeer::HORARET);

		$criteria->addSelectColumn(LireglicPeer::PERIODICO);

		$criteria->addSelectColumn(LireglicPeer::FECPUB);

		$criteria->addSelectColumn(LireglicPeer::PAGINA);

		$criteria->addSelectColumn(LireglicPeer::CUERPO);

		$criteria->addSelectColumn(LireglicPeer::MES);

		$criteria->addSelectColumn(LireglicPeer::CODPAIEFEC);

		$criteria->addSelectColumn(LireglicPeer::CODPAIRECEP);

		$criteria->addSelectColumn(LireglicPeer::CODFIN);

		$criteria->addSelectColumn(LireglicPeer::FECOFER);

		$criteria->addSelectColumn(LireglicPeer::HORAOFER);

		$criteria->addSelectColumn(LireglicPeer::DIROFER);

		$criteria->addSelectColumn(LireglicPeer::PERCONTACOFER);

		$criteria->addSelectColumn(LireglicPeer::CODCLACOMP);

		$criteria->addSelectColumn(LireglicPeer::OBSERVACIONES);

		$criteria->addSelectColumn(LireglicPeer::ID);

	}

	const COUNT = 'COUNT(lireglic.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT lireglic.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LireglicPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LireglicPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = LireglicPeer::doSelectRS($criteria, $con);
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
		$objects = LireglicPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return LireglicPeer::populateObjects(LireglicPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			LireglicPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = LireglicPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinLitiplic(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LireglicPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LireglicPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LireglicPeer::LITIPLIC_ID, LitiplicPeer::ID);

		$rs = LireglicPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinLisicact(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LireglicPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LireglicPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LireglicPeer::LISICACT_ID, LisicactPeer::ID);

		$rs = LireglicPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinLiregsol(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LireglicPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LireglicPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LireglicPeer::LIREGSOL_ID, LiregsolPeer::ID);

		$rs = LireglicPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinLitiplic(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		LireglicPeer::addSelectColumns($c);
		$startcol = (LireglicPeer::NUM_COLUMNS - LireglicPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		LitiplicPeer::addSelectColumns($c);

		$c->addJoin(LireglicPeer::LITIPLIC_ID, LitiplicPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LireglicPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = LitiplicPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getLitiplic(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addLireglic($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initLireglics();
				$obj2->addLireglic($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinLisicact(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		LireglicPeer::addSelectColumns($c);
		$startcol = (LireglicPeer::NUM_COLUMNS - LireglicPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		LisicactPeer::addSelectColumns($c);

		$c->addJoin(LireglicPeer::LISICACT_ID, LisicactPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LireglicPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = LisicactPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getLisicact(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addLireglic($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initLireglics();
				$obj2->addLireglic($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinLiregsol(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		LireglicPeer::addSelectColumns($c);
		$startcol = (LireglicPeer::NUM_COLUMNS - LireglicPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		LiregsolPeer::addSelectColumns($c);

		$c->addJoin(LireglicPeer::LIREGSOL_ID, LiregsolPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LireglicPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = LiregsolPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getLiregsol(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addLireglic($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initLireglics();
				$obj2->addLireglic($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LireglicPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LireglicPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LireglicPeer::LITIPLIC_ID, LitiplicPeer::ID);

		$criteria->addJoin(LireglicPeer::LISICACT_ID, LisicactPeer::ID);

		$criteria->addJoin(LireglicPeer::LIREGSOL_ID, LiregsolPeer::ID);

		$rs = LireglicPeer::doSelectRS($criteria, $con);
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

		LireglicPeer::addSelectColumns($c);
		$startcol2 = (LireglicPeer::NUM_COLUMNS - LireglicPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		LitiplicPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + LitiplicPeer::NUM_COLUMNS;

		LisicactPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + LisicactPeer::NUM_COLUMNS;

		LiregsolPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + LiregsolPeer::NUM_COLUMNS;

		$c->addJoin(LireglicPeer::LITIPLIC_ID, LitiplicPeer::ID);

		$c->addJoin(LireglicPeer::LISICACT_ID, LisicactPeer::ID);

		$c->addJoin(LireglicPeer::LIREGSOL_ID, LiregsolPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LireglicPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = LitiplicPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getLitiplic(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addLireglic($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initLireglics();
				$obj2->addLireglic($obj1);
			}


					
			$omClass = LisicactPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getLisicact(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addLireglic($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initLireglics();
				$obj3->addLireglic($obj1);
			}


					
			$omClass = LiregsolPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4 = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getLiregsol(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addLireglic($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj4->initLireglics();
				$obj4->addLireglic($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptLitiplic(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LireglicPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LireglicPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LireglicPeer::LISICACT_ID, LisicactPeer::ID);

		$criteria->addJoin(LireglicPeer::LIREGSOL_ID, LiregsolPeer::ID);

		$rs = LireglicPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptLisicact(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LireglicPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LireglicPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LireglicPeer::LITIPLIC_ID, LitiplicPeer::ID);

		$criteria->addJoin(LireglicPeer::LIREGSOL_ID, LiregsolPeer::ID);

		$rs = LireglicPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptLiregsol(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LireglicPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LireglicPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LireglicPeer::LITIPLIC_ID, LitiplicPeer::ID);

		$criteria->addJoin(LireglicPeer::LISICACT_ID, LisicactPeer::ID);

		$rs = LireglicPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptLitiplic(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		LireglicPeer::addSelectColumns($c);
		$startcol2 = (LireglicPeer::NUM_COLUMNS - LireglicPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		LisicactPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + LisicactPeer::NUM_COLUMNS;

		LiregsolPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + LiregsolPeer::NUM_COLUMNS;

		$c->addJoin(LireglicPeer::LISICACT_ID, LisicactPeer::ID);

		$c->addJoin(LireglicPeer::LIREGSOL_ID, LiregsolPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LireglicPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = LisicactPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getLisicact(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addLireglic($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initLireglics();
				$obj2->addLireglic($obj1);
			}

			$omClass = LiregsolPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getLiregsol(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addLireglic($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initLireglics();
				$obj3->addLireglic($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptLisicact(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		LireglicPeer::addSelectColumns($c);
		$startcol2 = (LireglicPeer::NUM_COLUMNS - LireglicPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		LitiplicPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + LitiplicPeer::NUM_COLUMNS;

		LiregsolPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + LiregsolPeer::NUM_COLUMNS;

		$c->addJoin(LireglicPeer::LITIPLIC_ID, LitiplicPeer::ID);

		$c->addJoin(LireglicPeer::LIREGSOL_ID, LiregsolPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LireglicPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = LitiplicPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getLitiplic(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addLireglic($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initLireglics();
				$obj2->addLireglic($obj1);
			}

			$omClass = LiregsolPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getLiregsol(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addLireglic($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initLireglics();
				$obj3->addLireglic($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptLiregsol(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		LireglicPeer::addSelectColumns($c);
		$startcol2 = (LireglicPeer::NUM_COLUMNS - LireglicPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		LitiplicPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + LitiplicPeer::NUM_COLUMNS;

		LisicactPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + LisicactPeer::NUM_COLUMNS;

		$c->addJoin(LireglicPeer::LITIPLIC_ID, LitiplicPeer::ID);

		$c->addJoin(LireglicPeer::LISICACT_ID, LisicactPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LireglicPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = LitiplicPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getLitiplic(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addLireglic($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initLireglics();
				$obj2->addLireglic($obj1);
			}

			$omClass = LisicactPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getLisicact(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addLireglic($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initLireglics();
				$obj3->addLireglic($obj1);
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
		return LireglicPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(LireglicPeer::ID); 

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
			$comparison = $criteria->getComparison(LireglicPeer::ID);
			$selectCriteria->add(LireglicPeer::ID, $criteria->remove(LireglicPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(LireglicPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(LireglicPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Lireglic) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(LireglicPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Lireglic $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(LireglicPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(LireglicPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(LireglicPeer::DATABASE_NAME, LireglicPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = LireglicPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(LireglicPeer::DATABASE_NAME);

		$criteria->add(LireglicPeer::ID, $pk);


		$v = LireglicPeer::doSelect($criteria, $con);

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
			$criteria->add(LireglicPeer::ID, $pks, Criteria::IN);
			$objs = LireglicPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseLireglicPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/LireglicMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.LireglicMapBuilder');
}
