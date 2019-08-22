(function() {
    var routes = "http://vozapp4.test/products/list";
    var db = {

        loadData: function(filter) {

            return $.grep(this.products, function(product) {
                  return (!filter.name || product.name.indexOf(filter.name) > -1)
                            && (!filter.price || product.price === filter.price)
                            && (!filter.stock || product.stock === filter.stock)
                            && (!filter.description || product.description.indexOf(filter.description) > -1)
                            && (!filter.category || product.category === filter.category)
                            && (filter.code_qr === undefined || product.code_qr === filter.code_qr);

            });



        },

        insertItem: function(insertingProduct) {
            this.products.push(insertingProduct);
        },

        updateItem: function(updatingProduct) { },

        deleteItem: function(deletingProduct) {
            var productIndex = $.inArray(deletingProduct, this.product);
            this.products.splice(productIndex, 1);
        }

    };

    window.db = db;


    db.categories = [
        { name_: "Selecccione...", Id: 0 },
        { name_: "Frutas", Id: 1 },
        { name_: "De aseo", Id: 2 },
        { name_: "Viveres", Id: 3 }
    ];


                db.products = [

                    {
                      //  $.get(routes, function(res){
                        //    $(res).each(function(key,value){
                        "name": '',
                        "price": '',
                        "stock": '',
                        "category": '',
                        "description": '',
                        "code_qr": true
                          //  });
                        //});
                    },

                ];





  

}());
