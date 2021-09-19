<?php 

    function est_vide($valeur):bool{
        return empty($valeur);
    }
    function est_numeric($valeur):bool{
        return is_numeric($valeur);
    }
    function valide_user_name( $number,string $key,array &$arrayError):void{
        if (est_vide($number)) {
            $arrayError[$key]='Champs Obligatoire';
        }
    }
    function validefield($valeur,string $key,array &$arrayError){
        if (empty($valeur)) {
            $arrayError[$key]='Champs Obligatoire';
        }elseif (est_numeric($valeur)) {
            $arrayError[$key]='saisir des valeurs';
        }
    }
    function validefield1($valeur,string $key,array &$arrayError){
        if (empty($valeur)) {
            $arrayError[$key]='Champs Obligatoire';
        }elseif (!est_numeric($valeur)) {
            $arrayError[$key]='saisir des entiers';
        }
    }
    function validefield2($valeur,string $key,array &$arrayError){
        if (empty($valeur)) {
            $arrayError[$key]='Champs Obligatoire';
        }elseif (!est_numeric($valeur)) {
            $arrayError[$key]='le code postal est invalide';
        }elseif (!preg_match(VALIDE_POSTAL,$valeur)) {
            $arrayError[$key]='le code est de 5 chiffres';
        }
    }
    function valide_number(string $number,$pattern4):bool{
       /*  $pattern4='#^(\+|00)?(221)?(77|70|75|77|78)[0-9]{7}$#'; */
        if (preg_match($pattern4,$number)) {
           return true;
        }else {
          return false;
        }
    }
    function password_valid_field($password):bool{
        //$pattern='#^[a-zA-Z0-9]{6,10}$#';
        if (preg_match(VALIDE_PASSWORD,$password)) {
            return true;
         }else {
           return false;
         }
    }
    function valide_field_number(string $number,$pattern4,string $key,array &$arrayError):void{
        if (est_vide($number)) {
            $arrayError[$key]='Champs Obligatoire';
        }elseif (!est_numeric($number)) {
            $arrayError[$key]='Veillez Saisir des nombres';
        }elseif (!valide_number($number,$pattern4)) {
            $arrayError[$key]='Le numero n\'est pas bon';
        }
    }
    function valide_email(string $number):bool{
      //  $pattern4='#^[a-zA-Z]{1}\w{4,15}@{1}(gmail|hoymail|yahoo|)\.[a-z]{2,3}$#';
        if (preg_match(VALIDE_EMAIL,$number)) {
            return true;
        }else {
            return false;
        }
    }
    function valide_field_mail(string $number,string $key,array &$arrayError):void{
        if (est_vide($number)) {
            $arrayError[$key]='Champs Obligatoire';
        }elseif (!valide_email($number)) {
            $arrayError[$key]='L\'email n\'est pas valide';
        }
    }
    function validation_password( $valeur,array &$arrayError, string $key ):void{
        if (est_vide($valeur)) {
            $arrayError[$key]= 'le champs est obligatoire';
        }elseif (password_valid_field($valeur)==false) {
            $arrayError[$key]= "la taille est compris entre 6 et 10 ";
        }
      
    }
    function form_valid($arrayError):bool{
        if (count($arrayError)==0) {
            return true;
        }
        return false;
    }
    function genere_reference():int{
        $chiffre='0123456789';
      $number="";
        for ($i=0; $i < 5; $i++) { 
            $number.=$chiffre[rand(0,strlen($chiffre)-1)];
        }
        return $number;
    }

    function valide_nom_categorie($valeur,string $key,array $arrayError):void{
        if (empty($valeur)) {
            $arrayError[$key] = 'Champs obligatoire';
        }
    }
    function valide_prix_categorie($valeur,string $key,array $arrayError):void{
        if (empty($valeur)) {
            $arrayError[$key] = 'Champs obligatoire';
        }elseif (!est_numeric($valeur)) {
            $arrayError[$key] = 'saisir des entiers';
        }
    }
?>