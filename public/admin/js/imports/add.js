$(function() {
    var self = 'select.sel_product';
    bindData(self);
})

function bindData(self) {
    var id = $(self).val();
    var products = jQuery.parseJSON($('#hdnJsonProduct').val());
    for (var i in products) {
        if (products[i].id == id) {
            var tr = $(self).closest('tr');
            var price = products[i].price;
            price = $.number(price);
            var catName = products[i].cat_name;
            $(tr).find('td:eq(1)').text(price);
            $(tr).find('td:eq(2)').text(catName);
            break;
        }
    }
}

function showDetailProduct(self) {
    bindData(self);
}

function addRow() {
    // clone html hide
    var clone = $('#tbl_import').find('tr.hide').clone();

    // change class tmp_sel_product to sel_product
    $(clone).find('.tmp_sel_product').attr('class', 'sel_product');
    $(clone).find('.tmp_qty').attr('class', 'qty');

    var self = $(clone).find('.sel_product');
    bindData(self);
    $('#tbl_import tbody').append('<tr>'+$(clone).html()+'</tr>');

    $('input.number').number(true);
}

function deleteRow(self) {
    $(self).closest('tr').remove();
}

function insertImports() {
    $.LoadingOverlay("show");
    var arrProductId = new Array();
    var arrQty = new Array();
    var sel_product_id = $('.sel_product');
    for (var i = 0; i < sel_product_id.length; i++) {
        var productId = $(sel_product_id[i]).val();
        arrProductId.push(parseInt(productId));
    }

    var qtys = $('.qty');
    for (var i = 0; i < qtys.length; i++) {
        var qty = $(qtys[i]).val();
        arrQty.push(parseInt(qty));
    }

    var url = $('#hdnImportStore').val();
    var data = { 'productId': arrProductId, 'qty': arrQty};
    $.post(url, data, function(res, status) {
        if (status == 'success') {
            res = jQuery.parseJSON(res);
            $.notify("Một đơn nhập kho đã được tạo");
            $.LoadingOverlay("hide");
        }
    });
}