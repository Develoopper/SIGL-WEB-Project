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
    number++;
    $(this).prev("input").prev("h6[name=qte]").html(number);
});

$("a[name=decrement]").on("click", function() {
    var number = parseFloat($(this).next("h6[name=qte]").html());
    if (number > 1)
        number--;
    $(this).next("h6[name=qte]").html(number);
});