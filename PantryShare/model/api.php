<?php
include "connection.php";

header('Content-Type application/json');

global $db;


//POST ACTIONS
//INCLUDES LOGIN, SIGNUP, SUBMIT FOODREQUEST, FULLFILLFOODREQUEST
if(isset($_POST['action']))
{
    //NEW USER SIGN UP 
    //takes info from form data in the POST
    if($_POST['action'] == 'signup') 
    {
        $sql = "insert into users (FirstName, LastName, EmailAddress, Location, UserName, Password) values (:FirstName, :LastName, :EmailAddress, :Location, :UserName, :Password)";
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


    //LOGIN
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
                    //header("");//redirect to profile page
                }
                else
                {
                    //header("");//send to login page
                }                
            }
            //if no username match, send them back to registration page
            else
            {
                //header("");//send to login page      
            }
        }
    }
    
    
    //NEW FOOD REQUEST
    //sends POST data from form to DB 
    if($_POST['action'] == 'foodrequest') //update with correction action if needed
    {
        //create new order, status will always be 1 for open on a new order
        $sql = "insert into orders (UserID, FamilySize, Status, PickupLocation) values (:UserID, :FamilySize, 1, :PickupLocation)";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':UserID,' $_POST['UserID']);
        $stmt->bindValue(':FamilySize,' $_POST['FamilySize']);
        $stmt->bindValue(':PickupLocation,' $_POST['PickupLocation']);
        $stmt->execute();

        //get max order number and +1
        $sql = "select MAX(OrderID) from orderitems"; 
        $stmt = $db->prepare($sql);
        $highOrderNum = $db->query($stmt)->fetchAll();
        
        $ordernum = $highOrderNum ++;

        //add items to orderitems. will need to add to this as we figure out how the items are being sent over via POST
        $sql = "insert into orderitems (OrderID, FoodID) values (:OrderID :fooditem)";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':OderID,' $ordernum);
        $stmt->bindValue(':fooditem,' $_POST['fooditem']);
        $stmt->execute();

        //header(); put redirect location here if neccessary
    }

    //FULFILL FOOD REQUEST
    //MUST SENT ORDER ID AND USERID OF THE USER GIVING THE FOOD
    if($_POST['action'] == 'fulfillfoodrequest')
    {
        $sql = 'update orders set Status = 2 where OrderID = (:orderid)';
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':orderid,' $_POST['orderid']);
        $stmt->execute();

        $sql = 'insert into completedorders (OrderID, GiverID, Date) values (:orderid, :giverid, :date)';
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':orderid,' $_POST['orderid']);
        $stmt->bindValue(':giverid,' $_POST['giverid']);
        $date = date("Y-m-d");
        $stmt->bindValue(':date,'$date);
        $stmt->execute();
        //header(); put redirect location here if neccessary
    }


};


//GET ACTIONS
//INCLUDES GETORDERSBYZIP, GETFOODBYCATEGORY, GETCATEGORIES, GETUSERBYID
if(isset($_GET['action']))
{
    //GET ORDERS BY ZIPCODE
    if($_GET['action'] == 'ordersbyzip')
    {
        $zipcode = filter_input(INPUT_GET, 'zipcode', FILTER_SANITIZE_SPECIAL_CHARS);
        $sql = 'select * from orders join users on orders.UserID=users.UserID where users.Location=(:zipcode) and where orders.status=1';
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':zipcode,' $zipcode);
        $qry = $stmt->fetchAll();
        echo json_encode($qry);

    }

    //GET FOODITEMS BY CATEGORY
    if($_GET['action'] == 'getfoodbycategory')
    {   
        $category = filter_input(INPUT_GET, 'category', FILTER_SANITIZE_SPECIAL_CHARS);
        $sql = 'select * from fooditems join categories on fooditems.CategoryID=categories.CategoryID where categories.CategoryName="(:category)"';
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':category,' $category);
        $qry = $stmt->fetchAll();
        echo json_encode($qry); 
    }

    //GET CATEGORIES
    if($_GET['action'] == 'getcategories')
    {
        $category = filter_input(INPUT_GET, 'category', FILTER_SANITIZE_SPECIAL_CHARS);
        $sql = 'select * from categories'
        $stmt = $db->prepare($sql);
        $qry = $stmt->fetchAll();
        echo json_encode($qry); 
    }

    //GET USER BY ID
    if($_GET['action'] == 'getuserbyid')
    {
        $userID = filter_input(INPUT_GET, 'userid', FILTER_SANITIZE_SPECIAL_CHARS);
        $sql = 'select * from users where UserID=(:userid)';
        $stmt->bindValue(':userid,' $UserID);
        $stmt = $db->prepare($sql);
        $qry = $stmt->fetchAll();
        echo json_encode($qry); 
    }


}

?>
