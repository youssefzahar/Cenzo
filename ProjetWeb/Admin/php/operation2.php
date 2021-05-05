<?php

require_once ("db2.php");
require_once ("component2.php");

$con = Createdb();

// create button click
if(isset($_POST['create'])){
    createData();
}

if(isset($_POST['update'])){
    UpdateData();
}

/*if(isset($_POST['delete'])){
    deleteRecord();
}*/

if(isset($_GET['Delete'])){
    $id=$_GET['Delete'];

    $query="DELETE FROM fidelite WHERE id=?";
    $stmt=$conn->prepare($query);
    $stmt->bind_param("i",$id);
    $stmt->execute();

    header('location:fidelite.php');
    $_SESSION['response']="Successfully Deleted!";
    $_SESSION['res_type']="danger";
}

if(isset($_POST['deleteall'])){
    deleteAll();

}

if(isset($_GET['edit'])){
    $bookid = $GET['book_id'];
    $result = $mysql->query("SELECT * data fidelite WHERE id=$book_id ") or die($mysqli->error());
    if (count($result)==1){
        $row = $result->fetch_array();
        $nom_client = $row['nom_client'];
        $prenom_client = $row['prenom_client'];
        $nbr_point = $row['nbr_point'];

    }

}



function createData(){
    $nom_client = textboxValue("nom_client");
    $prenom_client = textboxValue("prenom_client");
    $nbr_point = textboxValue("nbr_point");

    if($nom_client && $prenom_client && $nbr_point){

        $sql = "INSERT INTO fidelite (nom_client, prenom_client, nbr_point) 
                        VALUES ('$nom_client','$prenom_client','$nbr_point')";

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
    $sql = "SELECT * FROM fidelite";

    $result = mysqli_query($GLOBALS['con'], $sql);

    if(mysqli_num_rows($result) > 0){
        return $result;
    }
}

// update dat
function UpdateData(){
    $bookid = textboxValue("book_id");
    $nom_client = textboxValue("nom_client");
    $prenom_client = textboxValue("prenom_client");
    $nbr_point = textboxValue("nbr_point");

    if($nom_client && $prenom_client && $nbr_point){
        $sql = "
                    UPDATE fidelite SET nom_client='$nom_client', prenom_client = '$prenom_client', nbr_point = '$nbr_point' WHERE id='$bookid';                    
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


/*function deleteRecord(){
    $bookid = (int)textboxValue("book_id");

    $sql = "DELETE FROM evenement WHERE id=$bookid";

    if(mysqli_query($GLOBALS['con'], $sql)){
        TextNode("success","Record Deleted Successfully...!");
    }else{
        TextNode("error","Enable to Delete Record...!");
    }

}*/






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
    $sql = "DROP TABLE fidelite";

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