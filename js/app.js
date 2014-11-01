/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function(){
    
    
    $("#search").on('submit',function(e){
        e.stopPropagation();
        e.preventDefault();
        var url = 'app/search.php';
        var data = $("#search").serializeArray();
        $.post(url,data,function(r){
            console.log(JSON.parse(r));
            //console.log(r);


        });        
    });
});
