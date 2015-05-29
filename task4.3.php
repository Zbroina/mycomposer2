<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Task4. Practice 3: PHP classes</title>
</head>
<body>
<?php
class apartment {
public $number;
public $rooms;
public $area;
public $Nfloor;
public $tenants;
public $SqBalconies;
public $tariffHeating;
public $tariffGarbage;
public $tariffСoldWater;
public $tariffHotWater;
public $tariffGas;
public $tariffElenergy;
public $tariffRate;//квартплата
public $quantityElenergy;//количество употребляемой электроэнергии
public $quantityHotWater;//количество использованной горячей воды
public $quantityСoldWater;//количество использованной холодной воды
public $tenantsDif; //вариация количества жильцов

public function __construct($number,$rooms,$area,$Nfloor,$tenants,$SqBalconies,$tariffHeating,$tariffGarbage,$tariffСoldWater,$tariffHotWater,$tariffGas,$tariffElenergy,$tariffRate,$quantityElenergy,$quantityHotWater,$quantityСoldWater,$tenantsDif){
$this->number=$number;
$this->rooms=$rooms;
$this->area=$area;
$this->Nfloor=$Nfloor;
$this->tenants=$tenants;
$this->SqBalconies=$SqBalconies;
$this->tariffHeating=$tariffHeating;
$this->tariffGarbage=$tariffGarbage;
$this->tariffСoldWater=$tariffСoldWater;
$this->tariffHotWater=$tariffHotWater;
$this->tariffGas=$tariffGas;
$this->tariffElenergy=$tariffElenergy;
$this->tariffRate=$tariffRate;
$this->quantityElenergy=$quantityElenergy;
$this->quantityHotWater=$quantityHotWater;
$this->quantityСoldWater=$quantityСoldWater;
$this->tenantsDif=$tenantsDif;
}
//метод вычисления площади без балконов
    public function bezBalconiesSq(){      
        return $this->area-$this->SqBalconies;
}
//метод плата за отопление (без балкона)
public function heating(){
        return $this->tariffHeating*$this->bezBalconiesSq();        
    }
// метод плата за вывоз мусора 
    public function garbage(){
       return $this->tariffGarbage*$this->tenants+$this->tenantsDif;
    }
//метод плата за газ 
public function gas(){
       return $this->tariffGas*$this->tenants+$this->tenantsDif;
    }
   //метод плата за квартплату
   public function rate(){
    return $this->tariffRate*$this->area;
	}
	//метод плата за электроэнергию
	public function Elenergy(){
	return $this->tariffElenergy*$this->quantityElenergy;
	}
	//метод плата за холодную воду
	public function СoldWater(){
	return $this->tariffСoldWater*$this->quantityСoldWater;
	}
	//метод плата за горячую воду
	public function HotWater(){
	return $this->tariffHotWater*$this->quantityHotWater;
	}
	//метод вычисления суммы коммунальных платежей
    public function allApartmentPayment(){
        return $this->heating()+$this->garbage()+$this->gas()+$this->rate()+$this->Elenergy()+$this->СoldWater()+$this->HotWater();
    }
	//добавляем и удаляем жильцов
	public function quantityTenants(){ 
           return $this -> tenants = $this -> tenants + $this -> tenantsDif;
        }  
}
$yourApartment=new apartment(12,3,82,3,4,5,15,11.5,5.172,25.93,12.73,0.384 ,1.5,80,5,8,-1);
class house extends apartment{
	public $quantityFloor;//количество этажей
    public $quantityPorches;//количество подьездов
	public $roomsFloor1;
    public $apartments=array();//массив квартир
	public $areaTerritory; //территория одного подъезда
    public $tariffLandTax; // тариф налога на землю
    public $tariffElectricity;//тариф на электричество (освещения подъездов) 
    public $generalHousHeating=0;
    public $generalHousGarbage=0;
    public $generalHousСoldWater=0;
    public $generalHousHotWater=0; 
    public $generalHousRate=0;
    public $generalHousGas=0;
    public $generalHousElenergyPubl=0;
    public $generalHousElenergy=0;
    public $generalHousPayment=0;

	function __construct($quantityFloor,$roomsFloor1,$quantityPorches, $areaTerritory,$tariffLandTax,$tariffElectricity) {          
      $this->quantityFloor = $quantityFloor;
	  $this->roomsFloor1=$roomsFloor1;
	  $this->quantityPorches = $quantityPorches;
      $this->areaTerritory = $areaTerritory;
	  $this->tariffLandTax=$tariffLandTax;
      $this->tariffElectricity=$tariffElectricity;
      $this->allApartments();
    }
// метод вычисления количества квартира в доме
   public function apartmentsHouse(){ 
       return $this->roomsFloor1*$this->quantityFloor*$this->quantityPorches;
   }
 //метод вычисления площади территории,отведенной для дома
   public function areaTerritoryHouse(){ 
       return $this->areaTerritory*$this->quantityPorches;
    }
 //метод вычисления налога на землю в зависимости от размера территории,отведенной для дома
 public function LandTax(){ 
       return $this->tariffLandTax*$this->areaTerritoryHouse();
    }
// метод вычисления затрат на электроэнергию (объем потребляемого электричества для освещения подъездов в зависимости от количества подъездов и этажей)
public function HousElenergyPubl(){ 
       return $this->tariffElectricity*$this->quantityPorches*$this->quantityFloor;
}
// Все квартиры
   public function allApartments(){
       for($i=0;$i<$this->apartmentsHouse();$i++){
		   //($number,$rooms,$area,$Nfloor,$tenants,$SqBalconies,$tariffHeating,$tariffGarbage,$tariffСoldWater,$tariffHotWater,$tariffGas,$tariffElenergy,$tariffRate,$quantityElenergy,$quantityHotWater,$quantityСoldWater,$tenantsDif)
           $this->apartments[$i]=new apartment(rand(1,10),rand(1,3),rand(50,100),rand(1,14),rand(1,6),rand(3,10),15,11.54,5.172,25.93,12.73,0.384,1.5,rand(50,100),rand(1,12),rand(3,24),rand(-2,2));
       }
   }
//Все коммунальные расходы по квартирам из файла квартира
   public function HousePayment(){
        foreach($this->apartments as $i){
           $this->generalHousHeating+=$i->heating();
		   $this->generalHousGarbage+=$i->garbage();
		   $this->generalHousСoldWater+=$i-> СoldWater();
		   $this->generalHousHotWater+=$i->HotWater();
		   $this->generalHousRate+=$i->rate();
		   $this->generalHousGas+=$i->gas();
		   $this->generalHousElenergy+=$i->Elenergy();
       }
	   $this->generalHousPayment+=$this->generalHousHeating+$this->generalHousGarbage+$this->generalHousСoldWater+$this->generalHousHotWater+$this->generalHousRate+$this->generalHousGas+$this->generalHousElenergy;
   }
   
 // метод вычисления коммунальных платежей со всех квартир в этом доме
   public function AllHousePayment(){
       return $this->HousElenergyPubl()+$this->LandTax()+$this->generalHousPayment;
   }
 }
//($number,$quantityFloor,$quantityPorches,$roomsFloor1,$areaTerritory,$tariffLandTax,$tariffElectricity)
$House1=new house(5,12,5,4,150,5,5);

class street extends house{

	public $nameStreet;//Имя улицы
     public $quantityHouses;//количество домов на улице
	 public $generalStreetPayment=0;
	 public $generalLandTax=0;
	 public $StreetElenergyPubl=0;
	 public $generalHousePayment=0;
	 public $generalHousePaym=0;
	
	function __construct($nameStreet,$quantityHouses, $areaTerritory) {  
      $this->nameStreet=$nameStreet;	
      $this->quantityHouses = $quantityHouses;
	  $this->areaTerritory = $areaTerritory;
      $this->allHouses();	  
    }
	//расчет кол-ва дворников
	public function quantityJanitors(){                                      	
		return round($this->quantityHouses * $this->areaTerritory / 500);		
	}
	// метод расчета всех коммун.платежей со всех домов 
    public function allHouses(){
        for($j=0;$j<$this->quantityHouses;$j++){
			//($number,$quantityFloor,$quantityPorches,$roomsFloor1,$areaTerritory,$tariffLandTax,$tariffElectricity),house(5,9,5,4,150,25,5);
            $this->houses[$j]=new house(rand(1,10),rand(1,14),rand(1,5),rand(3,4),300,25,5);
        }
    }   
	//коммунальные услуги всех домов по улице(налог на землю + освещение подъездов)
   public function StreetPayment(){
        foreach($this->houses as $j){
           $this->generalLandTax+=$j->LandTax();
		   $this->StreetElenergyPubl+=$j->HousElenergyPubl();
       }
	   $this->generalStreetPayment+=$this->generalLandTax+$this->StreetElenergyPubl;
   }
  // объем коммунальных платежей со всех домов по улице
   public function AllStreetPayment(){
   return $this->generalStreetPayment;
   }
   
}	
//($nameStreet,$quantityHouses, $areaTerritory)
$Street1=new street('Героев Труда',20,300);

class city extends street{
      public $nameCity;
      public $foundationYear;
      public $coordinates;
	  public $homesCity;
      
      public function __construct($nameCity, $foundationYear,$coordinates,$homesCity){
          
          $this->nameCity=$nameCity;
          $this->foundationYear=$foundationYear;
          $this->coordinates=$coordinates;
		  $this->homesCity=$homesCity;
      }
	  //вычисляем бюджет
public function budget(){                                          
		$budgetHomes = 0;
		for($k = 0; $k < $this->homesCity; $k++){
			$budgetHomes = $budgetHomes + rand(150, 400) * 400;
		}
		return $budgetHomes;
	}
	//Население города
public function Population(){
		$arrApart = array(8, 24, 32, 36, 60, 80, 112, 144, 192,224);
		$PopulationHomes = 0;
		for($k = 1; $k <= $this->homesCity; $k++){			
			$PopulationHomes = $PopulationHomes + rand(1, 5) * $arrApart[array_rand($arrApart, 1)];
		}
		return $PopulationHomes;	
	     }
	    public function informat(){
        echo "<br>Название города {$this->nameCity}<br>";
        echo "Год основания {$this->foundationYear}<br>";
        echo "Географические координаты: {$this->coordinates}<br>";
		echo "Население города {$this->Population()} человек <br>";
        echo "<br>Бюджет населенного пункта в зависимости от размера налога на землю: {$this->budget()} грн";
       
          
      }
      
  }
  
$City1=new city("Харьков", 1654, "50° 0' с.ш., 36° 15' в.д.",5050);
$City1->informat();
      ?>
</body>
</html>

