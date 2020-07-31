<!-- jQuery -->
<?php require_once('views/elements/script.php') ?>
<script>   
$(".searchfield").click(function(event) {
    event.preventDefault()
    var titleSearch = $(this).html();
    fieldSearch = $(this).data('field');

    $("#contentSearch").data('field',fieldSearch);
    $("#contentSearch").html(titleSearch);
});
$("#searchButton").click(function(event){
    event.preventDefault();
    let searchParams= new URLSearchParams(window.location.search);
    let params 		= ['status'];

    // let link		= "";
    // $.each( params, function( key, param ) { // status
    //     if (searchParams.has(param) ) {
    //         link += param + "=" + searchParams.get(param) + "&" // status=0
    //     }
    // });
    var contentSearch = $('input[name="search"]').val();
    var fieldSearch   =  $("#contentSearch").data('field');
    // console.log(fieldSearch);
    if(fieldSearch == ''){
        alert("Vui lòng chọn trường tìm kiếm");
        return;
    }
    if(contentSearch == "" ){
        var redirectUrl = window.location.href;
        var linkCurrent = redirectUrl;
        if(redirectUrl.includes("&fieldSearch")){
            var n = redirectUrl.lastIndexOf("&fieldSearch");
            linkCurrent = redirectUrl.substr(0, n);
        }
        // console.log(linkCurrent);
        window.location.href = linkCurrent;
    }else{
        var redirectUrl = window.location.href;
        var linkCurrent = redirectUrl;
        if(redirectUrl.includes("&fieldSearch")){
            var n = redirectUrl.lastIndexOf("&fieldSearch");
            linkCurrent = redirectUrl.substr(0, n);
        }
        redirectUrl = linkCurrent + '&' + 'fieldSearch='+fieldSearch + '&contentSearch='+contentSearch;
        // console.log(redirectUrl);
        window.location.href = redirectUrl;
    }
})









</script>
</body>
</html>
