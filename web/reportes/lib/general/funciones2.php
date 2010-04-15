<?

  /////////////////////////////////////////////////////////////////////////////////////////////////////





  //require_once("basedatosAdo.php");

  class negociocatalogo2

  {

    var $bd;

  var $arregloref;

  var $cuantas;

  var $campos;

  var $arreglocom;

  var $codemp;

  function negociocatalogo2()

  {

     $this->codemp=$_SESSION["codemp"];

     $this->bd=new basedatosAdo($this->codemp);

     $this->arregloref=array();

     $this->arreglocom=array();

     $this->cuantas=0;

     $this->campos=0;

  }



    function transf(&$sql,$valor,$campo)

    {

	  	 //chequeamos si hay limit

	  	/*$plimit = stripos(strtoupper($sql),strtoupper('limit'));

		if($plimit===false)

		{

			$sql.=" limit 500";

		}else

		{

			$sql=substr($sql,0,$plimit);

			$sql.=" limit 500";

		}*/

		$campo = str_replace("-",".",$campo);

	  	 //chequeamos si hay order y/o group by

	  	 $porder = stripos(strtoupper($sql),strtoupper('order'));

	 	 $pgroup = stripos(strtoupper($sql),strtoupper('group'));

	     if ( $porder === false && $pgroup === false ) // no hay ni order ni group

	     {

	     	$donde=strlen($sql);

	     }

	     else

	     {

	    	 if ( $porder !== false && $pgroup !== false )// hay order y group

	    	 {

	    		$donde=$pgroup;

	    	 }

			 else // hay solo uno de los 2

			 {

				 if ($porder !== false) // hay order

				 {

			 		$donde=$porder;

				 }

				 else // hay group

				 {

			 		$donde=$pgroup;

				 }

			 }

	     }

		 ////////////////////////////////////////



	  	 //busquemos si hay where

	  	 $pwhere = stripos(strtoupper($sql),strtoupper('where'));

	  	 if ($pwhere === false) // no hay where

	  	 {

			$sql1=substr($sql,0,$donde);

	  	    $cadena=' where upper('.$campo.') like upper(¿%'.$valor.'%¿) ';

	  	    $sql2=substr($sql,$donde);

	  	 }

	  	 else // si hay where

	  	 {

			$sql1=substr($sql,0,$donde);

	  	    $cadena=' and upper('.$campo.') like upper(¿%'.$valor.'%¿) ';

	  	    $sql2=substr($sql,$donde);

	  	 }

	  	 $sql=$sql1.$cadena.$sql2;

    }





  function mostrar($sql,$filtro)

  {



     $sql=str_replace("¿","'",$sql);

     $sql=str_replace("¿","'",$sql);

     $sql=str_replace("?","/",$sql);

     $sql=str_replace("*","'",$sql);

	 $sql=str_replace("*","'",$sql);



     $plimit = stripos(strtoupper($sql),strtoupper('limit'));

	if($plimit===false)

	{

		$sql.=" limit 500";

	}else

	{

		$sql=substr($sql,0,$plimit);

		$sql.=" limit 500";

	}

	foreach ($filtro as $key => $val)

	{

		$obj[]=$val;

		$obj[$key]=$val;

	}



     $tb=$this->bd->select($sql);

     $i=1;



     //Llenamos un arreglo con los registros



     if ($tb){

     $totcampos=$tb->FieldCount();

        $registro=0;

        $this->arreglocom = $tb->getArray();

     /*$tb->MoveFirst();

     while (!$tb->EOF)

     {

        for ($col=0;$col<$totcampos;$col++)

        {

         $this->arreglocom[$registro][$col]=$tb->fields[$col];

      }

      $registro++;

        $tb->MoveNext();

     }*/



     //////////////////////////////////////////////////////////



     $tb->MoveFirst();

     print "<tr class='queryheader'>";

       print "<td width='8%'> <div align='center'><font color='#FFFFFF'><strong><font size='1' face='Verdana, Arial, Helvetica, sans-serif'>Id</font></strong></font></div></td>";

     $this->campos=$tb->FieldCount();

     for ($i=1;$i<=$this->campos;$i++)

     {

         $info=$tb->FetchField($i-1);

         print "<td> <div align='center'><font color='#FFFFFF' size='1' face='Verdana, Arial, Helvetica, sans-serif'><strong>".ucwords($info->name)."</strong></font></div></td>";

     }

     print "</tr>";

     $i=1;

     if (($tb->RecordCount()<500) || ($filtro!=""))

     {

       while (!$tb->EOF)

       {

        $this->arregloref[$i]=$tb->fields[1];

        print "<tr>";

        print "<td bgcolor='#EEF2F2'>";

       // print "<input type='text' class='imagenInicio' onMouseOver=this.className='imagenFoco' onMouseOut=this.className='imagenInicio' name='p".$i."' value='".$i."' size='".strlen(count($this->arregloref)).""."' readonly='true' style='font-family:Verdana;font-size:x-small;'>";

          print "<a href=''><font color='#336699'><strong><font size='1' face='Verdana, Arial, Helvetica, sans-serif'>".$i."</font></strong></font></a>\n";

        print "</td>";

        for ($x=0;$x<=$this->campos-1;$x++)

        {

         $info=$tb->FetchField($x);

         $tipo = $tb->MetaType($info->type);

         if ($x==0)

         {

          if (($tipo=='C') || ($tipo=='X'))

          {

             print "<td bgcolor='#EEF2F2'>";

             print "<a href=".chr(34)."javascript: aceptar('".strtolower($obj[0])."','".strtoupper($tb->fields[$x])."');".chr(34)."><font color='#336699'><strong><font size='1' face='Verdana, Arial, Helvetica, sans-serif'>".$tb->fields[$x]."</font></strong></font></a>\n";

             print "</td>";

          }

          else

          {

             print "<td bgcolor='#EEF2F2'>";

             print "<a href=".chr(34)."javascript: aceptar('".$obj[0]."','".strtoupper($tb->fields[$x])."');".chr(34)."><font color='#336699'><strong><font size='1' face='Verdana, Arial, Helvetica, sans-serif'>".$tb->fields[$x]."</font></strong></font></a>\n";

             print "</td>";

          }

         }

         else

         {

          if (($tipo=='C') || ($tipo=='X'))

          {

             print "<td bgcolor='#EEF2F2'>";

             print "<a name='".strtoupper($obj[1])."'><font color='#336699'><strong><font size='1' face='Verdana, Arial, Helvetica, sans-serif'>".$tb->fields[$x]."</font></strong></font></a>\n";

             print "</td>";

          }

          else

          {

             print "<td bgcolor='#EEF2F2'>";

             print "<a name='".$obj[1]."'><font color='#336699'><strong><font size='1' face='Verdana, Arial, Helvetica, sans-serif'>".$tb->fields[$x]."</font></strong></font></a>\n";

             print "</td>";

          }

         }

        }

        /////////////////ESTO ESTA OCULTO//////////

        print "<td style='display:none'>";

        $info=$tb->FetchField(1);

        $tipo = $tb->MetaType($info->type);

        if (($tipo=='C') || ($tipo=='X'))

        {

         print "<input type='text' name='r".$i."' value='".strtoupper($tb->fields[$x])."' readonly='true' style='font-family:Verdana;font-size:x-small;' >";

        }

        else

        {

         print "<input type='text' name='r".$i."' value='".$tb->fields[$x]."' readonly='true' style='font-family:Verdana;font-size:x-small;' >";

        }

        print "</td>";

        print "<td style='display:none'>";

        print "<input type='text' name='c".$i."' value='".$tb->fields[0]."' readonly='true' style='font-family:Verdana;font-size:x-small;' >";

        print "</td>";

        //////////////////////FIN///////////////

        print "</tr>";

        $i++;



        $tb->MoveNext();

       } //End del While

       }

     }//End del IF

     else

	 {

	 	print 'No se Encontraron Datos';

	 }

  }



  function numerofilas()

  {

     $this->cuantas=count($this->arregloref);

     return $this->cuantas;

  }





  function devuelve_arreglo()

  {

     return $this->arreglocom;

  }



  function numerocampos()

  {

     return $this->campos;

  }



  function sacarfiltros($sql)

  {

  	 //sacamos el campo

  	 if(!(stripos(strtoupper($sql),strtoupper('to_char'))))

  	 {

  	 	 $pvacio = stripos(strtoupper($sql),strtoupper(' '));

	  	 $sqlnew=trim(substr($sql,$pvacio));

	  	 $pfrom=stripos(strtoupper($sqlnew),strtoupper('from'));

	  	 $sqlnew=trim(substr($sqlnew,0,$pfrom));



	  	 $pfunc = stripos(strtoupper($sqlnew),strtoupper('distinct'));

	  	 if ($pfunc!==false )

	  	 {

			$sqlnew=substr($sqlnew,strlen('distinct')+1);

	  	 }

	  	 $aux= split(",",$sqlnew);

	  	 $campo=array();

	  	 for ($i=0;$i < count($aux);$i++)

	  	 {

	  	 	$pcorte = stripos(strtoupper($sqlnew),strtoupper(','));

	  	 	if($pcorte===false)

	  	 		$campoaux=$this->sacarcampo($sqlnew);

	  	 	else

	  	 		$campoaux=$this->sacarcampo(substr($sqlnew,0,$pcorte+1));

			$campo[$campoaux[1]]=$campoaux[0];

	  	 	$sqlnew=trim(substr($sqlnew,$pcorte+1));

	  	 }

  	 }else

  	 {

  	 	 $pvacio = stripos(strtoupper($sql),strtoupper(' '));

	  	 $sqlnew=trim(substr($sql,$pvacio));

	  	 $pfrom=stripos(strtoupper($sqlnew),strtoupper('from'));

	  	 $sqlnew=trim(substr($sqlnew,0,$pfrom));

	  	 $pfunc = stripos(strtoupper($sqlnew),strtoupper('distinct'));

	  	 if ($pfunc!==false )

	  	 {

			$sqlnew=substr($sqlnew,strlen('distinct')+1);

	  	 }

	  	 $pcorte = stripos(strtoupper($sqlnew),strtoupper(','));

	  	 $campoaux=$this->sacarcampo(substr($sqlnew,0,$pcorte+1));

	  	 $campo[$campoaux[1]]=$campoaux[0];

  	 }



  	 return $campo;

  }



  function sacarcampo($campo)

  {

	$campo = str_replace("("," ",$campo);

	$campo = str_replace(")"," ",$campo);

	$campo = str_replace(","," ",$campo);



	$auxcampo = split(" as ",strtolower($campo));

	/*$ppunto=stripos((trim($auxcampo[0])),strtoupper('.'));

	if($ppunto!==false)

	{

		$auxcampo[0]=substr(trim($auxcampo[0]),$ppunto+1);

	}*/



	if 	(empty($auxcampo[1]))

		$auxcampo[1]=$auxcampo[0];



	 $auxcampo[0]= trim($auxcampo[0]);

	 $auxcampo[1]= trim($auxcampo[1]);

  	 return $auxcampo;

  }



  }





?>
