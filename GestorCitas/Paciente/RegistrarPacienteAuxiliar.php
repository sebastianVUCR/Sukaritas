<?php
    function desplegarMensaje() {
        try {
            session_start();
        }
        catch(Exception $e){}
        if(isset( $_SESSION["mensajePaciente"]) && isset( $_SESSION["mensajePacienteTipo"]) ) {
            if($_SESSION["mensajePacienteTipo"] == 'error') {
                echo '<script language="javascript">
                document.getElementById("mensaje").innerHTML="'.$_SESSION["mensajePaciente"].'";
                document.getElementById("mensaje").classList.add("error");
                document.getElementById("mensaje").style.visibility="visible";s
                </script>';
            }  
            else {
                echo '<script language="javascript">
                document.getElementById("mensaje").innerHTML="Se registró el paciente ccorrecctamente.";
                document.getElementById("mensaje").classList.add("error");
                document.getElementById("mensaje").style.visibility="visible";
                </script>';
            }
        }
    }
    desplegarMensaje();
?>