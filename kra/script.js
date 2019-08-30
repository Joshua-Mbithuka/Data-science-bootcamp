function addPurchaseReceipt(){

}

function addSalesReceipt(){

}

function preparePurchase(){
    $.ajax({
        type: "get",
        url: "read_purchases.php",
        data: "data",
        dataType: "dataType",
        success: function (response) {
            
        }
    });
}

function prepareSales(){
    $.ajax({
        type: "get",
        url: "read_sales.php",
        success: function (data, status) {
            var response = JSON.parse(data)
            // console.log(response.data[3030])
            var output = ``
            if (response.status == "success") {
                for (var i in response.data) {
                    var receipt = response.data[i]
                    // console.log(receipt)
                    let receipt_total = 0
                    var target = "ts" + i

                    //Calculate totals for every sales receipt
                    for (var j = 0; j < receipt.length; j++) {
                        let sale = receipt[j]
                        receipt_total += Number(sale["sub_total"])
                    } 
                    console.log(i)

                    output += `
                    <tr class="text-left">
                    <td id="toggle" data-toggle="collapse" classs="closed" data-target="">${i}
                    </td>
                    <td class="total" id="total-${i}">${receipt_total}</td>
                    <td><button class="btn btn-outline-success btn-sm selected add-sale-btn pl-3 pr-3" data-id="${i}"> + </button></td>
                    </tr>`
                }
            } else {
                $(".op").html(`<div class="alert alert-danger mt-2">You have not added sales receipts yet</div>`)
                $(".op").effect("bounce", { times: 3 }, 200);
            }

            $("#sales-select").html(output)
            // console.log(output)
        }
    });
}




$(document).ready(function(){
    //$("#add-purchase").on("click", function(){
        console.log("Modal Open")
        $("#purchase-receipt-modal").modal("show")
    })

    $("#add-sale").on("click", function(){
        console.log("Modal Open")
        //prepareSales()
        $("#sale-receipt-modal").modal("show")

    })

//});

$(document).ajaxComplete(function(){
    $(".add-sale-btn").on("click", function(){
        let status = $(this).hasClass("selected")
        let receipt_code = $(this).attr("data-id")
        let receipt_total =$(`#total-${receipt_code}`).text()
        let total = Number($(`#total-edit-sales`).text())

        if(status == true){
            $(this).removeClass("selected btn-outline-success")
            $(this).addClass("not-selected btn-outline-danger")
            $(this).text(" x ")
            total += Number(receipt_total)
            $(`#total-edit-sales`).text(total)

        }else{
            $(this).removeClass("not-selected btn-outline-danger")
            $(this).addClass("selected btn-outline-success")
            $(this).text(" + ")
            total -= Number(receipt_total)
            $(`#total-edit-sales`).text(total)
        }
 
        console.log(total)
    })
})