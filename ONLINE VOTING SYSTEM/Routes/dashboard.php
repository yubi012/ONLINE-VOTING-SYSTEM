<?php
   session_start();
   if(!isset($_SESSION['userdata'])){
     header("location:../");
   }
   $userdata = $_SESSION['userdata'];
   $groupsdata = $_SESSION['groupsdata'];

   if($_SESSION['userdata']['status']==0){
       $status = '<b style="color: red">Not voted</b>';
   }
   else{
    $status = '<b style="color: green">Voted</b>';
   }
?>


<html>
    <head>
        <title>ONVOT DASHBOARD</title>
        <link rel="stylesheet" href="../css/stylesheet.css">
    </head>

    <body>

       <style>
           #backbtn{
            padding: 5px;
            border-radius: 5px;
            background-color: blue;
            color: azure;
            float: left;
            margin: 10px ;
            }
            #logoutbtn{
            padding: 5px;
            border-radius: 5px;
            background-color: blue;
            color: azure;
            float: right;
            margin: 10px;
            }

            #profile{
                background-color: azure;
                width: 30%;
                padding: 20px;
                float: left;
            }
            #candidate{
                background-color: azure;
                width: 55%;
                padding: 20px;
                float: right;
            }
            #votebtn{
                padding: 5px;
            border-radius: 5px;
            background-color: blue;
            color: azure;
            float: left;
            }
            #mainpanel{
                padding: 10px;
            }
            #voted{
                padding: 5px;
                font-size: 15px;
                background-color: green;
                color: azure;
                border-radius: 5px;
            }
        
         
        </style>

    <div id="mainSection">
        <center>
    <div id="headerSection">
       <a href="../"><button id="backbtn">Back</button></a>
       <a href"logout.php"><button id="logoutbtn">Logout</button></a>
        <h1>ONVOT</h1>
        <h2>The Online Voting System</h2>
        </center>
        </div>
        <hr>


        <div id="mainpanel">
        <div id="profile">
            <center><img src="../uploads/<?php echo $userdata['photo']?>" height="200" width="200"><br><br></center>
            <b>Name:</b> <?php echo $userdata['name']?><br><br>
            <b>Mobile:</b> <?php echo $userdata['mobile']?><br><br>
            <b>Address:</b> <?php echo $userdata['address']?><br><br>
            <b>Status:</b> <?php echo $status?><br><br>
        </div>


        <div id="candidate">
         <?php
           if($_SESSION['groupsdata']){
                for($i=0;$i<count($groupsdata);$i++){
                    ?>
                    <div>
                        <img style="float: right;" src="../uploads/<?php echo $groupsdata[$i]['photo']?>" height="100" width="100">
                        <b>Candidate: </b><?php echo $groupsdata[$i]['name']?><br><br>
                        <b>Votes: </b><?php echo $groupsdata[$i]['votes']?><br><br>
                        <form action="../api/vote.php" method="POST">
                            <input type="hidden" name="cvotes" value="<?php echo $groupsdata['$i']['votes']?>">
                            <input type="hidden" name="cid" value="<?php echo $groupsdata['$i']['id']?>">
                            <?php
                                if($_SESSION['userdata']['status']==0){
                                    ?>
                                    <input type="submit" name="votebtn" value="vote" id="votebtn">
                                    <?php

                                }
                                else{
                                    ?>
                                    <button disabled type="button" name="votebtn" value="vote" id="voted">VOTED</button>
                                    <?php
                                }
                                ?>
                        </form>
                    </div>
                    <hr>
                    <?php
                }
            }
            else{

            }   
            ?>   
    <div></div>
        

        
    </body>
</html>
