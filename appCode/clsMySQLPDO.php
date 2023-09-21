<?php
  include("clsConfig.php");
  class clsMysql
  {
    public $user;
    public $pass;
    public $dbhost;
    public $dbname;
    public $params;
    public $sqlsrv_conn; // Database connection handle
    public $DEPURAR;   
    public $qq; // query para mostrar en pantalla, depurar.
    public $MQ; // bandera para mostrar los query o no mostrarlos

    public function __construct()
    {  
      $this->conectar(0);
    }
   
    public function conectar($i)
    {
      $objConfig = new clsConfig();
      $this->user = $objConfig->BD_USER[$i];
      $this->pass = $objConfig->BD_PWS;
      $this->dbhost = $objConfig->BD_HOST;
      $this->dbname = $objConfig->BD_DB;
      $this->DEPURAR =  $objConfig->DEPURAR;
      $this->MQ = false;
      try 
      {		   
        $this->sqlsrv_conn = new PDO("mysql:host=$this->dbhost;Database=$this->dbname;" , "$this->user", "$this->pass");
        $this->sqlsrv_conn->exec("set names utf8");			
      } 
      catch (PDOException $e)
      { 
        if ($i + 1 > 4)
        {
          die( print_r( $e->getMessage() ) );
        }
        else
        {
          $this->conectar($i+1);    
        }
      }
    }

    public function close()
    {
   	  $this->sqlsrv_conn = null;
    }

    public function mostrarQuery()
    {
	    if(is_array($this->params))
        foreach($this->params as $index=>&$value)
			  $this->qq.= "'".$value."',";
      else if($this->params!="")
	   	  $this->qq.="'".$this->params."',"; 
		 
		  $this->qq = substr($this->qq,0,(strlen($this->qq)-1)); 
		  echo "<span style='color:#8E1345'><b>".$this->qq."</b></span>"; 
    }	

    public function ejecutaSPSafe($SP, $params,$MQ=false)
    {
      try 
      { 
        $query = "CALL akconcep_equipo2.".$SP."( ";
        $this->MQ = $MQ;
        $this->qq = $query;
        $this->params = $params;

        if(is_array($params))
        {
          foreach($params as $index=>$value)
          {  
            $query.="?,";
          }
          $query = substr($query,0,(strlen($query)-1)); //quita la ultima coma ,
        }
        else if($params!=""){$query.="?"; }  // un solo parametro                                           
        $query.=") ";  
    
	      /* BIND PARAMS */
 	      $i = 1;
	      $stmt = $this->sqlsrv_conn->prepare($query); // se prepara el query
	      if(is_array($params))
        {
          foreach($params as $index=>&$value)
          {	
		 	      $stmt->bindParam($i, $value, PDO::PARAM_STR);
            $i+=1;
          }
        }
        else if($params!="")
        { 
          $stmt->bindParam($i,$params, PDO::PARAM_STR); 
        } 
	  
		    $stmt->execute();
		    $rs = $stmt->fetchAll();

    	  // if($qq)$this->mostrarQuery();
        if($this->DEPURAR || $this->MQ)
          $this->mostrarQuery();
        
		    return $rs;

      }
      catch (Exception $e) 
      { 
        echo  $e->getMessage();  
      } 
   }//fin funcion ejecutaSPSafe 

   /*CALL SP_Name("valP1","valP2","..");*/
}
?>