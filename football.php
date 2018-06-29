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
    if($query = mysqli_query($con,"SELECT Team FROM football WHERE Player_Name = '$var'"))
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
        <link rel="stylesheet" type="text/css" href="football.css">
        <link rel="stylesheet" type="text/css" href="css-reset.css">
        <link href="https://fonts.googleapis.com/css?family=Alegreya|Josefin+Sans|Kaushan+Script|Merriweather|Righteous|Vollkorn|Pacifico|Satisfy|Prosto+One" rel="stylesheet">


        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script type="text/javascript">
            $(function(){
                $('.player').keyup(function() {
                    var p = $('.player').val();
                    $.post('football.php',{"player":p},function(data){
                        $('#playerdata').html(data);
                    });
                });

            });
        </script>
        <title>Football</title>
    </head>
    <body>



        <header>
            <nav id="navbar">
                <div id="nav1" class="navigation">
                    <ul>
                        <li><a href="index.html">Home</a></li>
<!--                        <li><a href="about.html">About</a></li>-->
                        <li><a href="cricket.php">Cricket</a></li>
                    </ul>
                </div>
            </nav>
        </header>


        <section class="section" id="section1">
            <p>"Winning- Thats The Most Important To Me. It's As Simple As That."<br>
            -Cristiano Ronaldo</p>
        </section>

        <section class="section" id="section2">
            <div class="boxes">
                <div id="players">
                    <p>Enter A Player Name to get his current club</p><br><br>
                    <div id="form1">
                        <form name="f1" method="POST">
                            <input type="text" name="player" id="player" placeholder="Enter A Player Name" class="player"><br>
                            <!--<input type="submit" id="check" value="CHECK">-->
                        </form>
                    </div>
                    <p id="playerdata"></p>
                    <h3>For more information on the latest rankings and leagues click here
                        <a href="http:\\www.goal.com" target="_blank"><i class="right" ></i></a></h3>
                </div>
            </div>
        </section>

        <section id="section3">
            <div class="scores">
                <div id="leftpane">
                    <iframe src="http://livescores.website/widgetsoccerblue" frameborder="0" scrolling="no"></iframe>
                    <h3>Scores, Team Updates And News
                        <a href="http:\\www.goal.com" target="_blank"><i class="right"></i></a></h3>
                </div>
                <!--<div id="rightpane">
                    <h3>Scores, Team Updates And News
                        <a href="http://www.goal.com/en-us/" target="_blank"><i class="right"></i></a></h3>
                </div>-->


            </div>


        </section>

        <footer>
            <h3>Copyright &copy; 2017</h3>
        </footer>



    </body>
</html>
<?php } ?>