<?php
require_once('dbFunction.php');

// Constant
const USER_SESSION_KEY = 'user';

// Session_start.
session_start();

// --- Utilities ----------------------------------------
function displayError($errors, $name) {
    if(isset($errors[$name]))
        echo "<div class='text-danger'>{$errors[$name]}</div>";
}

function displayValue($form, $name) {
    if(isset($form[$name]))
        echo 'value="' . htmlspecialchars($form[$name]) . '"';
}

function displayChecked($form, $name, $value) {
    if(isset($form[$name]) && $form[$name] === $value)
        echo 'checked';
}

function redirect($location) {
    header("Location: $location");
    exit();
}

// --- User Information ----------------------------------
function isUserLoggedIn() {
    return isset($_SESSION[USER_SESSION_KEY]);
}

function getLoggedInUser() {
    return isUserLoggedIn() ? $_SESSION[USER_SESSION_KEY] : null;
}

function loginUser($form) {
    $errors = [];

    $key = 'email';
    if(!isset($form[$key]) || filter_var($form[$key], FILTER_VALIDATE_EMAIL) === false)
        $errors[$key] = 'Email is invalid.';

    $key = 'password';
    if(!isset($form[$key]) || strlen($form[$key]) < 6)
        $errors[$key] = 'Password is required and must contain at least 6 characters.';

    if(count($errors) === 0) {
        $user = getUser($form['email']);

        if($user !== false && $form['password'] === $user['password'])
            // Set session variable to login user.
            $_SESSION[USER_SESSION_KEY] = $user;
        else
            $errors[$key] = 'Login failed, email and / or password incorrect. Please try again.';
    }

    return $errors;
}

function logoutUser() {
    // Go back.
    session_unset();
}

function registerUser($form) {
    $errors = [];

    $key = 'firstname';
    if(!isset($form[$key]) || preg_match('/^\s*$/', $form[$key]) === 1)
        $errors[$key] = 'First name is required.';

    $key = 'lastname';
    if(!isset($form[$key]) || preg_match('/^\s*$/', $form[$key]) === 1)
        $errors[$key] = 'Last name is required.';

    $key = 'email';
    if(!isset($form[$key]) || filter_var($form[$key], FILTER_VALIDATE_EMAIL) === false)
        $errors[$key] = 'Email is invalid.';
    else if(getUser($form[$key]) !== false)
        $errors[$key] = 'Email is already registered.';

    $key = 'phone';
    if(!isset($form[$key]) || preg_match('/^\+61 4\d{2} \d{3} \d{3}$/', $form[$key]) !== 1)
        $errors[$key] = 'Phone number is invalid. Must be in the format: +61 4XX XXX XXX';

    $key = 'age';
    if(!isset($form[$key]) || filter_var($form[$key], FILTER_VALIDATE_INT,
        ['options' => ['min_range' => 13, 'max_range' => 120]]) === false)
        $errors[$key] = 'Minimum age is 13.';

    $key = 'student-status';
    if(!isset($form[$key]) || preg_match('/^true|false$/', $form[$key]) !== 1)
        $errors[$key] = 'Must select student status.';

    $key = 'employment-status';
    if(!isset($form[$key]) || preg_match('/^true|false$/', $form[$key]) !== 1)
        $errors[$key] = 'Must select employment status.';
    
    $key = 'password';

    if (empty($_POST["password"])) {
        $errors["password"] = "<div class='registration-container' style='color:red;'>Please enter your password.</div>";

    } else if (!preg_match("/^[A-Z][A-Za-z0-9\s_\-)]+[0-9]$/", $_POST["password"])) {
        $errors['password'] = '';
        if (strlen($_POST["password"]) < 8) {
            $errors["password"] = $errors["password"] . "<div class='registration-container' style='color:red;'>Password must be at least 8 characters.</div>";
        }

        $legit = false;
        for ($i = 0; $i < strlen($_POST["password"]); $i += 1) {
            if ($_POST["password"][$i] == "$" || $_POST["password"][$i] == "_") {
                $legit = true;
            }
        }

        if (!$legit) {
            $errors["password"] = $errors["password"] . "<div class='registration-container' style='color:red;'>Password must include '$' or '_'.</div>";        
        }

        if (!preg_match("/[A-Z]/", $_POST["password"][0])) {
            $errors["password"] = $errors["password"] . "<div class='registration-container' style='color:red;'>Password must START with an uppercase letter.</div>";
        }

        if (!preg_match("/[0-9]/", $_POST["password"][strlen($_POST["password"])-1])) {
            $errors["password"] = $errors["password"] . "<div class='registration-container' style='color:red;'>Password must END with a number.</div>";
        }
    }
    
    $key = 'confirmPassword';
    if(isset($form['password']) && (!isset($form[$key]) || $form['password'] !== $form[$key]))
        $errors[$key] = 'Match not found with above password.';

    if(count($errors) === 0) {
        // Add user.
        $user = [
            'firstname' => htmlspecialchars(trim($form['firstname'])),
            'lastname' => htmlspecialchars(trim($form['lastname'])),
            'email' => trim($form['email']),
            'phone' => htmlspecialchars(trim($form['phone'])),
            'age' => filter_var($form['age'], FILTER_VALIDATE_INT),
            'student_status' => (int) filter_var($form['student-status'], FILTER_VALIDATE_BOOLEAN),
            'employment_status' => (int) filter_var($form['employment-status'], FILTER_VALIDATE_BOOLEAN),
            'password' => $form['password']
        ];

        insertUser($user);

        // Auto-login
        loginUser([
            'email' => $user['email'],
            'password' => $form['password']
        ]);
    }

    return $errors;
}

function userService($form) {
    $errors = [];

    $key = 'duration';
    if(!isset($form[$key]) || preg_match('/^\s*$/', $form[$key]) === 1)
        $errors[$key] = 'Duration is required.';

    if(!isset($form[$key]) || filter_var($form[$key], FILTER_VALIDATE_INT,
        ['options' => ['min_range' => 1, 'max_range' => 480]]) === false)
        $errors[$key] = 'Duration must be a whole number and not be less than 1 or greater than 480.';


    if(count($errors) === 0) {
        // Add user.
        $service = [
            'email' => $_SESSION[USER_SESSION_KEY]['email'],
            'service_id' => $_GET['id'],
            'service_type' => htmlspecialchars(trim($form['type'])),
            'date_performed' => date('Y-m-d'),
            'duration_minutes' => htmlspecialchars(trim($form['duration'])),
        ];
   
        insertUserService($service);

    }

    return $errors;
}

function calculateMeal(){
    if(isset($_POST['type_id']) && isset($_POST['calories'])){

        if($_POST['type_id'] != '' && $_POST['calories'] != ''){
            $type = $_POST['type_id'];
            $calories = $_POST['calories'];

            $data = calculateMealDB($type);

            $sum = 0;
            $name = '';
            $acumulate = '';
            $sums=0;
            $kilojoules = '';
            $record = [];
            
            foreach($data as $row){
                $name .= $row['name'];
                $kilojoules = $row['kilojoules'];
                $sum += $row['kilojoules'];
                $acumulate .= '-'.$sum.'-';
                $sums += $sum;

                if($sums <= $calories){
                    $record []  = [
                        'meal_id'   => $row['meal_id'],
                        'name'      => $row['name'],
                        'kilojoules'=> $kilojoules,
                        'acumulate' => $acumulate,
                        'sum'       => $sums
                    ];  
                }
            }           
            if(count($record) > 0){
                $record_end = end($record);
                $totals = $record_end['sum'];


                $list = '<h4>Total : '.$totals.'</h4>';
                $list .= '<ul class="list-group">';
                foreach($record as $item){
                    $record = [
                        'email'     => $_SESSION[USER_SESSION_KEY]['email'],
                        'meal_id'   => $item['meal_id'],
                        'servings'  => 1
                    ];

                    $check = checkMeal($_SESSION[USER_SESSION_KEY]['email'], $item['meal_id']);

                    if(empty($check)){
                        insertUserMeal($record);

                    }else{
                        $update = [
                            'email'     => $_SESSION[USER_SESSION_KEY]['email'],
                            'meal_id'   => $item['meal_id'],
                        ];
                        updatetUserMeal($update);
                    }
                    $list .= '<li class="list-group-item d-flex justify-content-between align-items-center">'.$item['name'].'
                                <span class="badge badge-primary badge-pill">'.$item['kilojoules'].'</span>
                            </li>';
                }
                $list .= '</ul>';
            }else{
                $list = 'Number of Calories too small';
            }
            return $list;
        }else{
            return '<h5 class="error">Type Or Calories is Required</h5>';
        }

    }else{
        return '';
    }

}
