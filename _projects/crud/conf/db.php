<?php
function dd($data=null)
{
  var_dump($data);
  exit;
}

class Conexao{

  /*  
    * Atributo estático para instância do PDO  
    */  
  private static $pdo;
  private static $ENV_SET;
  private static $file_ini_settings;
  private static $db_set;
  
  /*  
    * Escondendo o construtor da classe  
    */ 
  private function __construct()
  {
     //  
  } 
  
  /*  
    * Método estático para retornar uma conexão válida  
    * Verifica se já existe uma instância da conexão, caso não, configura uma nova conexão  
    */  
  public static function getInstance()
  {
    self::$file_ini_settings = __DIR__.'/my_setting.ini';

    if(file_exists(self::$file_ini_settings))
    {
      if (!isset(self::$pdo))
      {
        self::$ENV_SET = parse_ini_file(self::$file_ini_settings, TRUE);
      
        if (self::$ENV_SET){
          self::$db_set = (self::$ENV_SET['database']) ? self::$ENV_SET['database'] : false;
        }else
        {
          throw new exception('Unable to open "' . self::$file_ini_settings . '".');
        }

        try
        {
          $port = (isset(self::$db_set['port'])) ? "port=".self::$db_set['port'].";" : '';          
          $charset = (isset(self::$db_set['charset'])) ? "charset=".self::$db_set['charset'].";" : '';

          $db_con_str =   
            self::$db_set['driver'].":host=" .self::$db_set['host'].";"
                             .$port.
            'dbname='            .self::$db_set['db_name'].';'
                             .$charset;

          $opcoes = [
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8', 
            PDO::ATTR_PERSISTENT => TRUE
          ];

          self::$pdo = new PDO(
            $db_con_str,
                      self::$db_set['username'], 
                      self::$db_set['password'], 
            $opcoes
          );
        
          self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
        } catch (PDOException $e)
        {
          print "Erro: " . $e->getMessage();
        }
      }
    }else{
      throw new exception('Fail to get database ini settings.');
      die();
    }
     
    return self::$pdo;
  }
}
