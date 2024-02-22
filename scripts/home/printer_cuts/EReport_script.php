<?php 
$yearvalue=date("Y");
if ($_GET['year']==1) {
	$yearvalue = date("Y")-1;
}

		$no[]=array();
		$articles[]=array();
		$qtes[]=array();
		$pas[]=array();
		$pts[]=array();
		$ids[]=array();
		$total=0;

			$query=$pdo->prepare("select * from entree where date_entree LIKE ?");
		$query->execute(array('%'.$yearvalue.'%'));
		$subrow=$query->rowCount();
	
		

	if ($subrow>0) {
		$index=0;
		$i=1;
		while ($data=$query->fetch()) {
		$no[$index]=$i;
		$i++;
		$qtes[$index]=$data['quantite'];
		$ids[$index]=$data['id_article'];
		$pas[$index]=$data['pa_article'];
		$pts[$index]=$pas[$index]*$qtes[$index];
		$total=$total+$pts[$index];
		$subquery1=$pdo->prepare("select nom_article from article where id_article=?");
		$subquery1->execute([$ids[$index]]);
		$rows=$subquery1->rowCount();
		if ($rows>0) {
			$subData2=$subquery1->fetch();
		$articles[$index]=$subData2['nom_article'];
		} else {
			$articles[$index]="Non trouve";
		}

		$index=$index+1;
		}
	}
		
 ?>