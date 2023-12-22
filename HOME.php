<?php
if (session_status() == PHP_SESSION_NONE) {
   session_start();
 }
include("connection.php");


   $_SESSION;
 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clean Sight</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/8f8b1fbe65.js" crossorigin="anonymous"></script>
    <style>
     body{
     background-color: rgb(100, 136, 234);
     width: 100%;
     

     }
     .header{
      
        background-color: white;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        height: 70px;
        position: fixed;
        left: 0;
        right: 0;
        top: 0;
        z-index: 1000;
        padding-top: 10px;
     }
     .l1{
        width: 30%;
        height: 50px;
     }
     .name{
        font-size:x-large;
       font-family: 'Times New Roman', Times, serif;
       font-weight: bold;
       color: rgb(79, 91, 146);
       display: block;
       margin-top: 13px;
       cursor: pointer;
     }
     .flag{
        width: 100%;
        height: 50px;
        
     }
     .first{
        display: flex;
        flex-direction: row;
        z-index: 11;
        flex-shrink: 0;
     }
     .second{
        display: flex;
        flex-direction: row;
        flex-shrink: 0;
     }
     .third{
        display: flex;
        flex-direction: row;
        flex-shrink: 0;
        z-index: 10;
        
        margin-left: 10px;
     }
     
     @media only screen and (max-width: 400px){
            .header
            {
        background-color: white;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        height: 50px;
     }
        
        .second{
        display: flex;
        flex-direction: row;
     }
     .name{
        font-size:large;
       font-family: 'Times New Roman', Times, serif;
       font-weight: bold;
       color: rgb(79, 91, 146);
       display: block;
       margin-top: 8px
       
     }
     }
     .about, .complaint{

      border: none;
      font-family: 'Times New Roman', Times, serif;
      background-color: white;
      margin-right: 10px;
      font-size: small;
      color: rgb(79, 91, 146);
      font-weight: bold;
      border-radius: 25px;
      transition: box-shadow 0.5s;
     }
     .about:hover{
        color: rgb(28, 65, 65);
        box-shadow:1px 1px 10px rgb(67, 63, 63) ;
     }
     .complaint:hover{
        color: rgb(28, 65, 65);
        box-shadow:1px 1px 10px rgb(67, 63, 63) ;
     }
     @keyframes moveText{ 
      0% {
        transform: translateX(101%);
      }
      100%{
        transform: translateX(-100%);
      }
    }
    .move{
        margin-top: 50px;
        background-color: rgb(58, 183, 241);
        height: 70px;
        position: fixed;
        top:0px;
        left: 0px;
        right: 0px;
        z-index: 100;
        padding-top: 15px;
    }
    .moving-text{
        top: 50px;
        animation: moveText 15s linear infinite;
        margin-top: 12px; 
        padding-left: 10px;
        font-size: 20px;
        color: white;
        cursor: pointer;
        width:130%;
    }

    .moving-text:hover {
      animation-play-state: paused;
    }
    .main{
      display: flex;
      flex-direction: column;
      margin-top: 100px;
      row-gap: 50px;
      margin-right: 15%;
      margin-left: 15%;
      
      max-width: 100%;
     
      align-items: center;
      
    }
    .main1{
      align-items: center;
    }
   
    .main2{
      background-color: rgb(255, 255, 255);
      display: flex;
      padding-top: 17px;
      flex-direction: column;
      justify-content: center;
      box-shadow:1px 1px 10px rgb(67, 63, 63) ;
      border-radius: 10px;
      
      
    
    }
    .login-btn,.com-btn{
     display: block;
     margin-bottom: 15px;
     background-color: aqua;
     margin-left: 60px;
     margin-right: 60px;
     border: none;
     border-radius: 5px;
     cursor: pointer;
    }
    .main3{
      margin-left: 5%;
     margin-right: 5%;
     margin-top: 10%;
     
    }
    .img{
      width: 100%;
      box-shadow:1px 1px 10px rgb(67, 63, 63) ;
    }
    .s1,.s11{
      font-family:'Times New Roman', Times, serif;
      font-weight: bold;
      font-size:x-large;
      display: block;

    }
    .s11{
      margin-top: 50px;
    }
    .s2{
      margin-top: 5%;
      font-family: 'Times New Roman', Times, serif;
      font-weight: bold;
      font-size: 12px;
    }
    .s3,.s4{
      font-family: 'Times New Roman', Times, serif;
      margin-top: 30px;
      font-size: 12px;
    }
    </style>
</head>
<body>
<div class="header">
    <div class="first">
    <img src="l1.png" class="l1">
    <p class="name" >Clean Sight</p>
</div>
<div class="second">
    <img class="flag" src="flag.gif">
</div>
<div class="third">
   <ul>
      <li>
    <button class="about" >About us</button>
   </li>
   <li>
    <a href="HowToFillComplaint.php"><button class="complaint">How to fill a complaint</button></a>
   </li>
   </ul>
</div>
</div>
<div class="move">
    <div class="moving-text">Click to know more about the CLEAN SIGHT.<a href="#">Here</a></div>
</div>
<div class="main">
<div class="main1">
   <img src="logo.png" class="logo">
</div>
<div class="main2">
   <div>
   <a href="login.php"> <button type="submit" onclick="" style="display:inline-block block;" class="login-btn"> Login as Admin</button></a>
</div>
<div>
   <a href="complaint.php"> <button type="submit" onclick="" class="com-btn">Fill a Complaint</button></a>
</div>
</div>
</div>
<div class="main3">
   <p class="s1">How the New Clean Sight App Helped a Citizen Get Rid of a Garbage Dump in His Area in Just a Few Hours</p>
   <img class="img" src="city.webp">
   <p class="s2">Reporting a garbage problem and getting it resolved can be a painful and laborious process. The students of VELTECH University has launched an app to make it easier.</p>
   <p class="s3"> As an Indian citizen, reporting a civic problem and getting it resolved can be a painful and laborious process. To overcome this limitation, the students of VELTECH University has launched a new CLEAN SIGHT app for citizen assistance.</p>
   <p class="s4">What do we normally do if we encounter a garbage dump, or unclean road, or overflowing dustbins? We just close our nose, ignore the situation, and walk away, as nothing can be done as an individual.

      But in the recent past, a new mobile application (called the CLEAN SIGHT app) launched by the Ministry of students of VELTECH University enables a citizen to post any garbage-related issue. Citizens can download the mobile application and use it to file complaints. The citizens only need to take a picture of the complaint they see on the ground and post it through this app. The complaint automatically gets forwarded to the municipal corporation for action, and the matter is assigned to the concerned sanitary inspector.
      
      To test this application, I posted a picture of a garbage dump near my residency on it (as shown below). About 30 minutes later, I received a call from someone from the corporation. He wanted to confirm whether I was the complainant.</p>
      <img class="img" src="city2.webp">
      <p class="s11">On confirmation, he said that the work would be completed soon.</p>
      <img class="img" src="city3.webp">
      <p class="s4">I was pretty surprised! I had not expected such a fast response. But still I was sceptical about whether the garbage would be cleaned or not. About 3-4 hours later, I decided to inspect the place, and found a few workers in action.</p>

</div>
</body>

</html>
