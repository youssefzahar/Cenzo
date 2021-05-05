let id = $("input[name*='book_id']")
id.attr("readonly","readonly");


$(".btnedit").click( e =>{
    let textvalues = displayData(e);

    
    let nom_client = $("input[name*='nom_client']");
    let prenom_client = $("input[name*='prenom_client']");
    let nbr_point = $("input[name*='nbr_point']");

    id.val(textvalues[0]);
    nom_client.val(textvalues[1]);
    prenom_client.val(textvalues[2]);
    nbr_point.val(textvalues[3].replace("$", ""));
});


function displayData(e) {
    let id = 0;
    const td = $("#tbody tr td");
    let textvalues = [];

    for (const value of td){
        if(value.dataset.id == e.target.dataset.id){
           textvalues[id++] = value.textContent;
        }
    }
    return textvalues;

}