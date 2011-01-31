/***
*
*  funcion para colocar formatos de mascaras definidas previamente
*  autor: CARLOS RAMIREZ
*
*/
function dFilter(tecla, obj, formato)
{
	aux = formato.split("-");
	tamaux = aux.length;
	valor = obj.value;
	id = obj.id;

	if (parseInt(tamaux) > 0)
	{
		if (tecla == (8))
		{
			if (valor=='')
			{
				$(id).value=valor;
			}else
			{
				hasta = valor.length;
				caracter2 = valor.charAt(hasta-2);//valor.substring(parseInt(hasta)-2,parseInt(hasta)-1);
				if (caracter2=='-' )
					$(id).value=valor.substring(0,parseInt(hasta)-1);
			}
		}else if(tecla ==(13) || tecla==(9))
		{
			hasta = valor.length;
			caracter1 = valor.charAt(hasta-1);
			if (caracter1=='-' )
			  $(id).value=$(id).value.substring(0,parseInt(hasta)-1);
		}else
		{
			valornew = valor.split("-");
			tamnew = parseInt(valornew.length);
			//for (r=0; r < parseInt(valornew.length); r++)
			if (tamnew>0)
			{	r = tamnew-1;
				//Comienza a validar la mascara
				if (aux[r].substring(0,1)=='#')
				{
				    RegExpTod = /^[a-z\d]+$/i;

					if(!(RegExpTod.test(valornew[r])))
					{
						$(id).value = valor.substring(0,valor.length-1);
					}
				}
				if (aux[r].substring(0,1)=='A' || aux[r].substring(0,1)=='a')
				{
					RegExpLet = /^[a-z]+$/i;

					if(!(RegExpLet.test(valornew[r])))
					{
						$(id).value = valor.substring(0,valor.length-1);
					}
				}
				if (aux[r].substring(0,1)==9)
				{
					RegExpDig =/^\d+$/;

					if(!(RegExpDig.test(valornew[r])))
					{
						$(id).value = valor.substring(0,valor.length-1);
					/*otra = valor.substring(valor.length-1,valor.length);
					if (otra in [0,1,2,3,4,5,6,7,8,9] || otra in [A,Z])
					{
						alert('introdujo'+otra);
					}*/
					}
				}
				if (aux[r].length==valornew[r].length)
				{
					$(id).value = $(id).value + '-';
				}
			}
		}
	}
}

function dFilterv2(e, obj, formato)
{
        evt = e ? e : event;
        tecla = (window.Event) ? evt.which : evt.keyCode;
	aux = formato.split("-");
	tamaux = aux.length;
	valor = obj.value;//+String.fromCharCode(tecla);;
	id = obj.id;

        if(valor.length>=formato.length)
            return false;
        else
        {
            if (parseInt(tamaux) > 0)
            {
                    if (tecla == (8))
                    {
                            return true;
                    }else if(tecla ==(13) || tecla==(9))
                    {
                            return true
                    }else
                    {
                            valornew = valor.split("-");
                            tamnew = parseInt(valornew.length);
                            //for (r=0; r < parseInt(valornew.length); r++)
                            if (tamnew>0)
                            {	r = tamnew-1;
                                    //Comienza a validar la mascara
                                    tamvalor2  = parseInt(valor.length)+1;
                                    if (formato.substring(tamvalor2-1,tamvalor2)=='-')
                                    {
                                            tamvalor2 = tamvalor2  + 1;
                                    }
                                    tcl = String.fromCharCode(tecla);
                                    tcl = tcl.toUpperCase();

                                    if (formato.substring(tamvalor2-1,tamvalor2)=='#')
                                    {
                                        if(!((tcl>='A' && tcl<='Z') || (tecla>=48 && tecla<=57)))
                                            {
                                                    return false;
                                            }
                                    }
                                    if (formato.substring(tamvalor2-1,tamvalor2)=='A' || aux[r].substring(0,1)=='a')
                                    {
                                            if(!((tcl>='A' && tcl<='Z')))
                                            {
                                                    return false;
                                            }
                                    }
                                    if (formato.substring(tamvalor2-1,tamvalor2)==9)
                                    {
                                            if(!((tecla>=48 && tecla<=57)))
                                            {
                                                    return false;
                                            }
                                    }
                                    if(aux.length>valornew.length)
                                    {
                                        if (aux[r].length==valornew[r].length)
                                        {
                                                $(id).value = $(id).value + '-';
                                                return true;
                                        }
                                    }
                            }
                    }
            }
       }
        return true;
}


/*var dFilterStep

function dFilterStrip (dFilterTemp, dFilterMask)
{
    dFilterMask = replace(dFilterMask,'#','');
    for (dFilterStep = 0; dFilterStep < dFilterMask.length++; dFilterStep++)
		{
		    dFilterTemp = replace(dFilterTemp,dFilterMask.substring(dFilterStep,dFilterStep+1),'');
		}
		return dFilterTemp;
}

function dFilterMax (dFilterMask)
{
 		dFilterTemp = dFilterMask;
    for (dFilterStep = 0; dFilterStep < (dFilterMask.length+1); dFilterStep++)
		{
		 		if (dFilterMask.charAt(dFilterStep)!='#')
				{
		        dFilterTemp = replace(dFilterTemp,dFilterMask.charAt(dFilterStep),'');
				}
		}
		return dFilterTemp.length;
}

function dFilter (key, textbox, dFilterMask)
{
		dFilterNum = dFilterStrip(textbox.value, dFilterMask);
		if (key==9)
		{
		    return true;
		}
		else if (key==8&&dFilterNum.length!=0)
		{
		 	 	dFilterNum = dFilterNum.substring(0,dFilterNum.length-1);
		}
 	  else if ( ((key>47&&key<58)||(key>95&&key<106)) && dFilterNum.length<dFilterMax(dFilterMask) )
		{
		if ((key>95)&&(key<106)){key-=48;}
        dFilterNum=dFilterNum+String.fromCharCode(key);
		}

		var dFilterFinal='';
    for (dFilterStep = 0; dFilterStep < dFilterMask.length; dFilterStep++)
		{
        if (dFilterMask.charAt(dFilterStep)=='#')
				{
					  if (dFilterNum.length!=0)
					  {
				        dFilterFinal = dFilterFinal + dFilterNum.charAt(0);
					      dFilterNum = dFilterNum.substring(1,dFilterNum.length);
					  }
				    else
				    {
				        dFilterFinal = dFilterFinal + "";
				    }
				}
		 		else if (dFilterMask.charAt(dFilterStep)!='#')
				{
				    dFilterFinal = dFilterFinal + dFilterMask.charAt(dFilterStep);
				}
//		    dFilterTemp = replace(dFilterTemp,dFilterMask.substring(dFilterStep,dFilterStep+1),'');
		}


		textbox.value = dFilterFinal+'-';
    return false;
}

function replace(fullString,text,by) {
// Replaces text with by in string
    var strLength = fullString.length, txtLength = text.length;
    if ((strLength == 0) || (txtLength == 0)) return fullString;

    var i = fullString.indexOf(text);
    if ((!i) && (text != fullString.substring(0,txtLength))) return fullString;
    if (i == -1) return fullString;

    var newstr = fullString.substring(0,i) + by;

    if (i+txtLength < strLength)
        newstr += replace(fullString.substring(i+txtLength,strLength),text,by);

    return newstr;
}*/