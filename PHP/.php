<?php


class Dier {
  public int $id;   // cijfer
  public string $naam;  // string
  public string $ras;
  public int $leeftijd;
  public Asiel $asiel;   // Asiel moet een bestaande klasse zijn
  public string $beschrijving;

  public function toevoegen() {
    // implementatie hier
  }

  public function bewerken(
    string $naam, string $soort, string $ras, int $leeftijd, string $beschrijving
  ) {
    // implementatie hier
  }
}



class asiel {
    public int $id;
    public string $naam;
    public string $locatie;
    public string $contactgegevens;
    public array $dieren = [];

    public function diertoevoegen(
      Dier $dier
    ){

    }
    public function dierverwijderen(
      Dier $dier
    ){
      
    }
}




class Matchh {
  public int $id;
  public gebruiker $gebruikler;
  public dier $dier;

  public function Matchcontroleren(
    gebruiker $gebruiker, dier $dier
  ){}
}




class gebruiker {
  public int $id;
  public gebruiker $gebruiker;
  public string $email;
  private string $wachtwoord;
  public profiel $profiel;

  public function registreren(
    
  ){}
public function inloggen(
  string $gebruiker, string $wachtwoord
){}
}





class swipe {
  public int $id;
  public gebruiker $gebruiker;
  public dier $dier;
  public string $richting;

public function toevoegenSwipe(
  $gebruiker, $dier, string $richting
){}
}





class bericht {
  public int $id;
  public gebruiker $afzender;
  public asiel $ontvanger;
  public string $inhoud;
  public datatime $verzendTijd;

  public function verzenden(

  ){}

  public function ontvanger()
  {
    return [];
  } 
}





class profiel {
  public int $id;
  public string $bio;
  public string $foto;
  public string $voorkeuren;

  public function bewerken(
    string $bio, string $foto, string $voorkeuren
  ){}
}

?>











