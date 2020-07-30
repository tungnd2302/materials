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

var x = 2;
// $("#add-materials").on("click", function(){
$(document).on('click','#add-materials',function(event){
    var html = "<div class='total-material'>"+
                    "<div class='form-group'>" +
                        "<label for=''>Tên vật tư</label>" + 
                        "<input type='text' name='name[]' class='tags" + x +  " form-control ui-autocomplete-input' autocomplete='off'>"+
                    " </div>"+
                    "<div class='form-group'>"+
                        "<label for=''>Số lượng</label>"+
                        "<input type='text' name='quantity[]' class='form-control' value=''>"+
                    "</div>"+
                "</div>";
    $('.material-card-body').append(html);
    var length_material = $(".total-material").length;
    if(length_material > 1){
        $('#remove-materials').css({
            'display' : 'inline-block'
        })
    }
    x++;
})

$('#remove-materials').click(function(event){
    event.preventDefault();
    var size = $(".total-material").length;
    $(".total-material").last().remove();
    var length_material = $(".total-material").length;
    if(length_material == 1){
        $('#remove-materials').css({
            'display' : 'none'
        })
    }
})
$('.total-material').each(function(i){
        $(this).addClass('div'+x);
        x++;
})
<?php 
    $availableProducts = [];
    foreach($products as $product){
        array_push($availableProducts,$product['name']);
    }
    $availableProducts = json_encode($availableProducts);
?>
var availableTags = <?php echo $availableProducts; ?>;
$(".tags1").autocomplete({
      source: availableTags
})
$(document).on('focus','.tags2',function(event){
    $(this).autocomplete({
        source: availableTags
    })
})
$(document).on('focus','.tags3',function(event){
    $(this).autocomplete({
        source: availableTags
    })
})
$(document).on('focus','.tags4',function(event){
    $(this).autocomplete({
        source: availableTags
    })
})
$(document).on('focus','.tags5',function(event){
    $(this).autocomplete({
        source: availableTags
    })
})
$(document).on('focus','.tags6',function(event){
    $(this).autocomplete({
        source: availableTags
    })
})
$(document).on('focus','.tags7',function(event){
    $(this).autocomplete({
        source: availableTags
    })
})
$(document).on('focus','.tags8',function(event){
    $(this).autocomplete({
        source: availableTags
    })
})
$(document).on('focus','.tags9',function(event){
    $(this).autocomplete({
        source: availableTags
    })
})
$(document).on('focus','.tags10',function(event){
    $(this).autocomplete({
        source: availableTags
    })
})
$(document).on('focus','.tags11',function(event){
    $(this).autocomplete({
        source: availableTags
    })
})








</script>
</body>
</html>
