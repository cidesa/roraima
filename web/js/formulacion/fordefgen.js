

function medida(e,index,formato)
{
if (e.keyCode==13)
{
  var forpre=formato.strip().split("-");

  if (index=='1')
  {
    desde = parseInt(document.getElementById('fordefegrgen_desproacc').value);
    hasta = parseInt(document.getElementById('fordefegrgen_hasproacc').value);
    i=desde-1;
    j=hasta-1;
    format='';
    while (i<=j)
    {
      if (i!=j)
      {
        format=format+forpre[i]+"-";
      }
      else
      {
        format=format+forpre[i];
      }
      i++;
    }
    if (desde == 0 && hasta ==0 ){
	    document.getElementById('fordefegrgen_lonproacc').value=0;
	    document.getElementById('fordefegrgen_forproacc').value='';
	}else{
	    document.getElementById('fordefegrgen_lonproacc').value=format.length;
	    document.getElementById('fordefegrgen_forproacc').value=format;
	}
  }

  else if (index=='2')
  {
    desde = parseInt(document.getElementById('fordefegrgen_desaccesp').value);
    hasta = parseInt(document.getElementById('fordefegrgen_hasaccesp').value);
    i=desde-1;
    j=hasta-1;
    format='';
    while (i<=j)
    {
      if (i!=j)
      {
        format=format+forpre[i]+"-";
      }
      else
      {
        format=format+forpre[i];
      }
      i++;
    }
    if (desde == 0 && hasta ==0 ){
	    document.getElementById('fordefegrgen_lonaccesp').value=0;
	    document.getElementById('fordefegrgen_foraccesp').value='';
	}else{
	    document.getElementById('fordefegrgen_lonaccesp').value=format.length;
	    document.getElementById('fordefegrgen_foraccesp').value=format;
	}
  }

  else if (index=='3')
  {
    desde = parseInt(document.getElementById('fordefegrgen_dessubaccesp').value);
    hasta = parseInt(document.getElementById('fordefegrgen_hassubaccesp').value);
    i=desde-1;
    j=hasta-1;
    format='';
    while (i<=j)
    {
      if (i!=j)
      {
        format=format+forpre[i]+"-";
      }
      else
      {
        format=format+forpre[i];
      }
      i++;
    }
    if (desde == 0 && hasta ==0 ){
	    document.getElementById('fordefegrgen_lonsubaccesp').value=0;
	    document.getElementById('fordefegrgen_forsubaccesp').value='';
	}else{
	    document.getElementById('fordefegrgen_lonsubaccesp').value=format.length;
	    document.getElementById('fordefegrgen_forsubaccesp').value=format;
	}
  }

  else if (index=='4')
  {
    desde = parseInt(document.getElementById('fordefegrgen_desuae').value);
    hasta = parseInt(document.getElementById('fordefegrgen_hasuae').value);
    i=desde-1;
    j=hasta-1;
    format='';
    while (i<=j)
    {
      if (i!=j)
      {
        format=format+forpre[i]+"-";
      }
      else
      {
        format=format+forpre[i];
      }
      i++;
    }
    if (desde == 0 && hasta ==0 ){
	    document.getElementById('fordefegrgen_lonuae').value=0;
	    document.getElementById('fordefegrgen_foruae').value='';
	}else{
	    document.getElementById('fordefegrgen_lonuae').value=format.length;
	    document.getElementById('fordefegrgen_foruae').value=format;
	}
  }

  else if (index=='5')
  {
    desde = parseInt(document.getElementById('fordefegrgen_despar').value);
    hasta = parseInt(document.getElementById('fordefegrgen_haspar').value);
    i=desde-1;
    j=hasta-1;
    format='';
    while (i<=j)
    {
      if (i!=j)
      {
        format=format+forpre[i]+"-";
      }
      else
      {
        format=format+forpre[i];
      }
      i++;
    }
    if (desde == 0 && hasta ==0 ){
	    document.getElementById('fordefegrgen_lonpar').value=0;
	    document.getElementById('fordefegrgen_forpar').value='';
	}else{
	    document.getElementById('fordefegrgen_lonpar').value=format.length;
	    document.getElementById('fordefegrgen_forpar').value=format;
	}
  }
}
}