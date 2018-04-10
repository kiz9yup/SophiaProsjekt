<?php
$innlogget = false;
$melding = "";

if (isset($_REQUEST["brukernavn"]) && isset($_REQUEST["passord"])) {

  // NB! Prepared statements er en bedre løsning enn mysqli_real_escape_string
  $brukernavn = mysqli_real_escape_string($dblink, $_REQUEST['brukernavn']);
  $passord = mysqli_real_escape_string($dblink, $_REQUEST['passord']);

  if (gyldigBruker($dblink, $brukernavn, $passord)) {
	  $innlogget = true;
    header("Location: dashboard.php");
  }
  else {
    $melding .= "<p>Feil brukernavn/passord!</p>";
  }
}

if (!$innlogget) {
  echo $melding;
}
?>