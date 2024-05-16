<?php
class User {
    private $conn;
    private $table_name = "users";

    public $id;
    public $username;
    public $password;
    public $email;
    public $name;
    public $address;
    public $gender;
    public $birthdate;
    public $age;
    public $contact_number;
    public $bank_name;
    public $bank_account_number;
    public $card_holder_name;
    public $tin_number;
    public $company_name;
    public $company_address;
    public $company_phone_number;
    public $position;
    public $monthly_earnings;
    public $proof_billing;
    public $valid_id;
    public $coe;
    public $created_at;
    public $updated_at;
    public $account_type;
    public $status;
    public $user_type;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function register() {
        $query = "INSERT INTO " . $this->table_name . " 
        (username, password, email, name, address, gender, birthdate, age, contact_number, bank_name, bank_account_number, card_holder_name, tin_number, company_name, company_address, company_phone_number, position, monthly_earnings, proof_billing, valid_id, coe, created_at, updated_at, account_type, status, user_type) 
        VALUES 
        (:username, :password, :email, :name, :address, :gender, :birthdate, :age, :contact_number, :bank_name, :bank_account_number, :card_holder_name, :tin_number, :company_name, :company_address, :company_phone_number, :position, :monthly_earnings, :proof_billing, :valid_id, :coe, :created_at, :updated_at, :account_type, :status, :user_type)";

        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->username = htmlspecialchars(strip_tags($this->username));
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->address = htmlspecialchars(strip_tags($this->address));
        $this->gender = htmlspecialchars(strip_tags($this->gender));
        $this->birthdate = htmlspecialchars(strip_tags($this->birthdate));
        $this->age = htmlspecialchars(strip_tags($this->age));
        $this->contact_number = htmlspecialchars(strip_tags($this->contact_number));
        $this->bank_name = htmlspecialchars(strip_tags($this->bank_name));
        $this->bank_account_number = htmlspecialchars(strip_tags($this->bank_account_number));
        $this->card_holder_name = htmlspecialchars(strip_tags($this->card_holder_name));
        $this->tin_number = htmlspecialchars(strip_tags($this->tin_number));
        $this->company_name = htmlspecialchars(strip_tags($this->company_name));
        $this->company_address = htmlspecialchars(strip_tags($this->company_address));
        $this->company_phone_number = htmlspecialchars(strip_tags($this->company_phone_number));
        $this->position = htmlspecialchars(strip_tags($this->position));
        $this->monthly_earnings = htmlspecialchars(strip_tags($this->monthly_earnings));
        $this->proof_billing = htmlspecialchars(strip_tags($this->proof_billing));
        $this->valid_id = htmlspecialchars(strip_tags($this->valid_id));
        $this->coe = htmlspecialchars(strip_tags($this->coe));
        $this->created_at = date('Y-m-d H:i:s');
        $this->updated_at = date('Y-m-d H:i:s');
        $this->account_type = htmlspecialchars(strip_tags($this->account_type));
        $this->status = "Pending";
        $this->user_type = "User";

        // bind values
        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":password", $this->password);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":address", $this->address);
        $stmt->bindParam(":gender", $this->gender);
        $stmt->bindParam(":birthdate", $this->birthdate);
        $stmt->bindParam(":age", $this->age);
        $stmt->bindParam(":contact_number", $this->contact_number);
        $stmt->bindParam(":bank_name", $this->bank_name);
        $stmt->bindParam(":bank_account_number", $this->bank_account_number);
        $stmt->bindParam(":card_holder_name", $this->card_holder_name);
        $stmt->bindParam(":tin_number", $this->tin_number);
        $stmt->bindParam(":company_name", $this->company_name);
        $stmt->bindParam(":company_address", $this->company_address);
        $stmt->bindParam(":company_phone_number", $this->company_phone_number);
        $stmt->bindParam(":position", $this->position);
        $stmt->bindParam(":monthly_earnings", $this->monthly_earnings);
        $stmt->bindParam(":proof_billing", $this->proof_billing);
        $stmt->bindParam(":valid_id", $this->valid_id);
        $stmt->bindParam(":coe", $this->coe);
        $stmt->bindParam(":created_at", $this->created_at);
        $stmt->bindParam(":updated_at", $this->updated_at);
        $stmt->bindParam(":account_type", $this->account_type);
        $stmt->bindParam(":status", $this->status);
        $stmt->bindParam(":user_type", $this->user_type);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function authenticate() {
        $query = "SELECT id, password FROM " . $this->table_name . " WHERE username = :username LIMIT 0,1";
        $stmt = $this->conn->prepare($query);

        $this->username = htmlspecialchars(strip_tags($this->username));

        $stmt->bindParam(':username', $this->username);

        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->id = $row['id'];
            $hashed_password = $row['password'];

            if (password_verify($this->password, $hashed_password)) {
                return true;
            }
        }

        return false;
    }
}
?>
