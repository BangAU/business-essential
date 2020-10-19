<?php
/*
                                                                                                             
                                                                                                             
            CCCCCCCCCCCCC                                      ffffffffffffffff    iiii                      
         CCC::::::::::::C                                     f::::::::::::::::f  i::::i                     
       CC:::::::::::::::C                                    f::::::::::::::::::f  iiii                      
      C:::::CCCCCCCC::::C                                    f::::::fffffff:::::f                            
     C:::::C       CCCCCC   ooooooooooo   nnnn  nnnnnnnn     f:::::f       ffffffiiiiiii    ggggggggg   ggggg
    C:::::C               oo:::::::::::oo n:::nn::::::::nn   f:::::f             i:::::i   g:::::::::ggg::::g
    C:::::C              o:::::::::::::::on::::::::::::::nn f:::::::ffffff        i::::i  g:::::::::::::::::g
    C:::::C              o:::::ooooo:::::onn:::::::::::::::nf::::::::::::f        i::::i g::::::ggggg::::::gg
    C:::::C              o::::o     o::::o  n:::::nnnn:::::nf::::::::::::f        i::::i g:::::g     g:::::g 
    C:::::C              o::::o     o::::o  n::::n    n::::nf:::::::ffffff        i::::i g:::::g     g:::::g 
    C:::::C              o::::o     o::::o  n::::n    n::::n f:::::f              i::::i g:::::g     g:::::g 
     C:::::C       CCCCCCo::::o     o::::o  n::::n    n::::n f:::::f              i::::i g::::::g    g:::::g 
      C:::::CCCCCCCC::::Co:::::ooooo:::::o  n::::n    n::::nf:::::::f            i::::::ig:::::::ggggg:::::g 
       CC:::::::::::::::Co:::::::::::::::o  n::::n    n::::nf:::::::f            i::::::i g::::::::::::::::g 
         CCC::::::::::::C oo:::::::::::oo   n::::n    n::::nf:::::::f            i::::::i  gg::::::::::::::g 
            CCCCCCCCCCCCC   ooooooooooo     nnnnnn    nnnnnnfffffffff            iiiiiiii    gggggggg::::::g 
                                                                                                     g:::::g 
                                                                                         gggggg      g:::::g 
                                                                                         g:::::gg   gg:::::g 
                                                                                          g::::::ggg:::::::g 
                                                                                           gg:::::::::::::g  
                                                                                             ggg::::::ggg    
                                                                                                gggggg       
*/


//  FIND_CONNEXION
//  Connexion
/*
     dP""b8  dP"Yb  88b 88 88b 88 888888 Yb  dP 88  dP"Yb  88b 88
    dP   `" dP   Yb 88Yb88 88Yb88 88__    YbdP  88 dP   Yb 88Yb88
    Yb      Yb   dP 88 Y88 88 Y88 88""    dPYb  88 Yb   dP 88 Y88
     YboodP  YbodP  88  Y8 88  Y8 888888 dP  Yb 88  YbodP  88  Y8
*/
/*$conn = new mysqli('localhost', 'datacom', 'b7QPupe5J76bNBLv', 'datacom');
if ($conn->connect_error) {
    trigger_error('Database connection failed: ' . $conn->connect_error, E_USER_ERROR);
}*/

$LPname = "Business Essential 8";

$conn = new mysqli('localhost','business_admin', 'RUfYpVoDW$xF', 'business_cso'); 
if ($conn->connect_error) {
    trigger_error('Database connection failed: ' . $conn->connect_error, E_USER_ERROR);
}
?>