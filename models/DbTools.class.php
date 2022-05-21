<?php


/**
 * Class de connexion à la base de données 
 *
 * 
 */
class dbTools
{
    
    public $Host;
    public $Dbname;
    public $Username;
    public $Password;
    public $Dns;
    public $Connexion = NULL; //$Db
        
        

			
	private function connect ()  
	{
		// Connection principale à la base donn�es
			try 
			{
				$this->Connexion = new PDO($this->Dns, $this->Username, $this->Password);
			} 
			catch (PDOException $e) 
			{
				echo 'Connexion échouée : ' . $e->getMessage();
			}

	
		return true;
			
	}     



	/**
		 * D�claration des variables
		 */
		
		/**
		 * @access public
		 * @param string	$Query 
		 * @param int		$Page 
		 * @param int		$NumRows 
		 * @return resultset
		 * @author 
		 * @todo G�rer la pagination
		 */

		
	public function query($Query,$showError = true) 
	{
			
		$ResultSet = $this->Connexion->query($Query);
				
		if ($ResultSet === FALSE && $showError === true) 
		{
			//echo "\nPDO::errorInfo():\n";
			//print_r($this->Connection->errorInfo());
		}
		else 
		{
			return $ResultSet;
		}
				
	}
			
		
	public function simpleQuery($sql)
	{
			
		/* Execution d'une requette sans avoir d'objet en retour mais uniquement 
		le nombre de ligne affectée     */
		$count = $this->Connexion->exec($sql);
			
	}         
			
			
			
	public function __construct() 
	{
		$this->Host = DATABASE_HOST;
		$this->Dbname = DATABASE_NAME;
		$this->Username = DATABASE_USERNAME;
		$this->Password = DATABASE_PASSWORD;
		$this->Dns = "mysql:dbname=$this->Dbname;host=$this->Host;charset=utf8mb4";
		$this->connect();	
		
		return true;
	}        
		

        
}
