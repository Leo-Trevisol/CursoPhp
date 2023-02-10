<?php
    
    require_once __DIR__ . '/classes/Company.php';
    
    class CompanyForm
    {
        private $html;
        private $data;
        
        public function __construct()
        {
            $this->html = file_get_contents('html/form.html');
            $this->data = [
                'id' => null,
                'name' => null,
                'fantasy' => null,
                'cnpj' => null,
                'cep' => null,
                'address' => null,
                'number' => null,
                'complement' => null,
                'district' => null,
                'city' => null,
                'state' => null,
                'mail' => null,
                'phone' => null
            ];
        }
        
        public function edit($param)
        {
            try {
                $id = (int)$param['id'];
                $person = Company::find($id);
                $this->data = $person;
            } catch (Exception $e) {
                print $e->getMessage();
            }
        }
        
        public function save($param)
        {
            try {
                Company::save($param);
                $this->data = $param;
                print "<div class='trigger trigger-sucess center'><p>Empresa salva com Sucesso!</p></div>";
            } catch (Exception $e) {
                print $e->getMessage();
            }
        }
        
        public function show()
        {
            $this->html = str_replace(
                ['{id}', '{name}', '{fantasy}', '{cnpj}', '{cep}', '{address}', '{number}', '{complement}', '{district}', '{city}',
                '{state}',  '{phone}',  '{mail}' ],
                [
                    $this->data['id'],
                    $this->data['name'],
                    $this->data['fantasy'],
                    $this->data['cnpj'],
                    $this->data['cep'],
                    $this->data['address'],
                    $this->data['number'],
                    $this->data['complement'],
                    $this->data['district'],
                    $this->data['city'],
                    $this->data['state'],
                    $this->data['phone'],
                    $this->data['mail']
                   
                    
                ],
                $this->html
            );
            
            //$this->html = str_replace($search, $this->data, $this->html);
            
            print  $this->html;
        }
        
    }
