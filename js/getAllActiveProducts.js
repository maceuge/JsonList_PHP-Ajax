
$(document).ready(function () {

    $("#viewProducts").on("click", function (evt) {
        evt.preventDefault();

        $.ajax({

            url: 'get_all_active_products.php',
            type: 'POST',

            beforeSend: function () {
                $("#result").html("<h4 class='text-center text-info'>Cargando...</h4>");

            },

            success: function(data) {
                var jsonData = JSON.parse(data);

                var table = "";
                table += "<table class='table'>";
                table += "<thead><tr><th>ID</th><th>Nombre</th><th>Precio</th><th>Accion</th></tr></thead><tbody>";


                $.each(jsonData, function(index){
                    table += "<tr id='fila_";
                    table += jsonData[index].id + "'><td>";
                    table += jsonData[index].id;
                    table += "</td><td>";
                    table += jsonData[index].name;
                    table += "</td><td>";
                    table += jsonData[index].price;
                    table += "</td>";
                    table += "<td>";
                    table += "<button type='button' class='btn btn-danger'";
                    table += "onclick=";
                    table += "deleteProduct(";
                    table += jsonData[index].id;
                    table += ")";
                    table += ">Borrar</button></td></tr>";

                });

                table += "</tbody></table>";

                if (Object.keys(jsonData).length != 0) {
                    $('#result').html(table);
                } else {
                    $('#result').html("<h4 class='text-center text-primary'>No se encontraron productos!</h4>");
                }

            },

            error: function(jqXHR, textStatus, error) {
                alert( "error: " + jqXHR.responseText);
            }
        });


    });

});