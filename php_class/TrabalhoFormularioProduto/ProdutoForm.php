<?php

require_once __DIR__ . '/classes/Produto.php';
require_once __DIR__ . '/classes/helpers/Check.php';
require_once __DIR__ . '/config/config.php';


class ProdutoForm{

    private $html;
    private $data;

    public function __construct()
    {
        $this->html = file_get_contents('html/form.html');
        $this->data = [
            'id' => null,
            'nome' => null,
            'descricao' => null,
            'tags' => null,
            'link_alternativo' => null,
            'codigo' => null,
            'unidade_medida' => self::options('unidade_medida'),
            'marca_fabricante' => null,
            'categoria' => null,
            'categorias_facebook' => null,
            'categorias_google' => null,
            'descricao_completa' => null,
            'altura' => null,
            'largura' => null,
            'profundidade' => null,
            'peso' => null,
            'arquivo' => null,
            'preco_custo' => null,
            'margem_lucro' => null,
            'preco_cheio' => null,
            'porcentagem_desconto' => null,
            'preco_promocional' => null,
            'inicio_promocao' => null,
            'fim_promocao' => null,
            'hotsite' => null
        ];

    }

    public function options($table, $selected = null)
    {
        $conn = Produto::getConnection();
        $result = $conn->query("SELECT * FROM " . $table)->fetchAll(PDO::FETCH_ASSOC);
        
        if ($result) {
            $options = "<option value='' selected disabled >Selecione uma opção</option>";
            
            foreach ($result as $opt) {
                switch($table){
                    case 'unidade_medida': 
                        $value = 'descricao';
                        break;
                        case 'marca_fabricante': 
                            $value = 'descricao';
                            break;
                            case 'categoria': 
                                $value = 'descricao';
                                break;
                                case 'categorias_facebook': 
                                    $value = 'descricao';
                                    break;
                                    case 'categorias_google': 
                                        $value = 'descricao';
                                        break;
                                        default :
                                        $value =  null;
                                        break;
                        
                            
                }
                       $selected = !empty($selected) ? 'selected' : '';
                
                $options .= "<option value=\"{$opt['codigo']}\">{$opt[$value]}</option>";
            }
        } else {
            $options = "<option {$selected} value='' selected disabled >Cadastre primeiro uma unidade medida.</option>";
        }
        
        return $options;
    }

    public function upload($file)
    {
        $getPost = filter_input(INPUT_GET, 'post', FILTER_VALIDATE_BOOLEAN);

        if ($_FILES && !empty($_FILES['arquivo']['name'])) {
            var_dump($_FILES);
            $fileUpload = $_FILES['arquivo'];
            var_dump($fileUpload);
    
            $allowedTypes = ['image/jpg', 'image/jpeg', 'image/png', 'application/pdf', 'application/vnd.ms-excel'];
    
            $newFileName = time() . mb_strstr($fileUpload['name'], '.');
    
            if(in_array($fileUpload['type'], $allowedTypes)) {
                
                if(move_uploaded_file($fileUpload['tmp_name'], __DIR__."/uploads/{$newFileName}")){
                    echo "<p class='trigger accept'>Arquivo enviado com sucesso!</p>";
            
                }else{
                    echo "<p class='trigger error'>Erro inesperado.</p>";
                }
        
            } else {
                echo "<p class='trigger error'>Tipo de arquivo não permitido.</p>";
            }
    
        } elseif ($getPost && !$_FILES){
            echo "<p class='trigger warning'>Parece que o arquivo é muito grande.</p>";
        } else {
            echo "<p class='trigger warning'>Selecione um arquivo antes de enviar!</p>";
        }
    }

    public function edit($param)
    {
        try {
            $id = (int)$param['id'];
            $produto = Produto::find($id);
            $produto['unidade_medida'] = self::options('unidade_medida', $produto['unidade_medida']);
            $produto['marca_fabricante'] = self::options('marca_fabricante', $produto['marca_fabricante']);
            $produto['categoria'] = self::options('categoria', $produto['categoria']);
            $produto['categorias_facebook'] = self::options('categorias_facebook', $produto['categorias_facebook']);
            $produto['categoria s_google'] = self::options('categorias_google', $produto['categorias_google']);
         

            $this->data = $produto;
        } catch (Exception $e) {
            print $e->getMessage();
        }
    }

    public function save($param)
    {   

       
        try {
            Produto::save($param);
            $this->data = $param;
            print "<div class='trigger trigger-sucess center'><p>Produto salvo com sucesso!</p></div>";
        } catch (Exception $e) {
            print $e->getMessage();
        }
    }

    public function show()
    {
        $this->html = str_replace(
            ['{id}', '{nome}', '{descricao}', '{tags}', '{link_alternativo}', '{codigo}', '{unidade_medida}', '{marca_fabricante}', '{categoria}', '{categorias_facebook}', '{categorias_google}', '{descricao_completa}', '{altura}', '{largura}', '{profundidade}', '{peso}', /*'{arquivo}', */ '{preco_custo}', '{margem_lucro}', '{preco_cheio}', '{porcentagem_desconto}', '{preco_promocional}', '{inicio_promocao}', '{fim_promocao}', '{hotsite}'],
            [   
                $this->data['id'],
                $this->data['nome'],
                $this->data['descricao'],
                $this->data['tags'],
                $this->data['link_alternativo'],
                $this->data['codigo'],
                self::options('unidade_medida'),
                self::options('marca_fabricante'),
                self::options('categoria'),
                self::options('categorias_facebook'),
                self::options('categorias_google'),
                $this->data['descricao_completa'],
                $this->data['altura'],
                $this->data['largura'],
                $this->data['profundidade'],
               // (!empty($this->data['arquivo']) ? : BASE . '/uploads/1678315212.jpg'),
                $this->data['preco_custo'],
                $this->data['margem_lucro'],
                $this->data['preco_cheio'],
                $this->data['porcentagem_desconto'],
                $this->data['preco_promocional'],
                $this->data['inicio_promocao'],
                $this->data['fim_promocao'],
                $this->data['hotsite']
            ],
            $this->html
        );
        
        //$this->html = str_replace($search, $this->data, $this->html);
        
        print  $this->html;
    }



}



?>