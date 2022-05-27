<?php 
//Pour si conflit avec d'autre classe Month
namespace App\Date;

class Month{

    //Array avec les jours de la semaine
    public $days = ['Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi','Dimanche'];
    //Array avec les mois de l'année
    private $months = ['Janvier','Février','Mars','Avril','Mai','Juin','Juillet','Aout','Septembre','Octobre','Novembre','Décembre'];
    //Variable pour les mois et les années
    public $month;
    public $year;
    public $jour;
    public $semaine;
    
    //Constructeur
    public function __construct(?int $month = null,?int $year = null)//par defaut valeur nulle
    {
        if($month === null)
        {
            //donner une valeur par defaut//intval pour le type de la variable
            $month = intval(date('m'));
        }
        if($year === null)
        {
            //donner une valeur par defaut
            $year = intval(date('Y'));
        }
        //Verifier qu'il y a que 12 mois entre 1 et 12
        if($month <1 || $month >12)
        {
            //Classe exception à la racine car déjà dans le php
            throw new \Exception("Le mois $month n'est pas valide");
        }
        if($year <1970 || $year >2100)
        {
            throw new \Exception("L'année n'est pas valide");
        }
        //Recupère les valeurs passée en param
        $this->month = $month;
        $this->year = $year;

    }

    //RENVOI LE PREMIER JOUR DU MOIS
    public function getStartingDay() : \DateTime{
        return new \DateTime("{$this->year}-{$this->month}-01");
    }

    //ECRIS LE MOIS EN TOUTE LETTRE
    public function toString() : string { //le retour sera une chaine de caractère
       return $this->months[$this->month-1] .' '.$this->year;
    }//indice moins 1 pour retourner à 0 dans le tableau 
    
    //Ecris les semaines en toute lettre
    public function toStringW() : string { //le retour sera une chaine de caractère
        return $this->days[$this->semaine-1].' ';
     }

     //RECUPERE LE NOMBRE DE SEMAINE
    public function getWeeks() : int {
        //Notre debut de mois
        $start = $this->getStartingDay();
        //Fin de Mois//clone le start sinon modifie la variable start//modify permet de modifier une date 
        $end = (clone $start)->modify('+1 month -1 day');
        //Attention au mois de janvier qui affiche un nb de semaine neg
        $weeks = intval($end->format('W')) - intval($start->format('W'))+1;
        if($weeks<0)
        {
            $weeks = intval($end->format('W'));
        }
        return $weeks;
    }

    public function getDays() : int{
        $start = $this->getStartingDay();
        $end = (clone $start)->modify('+6 days');
        $jour = intval($end->format('d')) - intval($start->format('d'))+1;
        return $jour;
    }

    //EST CE QUE LE JOUR EST DANS LE MOIS ACTUEL
    public function withinMonth(\DateTime $date): bool{
        return $this->getStartingDay()->format('Y-m') === $date->format('Y-m');
    }

    //RECUPERE LE MOIS SUIVANT
    public function nextMonth() : Month{
        $month = $this->month + 1;
        $year = $this->year;
        if($month > 12){
          $month=1;
          $year +=1;  
        }
        return new Month($month,$year);
    }

    //RECUPERE LE MOIS PRECEDENT
    public function previousMonth() : Month{
        $month = $this->month - 1;
        $year = $this->year;
        if($month < 1){
          $month = 12;
          $year -=1;  
        }
        return new Month($month,$year);
    }
}