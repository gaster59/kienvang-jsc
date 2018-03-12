var common = {
        fnDelete: function(e){
            if(confirm('Ban co muon xoa khong ?')) {
                link = $(e).attr('data-link');
                window.location.href = link;
            }
        },
}