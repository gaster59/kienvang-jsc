var order_import_id = 0;
function showModal(id) {
    order_import_id = id;
    $('#myModalOrderImport').modal();
    var data = {'id': order_import_id};
    var url = $('#hdnUrlDetailImport').val();
    $.post(url, data, function(res, status) {
        if (status == 'success') {
            res = jQuery.parseJSON(res);
            res = res.result;
            var content = '';
            var total = 0;
            for (var i in res) {
                content += '<tr>';
                content += '<td>';
                content += res[i].product_name;
                content += '</td>';
                content += '<td>';
                content += res[i].product_price;
                content += '</td>';
                content += '<td>';
                content += res[i].qty;
                content += '</td>';
                content += '</tr>';
                total += (res[i].product_price*res[i].qty);
            }
            $('#table-modal tbody').html(content);
            $('#table-modal tfoot tr td').text("Tổng tiền: "+total);
        }
    });
}