<?
		function ejecutaAntes($cad,$long,$form,$anoi,$anof,$loncat,$concat,$inipart,$lonmas,$lonpar,$nivel,$grup,$codes,$codhas,$como,$bd)
		{
			$cad='';
			$long=0;
			$reg=$bd->select("SELECT SUM(coalesce(LONNIV+1,0))-1 as lonsub FROM CPNIVELES WHERE CONSEC<=$grup");
			if(!$reg->EOF)
			{
				$long=$reg->fields["lonsub"];
			}
			$form='INICIA';
			$rs=$bd->select("SELECT * FROM CPNIVELES WHERE CATPAR='c'");
			while(!$rs->EOF)
			{
				if($form=='INICIA')
				{
					$form=ltrim(str_pad(' ',$rs->fields["LONNIV"]+1,'%'));
				}
				else
				{
					$form=$form.'-'.ltrim(str_pad(' ',$rs->fields["LONNIV"]+1,'%'));
				}
				$rs->MoveNext();
			}
			$form=$form.'-';
			$cad=substr($form,$long);
			$rb=$bd->select("SELECT TO_CHAR(FECINI,'YYYY') as anoini,TO_CHAR(FECCIE,'YYYY') as anofin FROM CPDEFNIV WHERE CODEMP= '001'");
			if(!$rb->EOF)
			{
				$anoi=$rb->fields["anoini"];
				$anof=$rb->fields["anofin"];
			}
			$tb=$bd->select("SELECT SUM(LonNiv) as loncategoria,COUNT(LonNiv) as concategoria FROM CPNiveles WHERE CatPar = 'c'");
			if(!$tb->EOF)
			{
				$loncat=$tb->fields["loncategoria"];
				$concat=$tb->fields["concategoria"];
			}
			$inipart=$loncat + $concat + 1;
			$tb=$bd->select("SELECT SUM(LonNiv) as lonmascara FROM CPNiveles WHERE Consec <= $nivel");
			if(!$tb->EOF)
			{
				$lonmas=$tb->fields["lonmascara"];
			}
			$lonpar=($lonmas + $nivel) - $inipart;
			
			return $cad;
			return $form;//
			return $long;
			return $anoi;
			return $anof;//$loncat,$concat,$inipart,$lonmas,$lonpar;
		}


?>