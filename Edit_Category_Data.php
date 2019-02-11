<?php


 include './Internal/Connection.php'; 


 $IDX = $_POST['id'];

 $statement = $Connect->prepare('SELECT * FROM `Category_Data` WHERE `Cat_ID`  = '.$IDX.' ');
            $statement->execute();

            $count = $statement->rowCount();

             $R = $statement->fetchAll( PDO::FETCH_ASSOC );

             foreach ($R as $row_inside) {

                      $data['Cat_ID']= $row_inside['Cat_ID'];
                      $data['Cat_Name']= $row_inside['Cat_Name'];
                      $data['Cat_Describtion']= $row_inside['Cat_Describtion']; 
                      $data['Add_Date']= $row_inside['Add_Date']; 
         
                    

                 }

                 	echo json_encode($data);

