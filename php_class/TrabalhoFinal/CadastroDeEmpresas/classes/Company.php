<?php
    
    class Company
    {
        private static $conn;
        
        public static function getConnection()
        {
            if (empty(self::$conn)) {
                $connection = parse_ini_file('config/company.ini');
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
        
        public static function save($company)
        {
            $conn = self::getConnection();
            if (empty($company['id'])) {
                $result = $conn->query("SELECT max(company_id) as next FROM company");
                $row = $result->fetch();
                $company['id'] = (int)$row['next'] + 1;
                $sql = "INSERT INTO company
                                    (company_id, company_name, company_fantasy, company_cnpj, company_cep, company_address, company_number, company_complement, company_district, company_city, company_state, company_phone, company_mail) VALUES
                                    (:id, :name, :fantasy, :cnpj, :cep, :address, :number, :complement, :district, :city, :state, :phone, :mail)";
            } else {
                $sql = "UPDATE company SET company_name = :name, company_fantasy = :fantasy, company_cnpj = :cnpj, company_cep = :cep, company_address = :address, company_number =:number, company_complement = :complement, company_district = :district, company_city = :city, company_state = :state, company_phone = :phone, company_mail = :mail";
            }
            
            $result = $conn->prepare($sql);
            
            return $result->execute(
                [
                    ':id' => $company['id'],
                    ':name' => $company['name'],
                    ':fantasy' => $company['fantasy'],
                    ':cnpj' => $company['cnpj'],
                    ':cep' => $company['cep'],
                    ':address' => $company['address'],
                    ':number' => $company['number'],
                    ':complement' => $company['complement'],
                    ':district' => $company['district'],
                    ':city' => $company['city'],
                    ':state' => $company['state'],
                    ':phone' => $company['phone'],
                    ':mail' => $company['mail'],
                ]
            );
        }
    
        /**
         * Busca uma Empresa pelo seu $id
         * @param $id
         *
         * @return mixed
         */
        public static function find($id)
        {
            $conn = self::getConnection();
            $result = $conn->query("SELECT * FROM company WHERE company_id='{$id}'");
            
            return $result->fetch();
        }
        
        public static function delete($id)
        {
            $conn = self::getConnection();
            $result = $conn->query("DELETE FROM company WHERE company_id='{$id}'");
            
            return $result;
        }
        
        public static function all()
        {
            $conn = self::getConnection();
            $result = $conn->query("SELECT * FROM company");
            
            return $result;
        }
    }
