function printData()
{


    $('#Navy').hide();
    $('#btncon').hide();
    
    window.print();
  

    $('#Navy').show();
    $('#btncon').show();
    


}

$('#Prints').on('click',function(){
 printData();
})