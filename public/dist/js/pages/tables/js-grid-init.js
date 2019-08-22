! function(document, window, $) {
    "use strict";
    var Site = window.Site;
     jsGrid.setDefaults({
            tableClass: "jsgrid-table table table-striped table-hover"
        }), jsGrid.setDefaults("text", {
            _createTextBox: function() {
                return $("<input>").attr("type", "text").attr("class", "form-control input-sm")
            }
        }), jsGrid.setDefaults("number", {
            _createTextBox: function() {
                return $("<input>").attr("type", "number").attr("class", "form-control input-sm")
            }
        }), jsGrid.setDefaults("textarea", {
            _createTextBox: function() {
                return $("<input>").attr("type", "textarea").attr("class", "form-control")
            }
        }), jsGrid.setDefaults("control", {
            _createGridButton: function(cls, tooltip, clickHandler) {
                var grid = this._grid;
                return $("<button>").addClass(this.buttonClass).addClass(cls).attr({
                    type: "button",
                    title: tooltip
                }).on("click", function(e) {
                    clickHandler(grid, e)
                })
            }
        }), jsGrid.setDefaults("select", {
            _createSelect: function() {
                var $result = $("<select>").attr("class", "form-control input-sm"),
                    valueField = this.valueField,
                    textField = this.textField,
                    selectedIndex = this.selectedIndex;
                return $.each(this.items, function(index, item) {
                    var value = valueField ? item[valueField] : index,
                        text = textField ? item[textField] : item,
                        $option = $("<option>").attr("value", value).text(text).appendTo($result);
                    $option.prop("selected", selectedIndex === index)
                }), $result
            }
        }),
        
         
         
     
       
         
        // Validation
        $("#validation").jsGrid({
        width: "100%",
        filtering: !0,
        editing: !0,
        inserting: !0,
        sorting: !0,
        paging: !0,
        autoload: !0,
        pageSize: 15,
        pageButtonCount: 5,
        deleteConfirm: "Desea eliminar este producto?",
        controller: db,
        fields: [ {title: "Categoría",
            name: "category",
            type: "select",
            items: db.categories,
            valueField: "Id",
            textField: "name_",
            validate: {
                message: "Elija una categoría",
                validator: function(e) {
                    return e > 0
                }
            }
        },{
            title: "Nombre",
            name: "name",
            type: "text",
            width: 150,
            validate: "required"
        },  {title: "Descripción",
            name: "description",
            type: "text",
            width: 200,
            validate: {
                validator: "rangeLength",
                param: [10, 250]
            }
        }, {title: "Precio",
            name: "price",
            type: "text",
            width: 50,
            validate: {
                validator: "range",
                param: [0, 80]
            }
        },{title: "Stock",
            name: "stock",
            type: "number",
            width: 50,
            validate: {
                validator: "range",
                param: [0, 80]
            }
        },{
            name: "code_qr",
            type: "checkbox",
            title: "Código QR",
            sorting: !1
        }, {
            type: "control"
        }]
    })
         
}(document, window, jQuery);
