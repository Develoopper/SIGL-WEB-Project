function calculerPrixQte() {
    var prix;
    var qte;

    $(".produits").each(function () {
        prix = parseFloat($(this).children().first().children().last().children().last().children("span[name=prix]").html());
        qte = parseFloat($(this).children().last().children(".qte").children("h6").html());
        console.log(prix, qte);
        $(this).children().last().children(".prixQte").children("h6").children("b[name=prixQte]").html(prix * qte);
    });
}

function calculerTotal() {
    var total = 0;

    $("b[name=prixQte]").each( function() {
        total += parseFloat($(this).html());
    });

    $("#total").html(total);
    $("#totalInput").val(total);
}

$("h6[name=qte]").bind('DOMSubtreeModified', function () {
    calculerPrixQte();
    calculerTotal();
});

$("a[name=increment]").on("click", function () {
    var number = parseFloat($(this).prev("input").prev("h6[name=qte]").html());
    var refProduit = $(this).parents("div.produits").first().attr("id");
    number++;
    // $.ajax({
    //     url: "http://localhost:5050/SIGL-WEB-Project/updateQte",
    //     data: {
    //         method: "PATCH",
    //         data: {refProduit : refProduit, qte : number}
    //     },
    //     dataType: "json",
    //     type: "POST",
    //     success: function (data) {
    //         console.log(data);
    //     }
    // });
    $(this).prev("input").prev("h6[name=qte]").html(number);
    $(this).prev("input").val(number);
    console.log($(this).prev("input").val());
});

$("a[name=decrement]").on("click", function() {
    var number = parseFloat($(this).next("h6[name=qte]").html());
    var refProduit = $(this).parents("div.produits").first().attr("id");
    if (number > 1)
        number--;
    // $.ajax({
    //     url: "http://localhost:5050/SIGL-WEB-Project/updateQte",
    //     data: {
    //         method: "PATCH",
    //         data: {refProduit : refProduit, qte : number}
    //     },
    //     dataType: "json",
    //     type: "POST",
    //     success: function (data) {
    //         console.log(data);
    //     }
    // });
    $(this).next("h6[name=qte]").html(number);
    $(this).next('h6').next("input").val(number);
    console.log($(this).next('h6').next("input").val());
});