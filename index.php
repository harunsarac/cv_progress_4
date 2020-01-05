<?php
require('login.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css?family=Oleo+Script&display=swap" rel="stylesheet">
        <title>Harun Sarač - CV</title>
        <style>
            .header-top{
                background-color: lightgray;
                height: 64px;
                border-bottom: solid;
                border-top: solid;
                border-color: black;
            }
            .header-title{
                font-family: 'Oleo Script', Helvetica, sans-serif;
                text-align: center;
                color: #2b2b2b;
                text-shadow: 4px 4px 0px rgba(0,0,0,0.1);
                margin-top: 5px;
            }
            .header-title-1{
                font-family: 'Oleo Script', Helvetica, sans-serif;
                color: #2b2b2b;
                text-shadow: 4px 4px 0px rgba(0,0,0,0.1);
                margin-top: 5px;
            }
            .main-part{
                float: right;
                width: 100%;
                background-color: #5dbebf;
            }
            .slider-menu {
                height: 100%;
                width: 0%;
                position: fixed;
                top: 0;
                left: 0;
                background-color: lightgray;
                overflow-x: hidden;
                transition: 0.25s;
                padding-top: 10px;
                border-top: solid;
                border-right: solid 1px;
                border-color: black;
                z-index: 100;
            }
            .slider-menu a {
                padding: 8px 8px 8px 8px;
                font-size: 20px;
                font-family: 'Oleo Script', Helvetica, sans-serif;
                color:  #2b2b2b;
                display: block;
                border-bottom: solid black;
                text-decoration: none;
            }
            .input-boxes {
                padding: 12px;
                border: 1px solid #ccc;
                border-radius: 4px;
                resize: vertical;
                width: 30%;
            }
            .input-boxes:hover {
                background-color: #eee;
            }
            .input-label {
                padding: 25px 12px 12px 12px;
                display: inline-block;
                float: left;
                width: 10%;
            }
            .form-box {
                text-align:left;
                margin-bottom:22px;
            }
            .table-education {
                font-family: "Arial Black";
                border: 2px solid #000000;
                background-color: #4A4A4A;
                width: 90%;
                height: 120px;
                text-align: center;
                border-collapse: collapse;
            }
            .table-education th{
                border: 1px solid #4A4A4A;
                padding: 3px 2px;
            }
            .table-education tbody td {
                font-size: 13px;
                color: #E6E6E6;
                border: 1px solid #E6E6E6;
            }
            .table-education thead {
                background: #000000;
                border-bottom: 3px solid #000000;
            }
            .table-education thead th {
                font-size: 15px;
                font-weight: bold;
                color: #E6E6E6;
                text-align: center;
                border-left: 2px solid #4A4A4A;
            }
            .progress-bar{
                background-color: lightgray;
                border-radius:10px;
            }
            .progress-bar-part{
                background-color:#5dbebf;
                border-radius:10px;
            }
            .progress-bar-part:hover{
                background-color:#007bff;
                border-radius:10px;
            }
            .dropdown {
                position: relative;
                display: inline-block;
                cursor: pointer;
            }
            .dropdown-content {
                float: right;
                display: none;
                background-color: lightgray;
                min-width: 160px;
            }
            .dropdown-content a {
                color: black;
                text-decoration: none;
                display: block;
            }
            .dropdown-content a:hover {
                background-color: #ddd;
            }
            .dropdown:hover .dropdown-content {
                display: block;
            }
            .footer-bottom{
                background-color: #f2f2f2;
                height: 100px;
            }
            .modal {
                display: none;
                position: fixed;
                z-index: 1;
                padding-top: 100px;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                overflow: auto;
                background-color: rgb(0,0,0);
                background-color: rgba(0,0,0,0.4);
            }
            .modal-content {
                background-color: #fefefe;
                margin: auto;
                padding: 20px;
                border: 1px solid #888;
                width: 20%;
            }
            .close {
                color: #aaaaaa;
                float: right;
                font-size: 28px;
                font-weight: bold;
                cursor: pointer;
            }
        </style>
    </head>
    <body>
        <nav class="header-top">
            <section class="container">
                <div class="row">
                    <div class="col-md-4">
                        <span onclick="openNav()" style="cursor: pointer">
                            <img src="icons/menu.png" height="50px" width="50px" style="margin-top: 5px">
                        </span>
                    </div>
                    <div class="col-md-4">
                        <h1 class="header-title">Harun Sarac</h1>
                    </div>
                    <div class="col-md-4">
                        <button id="myBtn" type="button" style="margin-top: 10px" class="btn btn-info float-right">Calculator</button>
                        <?php if (isset($_SESSION['username'])){
                            echo "<a href='logout.php'><button type=\"button\" style=\"margin-top: 10px; margin-right: 10px\" class=\"btn btn-warning float-right\">Logout ($username)</button></a>";
                        }
                        else{
                            echo "<button id=\"signInBtn\" type=\"button\" style=\"margin-top: 10px; margin-right: 10px\" class=\"btn btn-secondary float-right\">Sign in</button>";
                        }
                            ?>
                    </div>
                </div>
            </section>
        </nav>
        <nav class="slider-menu" id="sidemenu">
            <span onclick="closeNav()" style="cursor: pointer">
                <img src="icons/x_circle.png" height="50px" width="50px" class="float-right" style="margin-right: 30px">
            </span>
            <br>
            <br>
            <a style="border-top: solid" href="#education"><img src="icons/education.png" height="16px" width="16px"> Education</a>
            <a href="#work"><img src="icons/work.png" height="16px" width="16px"> Work experience</a>
            <a href="#star"><img src="icons/star.png" height="16px" width="16px"> Skill set</a>
            <a href="#user"><img src="icons/user.png" height="16px" width="16px"> Personal life</a>
            <a href="#contact"><img src="icons/call-answer.png" height="16px" width="16px"> Contact me</a>
            <div class="dropdown">
                <a style="border-bottom: none"><img src="icons/down.png" height="16px" width="16px"> Project progress</a>
                <div class="dropdown-content float-right">
                    <a style="font-size: 16px; border-bottom: none" href="https://harunsarac.github.io/harunsarac-cv/">&nbsp;Progress 1</a>
                    <a style="font-size: 16px; border-bottom: none" href="https://github.com/harunsarac/harunsarac-cv">&nbsp;Progress 1 repo</a>
                    <a style="font-size: 16px; border-bottom: none" href="https://harunsarac.github.io/cv_progress_2/">&nbsp;Progress 2</a>
                    <a style="font-size: 16px; border-bottom: none" href="https://github.com/harunsarac/cv_progress_2">&nbsp;Progress 2 repo</a>
                    <a style="font-size: 16px; border-bottom: none" href="https://harunsarac.github.io/cv_progress_3/">&nbsp;Progress 3</a>
                    <a style="font-size: 16px; border-bottom: none" href="https://github.com/harunsarac/cv_progress_3">&nbsp;Progress 3 repo</a>
                </div>
            </div>
        </nav>
        <div class="main-part">
            <div class="container" style="background-color: #e4e4ec">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="header-title">Welcome to my website</h2>
                        <img style="border: solid; border-color: #5dbebf; margin-left: 30%" src="images/Harun.jpg" height="200px" width="200px">
                    </div>
                    <div class="col-md-4">
                        <p style="margin-top: 100px" class="header-title">Hello there! I'm a student of Computer Science and Engineering at a local university in Sarajevo. My dream is to be a successful software developer and this website is one of many steps toward that goal. Hope you like it.</p>
                    </div>
                </div>
                <hr/>
                <div class="row">
                <div class="col-md-6">
                    <div id="education">
                        <h2 class="header-title-1"><img src="icons/education.png" height="16px" width="16px">&nbsp;Education</h2>
                    </div>
                    <br>
                    <div>
                    <table class="table-education">
                        <thead>
                            <tr>
                                <th width="30%">Elementary school</th>
                                <th>High school</th>
                                <th>College</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>"Edhem Mulabdic" Zenica</td>
                                <td>"Gazi Husrev-begs medresa" Sarajevo</td>
                                <td>"International University of Sarajevo"</td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
                    <br>
                    <br>
                    <div id="work">
                        <h2 class="header-title-1"><img src="icons/work.png" height="16px" width="16px">&nbsp;Work experience</h2>
                    </div>
                    <dl>
                        <dt>&nbsp;&nbsp;Internships</dt>
                        <dd>Internship at a local software development company <a href="http://saas.ba/">SaaS</a></dd>
                    </dl>
                </div>
                <div class="col-md-6">
                    <div>
                        <div id="star">
                            <h2 class="header-title-1"><img src="icons/star.png" height="16px" width="16px">&nbsp;Skill set</h2>
                        </div>
                        <h4 class="header-title">Laravel & Bootstrap</h4>
                        <div class="progress-bar">
                            <div class="progress-bar-part" style="width:80%">80%</div>
                        </div>
                        <h4 class="header-title">PHP & C++</h4>
                        <div class="progress-bar">
                            <div class="progress-bar-part" style="width:75%">75%</div>
                        </div>
                        <h4 class="header-title">Java & Javascript</h4>
                        <div class="progress-bar">
                            <div class="progress-bar-part" style="width:40%">40%</div>
                        </div>
                        <br>
                    </div>
                    <div id="user">
                        <h2 class="header-title-1"><img src="icons/user.png" height="16px" width="16px">&nbsp;Personal life</h2>
                    </div>
                    <ul type="square">
                        <li>Name: <strong>Harun Sarač</strong></li>
                        <li>Birth date: <strong>13.06.1997.</strong></li>
                        <li>City: <strong>Zenica</strong></li>
                    </ul>
                </div>
                </div>
                <div id="contact">
                    <h2 class="header-title-1"><img src="icons/call-answer.png" height="16px" width="16px">&nbsp;Contact me</h2>
                </div>
                <br>
                <form action="" method="POST">
                    <div style="width: 50% ; float: left">
                        <div class="form-box">
                            <label for="full_name">Full name<label style="color: red">*</label></label>
                            <br>
                            <input class="input-boxes" style="width: 80%" type="text" id="full_name" name="full_name" placeholder="Full name" required>
                        </div>
                        <div class="form-box">
                            <label for="email">Email<label style="color: red">*</label></label>
                            <br>
                            <input class="input-boxes" style="width: 80%" type="email" id="email" name="email" placeholder="Email" required>
                        </div>
                        <div class="form-box">
                            <label for="subject">Subject<label style="color: red">*</label></label>
                            <br>
                            <input class="input-boxes" style="width: 80%" type="text" id="subject" name="subject" placeholder="Subject" required>
                        </div>
                    </div>
                    <div style="width: 50%; float: right">
                        <div class="form-box">
                            <label for="subject">Message<label style="color: red">*</label></label>
                            <br>
                            <textarea class="input-boxes" style="width: 80%; height: 150px" id="message" name="message" placeholder="Message" required></textarea>
                        </div>
                    </div>
                </form>
                <div>
                    <h3 class="header-title-1">Other ways you can contact me</h3>
                </div>
                <ul type="none">
                    <li><img src="icons/facebook.png" height="16px" width="16px"> Facebook: <a href="https://www.facebook.com/harun.sarac.7">Harun Sarač</a></li>
                    <li><img src="icons/call-answer.png" height="16px" width="16px"> Phone: <strong>+38762442443</strong></li>
                    <li><img src="icons/mail.png" height="16px" width="16px"> Email: <strong>
                        <a href=”mailto:haruns97hs@gmail.com” >Personal Email</a> /
                        <a href=”mailto:160302020@student.ius.edu.ba” >Business Emai</a>
                    </strong></li>
                </ul>
                <br>
            </div>
        </div>
        <nav class="footer-bottom">
            <div>
                <h4 style="color: #9e9e9e; padding-left: 80px; padding-top: 50px"></h4>
            </div>
        </nav>
        <div id="myModal" class="modal">
            <div class="modal-content">
                <span id="close" class="close">&times;</span>
                <p>Use this simple calculator</p>
                <div>
                    <form>
                        <input class="input-boxes" style="width: 76%" type="text" name="output" id="output">
                        <br>
                        <input class="btn btn-secondary btn-outline-primary" style="width: 40px" type="button" value="1" onclick="output.value += '1'">
                        <input class="btn btn-secondary btn-outline-primary" style="width: 40px" type="button" value="2" onclick="output.value += '2'">
                        <input class="btn btn-secondary btn-outline-primary" style="width: 40px" type="button" value="3" onclick="output.value += '3'">
                        <input class="btn btn-secondary btn-outline-primary" style="width: 40px" type="button" value="+" onclick="output.value += '+'">
                        <br>
                        <input class="btn btn-secondary btn-outline-primary" style="width: 40px" type="button" value="4" onclick="output.value += '4'">
                        <input class="btn btn-secondary btn-outline-primary" style="width: 40px" type="button" value="5" onclick="output.value += '5'">
                        <input class="btn btn-secondary btn-outline-primary" style="width: 40px" type="button" value="6" onclick="output.value += '6'">
                        <input class="btn btn-secondary btn-outline-primary" style="width: 40px" type="button" value="-" onclick="output.value += '-'">
                        <br>
                        <input class="btn btn-secondary btn-outline-primary" style="width: 40px" type="button" value="7" onclick="output.value += '7'">
                        <input class="btn btn-secondary btn-outline-primary" style="width: 40px" type="button" value="8" onclick="output.value += '8'">
                        <input class="btn btn-secondary btn-outline-primary" style="width: 40px" type="button" value="9" onclick="output.value += '9'">
                        <input class="btn btn-secondary btn-outline-primary" style="width: 40px" type="button" value="x" onclick="output.value += '*'">
                        <br>
                        <input class="btn btn-danger" style="width: 40px" type="button" value="c" onclick="output.value = ''">
                        <input class="btn btn-secondary btn-outline-primary" style="width: 40px" type="button" value="0" onclick="output.value += '0'">
                        <input class="btn btn-primary" style="width: 40px" type="button" value="=" onclick="output.value = eval(output.value)">
                        <input class="btn btn-secondary btn-outline-primary" style="width: 40px" type="button" value="/" onclick="output.value += '/'">
                        <br>
                    </form>
                </div>
            </div>
        </div>
        <div id="signInModal" class="modal">
            <div class="modal-content" style="width: 40%">
                <span id="close1" class="close">&times;</span>
                <div>
                    <form method="POST" >
                        <h2 style="text-align: center">Login</h2>
                        <div class="form-box">
                            <label for="username">Username</label>
                            <br>
                            <input class="input-boxes" style="width: 100%" type="text" id="username" name="username" placeholder="Username" required>
                        </div>
                        <div class="form-box">
                            <label for="password">Password</label>
                            <br>
                            <input class="input-boxes" style="width: 100%" type="password" id="password" name="password" placeholder="Password" required>
                        </div>
                        <div class="">
                            <button class="btn btn-primary float-right" type="submit">Login</button>
                            <button id="registerBtn" style="margin-right: 10px" class="btn btn-info float-right" type="button">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div id="registerModal" class="modal">
            <div class="modal-content" style="width: 40%">
                <span id="close2" class="close">&times;</span>
                <div>
                    <form method="POST" action="register.php">
                        <h2 style="text-align: center">Register</h2>
                        <div class="form-box">
                            <label for="username">Username</label>
                            <br>
                            <input class="input-boxes" style="width: 100%" type="text" id="username" name="username" placeholder="Username" required>
                        </div>
                        <div class="form-box">
                            <label for="password">Password</label>
                            <br>
                            <input class="input-boxes" style="width: 100%" type="password" id="password" name="password" placeholder="Password" required>
                        </div>
                        <div class="">
                            <button class="btn btn-info float-right" type="submit">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
<script>
    function openNav() {
        document.getElementById("sidemenu").style.width = "200px";
    }
    function closeNav() {
        document.getElementById("sidemenu").style.width = "0";
    }
    var modal = document.getElementById("myModal");
    var modal1 = document.getElementById("signInModal");
    var modal2 = document.getElementById("registerModal");
    var btn = document.getElementById("myBtn");
    var btn1 = document.getElementById("signInBtn");
    var btn2 = document.getElementById("registerBtn");
    var span = document.getElementById("close");
    var span1 = document.getElementById("close1");
    var span2 = document.getElementById("close2");
    btn.onclick = function() {
        modal.style.display = "block";
    }
    span.onclick = function() {
        modal.style.display = "none";
    }
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    btn1.onclick = function() {
        modal1.style.display = "block";
    }
    span1.onclick = function() {
        modal1.style.display = "none";
    }
    window.onclick = function(event) {
        if (event.target == modal1) {
            modal1.style.display = "none";
        }
    }
    btn2.onclick = function() {
        modal1.style.display = "none";
        modal2.style.display = "block";
    }
    span2.onclick = function() {
        modal2.style.display = "none";
    }
    window.onclick = function(event) {
        if (event.target == modal2) {
            modal2.style.display = "none";
        }
    }
</script>
</html>