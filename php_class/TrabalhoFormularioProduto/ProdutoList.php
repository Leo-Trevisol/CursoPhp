<?php
    
    require_once __DIR__ . '/classes/Produto.php';
    
    class ProdutoList
    {
        private $html;
        
        public function __construct()
        {
            $this->html = file_get_contents('html/list.html');
        }
        
        public function delete($param)
        {
            try {
                $id = (int)$param['id'];
                Produto::delete($id);
            } catch (Exception $e) {
                print $e->getMessage();
            }
        }
        
        public function load()
        {
            try {
                $rows = '';
                foreach (Produto::all() as $produto) {
                    $row = file_get_contents('html/row.html');
                    
                    $row = str_replace(
                        [
                            '{id}', 
                            '{nome}',
                            '{categoria}',
                              '{preco_cheio}'
                             
                        ],
                        [
                                                      
                           $produto['id'],
                         $produto['nome'],
                           $produto['categoria'],
                           $produto['preco_cheio']
                   
                        ],
                        $row
                    );
                    
                    $rows .= $row;
                }
                $this->html = str_replace(
                    '{produtos}',
                    $rows,
                    $this->html
                );
            }
            catch (Exception $e) {
                print $e->getMessage();
            }
        }
        
        public function show()
        {
            $this->load();
            print $this->html;
        }
    }
