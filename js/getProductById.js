
$(document).ready(function () {

    $("#searchById").on("click", function (evt) {
        evt.preventDefault();
        var productId = $("#productId").val();
        var pattern = /^([0-9])*$/;

        // if (productId != "") {
        //     $(".text-danger").html("");
        //         if (pattern.test(productId)) {
        //             $(".text-danger").html("");

                    $.ajax({
                        url: 'get_product_by_id.php',
                        type: 'POST',
                        data: {id: productId},

                        beforeSend: function () {
                            $("#result").html("<h4 class='text-center text-info'>Cargando...</h4>");
                        },

                        success: function(data) {
                            var jsonData = JSON.parse(data);

                            if (jsonData.invalid == true) {
                                // console.log("usted ingreso un mal parametro");
                                $(".text-danger").html("El valor ingresado no es valido!");
                                $("#result").html("<h4 class='text-center text-info'>Recuerde que el campo ID no puede estar vacio y solo admite numeros</h4>");
                            } else {

                                $(".text-danger").html("");

                                var table = "";
                                table += "<table class='table'>";
                                table += "<thead><tr><th>ID</th><th>Nombre</th><th>Precio</th><th>Accion</th></tr></thead><tbody>";


                                $.each(jsonData, function (index) {
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
                                    $('#result').html("<h4 class='text-center text-primary'>No se encontro el producto!</h4>");
                                }

                            }

                        },

                        error: function(jqXHR, textStatus, error) {
                            alert( "error: " + jqXHR.responseText);
                        }
                    });

                // } else {
                //     $(".text-danger").html("El campo ID solo admite numeros!");
                // }
        // } else  {
        //     $(".text-danger").html("El campo ID no puede estar vacio!");
        // }

    });

});