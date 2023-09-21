<?PHP
class clsConfig
{
       public $BD_HOST;     
       public $BD_USER = array("akconcep_equipo2"); 
       public $BD_PWS;  
       public $BD_DB;
	   public $DEPURAR; 
	   
	  public function __construct()
	  {
		$this->BD_HOST = "67.227.144.192";   
		$this->BD_PWS ="T)OHzjqD}rg]";    
		$this->BD_DB ="akconcep_equipo2";
		$this->DEPURAR = false; // false
	  }	
}
?>