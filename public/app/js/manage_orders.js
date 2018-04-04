/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * Author: Ajhar
 */

$(document).ready(function () {
    console.log("manage_order");

    $("#downloadOrderSpinner").hide();
    $("#downloadOrderForm").submit(function (e) {
        e.preventDefault();
        var formData = $(this).serialize();
        $("#downloadOrderButton").button("loading");
        $.ajax({
            url: 'downloadOrder',
            type: 'GET',
            dataType: 'json',
            data: formData,
            success: function (data) {
                $("#downloadOrderSpinner").hide();
                $("#downloadOrderButton").button("reset");
                toastr[data.results](data.response);
            }
        });
    });
});


