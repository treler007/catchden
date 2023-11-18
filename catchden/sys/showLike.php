<?    
session_start();
	$path=$_SERVER['DOCUMENT_ROOT'];
	require_once "$path/sys/db.php";

    $query=$db -> query("SELECT productslike.id,products.name,productslike.count,products.price,products.material,products.link_img FROM productslike,products WHERE productslike.product_id = products.id AND productslike.user_id=".$_SESSION['user_id'].";");
    

   

    foreach($query as $row){
       static $array = [];

       $array[] = ["id" => $row['id'], "name" => $row['name'],"count"=>$row['count'],"price"=>$row['price'], "link_img"=>$row['link_img'], "material"=>$row['material']];
    }

    echo json_encode($array);