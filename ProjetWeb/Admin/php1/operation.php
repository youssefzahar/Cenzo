<?php

require_once ("db.php");
require_once ("component.php");

$con = Createdb();

// create button click
if(isset($_POST['create'])){
    createData();
}

if(isset($_POST['update'])){
    UpdateData();
}

if(isset($_POST['delete'])){
    deleteRecord();
}

if(isset($_POST['deleteall'])){
    deleteAll();

}

if(isset($_GET['edit'])){
    $bookid = $GET['book_id'];
    $result = $mysql->query("SELECT * data evenement WHERE id=$book_id ") or die($mysqli->error());
    if (count($result)==1){
        $row = $result->fetch_array();
        $nomEvenement = $row['nom_evenement'];
        $dateDebut = $row['date_debut'];
        $dateFin = $row['date_fin'];

    }

}



function createData(){
    $nomEvenement = textboxValue("nom_evenement");
    $dateDebut = textboxValue("date_debut");
    $dateFin = textboxValue("date_fin");

    if($nomEvenement && $dateDebut && $dateFin){

        $sql = "INSERT INTO evenement (nom_evenement, date_debut, date_fin) 
                        VALUES ('$nomEvenement','$dateDebut','$dateFin')";

        if(mysqli_query($GLOBALS['con'], $sql)){
            TextNode("success", "Record Successfully Inserted...!");
        }else{
            echo "Error11";
        }

    }else{
            TextNode("error", "Provide Data in the Textbox");
    }
}

function textboxValue($value){
    $textbox = mysqli_real_escape_string($GLOBALS['con'], trim($_POST[$value]));
    if(empty($textbox)){
        return false;
    }else{
        return $textbox;
    }
}


// messages
function TextNode($classname, $msg){
    $element = "<h6 class='$classname'>$msg</h6>";
    echo $element;
}


// get data from mysql database
function getData(){
    $sql = "SELECT * FROM evenement";

    $result = mysqli_query($GLOBALS['con'], $sql);

    if(mysqli_num_rows($result) > 0){
        return $result;
    }
}

// update dat
function UpdateData(){
    $bookid = textboxValue("book_id");
    $nomEvenment = textboxValue("nom_evenement");
    $dateDebut = textboxValue("date_debut");
    $dateFin = textboxValue("date_fin");

    if($nomEvenment && $dateDebut && $dateFin){
        $sql = "
                    UPDATE evenement SET nom_evenement='$nomEvenment', date_debut = '$dateDebut', date_fin = '$dateFin' WHERE id='$bookid';                    
        ";

        if(mysqli_query($GLOBALS['con'], $sql)){
            TextNode("success", "Data Successfully Updated");
        }else{
            TextNode("error", "Enable to Update Data");
        }

    }else{
        TextNode("error", "Select Data Using Edit Icon");
    }


}


function deleteRecord(){
    $bookid = (int)textboxValue("book_id");

    $sql = "DELETE FROM evenement WHERE id=$bookid";

    if(mysqli_query($GLOBALS['con'], $sql)){
        TextNode("success","Record Deleted Successfully...!");
    }else{
        TextNode("error","Enable to Delete Record...!");
    }

}


function deleteBtn(){
    $result = getData();
    $i = 0;
    if($result){
        while ($row = mysqli_fetch_assoc($result)){
            $i++;
            if($i > 1){
                buttonElement("btn-deleteall", "btn btn-danger" ,"<i class='fas fa-trash'></i> Delete All", "deleteall", "");
                return;
            }
        }
    }
}


function deleteAll(){
    $sql = "DROP TABLE evenement";

    if(mysqli_query($GLOBALS['con'], $sql)){
        TextNode("success","All Record deleted Successfully...!");
        Createdb();
    }else{
        TextNode("error","Something Went Wrong Record cannot deleted...!");
    }
}


// set id to textbox
function setID(){
    $getid = getData();
    $id = 0;
    if($id){
        while ($row = mysqli_fetch_assoc($getid)){
            $id = $row['id'];
        }
    }
    return ($id + 1);
}








