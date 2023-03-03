<?php
    
    require_once __DIR__ . '/classes/Person.php';
    
    class PersonForm
    {
        private $html;
        private $data;
        
        public function __construct()
        {
            $this->html = file_get_contents('html/form.html');
            $this->data = [
                'id' => null,
                'cep' => null,
                'name' => null,
                'address' => null,
                'district' => null,
                'phone' => null,
                'mail' => null,
                'city' => null,
                'state' => null
            ];
        }
        
        public function edit($param)
        {
            try {
                $id = (int)$param['id'];
                $person = Person::find($id);
                $this->data = $person;
            } catch (Exception $e) {
                print $e->getMessage();
            }
        }
        
        public function save($param)
        {
            try {
                Person::save($param);
                $this->data = $param;
                print "<div class='trigger trigger-sucess center'><p>Pessoa salva com Sucesso!</p></div>";
            } catch (Exception $e) {
                print $e->getMessage();
            }
        }
        
        public function show()
        {
            $this->html = str_replace(
                ['{id}', '{name}', '{cep}', '{address}', '{district}', '{phone}', '{mail}', '{city}', '{state}'],
                [
                    $this->data['id'],
                    $this->data['name'],
                    $this->data['cep'],
                    $this->data['address'],
                    $this->data['district'],
                    $this->data['phone'],
                    $this->data['mail'],
                    $this->data['city'],
                    $this->data['state']
                ],
                $this->html
            );
            
            //$this->html = str_replace($search, $this->data, $this->html);
            
            print  $this->html;
        }
        
    }
?>