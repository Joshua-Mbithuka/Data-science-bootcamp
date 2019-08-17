<?php
require_once "../init.php";

if($_SERVER["REQUEST_METHOD"] == "GET"){
    $response = [
        "status" => "",
        "data" => []
    ];

    // print_r($response);
    $repeat_array = []; //Stores Receipt codes to prevent duplicate receipts codes 
    $sql = "SELECT * FROM purchases";

    if($result = mysqli_query($conn, $sql)){
        if(mysqli_num_rows($result) > 0){
            $response["status"] = "success";
            $receipt_total = 0;
            $row_count=mysqli_num_rows($result);
            echo $row_count;
            while ($row = mysqli_fetch_assoc($result)){
                $receipt_key = $row["receipt_id"];

                //Confirm if the receipt code already exists.(from repeat_array)
                if(in_array($receipt_key, $repeat_array)){
                    $sale = [
                        "id" => $row["id"],
                        "product_name" => $row["product_name"],
                        "sku" => $row["sku"],
                        "quantity" => $row["quantity"],
                        "unit_price" => $row["unit_price"],
                        "sub_total" => $row["sub_total"],
                        "vat" => $row["vat"], 
                    ];
                    $receipt_total += $row["sub_total"];

                    array_push($response["data"][$receipt_key], $sale);
                }else{
                    $sale = [
                            "id" => $row["id"],
                            "product_name" => $row["product_name"],
                            "sku" => $row["sku"],
                            "quantity" => $row["quantity"],
                            "unit_price" => $row["unit_price"],
                            "sub_total" => $row["sub_total"],
                            "vat" => $row["vat"],
                    ]; 
                    $response["data"][$row["receipt_id"]][0] = $sale;
                
                    array_push($repeat_array, $receipt_key);
                }
            }
            // $response["data"] = mysqli_fetch_all($result, MYSQLI_ASSOC);
        }else{
            $response["status"] = "error";
            $response["data"] = "Error! No purchase receipts found";            
        }
    }else{
        $response["status"] = "error";
        $response["data"] = "Connection Error! Could not fetch previous purchase receipts. Please try again later";        
    }
    echo json_encode($response);
}

?>