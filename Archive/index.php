<?php 
include("config.php");
include("head.php");

?>

<section class="header" id="home">
   
    <div class="scrolldown revealOnScroll" data-animation="fadeInUp" data-timeout="100">
        <span>SCROLL DOWN</span>
        <a href="#talking" class="scroll-animation"></a>
    </div> <!-- end.scrolldown -->

    <div class="question-header">
        <div class="logo"> <img src="images/cso-logo.png" alt="CSO Group"> </div>

        <div class="menu" id="menu">
        <input id="show-mobile" type="checkbox" /><span></span><span></span><span></span>
            <ul class="mobMenu">
                <li><a href="index.php">Home</a></li>
                <li data-menuanchor="one"><a href="questions.php#one">Take the test</a></li>
                <!-- <li data-menuanchor="keys"><a class="gotokey" href="#keys">Key Areas</a></li> -->
            </ul>
        </div>
    </div>

    

    <div class="container">

        <div class="intro">
            <div class="text" >
                <h3 class="quote revealOnScroll" data-animation="fadeInLeft" data-timeout="100">Everybody is</h3>
                <h2 class="revealOnScroll" data-animation="fadeInLeft" data-timeout="100">Talking</h2>
                <h2 class="revealOnScroll" data-animation="fadeInLeft" data-timeout="100">the talk</h2>
                <h3 class="revealOnScroll" data-animation="fadeInLeft" data-timeout="100">but are you</h3>
                <h2 class="depth revealOnScroll" data-animation="fadeInLeft" data-timeout="100" title="Walking">Walking</h2>
                <h2 class="uptext revealOnScroll" data-animation="fadeInLeft" data-timeout="100">the walk?</h2>
            </div> <!-- end.text -->
            <img class="head revealOnScroll" data-animation="fadeInRight" data-timeout="100" src="images/head2.png" alt="CSO Group">
        </div> <!-- end.intro -->
        
    </div> <!-- end.container -->
    <!-- <a href="#talking" class="read-more">Read More</a> -->

</section> <!-- end.header -->

<section class="thetalk" id="talking">

    <div class="scrolldown revealOnScroll" data-animation="fadeInUp" data-timeout="100">
        <span>SCROLL DOWN</span>
        <a href="#lets-walk-anchor" class="scroll-animation"></a>
    </div> <!-- end.scrolldown -->

    <div class="floating-words">
        <span class="walk-1">Walk</span>
        <span class="talk-1">Talk</span>
        <span class="walk-2">Walk</span>
        <span class="walk-3">Walk</span>
        <span class="talk-2">Talk</span>
        <span class="talk-3">Talk</span>
        <span class="walk-4">Walk</span>
        <span class="talk-4">Talk</span>
    </div>
    <div class="container">

        <div class="thewalk-intro">
            <h2>The Talk... <img class="thetalkquote" src="images/quote1.png"  width="48" alt="CSO Group"> </h2>
            <h3>Everyone’s talking about<br/>cybersecurity - what is the real threat?</h3>
        </div> <!-- end.thewalk-intro -->

        <div class="row box-container">

            <div class="col-sm-4">

                <div class="box transform revealOnScroll"  data-animation="zoomIn" data-timeout="100">
                    <h4>Transform to<br/>perform</h4>
                    <p>Hackers are using AI and machine learning models to craft more convincing fake messages for phishing attacks, 
                        and they can fire off far more of them without tiring.</p>
                    <img class="theperformquote" src="images/quote1.png"  width="30" alt="CSO Group">
                </div> <!-- end.transform -->

                <div class="box responsibility revealOnScroll" data-animation="zoomIn" data-timeout="600">
                    <img class="therespquote" src="images/quote1.png"  width="30" alt="CSO Group">
                    <h4>Your<br/>responsibility</h4>
                    <p>There’s more obligations for businesses to take responsibility for their customer’s data and go to appropriate lengths if there is a breach.</p>
                </div> <!-- end.responsibility -->

            </div> <!-- end.col-sm-4 -->

            <div class="col-sm-4">
                <div class="box talent revealOnScroll" data-animation="zoomIn" data-timeout="300">
                    <img class="thetalentquote" src="images/quote1.png"  width="45" alt="CSO Group">
                    <h4>Talent<br/>Shortage</h4>
                    <p>The information security<br/>field is expected to see a<br/>worldwide deficit of 1.5 million<br/>professionals by 2020.</p>
                </div> <!-- end.picture -->

                <div class="box work revealOnScroll" data-animation="zoomIn" data-timeout="400">
                    <img class="theworkquote" src="images/quote1.png"  width="30" alt="CSO Group">
                    <h4>Work<br/>Together</h4>
                    <p>Cybersecurity is a business problem not an IT problem. Having a specialist partner that takes a holistic approach will ensure you have the customised protection.</p>
                </div> <!-- end.work -->
            </div> <!-- end.col-sm-4 -->
            
            <div class="col-sm-4">

                <div class="box picture revealOnScroll" data-animation="zoomIn" data-timeout="200">
                    <img class="thebigquote" src="images/quote1.png"  width="55" alt="CSO Group">
                    <h4>The bigger<br/>picture</h4>
                    <p>Data and information isn’t all that is at risk, 2017 showed  a 600% increase of attacks against IoT devices.</p>
                </div> <!-- end.picture -->

                <div class="box real revealOnScroll" data-animation="zoomIn" data-timeout="500">
                    <img class="therealquote" src="images/quote1.png"  width="30" alt="CSO Group">
                    <h4>Real<br/>impact</h4>
                    <p>Facebook lost over $60 million in market value in just 2 days following the Cambridge Analytica data breach as well as the confidence of many of its 1 billion plus users.</p>
                </div> <!-- end.work -->

            </div> <!-- end.col-sm-4 -->

        </div> <!-- end.row -->
        <div class="lets-walk" id="lets-walk-anchor">
            <div class="wrappWalk">
                <h3 class="revealOnScroll" data-animation="fadeIn" data-timeout="300">are you</h3>
                <h2 class="revealOnScroll" data-animation="fadeIn" data-timeout="600">Walking<br/>the walk?</h2>
                <p class="revealOnScroll" data-animation="fadeIn" data-timeout="800">It’s up to you to walk your business through the security minefield. 
                Can’t separate the talk from the action? Clear the noise by completing our interactive survey and start walking the walk. 
                By analysing your answers, we’ll provide you with an in-depth report on how to improve the security solution of your business.</p>
                
                <a href="questions.php" class="read-more walk">Let's Walk</a>
            </div>
            
            <div class="semi-circle"></div>
        </div> <!-- end.lets-walk -->

    </div> <!-- end.container -->
</section> <!-- end.thetalk -->

<?php
include("footer.php");
?>