
<?php
function inputcat_tag($param,$text,$opc,$parametros='')
{
	$tb = $param[1]->select($param[3]);

	if (count($text)>3 && count($text)==6)
    {
		$script ='
		  <tr>
             <td class="form_label_01">
             	<div align="left"><strong>'.$param[2].'</strong></div>
             </td>
             <td width="'.$opc[1].'">
             	<div align="left">
               	  <input name="'.$text[0].'" type="text" class="breadcrumb" id="'.$text[0].'" value="'.$tb->fields[$text[1]].'" '.$parametros.' size="'.$opc[0].'">
 				  <a href="#"><img src="../../img/search.gif" align="top" onclick="catalogo('."'".$param[0]."'".','.$text[2].'); "></a>
 			    </div>
 			 </td>
             <td width="'.$opc[1].'">
             	<div align="left">
               	  <input name="'.$text[3].'" type="text" class="breadcrumb" id="'.$text[3].'" value="'.$tb->fields[$text[4]].'" '.$parametros.' size ="'.$opc[0].'">
 				  <a href="#"><img src="../../img/search.gif" align="top" onclick="catalogo('."'".$param[0]."'".','.$text[5].'); "></a>
 			    </div>
 			 </td>
           </tr>';
    }else
    {
    	$script ='
	  <tr>
         <td class="form_label_01">
         	<div align="left"><strong>'.$param[2].'</strong></div>
         </td>
         <td width="'.$opc[1].'" colspan="2">
         	<div align="left">
           	  <input name="'.$text[0].'" type="text" class="breadcrumb" id="'.$text[0].'" value="'.$tb->fields[$text[1]].'" '.$parametros.' size ="'.$opc[0].'">
			  <a href="#"><img src="../../img/search.gif" align="top" onclick="catalogo('."'".$param[0]."'".','.$text[2].'); "></a>
		    </div>
		 </td>
		 <td width="'.$opc[1].'">
		 </td>
       </tr>';
    }

	return $script;
}



function inputfec_tag($param,$text,$opc,$parametros='')
{
	$tb = $param[1]->select($param[3]);

	if (count($text)>3 && count($text)==6)
    {
		$script ='
		  <tr>
             <td class="form_label_01">
             	<div align="left"><strong>'.$param[2].'</strong></div>
             </td>
             <td width="'.$opc[1].'">
             	<div align="left">
               	  <input name="'.$text[0].'" type="text" class="breadcrumb" id="'.$text[0].'" value="'.$tb->fields[$text[1]].'" '.$parametros.' size ="'.$opc[0].'" datepicker="true">
 			    </div>
 			 </td>
             <td width="'.$opc[1].'">
             	<div align="left">
               	  <input name="'.$text[3].'" type="text" class="breadcrumb" id="'.$text[3].'" value="'.$tb->fields[$text[4]].'" '.$parametros.' size ="'.$opc[0].'" datepicker="true">
 			    </div>
 			 </td>
           </tr>';
    }else
    {
    	$script ='
	  <tr>
         <td class="form_label_01">
         	<div align="left"><strong>'.$param[2].'</strong></div>
         </td>
         <td width="'.$opc[1].'" colspan="2">
         	<div align="left">
           	  <input name="'.$text[0].'" type="text" class="breadcrumb" id="'.$text[0].'" value="'.$tb->fields[$text[1]].'" '.$parametros.' size ="'.$opc[0].'" datepicker="true">
		    </div>
		 </td>
		 <td width="'.$opc[1].'">
		 </td>
       </tr>';
    }

	return $script;
}

function combo_tag($param,$text,$opc,$parametros='')
{
	$t= split("=>",$text[1]);
	$r = split("-",$t[0]);
	$campo1= $r[0];
	$campo2= $r[1];
	$primer=$t[1];
	if (strrpos(strtolower($param[3]),"order by"))
	{
		$sql1=$param[3]." asc";
		$sql2=$param[3]." desc";
	}else
	{
		$sql1=$param[3]."";
		$sql2=$param[3]."";
	}
	$seleccionado="01";

	if (count($text)>3 && count($text)==6)
    {
		$script ='
		  <tr>
             <td class="form_label_01">
             	<div align="left"><strong>'.$param[2].'</strong></div>
             </td>
             <td width="'.$opc[1].'">
             	<div align="left">
					<select name="'.$text[0].'" class="breadcrumb" id="'.$text[0].'"'.$parametros.'>';
						if (!empty($primer))
					    {
							$script.='<option value="" selected>'.$primer.'</option>';
					    }
					    $tb=$param[1]->select($sql1);
					    while (!($tb->EOF))
					    {
					       if ($tb->fields[$campo1]==$seleccionado)
					       {
								$script.='<option value="'.$tb->fields[$campo1].'" selected>'.$tb->fields[$campo2].'</option>';
					       }
					       else
					       {
					           $script.='<option value="'.$tb->fields[$campo1].'">'.$tb->fields[$campo2].'</option>';
					       }
					       $tb->MoveNext();
					   }
					$script.='</select>
 			    </div>
 			 </td>
             <td width="'.$opc[1].'">
             	<div align="left">
					<select name="'.$text[3].'" class="breadcrumb" id="'.$text[3].'" '.$parametros.'>';
						if ($primer=="0")
					    {
							$script.='<option value="" selected>'.$primer.'</option>';
					    }
					    $tb=$param[1]->select($sql2);
					    while (!($tb->EOF))
					    {
					       if ($tb->fields[$campo1]==$seleccionado)
					       {
								$script.='<option value="'.$tb->fields[$campo1].'" selected>'.$tb->fields[$campo2].'</option>';
					       }
					       else
					       {
					           $script.='<option value="'.$tb->fields[$campo1].'">'.$tb->fields[$campo2].'</option>';
					       }
					       $tb->MoveNext();
					   }
					$script.='</select>
 			    </div>
 			 </td>
           </tr>';
    }else
    {
    	$script ='
    <tr>
             <td class="form_label_01">
             	<div align="left"><strong>'.$param[2].'</strong></div>
             </td>
             <td width="'.$opc[1].'" colspan="2">
             	<div align="left">
					<select name="'.$text[0].'" class="breadcrumb" id="'.$text[0].'" '.$parametros.'>';
						if (!empty($primer))
					    {
							$script.='<option value="" selected>'.$primer.'</option>';
					    }
					    $tb=$param[1]->select($sql1);
					    while (!($tb->EOF))
					    {
					       if ($tb->fields[$campo1]==$seleccionado)
					       {
								$script.='<option value="'.$tb->fields[$campo1].'" selected>'.$tb->fields[$campo2].'</option>';
					       }
					       else
					       {
					           $script.='<option value="'.$tb->fields[$campo1].'">'.$tb->fields[$campo2].'</option>';
					       }
					       $tb->MoveNext();
					   }
					$script.='</select>
 			    </div>
 			 </td>
             <td width="'.$opc[1].'">
 			 </td>
           </tr>
	  ';
    }

	return $script;
}

function combof_tag($param,$text,$opc,$parametros='')
{
	if (count($text)>3 && count($text)==6)
    {
		$script ='
		  <tr>
             <td class="form_label_01">
             	<div align="left"><strong>'.$param[2].'</strong></div>
             </td>
             <td width="'.$opc[1].'">
             	<div align="left">
					<select name="'.$text[0].'" class="breadcrumb" id="'.$text[0].'" '.$parametros.'>';
					  for($i=0;$i < count($text[1]);$i++)
						  {
						  	$aux=split("=>",$text[1][$i]);
						  	if (count($aux)<2)
						  	  $aux[1]=$aux[0];
						  	$script.='<option value="'.$aux[0].'" >'.$aux[1].'</option>';
						  }
					$script.='</select>
 			    </div>
 			 </td>
             <td width="'.$opc[1].'">
             	<div align="left">
					<select name="'.$text[0].'" class="breadcrumb" id="'.$text[0].'" '.$parametros.'>';
						for($i=0;$i < count($text[4]);$i++)
						  {

						  	$aux=split("=>",$text[4][$i]);
						  	if (count($aux)<2)
						  	  $aux[1]=$aux[0];
						  	$script.='<option value="'.$aux[0].'" >'.$aux[1].'</option>';
						  }
					$script.='</select>
					</select>
 			    </div>
 			 </td>
           </tr>';
    }else
    {
    	$script ='
	  <tr>
         <td class="form_label_01">
         	<div align="left"><strong>'.$param[2].'</strong></div>
         </td>
         <td width="'.$opc[1].'" colspan="2">
             	<div align="left">
					<select name="'.$text[0].'" class="breadcrumb" id="'.$text[0].'" '.$parametros.'>';
						for($i=0;$i < count($text[1]);$i++)
						  {
						  	$aux=split("=>",$text[1][$i]);
						  	if (count($aux)<2)
						  	  $aux[1]=$aux[0];
						  	$script.='<option value="'.$aux[0].'" >'.$aux[1].'</option>';
						  }
					$script.='</select>
					</select>
 			    </div>
 			 </td>
		 <td width="'.$opc[1].'">
		 </td>
       </tr>';
    }

	return $script;
}

function input_tag($param,$text,$opc,$parametros='')
{
	if ($text[1]==-1)
	   $text[1]="";
	if ($text[4]==-1)
	   $text[4]="";

	   $tb = $param[1]->select($param[3]);

	if (count($text)>3 && count($text)==6)
    {
		$script ='
		  <tr>
             <td class="form_label_01">
             	<div align="left"><strong>'.$param[2].'</strong></div>
             </td>
             <td width="'.$opc[1].'">
             	<div align="left">
               	  <input name="'.$text[0].'" type="text" class="breadcrumb" id="'.$text[0].'" value="'.$tb->fields[$text[1]].'" '.$parametros.' size ="'.$opc[0].'">
 			    </div>
 			 </td>
             <td width="'.$opc[1].'">
             	<div align="left">
               	  <input name="'.$text[3].'" type="text" class="breadcrumb" id="'.$text[3].'" value="'.$tb->fields[$text[4]].'" '.$parametros.' size ="'.$opc[0].'">
 			    </div>
 			 </td>
           </tr>';
    }else
    {
    	$script ='
	  <tr>
         <td class="form_label_01">
         	<div align="left"><strong>'.$param[2].'</strong></div>
         </td>
         <td width="'.$opc[1].'" colspan="2">
         	<div align="left">
           	  <input name="'.$text[0].'" type="text" class="breadcrumb" id="'.$text[0].'" value="'.$tb->fields[$text[1]].'" '.$parametros.' size ="'.$opc[0].'">
		    </div>
		 </td>
		 <td width="'.$opc[1].'">
		 </td>
       </tr>';
    }

	return $script;
}

function titulo_tag($param,$text,$opc,$parametros='')
{
	if (!(is_null($text[3])))
    {
		$script ='
		  <tr>
	          <td class="form_label_01">
	     			<div align="left"><strong>'.$param[2].'</strong></div>
	     				</td>
	          <td><strong>'.$text[0].'</strong></td>
	          <td><strong>'.$text[3].'</strong></td>
	        </tr>';
    }else
    {
    	$script ='
	  <tr>
	      <td class="form_label_01">
	 			<div align="left"><strong>'.$param[2].'</strong></div>
	 				</td>
	      <td colspan="2" ><strong>'.$text[0].'</strong></td>
	      <td></td>
	    </tr>';
    }

	return $script;
}
function inputarea_tag($param,$text,$opc,$parametros='')
{
	if ($text[1]==-1)
	   $text[1]="";
	if ($text[4]==-1)
	   $text[4]="";

    $script ='
	  <tr>
         <td class="form_label_01">
         	<div align="left"><strong>'.$param[2].'</strong></div>
         </td>
         <td width="'.$opc[1].'" colspan="2">
         	<div align="left">
				  <textarea name="'.$text[0].'" rows="5" cols="60" wrap="off" class="breadcrumb" id="'.$text[0].'" value="'.$text[1].'" '.$parametros.'>
				  </textarea>
 			    </div>
		 </td>
		 <td width="'.$opc[1].'">
		 </td>
       </tr>';

	return $script;
}