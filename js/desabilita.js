//Bot�o direito mouse desabilidado!
var mensagem = "";

function clickIE() 
{
    if (document.all) 
    {
        (mensagem);
        return false;
    }
}
function clickNS(e) 
{
    if (document.layers || (document.getElementById&&!document.all)) 
    {
        if (e.which==2 || e.which==3) 
        {
            (mensagem);
            return false;
        }
    }
}
if (document.layers) 
{
    document.captureEvents(Event.MOUSEDOWN);
    document.onmousedown = clickNS;
}
else
{
    document.onmouseup = clickNS;
    document.oncontextmenu = clickIE;
}

document.oncontextmenu = new Function("return false")

//F5 e Ctrl desabilitado!             
document.onkeydown = function ()
{ 
    switch (event.keyCode)
    {
        case 116 :
            event.returnValue = false;
            event.keyCode = 0;           
            return false;

        case 82 :
            if (event.ctrlKey) 
            {
                event.returnValue = false;
                event.keyCode = 0;             
                return false;
            }
    }
}
