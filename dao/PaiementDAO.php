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
	
	public function supprimerUnPaiement(Paiement $paiement)
    {
        $basededonnee = BaseDeDonnees::getInstance();

        $requete = $basededonnee->prepare('DELETE FROM paiement 
		WHERE id_paiement=:id_paiement');

        $requete->execute(array('id_paiement' => $paiement->getPaiement()));
    }
}