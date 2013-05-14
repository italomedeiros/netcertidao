var $container = $("#example1");
var $console = $("#example1console");
var $parent = $container.parent();
$(document).ready(function () 
{
    $("#example1").handsontable({
        startRows: 6,
        startCols: 15,
        contextMenu: ['row_below', 'remove_row', 'undo', 'redo'],
        scrollH: 'auto',
        scrollV: 'auto',
        stretchH: 'all',
        height: 450,
        colHeaders: [
        "CNPJ", "Razão Social", "UF", "Cidade", "SEFAZ", "Inscrição Estadual¹", 
        "CPF²", "Senha²", "SEFIN", "Inscrição Municipal³", "DATAPREV1", "Senha*",
        "CRF", "SRF/PGFN", "DATAPREV3"]        
    });    
        
    $parent.find('button[name=save]').click(function () {
        $.ajax({
        url: "json/save.json",
        data: {"data": handsontable.getData()}, //returns all cells' data
        dataType: 'json',
        type: 'POST',
        success: function (res) {
        if (res.result === 'ok') {
            $console.text('Data saved');
        }
        else {
            $console.text('Save error');
        }
        },
        error: function () {
        $console.text('Save error. POST method is not allowed on GitHub Pages. Run this example on your own server to see the success message.');
        }
        });
    });
});