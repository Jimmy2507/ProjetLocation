<?php
if($_SESSION["utilisateur"]->getIdRole()==1){
    header("location:index.php?page=PageAdmin");
}else{
    echo "Session Utilisateur ";
}
?>