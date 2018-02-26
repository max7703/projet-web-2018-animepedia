function afficher_cacher(id)
{
    if(document.getElementById(id).style.display=="none")
    {
        document.getElementById(id).style.display = "block";
        document.getElementById('bouton_'+id).innerHTML='Cacher le texte';
    }
    else
    {
        document.getElementById(id).style.display = "none";
        document.getElementById('bouton_'+id).innerHTML='Afficher le texte';
    }
    return true;
}