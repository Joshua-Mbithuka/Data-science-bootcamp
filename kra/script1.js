/*add purchase modal*/
$(document).ready(function(){
    $('#add-purchase').click(function(){
        $(".modal-body").load('addpurchase.php?id=2',function(){
               $('#purchase-receipt-modal').modal({
            show:true

        });
           });
      
         });});
 /*download prompt*/
        $(document).ready(function(){
                    $("#click").click(function(e)
                                        {
                                        var x=confirm(" are you sure you want to download");
                                            if (x) {
                                                return true
                                                    }
                                                else
                                                    {
                                                        return false;
                                                    }
                                        });
                                    });
/*sales addition modal*/
$(document).ready(function(){
    $("#add-sale").click(function(){
        $(".mymodal-body").load('addsale.php?id=2',function(){
        $('#sale-receipt-modal').modal({
            show:true
        });
    })
})})

/*comments*/
$(document).ready(function(){
        $("#save").click(function(e)
                    {
                var x=confirm(" are you sure you want to download");
                    if (x) {
                        
                        e.preventdefault();
                        return true
                    }
                    else
                        {

                            return false;
                        }
                    });
    });
$(document).ready(function(){
    $("#addsale").click(function(){
        $(".mmodal-body").load('undeclaredsales.php?id=2',function(){
        $('#mymodal').modal({
            show:true
        });
    })
})})
$.ajax({
    url:"retrieve_sales.php",
    //method:"GET";
    data:"",
    datatype:"html",
    success:function(result){
        $('#data').html(result);
    }
})
/*ajax query for the add purchases*/
$("#removebtn").click(function(e){
e.preventdefault;
})

$.ajax({
    url:"retrievepur.php",
    //method:"GET";
    data:"",
    datatype:"html",
    success:function(result){
        $('#del').html(result);
    }
})