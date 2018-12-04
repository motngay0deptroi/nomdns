<?php
include "randomwithper.php";
$r = new RandomWithPer();
$bau = isset($_POST["BAU"]) ? (int)$_POST["BAU"] : 20;
$cua = isset($_POST["CUA"]) ? (int)$_POST["CUA"] : 20;
$tom = isset($_POST["TOM"]) ? (int)$_POST["TOM"] : 15;
$ca = isset($_POST["CA"]) ? (int)$_POST["CA"] : 15;
$ga = isset($_POST["GA"]) ? (int)$_POST["GA"] : 15;
$nai = isset($_POST["NAI"]) ? (int)$_POST["NAI"] : 15;
$dbs = array(
    "BAU"=>array("name"=>"BẦU", "image"=> "images/bau.jpg", "value"=>$bau),
    "CUA"=>array("name"=>"CUA", "image"=> "images/cua.jpg", "value"=>$cua),
    "TOM"=>array("name"=>"TÔM", "image"=> "images/tom.jpg", "value"=>$tom),
    "CA"=>array("name"=>"CÁ", "image"=> "images/ca.jpg", "value"=>$ca),
    "GA"=>array("name"=>"GÀ", "image"=> "images/ga.jpg", "value"=>$ga),
    "NAI"=>array("name"=>"NAI", "image"=> "images/nai.jpg", "value"=>$nai),
);




?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>GAME BẦU CUA VỚI TỶ LỆ</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
    box-sizing: border-box;
}

body {
    font-family: Arial, Helvetica, sans-serif;
	margin:0;
	padding:0;
}

/* Style the header */
header {
    background-color: #666;
    padding: 30px;
    text-align: center;
    font-size: 35px;
    color: white;
}

/* Create two columns/boxes that floats next to each other */
nav {
    float: left;
    width: 30%;
    height: 300px; /* only for demonstration, should be removed */
    background: #ccc;
    padding: 20px;
}

/* Style the list inside the menu */
nav ul {
    list-style-type: none;
    padding: 0;
}
nav ul li span{
	min-width:50px;
	display:inline-block;
	font-weight:bold;
}
nav ul li input{
	width:50px;
	border-radius: 3px;
	border: 1px solid #bbb;
	padding:3px;
	margin:5px;
}
div.btn{display:block;text-align:center; margin-top:40px;}
div.result{display:block; padding-top:30px; text-align:center}
button[type="submit"]{
	margin:auto;
	font-size:2.0em;
	padding:20px 40px;
	border: 1px solid #bbb;
	cursor:pointer;
}
article {
    float: left;
    padding: 20px;
    width: 70%;
    background-color: #f1f1f1; 
}
section,nav,article {
    min-height: 400px; /* only for demonstration, should be removed */
}

/* Clear floats after the columns */
section:after {
    content: "";
    display: table;
    clear: both;
}

/* Style the footer */
footer {
    background-color: #777;
    padding: 10px;
    text-align: center;
    color: white;
}

/* Responsive layout - makes the two columns/boxes stack on top of each other instead of next to each other, on small screens */
@media (max-width: 600px) {
    nav, article {
        width: 100%;
        height: auto;
    }
}
</style>
</head>
<body>

<header>
  <h2>GAME BẦU CUA VỚI TỶ LỆ NGẦM</h2>
</header>

<form method="post">
	<section>
	  <nav>
	  <h3>TỶ LỆ</h3>
		<ul>
		    <?php
		        $dataRand = array();
		        foreach($dbs as $k => $v)
		        {
		            $dataRand[$k] = $v["value"] ;
		            echo '<li><span>'. $v["name"] .'</span> <input type="text" name="'. $k .'" value="'. $v["value"] .'" />%</li>';
		        }
		    ?>
		</ul>
	  </nav>
	  
	  <article>
		<div class="result">
			<?php
				if ($_SERVER['REQUEST_METHOD'] == 'POST')
				{
					$r->setData($dataRand);
					//$r->addElement('GA', $ga);
					//$r->addElement('NAI', $nai);

					$data = $r->random(1);
					$data2 = $r->random(1);
					$data3 = $r->random(1);
					if(is_array($data)){
						//foreach($data as $d)
						//{
							echo "<img src=\"{$dbs[$data[0]]["image"]}\" /> ";
							echo "<img src=\"{$dbs[$data2[0]]["image"]}\" /> ";
							echo "<img src=\"{$dbs[$data3[0]]["image"]}\" /> ";
						//}
					}else
					{
						echo "Tỷ lệ % không chính xác, dữ liệu không đủ hoặc lớn hơn 100%";
					}
				}
				
			?>
		</div>
		<div class="btn">
			<button type="submit">XEM KẾT QUẢ</button>
		</div>
	  </article>
	</section>
</form>

<footer>
  <p>CODE BY NHTUID</p>
</footer>

</body>
</html>
