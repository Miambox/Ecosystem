var tabledata = [
    {id:1, reference:"Oli Bob", type:"12"}
];

var dataTest = [];
var table;

//create Tabulator on DOM element with id "example-table"
table = new Tabulator("#example-table", {
    clipboard:true,
    clipboardPasteAction:"replace",
    selectable: true,
    height:205, // set height of table (in CSS or here), this enables the Virtual DOM and improves render speed dramatically (can be any valid css height value)
    data:tabledata, //assign data to table
    layout:"fitColumns", //fit columns to width of table (optional)
    columns:[ //Define Table Columns
        {title:"Reference", field:"reference", width:150},
        {title:"Type de capteur", field:"type", width: 150},
    ],
    rowSelectionChanged:function(data, rows){
        //update selected row counter on selection change
        dataTest = data;
    	$("#select-stats span").text(data.length);
    },
});

$("#clear").click(function(){
    table.clearData()
});

$("#addRow").click(function(){
    table.addRow({});
});

$("#del-row").click(function(){
    dataTest.forEach((value, key) => {
        table.deleteRow(value.id);
    });
});

$("#sendToDataBase").click(function(){
    table.rowManager.rows.map(r => {
        r.data;
    });
});