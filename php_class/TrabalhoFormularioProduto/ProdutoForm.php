<?php

require_once __DIR__ . '/classes/Produto.php';

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
            'unidade_medida' => null,
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

    public function options($table)
    {
        $conn = Produto::getConnection();
        $result = $conn->query("SELECT * FROM " . $table)->fetchAll(PDO::FETCH_ASSOC);
        
        if ($result) {
            $options = "<option value='' selected disabled >Selecione uma opção</option>";
            
            foreach ($result as $opt) {
                $value = ($table == 'marca_fabricante' ? 'descricao' :
                    ($table == 'categoria' ? 'descricao' :
                        ($table == 'categorias_facebook' ? 'descricao' :  
                            ($table == 'categorias_google' ? 'descricao' : null
                        ))));
                
                $options .= "<option value=\"{$opt['codigo']}\">{$opt[$value]}</option>";
            }
        } else {
            $options = "<option value='' selected disabled >Cadastre primeiro uma unidade medida.</option>";
        }
        
        return $options;
    }

    public function edit($param)
    {
        try {
            $id = (int)$param['id'];
            $produto = Produto::find($id);
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

    public function importPhoto(){
        $folder = __DIR__ . "/uploads";

        if(!file_exists($folder) || !is_dir($folder)){
            //MKDIR CRIA DIRETORIOS
            mkdir($folder, 0755);
        }

        $getpost = filter_input(INPUT_GET, 'post', FILTER_VALIDATE_BOOLEAN);
        
        if($_FILES && !empty($_FILES['arquivo']['name'])){
            var_dump($_FILES);
                $fileupload = $_FILES['arquivo'];
                var_dump($fileupload);

                $allowedtypes = [
                    'image/jpg',
                    'image/jpeg',
                    'image/png',
                    'application/pdf'
                ];

                $newfilename = time() . mb_strstr($fileupload['name'], '.');

                if(in_array($fileupload['type'], $allowedtypes)){
                    if(move_uploaded_file($fileupload['tmp_name'], __DIR__ . "/uploads/{$newfilename}")){
                        echo "<p class = 'trigger accept' > ARQUIVO ENVIADO COM SUCESSO </p>";
                    }else{
                        echo "<p class = 'trigger error' > ERRO INESPERADO </p>";
                    }
                }else{
                    echo "<p class = 'trigger warning' > TIPO DE ARQUIVO NAO PERMITIDO </p>";
                }
            }elseif($getpost && !$_FILES){
                echo "<p class = 'trigger warning' > ARQUIVO MUITO GRANDE  </p>";
            }else{
                echo "<p class = 'trigger accept' > SELECIONE O ARQUIVO ANTES DE ENVIAR </p>";
            }
    }

    public function show()
    {
        $this->html = str_replace(
            ['{id}', '{nome}', '{descricao}', '{tags}', '{link_alternativo}', '{codigo}', '{unidade_medida}', '{marca_fabricante}', '{categoria}', '{categorias_facebook}', '{categorias_google}', '{descricao_completa}', '{altura}', '{largura}', '{profundidade}', '{peso}', '{arquivo}', '{preco_custo}', '{margem_lucro}', '{preco_cheio}', '{porcentagem_desconto}', '{preco_promocional}', '{inicio_promocao}', '{fim_promocao}', '{hotsite}'],
            [   
                $this->data['id'],
                $this->data['nome'],
                $this->data['descricao'],
                $this->data['tags'],
                $this->data['link_alternativo'],
                $this->data['codigo'],
                $this->data['unidade_medida'],
                self::options('marca_fabricante'),
                self::options('categoria'),
                self::options('categorias_facebook'),
                self::options('categorias_google'),
                $this->data['descricao_completa'],
                $this->data['altura'],
                $this->data['largura'],
                $this->data['profundidade'],
                $this->data['arquivo'],
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