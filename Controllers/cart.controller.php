<?php

class Cart_Controller extends Controller{

	public static function createCart() {
		// session_start();

		if (!isset($_SESSION['panier'])) {
			$_SESSION['panier'] = array();
			return true;
		} else {
			setcookie("panier", serialize($_SESSION["panier"]), array(
				'expires' => time() + 48 * 60 * 60 * 60,
				'samesite' => 'Lax' // None || Lax  || Strict
			));
			return true;
		}

		if (isset($_COOKIE["panier"])) {
			$_SESSION['panier'] = unserialize($_COOKIE["panier"]);
			return true;
		} else {
			setcookie("panier", serialize($_SESSION["panier"]), array(
				'expires' => time() + 48 * 60 * 60 * 60,
				'samesite' => 'Lax' // None || Lax  || Strict
			));
			return true;
		}

		return false;
	}

	public static function checkProduct($refProduit) {
		$present = false;

		foreach (unserialize($_COOKIE['panier']) as $produit) {
			if ($produit["refProduit"] == $refProduit) {
				$present = true;
				break;
			}
		}

		return $present;
	}

	public static function addProduct($produit) {
    	header('Content-Type: text/json');

		$produitObj = new Produit_Model($produit["refProduit"], $produit["libelle"], $produit["prix"], $produit["img"], "", "", "");
		$tabProduits = (array)$produitObj;
		$tabProduits['qte'] = 1;

		if (self::checkProduct($produitObj->refProduit) == false) {
			array_push($_SESSION['panier'], $tabProduits);
			setcookie("panier", serialize($_SESSION["panier"]), array(
				'expires' => time() + 48 * 60 * 60 * 60,
				'samesite' => 'Lax' // None || Lax  || Strict
			));
			return json_encode($_SESSION['panier']);
		} else {
			for ($i = 0; $i < count($_SESSION['panier']); $i++) {
				if ($produitObj->refProduit == $_SESSION['panier'][$i]["refProduit"]) {
					$_SESSION['panier'][$i]["qte"]++;
				}
			}
			setcookie("panier", serialize($_SESSION["panier"]), array(
				'expires' => time() + 48 * 60 * 60 * 60,
				'samesite' => 'Lax' // None || Lax  || Strict
			));
			return json_encode(count($_COOKIE['panier']));
		}

		return false;
	}

	public static function deleteProduct($data) {
   		header('Content-Type: text/json');

		$refProduit = $data["refProduit"];

		$panier_tmp = array();

		if (isset($_SESSION['panier'])) {
			foreach ($_SESSION['panier'] as $produit) {
				if ((int)$produit["refProduit"] != (int)$refProduit) {
					array_push($panier_tmp, $produit);
				}
			}
		}

		$_SESSION['panier'] = $panier_tmp;
		setcookie("panier", serialize($_SESSION['panier']), array(
			'expires' => time() + 48 * 60 * 60 * 60,
			'samesite' => 'Lax' // None || Lax  || Strict
		));

		unset($panier_tmp);
		return json_encode($_SESSION['panier']);
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
		$nbreProduits = count($_SESSION['panier']);
		return $nbreProduits;
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

?>