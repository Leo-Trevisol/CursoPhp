<?php
    
    require_once __DIR__ . '/classes/Company.php';
    
    class CompanyList
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
                Company::delete($id);
            }
            catch (Exception $e) {
                print $e->getMessage();
            }
        }
        
        public function load()
        {
            try {
                $rows = '';
                foreach (Company::all() as $company) {
                    $row = file_get_contents('html/row.html');
                    
                    $row = str_replace(
                        ['{id}', '{name}', '{address}','{district}','{phone}'],
                        [
                            $company['company_id'],
                            $company['company_name'],
                            $company['company_address'],
                            $company['company_district'],
                            $company['company_phone']
                        ],
                        $row
                    );
                    
                    $rows .= $row;
                }
                $this->html = str_replace(
                    '{rows}',
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
