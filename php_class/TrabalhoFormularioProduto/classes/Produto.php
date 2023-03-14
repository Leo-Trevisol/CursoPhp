<?php

require_once __DIR__ . '/helpers/Check.php';

class Produto{

    private static $conn;
    private $file1 = null;
        
    public static function getConnection()
    {
        if (empty(self::$conn)) {
            $connection = parse_ini_file('config/produto.ini');
            self::$conn = new PDO(
                "mysql:host={$connection['host']};port={$connection['port']};dbname={$connection['name']}",
                "{$connection['user']}",
                "{$connection['pass']}",
                [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8']
            );
            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        
        return self::$conn;
    }

    public static function save($produto)
    {

        $newfilename = null;

        $conn = self::getConnection();
        if (empty($produto['id'])) {
            $result = $conn->query("SELECT max(id) as next FROM produto");
            $row = $result->fetch();
            $produto['id'] = (int)$row['next'] + 1;
            $produto['inicio_promocao'] = $produto['inicio_promocao'] ? Check::Data($produto['inicio_promocao']) : null;
            $produto['fim_promocao'] = $produto['fim_promocao'] ? Check::Data($produto['fim_promocao']) : null;

            $folder = __DIR__ . "/uploads";

            if(!file_exists($folder) || !is_dir($folder)){
                //MKDIR CRIA DIRETORIOS
                mkdir($folder, 0755);
            }
    
            $getpost = filter_input(INPUT_GET, 'post', FILTER_VALIDATE_BOOLEAN);
            
            if($_FILES && !empty($_FILES['arquivo']['name'])){
               
                    $fileupload = $_FILES['arquivo'];
                   
    
                    $allowedtypes = [
                        'image/jpg',
                        'image/jpeg',
                        'image/png',
                        'application/pdf'
                    ];
    
                    $newfilename = time() . mb_strstr($fileupload['name'], '.');

                    $file1 = ($newfilename);
                    
                    if(in_array($fileupload['type'], $allowedtypes)){
                        if(move_uploaded_file($fileupload['tmp_name'], __DIR__ . "/uploads/{$newfilename}")){
                        }
                    }

                }

                $produto['arquivo'] = $file1;
            

            $sql = "INSERT INTO produto
                                (id, nome, descricao, tags, link_alternativo, codigo, unidade_medida, marca_fabricante, categoria, categorias_facebook, categorias_google, descricao_completa, altura, largura, profundidade, peso, arquivo, preco_custo, margem_lucro, preco_cheio, porcentagem_desconto, preco_promocional, inicio_promocao, fim_promocao, hotsite) 
                                
                                VALUES

                                (:id, :nome, :descricao, :tags, :link_alternativo, :codigo, :unidade_medida, :marca_fabricante, :categoria, :categorias_facebook, :categorias_google, :descricao_completa, :altura, :largura, :profundidade, :peso,  :arquivo, :preco_custo, :margem_lucro, :preco_cheio, :porcentagem_desconto, :preco_promocional, :inicio_promocao, :fim_promocao, :hotsite)";

                               

        } else {
            $folder = __DIR__ . "/uploads";

            if(!file_exists($folder) || !is_dir($folder)){
                //MKDIR CRIA DIRETORIOS
                mkdir($folder, 0755);
            }
    
            $getpost = filter_input(INPUT_GET, 'post', FILTER_VALIDATE_BOOLEAN);
            
            if($_FILES && !empty($_FILES['arquivo']['name'])){
               
                    $fileupload = $_FILES['arquivo'];
                   
    
                    $allowedtypes = [
                        'image/jpg',
                        'image/jpeg',
                        'image/png',
                        'application/pdf'
                    ];
    
                    $newfilename = time() . mb_strstr($fileupload['name'], '.');

                    $file1 = ($newfilename);
                    
                    if(in_array($fileupload['type'], $allowedtypes)){
                        if(move_uploaded_file($fileupload['tmp_name'], __DIR__ . "/uploads/{$newfilename}")){
                        }
                    }

                }

                $produto['arquivo'] = $file1;
                
            $sql = "UPDATE produto SET nome = :nome, descricao = :descricao, tags = :tags, link_alternativo = :link_alternativo, codigo = :codigo, unidade_medida = :unidade_medida, marca_fabricante = :marca_fabricante, categoria = :categoria, categorias_facebook = :categorias_facebook, categorias_google = :categorias_google, descricao_completa = :descricao_completa, altura = :altura, largura = :largura, profundidade = :profundidade, peso = :peso, arquivo = :arquivo, preco_custo = :preco_custo, margem_lucro = :margem_lucro, preco_cheio = :preco_cheio, porcentagem_desconto = :porcentagem_desconto, preco_promocional = :preco_promocional, inicio_promocao = :inicio_promocao, fim_promocao = :fim_promocao, hotsite = :hotsite WHERE id = :id  ";
        }
        
        $result = $conn->prepare($sql);
        
        return $result->execute(
            [   
                ':id' => $produto['id'],
                ':nome' => $produto['nome'],
                ':descricao' => $produto['descricao'],
                ':tags' => $produto['tags'],
                ':link_alternativo' => $produto['link_alternativo'],
                ':codigo' => $produto['codigo'],
                ':unidade_medida' => $produto['unidade_medida'],
                ':marca_fabricante' => $produto['marca_fabricante'],
                ':categoria' => $produto['categoria'],
                ':categorias_facebook' => $produto['categorias_facebook'],
                ':categorias_google' => $produto['categorias_google'],
                ':descricao_completa' => $produto['descricao_completa'],
                ':altura' => $produto['altura'],
                ':largura' => $produto['largura'],
                ':profundidade' => $produto['profundidade'],
                ':peso' => $produto['peso'],
                ':arquivo' => $produto['arquivo'],
                ':preco_custo' => $produto['preco_custo'],
                ':margem_lucro' => $produto['margem_lucro'],
                ':preco_cheio' => $produto['preco_cheio'],
                ':porcentagem_desconto' => $produto['porcentagem_desconto'],
                ':preco_promocional' => $produto['preco_promocional'],
                ':inicio_promocao' =>  Check::Data($produto['inicio_promocao']),
                ':fim_promocao' => Check::Data($produto['fim_promocao']),
                ':hotsite' => $produto['hotsite']
            ]
        );
    }

          /**
         * Busca uma Pessoa pelo seu $id
         * @param $id
         *
         * @return mixed
         */
        public static function find($id)
        {
            $conn = self::getConnection();
            $result = $conn->query("SELECT * FROM produto WHERE id='{$id}'");
            
            return $result->fetch();
        }
        
        public static function delete($id)
        {
            $conn = self::getConnection();
            $result = $conn->query("DELETE FROM produto WHERE id='{$id}'");
            
            return $result;
        }
        
        public static function all()
        {
            $conn = self::getConnection();
            $result = $conn->query("SELECT * FROM produto");
            
            return $result;
        }

}

?>