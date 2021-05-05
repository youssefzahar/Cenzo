let id = $("input[name*='book_id']")
id.attr("readonly","readonly");


$(".btnedit").click( e =>{
    let textvalues = displayData(e);

    
    let nomEvenment = $("input[name*='nom_evenement']");
    let dateDebut = $("input[name*='date_debut']");
    let dateFin = $("input[name*='date_fin']");

    id.val(textvalues[0]);
    nomEvenment.val(textvalues[1]);
    dateDebut.val(textvalues[2]);
    dateFin.val(textvalues[3].replace("$", ""));
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