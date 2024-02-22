<?php 

		$no[]=array();
		$articles[]=array();
		$times[]=array();
		$dates[]=array();
		$qtes[]=array();
		$pas[]=array();
		$pts[]=array();
		$ids[]=array();
		$total=0;
		
$query0=$pdo->prepare("select DATE_FORMAT(date_sortie, '%d-%m-%Y') date from sorties group by DATE_FORMAT(date_sortie, '%d-%m-%Y') order by DATE_FORMAT(date_sortie, '%d-%m-%Y') desc");
		$query0->execute();
$indexDate=0;
while ($data0=$query0->fetch()) {
	$dates[$indexDate]=$data0['date'];
			$query=$pdo->prepare("select id_article,DATE_FORMAT(date_sortie, '%H:%i') as temps,quantite from sorties where DATE_FORMAT(date_sortie, '%d-%m-%Y') LIKE ?");
		$query->execute(array('%'.$dates[$indexDate].'%'));
		$subrow=$query->rowCount();
	
		

	if ($subrow>0) {
		$index=0;
		$i=1;
		while ($data=$query->fetch()) {
		$no[$index]=$i;
		$i++;
		$qtes[$index]=$data['quantite'];
		$ids[$index]=$data['id_article'];
		$times[$index]=$data['temps'];

		$subquery1=$pdo->prepare("select pa_article from entree where id_article=?");
		$subquery1->execute([$ids[$index]]);
		$subData1=$subquery1->fetch();
		$pas[$index]=$subData1['pa_article'];
		$pts[$index]=$pas[$index]*$qtes[$index];
		$total=$total+$pts[$index];
		$subquery2=$pdo->prepare("select nom_article from article where id_article=?");
		$subquery2->execute([$ids[$index]]);
		$rows=$subquery2->rowCount();
		if ($rows>0) {
			$subData2=$subquery2->fetch();
		$articles[$index]=$subData2['nom_article'];
		} else {
			$articles[$index]="Non trouve";
		}

		$index=$index+1;
		}
			$indexDate++;
	}
		
}
 ?>