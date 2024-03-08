
function search(search_value){
    $.ajax({
        url: '/myshop/models/searchEngine.php',
        type: 'POST',
        data: { "search": search_value },
        success: function(response){
            $('#results').html(response);
        }
    });
}