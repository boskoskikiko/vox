<?php 
//profil 

if (isset($_GET['pid'])) {
	//profil na drug registriran korisnik
	$qKor = "SELECT * FROM `korisnici` WHERE `id`= :korisnik";
	$profil = $konektor->prepare($qKor);
	$profil->execute(array(
		':korisnik'=>$_GET['pid']
	));
}else{
	//svoj profil
	$qKor = "SELECT * FROM `korisnici` WHERE `id`= :korisnik";
	$profil = $konektor->prepare($qKor);
	$profil->execute(array(
		':korisnik'=>$_SESSION['id']
	));
}

if (isset($_SESSION['id'])) {//sesija za bezbednos na korisnicite vo slucaj kodot od nekoj pofil e povikan bez da se logira korisnikot

	if ($profil->rowCount()) {//vo slucaj ako ne postoi korisnik primr 43 ....da ispisuva nesto ...
			
		//pokazuvanje na profil
		$fetchProf = $profil->fetchAll(PDO::FETCH_OBJ);
		foreach ($fetchProf as $p){
			echo "<h3>" .$p->name . "</h3>";
			echo $p->username . "<br>";
			echo $p->email ."<br>";
		}
	}else{
		echo "korisnikot ne postoi";
	}
}else{
	echo "Ne ste logirani, <br> Ne mozite da go vidite profilot";
}
 ?>