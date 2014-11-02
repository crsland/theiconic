$(document).ready(function(){
    
    var section = $('#content');
    
    $("#search").on('submit',function(e){
        e.stopPropagation();
        e.preventDefault();
        
        section.html("");
        
        var noResultsMsg = "No results were found.";
        var errMsg = "Service error, please try again.";
        var searchResults = "Search results";
        
        var url = 'app/Search.php';
        var data = $(this).serializeArray();
        $.post(url,data,function(r){
           section.html(searchResults);
           var data = JSON.parse(r);
           if (data.error !== true) {
               if (data.items.length) {
                   buildNodes(data.items);
               } else {
                   section.html(noResultsMsg);
               }
               
           } else {
               // Service error
               section.html(errMsg);
           }
        });
    });
    
    function buildNodes(data){
        var articles = "";
        data.forEach(function(v,i){
            articles += '<article><h4><a href="' + v.link + '">'+ v.title +'</a></h4><p>' + v.description + '</p><a></article>';
        });
        section.append(articles);
    }
});
