
// Update the krajRegions data list
function getKrajRegions() {
    $.ajax({
        type: 'GET',
        url: urlToRestApi,
        dataType: "json",
        success:
                function (data) {
                    var krajRegionTable = $('#krajRegionData');
                    krajRegionTable.empty();
                    $.each(data.krajRegions, function (key, value)
                    {
                        var editDeleteButtons = '</td><td>' +
                                '<a href="javascript:void(0);" class="btn btn-warning" rowID="' +
                                    value.id + 
                                    '" data-type="edit" data-toggle="modal" data-target="#modalKrajRegionAddEdit">' + 
                                    'edit</a>' +
                                '<a href="javascript:void(0);" class="btn btn-danger"' +
                                    'onclick="return confirm(\'Are you sure to delete data?\') ?' + 
                                    'krajRegionAction(\'delete\', \'' + 
                                    value.id + 
                                    '\') : false;">delete</a>' +
                                '</td></tr>';
                        krajRegionTable.append('<tr><td>' + value.id + '</td><td>' + value.nazev + '</td><td>' + value.kod + editDeleteButtons);
 
                    });

                }

    });
}

 /* Function takes a jquery form
 and converts it to a JSON dictionary */
function convertFormToJSON(form) {
    var array = $(form).serializeArray();
    var json = {};

    $.each(array, function () {
        json[this.name] = this.value || '';
    });

    return json;
}


function krajRegionAction(type, id) {
    id = (typeof id == "undefined") ? '' : id;
    var statusArr = {add: "added", edit: "updated", delete: "deleted"};
    var requestType = '';
    var krajRegionData = '';
    var ajaxUrl = urlToRestApi;
    frmElement = $("#modalKrajRegionAddEdit");
    if (type == 'add') {
        requestType = 'POST';
        krajRegionData = convertFormToJSON(frmElement.find('form'));
    } else if (type == 'edit') {
        requestType = 'PUT';
        krajRegionData = convertFormToJSON(frmElement.find('form'));
    } else {
        requestType = 'DELETE';
        ajaxUrl = ajaxUrl + "/" + id;
    }
    frmElement.find('.statusMsg').html('');
    $.ajax({
        type: requestType,
        url: ajaxUrl,
        dataType: "json",
        contentType: "application/json; charset=utf-8",
        data: JSON.stringify(krajRegionData),
        success: function (msg) {
            if (msg) {
                frmElement.find('.statusMsg').html('<p class="alert alert-success">KrajRegion data has been ' + statusArr[type] + ' successfully.</p>');
                getKrajRegions();
                if (type == 'add') {
                    frmElement.find('form')[0].reset();
                }
            } else {
                frmElement.find('.statusMsg').html('<p class="alert alert-danger">Some problem occurred, please try again.</p>');
            }
        }
    });
}

// Fill the krajRegion's data in the edit form
function editKrajRegion(id) {
    $.ajax({
        type: 'POST',
        url: 'krajRegionAction.php',
        dataType: 'JSON',
        data: 'action_type=data&id=' + id,
        success: function (data) {
            $('#id').val(data.id);
            $('#name').val(data.name);
            $('#email').val(data.email);
            $('#phone').val(data.phone);
        }
    });
}

// Actions on modal show and hidden events
$(function () {
    $('#modalKrajRegionAddEdit').on('show.bs.modal', function (e) {
        var type = $(e.relatedTarget).attr('data-type');
        var krajRegionFunc = "krajRegionAction('add');";
        $('.modal-title').html('Add new region (kraj)');
        if (type == 'edit') {
            krajRegionFunc = "krajRegionAction('edit');";
            $('.modal-title').html('Edit region (kraj)');
            var rowId = $(e.relatedTarget).attr('rowID');
            editKrajRegion(rowId);
        }
        $('#krajRegionSubmit').attr("onclick", krajRegionFunc);
    });

    $('#modalKrajRegionAddEdit').on('hidden.bs.modal', function () {
        $('#krajRegionSubmit').attr("onclick", "");
        $(this).find('form')[0].reset();
        $(this).find('.statusMsg').html('');
    });
});



