<?php
include "connection.php";

header('Content-Type application/json');

global $db;

if(isset($_POST['action']))
{
    //NEW USER SIGN UP 
    //takes info from form data in the POST
    if($_POST['action'] == 'signup') 
    {
        $sql = "insert into users (FirstName, LastName, EmailAddress, Location, UserName, Password) values (:FirstName, :LastName, :EmailAddress, :Location, :UserName, :Password)"
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':Firstname,' $_POST['FirstName']);
        $stmt->bindValue(':LastName,' $_POST['LastName']);
        $stmt->bindValue(':EmailAddress,' $_POST['EmailAddress']);
        $stmt->bindValue(':Location,' $_POST['Location']);
        $stmt->bindValue(':UserName,' $_POST['UserName']);
        $stmt->bindValue(':Password,' $_POST['Password']);
        $stmt->execute();
        //header(); put redirect to login page here
    }


    //LOGIN API
    //takes info from form data in the POST
    if($_POST['action'] == 'login') 
    {
        //need username and pw to login
        if(isset($_POST['username']) && isset($_POST['password']));
        {
            
            $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);

            //sql to get a matching username from the DB. 
            $sql = " select * from users where username = :username";
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':username', $username);
            $stmt->execute();
            $result = $stmt->fetchAll();

            if($result) //if username has a match in DB, check password next
            {            
                if($result[0]['password']) === $password
                {
                    header("");//redirect to profile page
                }
                else
                {
                    header("");//send to login page
                }                
            }
            //if no username match, send them back to registration page
            else
            {
                header("");//send to login page      
            }
        }
    }
    
    
    //NEW FOOD REQUEST
    //sends POST data from form to DB 
    if($_POST['action'] == 'foodrequest') //update with correction action if needed
    {
        //create new order, status will always be 1 for open on a new order
        $sql = "insert into orders (UserID, FamilySize, Status, PickupLocation) values (:UserID, :FamilySize, 1, :PickupLocation)"
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':UserID,' $_POST['UserID']);
        $stmt->bindValue(':FamilySize,' $_POST['FamilySize']);
        $stmt->bindValue(':PickupLocation,' $_POST['PickupLocation']);
        $stmt->execute();

        //$ordernum = get max order number and +1

        //add items to orderitems
        $sql = "insert into orderitems (OrderID, FoodID) values (:OrderID :fooditem)";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':OderID,' $ordernum);
        $stmt->bindValue(':fooditem,' $_POST['fooditem']);
        $stmt->execute();

        //header(); put redirect location here if neccessary
    }
};

?>
