function tablesorter(){
  $.tablesorter.themes.bootstrap = {
    table        : 'table table-bordered table-striped',
    caption      : 'caption',
    header       : 'bootstrap-header',
    sortNone     : '',
    sortAsc      : '',
    sortDesc     : '',
    active       : '',
    hover        : '',
    icons        : '',
    iconSortNone : 'bootstrap-icon-unsorted',
    iconSortAsc  : 'glyphicon glyphicon-chevron-up',
    iconSortDesc : 'glyphicon glyphicon-chevron-down',
    filterRow    : '',
    footerRow    : '',
    footerCells  : '',
    even         : '',
    odd          : '' 
  };

  $("table").tablesorter({
    theme : "bootstrap",
    widthFixed: true,
    headerTemplate : '{content} {icon}',
    widgets : [ "uitheme", "filter", "zebra" ],

    widgetOptions : {
      zebra : ["even", "odd"],
      filter_reset : ".reset",
      filter_cssFilter: "form-control",
    },
    headers:{
      4: {sorter: false, filter: false},
      5: {sorter: false, filter: false},
      6: {sorter: false, filter: false},
    }
  })
  .tablesorterPager({
    container: $(".ts-pager"),
    removeRows: false,
    output: '{startRow} - {endRow} / {filteredRows} ({totalRows})'
  });
}

$(document).ready(function(){ 
    tablesorter();
    
    $('[data-toggle="tooltip"]').tooltip(); 
}); 