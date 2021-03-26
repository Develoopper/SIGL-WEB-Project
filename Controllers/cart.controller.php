<?php

class Cart_Controller extends Controller{

	public static function createCart() {
		// session_start();

		if (!isset($_SESSION['panier'])) {
			$_SESSION['panier'] = array();
		}

		if (isset($_COOKIE["panier"])) {
			$_SESSION['panier'] = unserialize($_COOKIE["panier"]);
			return true;
		} else {
			setcookie("panier", serialize($_SESSION["panier"]), time() + 48 * 60 * 60 * 60);
			return true;
		}

		return false;
	}

	public static function checkProduct($refProduit) {
		$present = false;

		foreach ($_SESSION['panier'] as $produit) {
			if ($produit["refProduit"] == $refProduit) {
				$present = true;
				break;
			}
		}

		return $present;
	}

	public static function updateQte() {
    	header('Content-Type: text/json');
		$refProduit = $_POST["data"]["refProduit"];
		$qte = $_POST["data"]["qte"];
		foreach ($_SESSION['panier'] as $produit) {
			if ($produit["refProduit"] == $refProduit) {
				$produit["qte"] = $qte;
			}
		}
		echo $qte;
	}

	public static function addProduct($produit) {
    	header('Content-Type: text/json');

		$produitObj = new Produit_Model($produit["refProduit"], $produit["libelle"], $produit["prix"], $produit["img"], "", "", "");
		$tabProduits = (array)$produitObj;
		$tabProduits['qte'] = 1;

		if (self::checkProduct($produitObj->refProduit) == false) {
			array_push($_SESSION['panier'], $tabProduits);
			setcookie("panier", serialize($_SESSION["panier"]), time() + 48 * 60 * 60 * 60);
			return json_encode(count($_SESSION['panier']));
		} else {
			for ($i = 0; $i < count($_SESSION['panier']); $i++) {
				if ($produitObj->refProduit == $_SESSION['panier'][$i]["refProduit"]) {
					$_SESSION['panier'][$i]["qte"]++;
				}
			}
			setcookie("panier", serialize($_SESSION["panier"]), time() + 48 * 60 * 60 * 60);
			return json_encode(count($_SESSION['panier']));
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
		setcookie("panier", serialize($_SESSION['panier']), time() + 48 * 60 * 60 * 60);

		unset($panier_tmp);
		return json_encode($_SESSION['panier']);
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