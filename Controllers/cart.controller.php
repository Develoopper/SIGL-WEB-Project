<?php

class Cart_Controller extends Controller{

	public static function createCart() {
		session_start();

		if (!isset($_SESSION['panier'])) {
			$_SESSION['panier'] = array();

			return true;
		}

		if (isset($_COOKIE["panier"])) {
			$_SESSION['panier'] = unserialize($_COOKIE["panier"]);
			return true;
		}

		return false;
	}

	public static function checkProduct($refProduit) {
		/* On initialise la variable de retour */
		$present = false;
		/* On vérifie les numéros de références des articles et on compare avec l'article à vérifier */
		if (array_search($refProduit, unserialize($_COOKIE['panier'])) != "") {
			$present = true;
		}
		return $present;
	}

	public static function addProduct($produit) {

    header('Content-Type: text/json');

		$produitObj = new Produit_Model($produit["refProduit"], $produit["libelle"], $produit["prix"], $produit["img"], "", "");

		if (self::checkProduct($produitObj->refProduit) == false) {
			array_push($_SESSION['panier'], $produitObj);
			setcookie("panier", serialize($_SESSION["panier"]), time() + 48 * 60 * 60 * 60);
			return true;
		}

		return false;
	}

	public static function deleteProduct($data) {
   		header('Content-Type: text/json');

		$refProduit = $data["refProduit"];
		$suppression = false;

		$panier_tmp = array();

		if (isset($_SESSION['panier'])) {
			foreach ($_SESSION['panier'] as $produit) {
				if ($produit->refProduit != $refProduit)
					array_push($panier_tmp, $produit);
			}
		}

		$_SESSION['panier'] = $panier_tmp;
		setcookie("panier", serialize($_SESSION['panier']), time() + 48 * 60 * 60 * 60);

		unset($panier_tmp);
		$suppression = true;
		return $suppression;
	}

	public static function UpdateProduct($ref_article, $qte) {
		/* On compte le nombre d'articles différents dans le panier */
		$nb_articles = count($_SESSION['panier']['id_article']);
		/* On initialise la variable de retour */
		$ajoute = false;
		/* On parcoure le tableau de session pour modifier l'article précis. */
		$i = 0;
		for ($i = 0; $i < $nb_articles; $i++) {
			if ($ref_article == $_SESSION['panier']['id_article'][$i]) {
				$_SESSION['panier']['qte'][$i] = $qte;
				$ajoute = true;
			}
		}

		return $ajoute;
	}


	public static function getTotal() {
		/* On initialise le montant */
		$montant = 0;
		/* Comptage des articles du panier */
		$nb_articles = count($_SESSION['panier']['id_article']);
		/* On va calculer le total par article */
		for ($i = 0; $i < $nb_articles; $i++) {
			$montant += $_SESSION['panier']['qte'][$i] * $_SESSION['panier']['prix'][$i];
		}
		/* On retourne le résultat */
		return $montant;
	}

	public static function getQte() {
		/* On initialise le montant */
		$qte = 0;
		/* Comptage des articles du panier */
		$nb_articles = count($_SESSION['panier']['id_article']);
		/* On va calculer le total par article */
		for ($i = 0; $i < $nb_articles; $i++) {
			$qte += $_SESSION['panier']['qte'][$i];
		}
		/* On retourne le résultat */
		return $qte;
	}

	public static function getNbreProducts() {
		$nb_articles = count($_SESSION['panier']['id_article']);
		return $nb_articles;
	}

	public static function deleteAll() {
		$vide = false;
		unset($_SESSION['panier']);

		if (!isset($_SESSION['panier'])) {
			$vide = true;
		}

		return $vide;
	}
}


/*
 vider_panier();
createPanier();
AddLivre("sjdhjsdh",2,"qqq",50,"sdlsld");

var_dump($_SESSION['panier']);

AddLivre("kskdnjsn",2,"qqq",50,"sdsldk");

supprim_article("kskdnjsn");

var_dump($_SESSION['panier']);
*/
/*createPanier();
AddLivre("sjdhjsdh",2,"qqq",50);
modif_qte("sjdhjsdh", 5);
vider_panier();*/

/*
$a =  array();
$a[1] = "JHJDHJDHJS";
$a[2] = "SDQqs";
$a[3] = "DSDQSdk";
$a[4] = "SQS";

if(array_search("SQS",$a)!=""){
	echo "oui";
}else{
	echo "non";
}




/*$a =  array();
$a[1] = "JHJDHJDHJS";
$a[2] = "SDQqs";
$a[3] = "DSDQSdk";
$a[4] = "SQS";

if(array_search("sh",$a)!=""){
	echo "oui";
}else{
	echo "non";
}


createPanier();
AddLivre("lQKSJKJLKQJSK",2,"qqq",50);
modif_qte("lQKSJKJLKQJSK", 5);
echo montant_panier();

var_dump($_SESSION['panier']);


/*

var_dump($_SESSION['panier']);
session_unset();
session_destroy();
/*session_unset();
session_destroy();*/

/*
createPanier();
session_unset();
session_destroy();

if(isset($_SESSION['panier']['qte'])) echo "oui";
 */
?>