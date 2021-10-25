<!DOCTYPE html>
<?php
 require_once'dbbcon.php';
session_start();
$user=$_SESSION["username"];
$sql = "SELECT* FROM clients where uss='".$user."'";
$result = mysqli_query($conn,$sql);
if( mysqli_num_rows($result)>0){
$data=mysqli_fetch_assoc($result);
}
else{

}

?>
<html lang="en">
<head>
    <title>modifier parametre compte</title>
 <style>
     form{
         background-color: rgb(100, 98, 98);
        width: 30%;
        position: relative;
        margin-left: 35% ;
        color: white;
       background-color: black;
    } 
     
     label,input{
         display: block;
         border: none;
         width: 97%;
         margin-right: 0px;
         margin-left: 6px;

     }
     input{
        border-bottom:3px solid;
        border-color:red;
     }
     input:valid{
        border-bottom:3px solid;
        border-color: green;
     }
     input{
         height: 50px;
         background-color: rgb(214, 211, 205);
         border-radius: 10px;
     }
     #check{
        height: 15px;
        display: inline-block;
        margin-top: -30px;
     }
    .ch{
         text-align: center;
     }
     input[type="submit"],input[type="button"]{
            display: inline-block;
            width: 20%;
            background-color: white;
            color: black;
            text-shadow: 1px 1px 1px rgb(214, 208, 208);
            opacity: 0.9;
            
        }
        input[type="submit"]{
            margin-left: 30%;
        }
        input[type="submit"]:hover,input[type="button"]:hover{
            opacity: 1;
            box-shadow: inset -2px -2px 3px rgba(255, 255, 255, .6),
                inset 2px 2px 3px rgba(0, 0, 0, .6);
            cursor: pointer;
        }
        #date:hover{
            cursor: pointer;
        }
        input[type="radio"]{
            height: 15px;
        }

        body{
    background-image: url("cameraman.jpg");
    background-size:cover;
    animation:slide 20s infinite;
    background-repeat: no-repeat;
    }

    @keyframes  slide {
    25%
    {
    background-image:url("imageecranjpg.jpeg")
    }
    50%
    {
    background-image:url("unitecentrale.jpg")
    }
    75%
    {
    background-image:url("images.jpg")
    }
    100%
    {
        background-image:url("cameraman.jpg")
    }    
    }
    header{
        font-family: 'Dancing Script', cursive;
       font-size:17px;
       color: white;
       text-align: center;
    }
    table{
        background-color:black;
        border-radius: 5px ;
        color: white;
        margin-left: 6px;
    }
    td{
        text-align: left;
        width: 100px;
    }
    .r1:hover{
        cursor: pointer;
    }

     
 </style>
</head>
<body>
    <header><h1>Modifier Vos Parametres</h1></header>
<form method="post" action="midifphp.php">
    <label for="username" >Username</label>
    <input type="text" placeholder="Username" id="username" name="username" value="<?php print $data['uss']; ?>"  readonly>
    <label for="name" >Full Name</label>
    <input type="text" placeholder="Full name" id="name" name="name" value="<?php print $data['fullname']; ?>" required>
    <label for="date" >Birth Date</label>
    <input type="date"  id="date"  name="Dness"  required value="<?php print $data['Dness']; ?>">
    <table>
        <tr>
            <td class="sa">
                <label for="r">Homme</label>
            </td>
            <td>
                <input type="radio" name="r" class="r1" value=1 <?php if ($data['sexe']==1) {echo "checked" ;} ?>>
            </td>
        </tr>
        <tr>
            <td class="sa">
                <label>Femme</label>
            </td>
            <td>
                <input type="radio" name="r" class="r1" value=2 <?php if ($data['sexe']==2) {echo "checked" ;} ?>>
            </td>
        </tr>
    </table>
    </div>
    <label for="mail" >Email</label>
    <input type="email" placeholder="Email" id="mail" name="mail" value="<?php print $data['mail']; ?>" required>
    <label for="adresse" >Adresse</label>
    <input type="text" name="adresse" placeholder="adresse"  value="<?php print $data['adr']; ?>" required>
    <label for="pwd" >password</label>
    <input type="password" placeholder="Password" id="pwd"  name="pas"   pattern="[A-Za-z0-9]{8}" value="<?php print $data['pass']; ?>" required>
    <label for="rpwd" >Repeat Password</label>
    <input type="password" placeholder="Repeat Password" id="rpwd" required pattern="[A-Za-z0-9]{8}" name="pas2" value="<?php print $data['pass']; ?>">
    <div class="ch"> 
    accept our <a href="#">terms & privacy</a><input type="checkbox" id="check" required checked>
    </div>
    <div class="btn">
        <input type="submit" value="modifier" id="sb">
        <input type="button" value="Annuler" id="an" onclick="window.location.href='welcome.php'">
    </div> 
    

    
</form>
</body>
</html>