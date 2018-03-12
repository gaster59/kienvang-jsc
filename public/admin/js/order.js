var arr_product = new Array();
var product_id = "";

var product = {
    viewDetail: function(id){
        product_id = id;
        alert(product_id);
//        var id = $(".product_id"+id).val();
//        var name = $(".product_name"+id).val();
//        var description = $(".product_description"+id).val();
//        var info = $(".product_info"+id).val();
//        var price_old = $(".product_price_old"+id).val();
//        var price = $(".product_price"+id).val();
//        
//        $("#md_id").val(id);
//        $("#md_name").val(name);
//        $("#md_description").val(description);
//        $("#md_info").val(info);
//        $("#md_price_old").val(price_old);
//        $("#md_price").val(price);
//        
//        $("#productModal").modal('show');
    },
};

var order = {
    addOrder: function(){
        var id = $(".product_id"+product_id).val();
        var name = $(".product_name"+product_id).val();
        var price_old = $(".product_price_old"+product_id).val();
        var price = $(".product_price"+product_id).val();
        var qty = 1;
        var product = {"id": id, "name":name, "price_old":price_old, "price":price, "qty": qty};
        this.checkProductInOrder(product);
        this.showOrder();
    },
    
    checkExist: function(product_id){
        var exists = -1;
        for (var index in arr_product) {
            if (arr_product[index].id == product_id) {
                exists = index;
                break;
            }
        }
        return exists;
    },
    
    checkProductInOrder: function(product){
        if (arr_product.length > 0) {
            var index = this.checkExist(product.id)
            if (index != -1) {
                // co san pham trong order thi cap nhat so luong
                arr_product[index].qty += 1;
            } else {
                // khong co san pham trong order
                arr_product.push(product);
            }
        } else {
            arr_product.push(product);
        }
        console.log(arr_product);
    },
    
    showOrder: function(){
        var tbl = $("#tbl_order").find("tbody");
        if (arr_product.length > 0) {
            var content = "";
            for (var index in arr_product) {
                content += "<tr>";
                content += "<td>";
                content += arr_product[index].name;
                content += "</td>";
                
                content += "<td>";
                content += arr_product[index].price_old;
                content += "</td>";
                
                content += "<td>";
                content += arr_product[index].price;
                content += "</td>";
                
                content += "<td>";
                content += arr_product[index].qty;
                content += "</td>";
                
                content += "<td>";
                content += "<a href='javascript:void(0);' onclick='order.removeProductFromOrder(this,"+arr_product[index].id+")'>Xoá</a>";
                content += "</td>";
                content += "</tr>";
            }
            $(tbl).html(content);
        }
        $("#productModal").modal('hide');
    },
    
    removeProductFromOrder: function(self, product_id){
        for (var index in arr_product) {
            if (arr_product[index].id == product_id) {
                arr_product.splice(index,1);
                break;
            }
        }
        console.log(arr_product);
        $(self).closest("tr").remove();
    },
    
    saveOrder: function(){
        url = $('#hdn_url_save_order').val();
        user_id = $("#user_id").val();
        ship_by = $("#ship_by").val();
        if (arr_product.length == 0) {
            alert('Bạn chưa chọn sản phẩm');
        } else {
            $.post(url, 
                {"products": arr_product, "user": user_id, "ship_by":ship_by}, 
                function(res){
                    res = jQuery.parseJSON(res);
                    if (res.status == 1) {
                        alert('Hoá đơn đã được lưu');
                    }
                });
        }
        
    }
    
}