<?php
// _____ Uils _________________________________________________________________________________

const SERVER = 'rmit.australiaeast.cloudapp.azure.com';
const DATABASE = "s3822620_a2";
const USERNAME = DATABASE;
const PASSWORD = 'Speedfreak1';

const DNS = "mysql:host=" . SERVER . ";dbname=" . DATABASE;

function createConnection() {
    return new PDO(DNS, USERNAME, PASSWORD);
}

// ___ User data ______________________________________________________________________________
function getUsers() {
    $pdo = createConnection();

    $statement = $pdo->prepare('select * from user');

    $statement->execute();

    return $statement->fetchAll();
}

function getUser($email) {
    $pdo = createConnection();

    $statement = $pdo->prepare('select * from user where email = :email');

    $statement->execute(['email' => $email]);

    return $statement->fetch();
}

function insertUser($user) {
    $pdo = createConnection();

    $statement = $pdo->prepare(
        'insert into user
        (email, password, first_name, last_name, phone, age, is_student, is_employed) values
        (:email, :password, :firstname, :lastname, :phone, :age, :student_status, :employment_status)');

    return $statement->execute($user);
}
// ___ Services _________________________________________________________________________________
function getService(){
    $pdo = createConnection();

    $statement = $pdo->prepare('select * from service');

    $statement->execute();

    return $statement->fetchAll();
}

function getServiceDetail() {
    $id = $_GET['id'];
    $pdo = createConnection();

    $statement = $pdo->prepare('select * from service where service_id = :service_id');

    $statement->execute(['service_id' => $id]);
    $row = $statement->fetch();

    return $row['name'];
}

function getServiceByName($key = ''){
    $pdo = createConnection();

    if($key != ''){
        $key = '%'.$key.'%';
        $statement = $pdo->prepare('select * from service where name LIKE :key');
        $statement->execute(['key' => $key]);

    }else{
        $statement = $pdo->prepare('select * from service');
        $statement->execute();
    }  
    
    return $statement->fetchAll();
}

function getServiceInstruction(){
    $id = $_GET['id'];
    $pdo = createConnection();

    $statement = $pdo->prepare('select * from service_instruction where service_id = :service_id');

    $statement->execute(['service_id' => $id]);

    return $statement->fetchAll();
}

function checkInstruction(){
    $type = isset($_POST['type']);

    if($type){
        return true;

    }else{
        return false;
    }
}

function getInstructionContent(){
    $type = $_POST['type'];
    $id = $_GET['id'];

    $pdo = createConnection();

    $statement = $pdo->prepare('select * from service_instruction where service_id = :service_id AND service_type = :type');

    $statement->execute(['service_id' => $id, 'type' => $type]);
    
    $row = $statement->fetch();

    return $row;    
}

function insertUserService($data) {
    $pdo = createConnection();

    $statement = $pdo->prepare(
        'insert into user_service
        (email, service_id, service_type, date_performed, duration_minutes) values
        (:email, :service_id, :service_type, :date_performed, :duration_minutes)');

    return $statement->execute($data);
}

function calculateMealDB($type){
    $pdo = createConnection();

    $statement = $pdo->prepare('select * from meal where type = :type order by rand() ');
    $statement->execute(['type' => $type]);
    $row = $statement->fetchAll();

   return $row;
}
// ___ Meal Plans _________________________________________________________________________________
function insertUserMeal($record){
    $pdo = createConnection();

    $statement = $pdo->prepare(
        'insert into user_meal
        (email, meal_id, servings) values
        (:email, :meal_id, :servings)');

    return $statement->execute($record);
}

function updatetUserMeal($record){
    $pdo = createConnection();

    $statement = $pdo->prepare('UPDATE user_meal SET servings = servings+1 WHERE email = :email AND meal_id = :meal_id');
    $statement->execute($record);


}

function checkMeal($email, $meal_id){
    $pdo = createConnection();

    $statement = $pdo->prepare('select * from user_meal where email = :email AND meal_id = :meal_id ');
    $statement->execute(['email' => $email, 'meal_id' => $meal_id]);

    $row = $statement->fetch();

    return $row;
}

function getChartByEmailDB($service, $email){
    $pdo = createConnection();

    $statement = $pdo->prepare('select service_type, SUM(duration_minutes) AS totals from user_service where service_id = :id AND email = :email GROUP BY service_type');
    $statement->execute(['id' => $service, 'email' => $email]);
    $row = $statement->fetchAll();

   return $row;
}

function getChartByDayDB($service, $email){
    $pdo = createConnection();

    $statement = $pdo->prepare('select service_type, date_performed, COUNT(*) AS totals from user_service where service_id = :id AND email = :email GROUP BY date_performed');
    $statement->execute(['id' => $service, 'email' => $email]);
    $row = $statement->fetchAll();

   return $row;
}

function getChartByHorizontalDB($email){
    $pdo = createConnection();

    $statement = $pdo->prepare('SELECT meal.name, user_meal.servings FROM user_meal 
                                    JOIN meal ON meal.meal_id = user_meal.meal_id
                                WHERE email = :email GROUP BY user_meal.meal_id');
    $statement->execute(['email' => $email]);
    $row = $statement->fetchAll();

    return $row;
}