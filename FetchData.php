<?php


 include './Internal/Connection.php'; 


 $IDX = $_POST['id'];

 // $statement = $Connect->prepare('SELECT  Product_Data.Product_ID , Product_Data.NameEN , Product_Data.NameAR , Product_Data.Add_Date ,Product_Data.Add_Time , Product_Data.Unit_Price , Product_Data.Avilable , Product_Data.Manifacuring_Date ,Product_Data.Expiration_Date ,  Product_Data.Image_Url_B , Product_Data.Image_Url_S ,Product_Data.Product_Describtion , Product_Data.Product_Note ,Category_Data.Cat_Name , Brand_Data.Brand_Name FROM Product_Data JOIN Brand_Data ON Brand_Data.Brand_ID=Product_Data.Brand_ID JOIN Exer_Client ON Product_Data.Product_ID=Exer_Client.Product_ID JOIN Category_Data ON Category_Data.Cat_ID=Exer_Client.Cat_ID WHERE  Product_Data.NameEN=  '.'%'.$IDX.'%'.' ');


 $statement = $Connect->prepare('SELECT Product_Data.Product_ID,Product_Data.Amount , Product_Data.NameEN , Product_Data.NameAR , Product_Data.Add_Date ,Product_Data.Add_Time , Product_Data.Unit_Price , Product_Data.Avilable , Product_Data.Manifacuring_Date ,Product_Data.Expiration_Date , Product_Data.Image_Url_B , Product_Data.Image_Url_S ,Product_Data.Product_Describtion , Product_Data.Product_Note ,Category_Data.Cat_Name , Brand_Data.Brand_Name FROM Product_Data JOIN Brand_Data ON Brand_Data.Brand_ID=Product_Data.Brand_ID JOIN Exer_Client ON Product_Data.Product_ID=Exer_Client.Product_ID JOIN Category_Data ON Category_Data.Cat_ID=Exer_Client.Cat_ID WHERE Product_Data.NameEN LIKE "%'.$IDX.'%" ');
            $statement->execute();

            $count = $statement->rowCount();

             $R = $statement->fetchAll( PDO::FETCH_ASSOC );

             foreach ($R as $row_inside) {

                      $data['Product_ID']= $row_inside['Product_ID'];
                      $data['NameEN']= $row_inside['NameEN']; 
                      $data['NameAR']= $row_inside['NameAR']; 
                      $data['Add_Date']= $row_inside['Add_Date']; 
                      $data['Add_Time']= $row_inside['Add_Time']; 
                      $data['Unit_Price']= $row_inside['Unit_Price']; 
                      $data['Avilable']= $row_inside['Avilable']; 
                      $data['Manifacuring_Date']= $row_inside['Manifacuring_Date']; 
                      $data['Expiration_Date']= $row_inside['Expiration_Date']; 
                      $data['Image_Url_B']= $row_inside['Image_Url_B']; 
                      $data['Image_Url_S']= $row_inside['Image_Url_S']; 
                      $data['Product_Describtion']= $row_inside['Product_Describtion']; 
                      $data['Product_Note']= $row_inside['Product_Note']; 
                      $data['Cat_Name']= $row_inside['Cat_Name']; 
                      $data['Brand_Name']= $row_inside['Brand_Name']; 
                      $data['Amount']= $row_inside['Amount']; 
                    

                 }

                 	echo json_encode($data);

  // SELECT  Product_Data.Product_ID , Product_Data.NameEN , Product_Data.NameAR , Product_Data.Add_Date ,Product_Data.Add_Time , Product_Data.Unit_Price , Product_Data.Avilable , Product_Data.Manifacuring_Date ,Product_Data.Expiration_Date ,  Product_Data.Image_Url_B , Product_Data.Image_Url_S ,Product_Data.Product_Describtion , Product_Data.Product_Note ,Category_Data.Cat_Name FROM Product_Data JOIN Exer_Client ON Product_Data.Product_ID=Exer_Client.Product_ID JOIN Category_Data ON Category_Data.Cat_ID=Exer_Client.Cat_ID;



                  // SELECT  Product_Data.Product_ID , Product_Data.NameEN , Product_Data.NameAR , Product_Data.Add_Date ,Product_Data.Add_Time , Product_Data.Unit_Price , Product_Data.Avilable , Product_Data.Manifacuring_Date ,Product_Data.Expiration_Date ,  Product_Data.Image_Url_B , Product_Data.Image_Url_S ,Product_Data.Product_Describtion , Product_Data.Product_Note ,Category_Data.Cat_Name , Brand_Data.Brand_Name FROM Product_Data JOIN Brand_Data ON Brand_Data.Brand_ID=Product_Data.Brand_ID JOIN Exer_Client ON Product_Data.Product_ID=Exer_Client.Product_ID JOIN Category_Data ON Category_Data.Cat_ID=Exer_Client.Cat_ID