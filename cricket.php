<?php
$con = mysqli_connect("localhost","root","","sports");
if (!$con)
{
    echo"Could not connect";
}
else
{
    //  echo "connected";
}

mysqli_select_db($con,"sports");
$data = '';

if(isset($_POST['player']))
{	
    $var=$_POST['player'];
    if($query = mysqli_query($con,"SELECT Team FROM cricket WHERE Player_Name = '$var'"))
    {
        while($d = mysqli_fetch_array($query,MYSQLI_BOTH))
        {
            $data .= $data . $d['Team'] ;

            //$data .= $data . '<div>' . $d['Team'] . '</div>';
        }
        echo $data;
    }

} else{



?>



<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="cricket.css">
        <link rel="stylesheet" type="text/css" href="css-reset.css">
        <link href="https://fonts.googleapis.com/css?family=Alegreya|Josefin+Sans|Kaushan+Script|Merriweather|Righteous|Vollkorn|Pacifico|Satisfy|Prosto+One" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script type="text/javascript">
            $(function(){
                $('.player').keyup(function() {
                    var p = $('.player').val();
                    $.post('cricket.php',{"player":p},function(data){
                        $('#playerdata').html(data);
                    });
                });

            });
        </script>

        <title>Cricket</title>
    </head>
    <body>

        <header>
            <nav id="navbar">
                <div id="nav1" class="navigation">
                    <ul>
                        <li><a href="index.html">Home</a></li>
<!--                        <li><a href="about.html">About</a></li>-->
                        <li><a href="football.php">Football</a></li>
                    </ul>
                </div>
            </nav>
        </header>


        <section class="section" id="section1">
            <p>"I Just Keep It Simple. Watch The Ball And Play It On Merit." <br>-Sachin Tendulkar</p>
        </section>

        <section class="section" id="section2">
            <div class="boxes">
                <div id="players">
                    <p>Enter A Player Name to get his current Team</p><br><br>
                    <div id="form1">
                        <form name="f1" method="POST">
                            <input type="text" name="player" id="player" placeholder="Enter A Player Name"class="player"><br>
                            <!--<input type="submit" id="check" value="CHECK">-->
                        </form>
                    </div>
                    <p id="playerdata"></p>
                    <h3>For more information on the latest rankings and leagues click here
                        <a href="http://www.espncricinfo.com/"  target="_blank"><i class="right"></i></a></h3>

                </div>
            </div>
        </section>

        <section class="section" id="section3">
            <div class="scores">
                <div id="leftpane">
                    <script> app="www.cricwaves.com"; mo="Z_W"; nt="n"; Width='300px'; Height='220px'; co ="aus"; ad="1";  </script>
                    <script type="text/javascript" src="http://www.cricwaves.com/cricket/widgets/script/scoreWidgets.js"></script>
                    <h3>Scores, Team Updates And News
                        <a href="http://www.espncricinfo.com/" target="_blank"><i class="right"></i></a></h3> 
                </div>
                <!--<div id="rightpane">
<h3>Scores, Team Updates And News
<a href="http://www.goal.com/en-us/" target="_blank"><i class="right"></i></a></h3> 
</div>   -->              

            </div>

        </section>


        <footer>
            <h3>Copyright &copy; 2017</h3>
        </footer>

    </body>
</html>
<?php } ?>