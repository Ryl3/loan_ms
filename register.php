<?php
include_once 'Database.php';
include_once 'User.php';

$database = new Database();
$db = $database->getConnection();

$user = new User($db);

if ($_POST) {
    $user->username = $_POST['username'];
    $user->password = $_POST['password'];
    $user->email = $_POST['email'];
    $user->name = $_POST['name'];
    $user->address = $_POST['address'];
    $user->gender = $_POST['gender'];
    $user->birthdate = $_POST['birthday'];
    $user->age = $_POST['age'];
    $user->contact_number = $_POST['contact_number'];
    $user->bank_name = $_POST['bank_name'];
    $user->bank_account_number = $_POST['bank_account_number'];
    $user->card_holder_name = $_POST['card_holder_name'];
    $user->tin_number = $_POST['tin_number'];
    $user->company_name = $_POST['company_name'];
    $user->company_address = $_POST['company_address'];
    $user->company_phone_number = $_POST['company_phone_number'];
    $user->position = $_POST['position'];
    $user->monthly_earnings = $_POST['monthly_earnings'];
    $user->account_type = $_POST['account_type'];

    // Handling file uploads
    $proof_billing = $_FILES['proof_billing']['name'];
    $valid_id = $_FILES['valid_id']['name'];
    $coe = $_FILES['coe']['name'];

    $target_dir = "uploads/";
    move_uploaded_file($_FILES['proof_billing']['tmp_name'], $target_dir . $proof_billing);
    move_uploaded_file($_FILES['valid_id']['tmp_name'], $target_dir . $valid_id);
    move_uploaded_file($_FILES['coe']['tmp_name'], $target_dir . $coe);

    $user->proof_billing = $target_dir . $proof_billing;
    $user->valid_id = $target_dir . $valid_id;
    $user->coe = $target_dir . $coe;

    if ($user->register()) {
        header("Location: login.php?registration=success");
        exit;
    } else {
        echo "<div class='alert alert-danger'>Unable to register. Please try again.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registration Form</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .centered-submit {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .form-header {
            width: 100%;
            text-align: center;
        }
    </style>
</head>

<body>
    <section class="container-fluid mt-4">
        <header class="form-header mb-4">
            <h1>Registration Form</h1>
        </header>
        <form action="register.php" method="post" enctype="multipart/form-data" class="form row justify-content-center">
            <!-- Column 1: User Information Part 1 -->
            <div class="col-md-2">
                <h3>User Info 1</h3>
                <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter full name" required />
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Enter username" required
                        minlength="6" />
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Enter password" required
                        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                        title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" />
                </div>
                <div class="form-group">
                    <label>Email Address</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter email address" required />
                </div>
            </div>
            <!-- Column 2: User Information Part 2 -->
            <div class="col-md-2">
                <h3>User Info 2</h3>
                <div class="form-group">
                    <label>Account Type</label>
                    <select name="account_type" class="form-control" required onchange="checkPremiumLimit(this)">
                        <option value="Basic">Basic</option>
                        <option value="Premium">Premium</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" name="address" class="form-control" placeholder="Enter address" required />
                </div>
                <div class="form-group">
                    <label>Phone Number</label>
                    <input type="tel" name="contact_number" class="form-control" placeholder="Enter phone number"
                        pattern="\+63[0-9]{10}" required />
                </div>
                <div class="form-group">
                    <label>Birth Date</label>
                    <input type="date" id="birthday" name="birthday" class="form-control" required />
                </div>
                <div class="form-group">
                    <label>Age</label>
                    <input type="text" id="age" name="age" class="form-control" placeholder="Age will be calculated"
                        readonly />
                </div>
                <div class="form-group gender-box">
                    <h4>Gender</h4>
                    <div class="gender-option">
                        <input type="radio" id="check-male" name="gender" value="Male" checked />
                        <label for="check-male">Male</label>
                        <input type="radio" id="check-female" name="gender" value="Female" />
                        <label for="check-female">Female</label>
                    </div>
                </div>
            </div>
            <!-- Column 3: Bank Details -->
            <div class="col-md-2">
                <h3>Bank Details</h3>
                <div class="form-group">
                    <label>Bank Name</label>
                    <input type="text" name="bank_name" class="form-control" placeholder="Enter bank name" required />
                </div>
                <div class="form-group">
                    <label>Bank Account Number</label>
                    <input type="text" name="bank_account_number" class="form-control"
                        placeholder="Enter bank account number" required />
                    <small>8-12 digits</small>
                </div>
                <div class="form-group">
                    <label>Card Holder's Name</label>
                    <input type="text" name="card_holder_name" class="form-control"
                        placeholder="Enter card holder's name" required />
                    <small>Please ensure the card holder's name is correct.</small>
                </div>
                <div class="form-group">
                    <label>TIN Number</label>
                    <input type="text" name="tin_number" class="form-control" placeholder="Enter TIN number" required />
                    <small>9-12 digits</small>
                </div>
            </div>

            <!-- Column 4: Company Information -->
            <div class="col-md-2">
                <h3>Company Info</h3>
                <div class="form-group">
                    <label>Company Name</label>
                    <input type="text" name="company_name" class="form-control" placeholder="Enter company name"
                        required />
                </div>
                <div class="form-group">
                    <label>Company Address</label>
                    <input type="text" name="company_address" class="form-control" placeholder="Enter company address"
                        required />
                </div>
                <div class="form-group">
                    <label>Company Phone Number</label>
                    <input type="tel" name="company_phone_number" class="form-control"
                        placeholder="Enter company phone number" required />
                    <small>Put a number directed to their HR to confirm employment.</small>
                </div>
                <div class="form-group">
                    <label>Position</label>
                    <input type="text" name="position" class="form-control" placeholder="Enter position" required />
                </div>
                <div class="form-group">
                    <label>Monthly Earnings</label>
                    <input type="number" name="monthly_earnings" class="form-control"
                        placeholder="Enter monthly earnings" required />
                </div>
            </div>
            <!-- Column 5: Uploads -->
            <div class="col-md-2">
                <h3>Uploads</h3>
                <div class="form-group">
                    <label>Proof of Billing</label>
                    <input type="file" name="proof_billing" class="form-control" required />
                </div>
                <div class="form-group">
                    <label>Valid ID (Primary)</label>
                    <input type="file" name="valid_id" class="form-control" required />
                </div>
                <div class="form-group">
                    <label>Certificate of Employment (COE)</label>
                    <input type="file" name="coe" class="form-control" required />
                </div>
                <div class="col-12 centered-submit">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="centered-submit">
                    <p>Already have an account? <a href="login.php">Login</a></p>
                </div>
            </div>
        </form>
    </section>
    <script>
        function checkPremiumLimit(select) {
            if (select.value === 'Premium') {
                var xhr = new XMLHttpRequest();
                xhr.open('GET', 'check_premium_limit.php', true);
                xhr.onload = function () {
                    if (this.responseText.trim() === 'limit_reached') {
                        alert('Premium account limit reached. Please select Basic account type.');
                        select.value = 'Basic';
                    }
                };
                xhr.send();
            }
        }
        document.getElementById('birthday').addEventListener('change', function () {
            var birthday = new Date(this.value);
            var age = calculateAge(birthday);
            document.getElementById('age').value = age;
        });

        function calculateAge(birthday) {
            var today = new Date();
            var age = today.getFullYear() - birthday.getFullYear();
            var m = today.getMonth() - birthday.getMonth();
            if (m < 0 || (m === 0 && today.getDate() < birthday.getDate())) {
                age--;
            }
            return age;
        }
    </script>
</body>

</html>