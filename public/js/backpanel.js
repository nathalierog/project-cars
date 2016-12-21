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

function tablesorterimages(){
  $("#sortable").sortable();
  $("#sortable").disableSelection();
}

function token() {
  var token = $('meta[name="csrf-token"]').attr('content');
  $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': token
      }
  });
}

function saveBrand(brand, id, value) {
  token()
  var oldvalue = value;
  var rowID = id;

  $.ajax({
    type: "POST",
    url: '/backpanel/editbrand/'+id,
    data: {brand: brand, id: id},
    success: function(data) {
        if(data == "error"){
          $('#input-error').show(0).delay(5000).hide(0);
          $('#input-success').hide();
          $('#car-brands tr#' + rowID + ' td:first-child').html(oldvalue);
        }
        else{
          $('#input-success').show(0).delay(5000).hide(0);
          $('#input-error').hide();
        }
    }
  });
}

function saveModel(model, id, value) {
  token()
  var oldvalue = value;
  var rowID = id;

  $.ajax({
    type: "POST",
    url: '/backpanel/editmodel/'+id,
    data: {model: model, id: id},
    success: function(data) {
        if(data == "error"){
          $('#input-error').show(0).delay(5000).hide(0);
          $('#input-success').hide();
          $('#car-models tr#' + rowID + ' td:first-child').html(oldvalue);
        }
        else{
          $('#input-success').show(0).delay(5000).hide(0);
          $('#input-error').hide();
        }
    }
  });
}

function updateTableCell(currentEle, value) {
  if($(currentEle).children().length == 0 ) {
    $(currentEle).html('<input class="thVal" type="text" value="' + value + '" />');
    $(currentEle).parent('TR').removeClass('selected');
    $(".thVal").focus();

    $(".thVal").keyup(function (event) {
      if (event.keyCode == 13) {

        function firstToUpperCase(inputField) {
          return inputField.substr(0, 1).toUpperCase() + inputField.substr(1);
        }

        //Filter the inputfield 
        var inputField = $(".thVal").val();
        inputField = inputField.replace(/\s\s+/g, ' ');
        inputField = inputField.toLowerCase();
        inputField = firstToUpperCase(inputField);
        $(".thVal").val(inputField);

        //Return the value into the table cell and send the essential data to the next function
        $(currentEle).html($(this).val());
        var id = $(currentEle).parents('TR').attr('id');
        editModus = false;

        if($(currentEle).parents('table').attr('id') == "car-brands"){
          var brand = $(currentEle).html();
          saveBrand(brand, id, value);
        }
        else if($(currentEle).parents('table').attr('id') == "car-models") {
          var model = $(currentEle).html();
          saveModel(model, id, value);
        }
      }
    });

    $(".thVal").on('blur', function(){
      $(currentEle).html(value);
      editModus = false;
    });
  }
}

function displayModels(models) {
  var tbody  = '';
  for(let nr in models){
        tbody += '<tr id="'+models[nr].id+'"><td class="model-field">'+models[nr].model+'</td><td><a href="/backpanel/deletemodel/'+models[nr].id+'" onclick="return confirm(\'Weet je het zeker?\');">Verwijderen</a></td></tr>';
  }
  $('#car-models tbody').html(tbody);
  $("div table td.model-field").dblclick(editName);
}

function getModels(brandID) {
  $.ajax({
    url: '/backpanel/getmodels',
    type: 'GET',
    data: { brandID: brandID },
    success: function(models)
    {
        displayModels(models);
    }
  });
}

function selectBrandForModel() {
  $("#car-brands tr").on('click', function() {
    var element = $(this);
    window.setTimeout(function() {
      if(editModus == false) {
        $('tr').not(element).removeClass('selected');

        $(element).toggleClass('selected');

        if($('.selected').length == 0) {
          $('#addModel').prop('disabled', true);
          $('#car-models tbody').html('');
        } 
        else {
          $('#addModel').prop('disabled', false);
          var brandID = $('tr.selected').attr('id');
          $('#brand_id').val(brandID);
          getModels(brandID);
        }
      }
    }, 300);
  });
}

function editName(e) {
  e.stopPropagation();
  $('tr').removeClass('selected');
  $('#addModel').prop('disabled', true);
  var currentEle = $(this);
  var value = currentEle.html();
  if($(currentEle).parents('table').attr('id') == "car-brands") {
    $('#car-models tbody').html('');
  }
  editModus = true;
  updateTableCell(currentEle, value);
}

function selectField() {
  $("div table td.brand-field, div table td.model-field").dblclick(editName);
}

function addCarDisplayModels(models) {
  var selectOptions  = '';
  if($('#carModel')) {
    for(let nr in models){
      if($('#carModel').val() == models[nr].model) {
        selectOptions += '<option value="'+models[nr].id+'" selected>'+models[nr].model+'</option>';
      } else {
        selectOptions += '<option value="'+models[nr].id+'"">'+models[nr].model+'</option>';
      }
    }
    $('select#model').html(selectOptions);
  }
  else {
    for(let nr in models){
        selectOptions += '<option value="'+models[nr].id+'">'+models[nr].model+'</option>';
    }
    $('select#model').html(selectOptions);
  }
}

function addCarGetModels(brandID) {
  $.ajax({
    url: '/backpanel/getmodels',
    type: 'GET',
    data: { brandID: brandID },
    success: function(models)
    {
        addCarDisplayModels(models);
    }
  });
}

function addCarGetBrandId() {
  var brandID = $('select#brand').val();
  if(brandID) {
    addCarGetModels(brandID);
  }

  $('select#brand').on('change', function(){
    brandID = $('select#brand').val();
    if(brandID) {
      addCarGetModels(brandID);
    }
  })
}

$(document).ready(function(){ 
    editModus = false;

    tablesorter();
    tablesorterimages();
    selectBrandForModel();
    selectField();
    addCarGetBrandId();
    
    $('[data-toggle="tooltip"]').tooltip();
    $('#addModel').prop('disabled', true);
}); 