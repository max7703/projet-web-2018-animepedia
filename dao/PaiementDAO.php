<?php

require_once MODELEPAIEMENT;

class PaiementDAO
{
	public function obtenirListePaiements()
    {
        $listePaiements = [];
        $basededonnee = BaseDeDonnees::getInstance();

        $requete = $basededonnee->prepare('SELECT * FROM paiement ORDER BY date_paiement DESC');

        $requete->execute();

        foreach($requete->fetchAll() as $paiement)
        {
            if (isset($paiement)) {
                $listePaiements[] = new Paiement($paiement['id_paiement'],
                    $paiement['paiement_id_paypal'],
                    $paiement['id_utilisateur'],
                    $paiement['date_paiement']);
            }
        }

        return $listePaiements;
    }
    public function obtenirListePaiementsParUtilisateur($utilisateurId)
    {
        $listePaiements = [];
        $basededonnee = BaseDeDonnees::getInstance();

        $requete = $basededonnee->prepare('SELECT * FROM paiement WHERE id_utilisateur = :id_utilisateur ORDER BY date_paiement DESC');

        $requete->execute(array('id_utilisateur' => $utilisateurId));

        foreach($requete->fetchAll() as $paiement)
        {
            if (isset($paiement)) {
                $listePaiements[] = new Paiement($paiement['id_paiement'],
                    $paiement['paiement_id_paypal'],
                    $paiement['id_utilisateur'],
                    $paiement['date_paiement']);
            }
        }

        return $listePaiements;
    }
	public function supprimerUnPaiement(Paiement $paiement)
    {
        $basededonnee = BaseDeDonnees::getInstance();

        $requete = $basededonnee->prepare('DELETE FROM paiement 
		WHERE id_paiement=:id_paiement');

        $requete->execute(array('id_paiement' => $paiement->getPaiement()));
    }
	
	public function obtenirPaiementParId($id)
    {
        $basededonnee = BaseDeDonnees::getInstance();
        $id = intval($id);

        $requete = $basededonnee->prepare('SELECT * FROM paiement WHERE id_paiement = :id_paiement');

        $requete->execute(array('id_paiement' => $id));

        $paiement = $requete->fetch();

        return new Paiement($paiement['id_paiement'],
			$paiement['paiement_id_paypal'],
			$paiement['id_utilisateur'],
			$paiement['date_paiement']);

    }
	
	public function ajouterUnPaiement(Paiement $paiement)
    {
        $basededonnee = BaseDeDonnees::getInstance();

        $requete = $basededonnee->prepare('INSERT INTO paiement(paiement_id_paypal, 
		id_utilisateur, 
		date_paiement) 
		
		VALUES(:paiement_id_paypal, 
		:id_utilisateur, 
		:date_paiement)');

        $requete->execute(array('paiement_id_paypal' => $paiement->getPaiement_Id_Paypal(),
            'id_utilisateur' => $paiement->getId_Utilisateur(),
            'date_paiement'=> $paiement->getDate_Paiement()));
    }
}