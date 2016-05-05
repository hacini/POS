$(document).ready(function() {

   $("#loadmask").hide();
   $('.datedf').datepicker({
      format: "yyyy-mm-dd"
   });

   $(document).ajaxStart(function() {
      $("#resultat").empty();
      $("#loadmask").show();
   });
   $(document).ajaxSuccess(function(event, XMLHttpRequest, ajaxOptions) {
      $("#loadmask").hide();
   });
   $(document).ajaxStop(function() {});

   /*fonction ajax tableau_de_bord*/
   $("#tableau_de_bord_btn").click(function() {
      var date1 = document.getElementById("tableau_de_bord_date1").value;
      var date2 = document.getElementById("tableau_de_bord_date2").value;
      $.ajax({
         url: 'tableau_de_bord.php',
         type: 'POST',
         data: {
            'date1': date1,
            'date2': date2
         },
         dataType: 'html',
         complete: function(resultat, status) {
            console.log(resultat);
         },
         success: function(codehtml, status) {
            console.log(codehtml);
            $(codehtml).appendTo("#resultat");
         },
         error: function(resultat, status, err) {
            console.log(err);
         }
      });
   });
   /*fonction ajax tableau_de_bord*/
   
   /*fonction ajax Meilleures_ventes_produits_btn*/
   $("#Meilleures_ventes_produits_btn").click(function() {
      var date1 = document.getElementById("Meilleures_ventes_produits_date1").value;
      var date2 = document.getElementById("Meilleures_ventes_produits_date2").value;
      $.ajax({
         url: 'Meilleures_ventes_produits.php',
         type: 'POST',
         data: {
            'date1': date1,
            'date2': date2
         },
         dataType: 'html',
         complete: function(resultat, status) {},
         success: function(codehtml, status) {
            $(codehtml).appendTo("#resultat");
         },
         error: function(resultat, status, err) {}
      });
   });
   /*fonction ajax Meilleures_ventes_produits_btn*/
   /*fonction ajax Meilleures_ventes_produits_btn*/
   $("#repartition_des_produits").click(function() {
     
      $.ajax({
         url: 'repartition_des_produits.php',
         type: 'POST',
              dataType: 'html',
         complete: function(resultat, status) {},
         success: function(codehtml, status) {
            $(codehtml).appendTo("#resultat");
         },
         error: function(resultat, status, err) {}
      });
   });
   /*fonction ajax Meilleures_ventes_produits_btn*/
   /*fonction ajax Meilleures_produit_vendus_par_point_de_vente*/
   $("#Meilleures_produit_vendus_par_point_de_vente_btn").click(function() {
      var date1 = document.getElementById("Meilleures_produit_vendus_par_point_de_vente_date1").value;
      var date2 = document.getElementById("Meilleures_produit_vendus_par_point_de_vente_date2").value;
      var nbr_Produit = document.getElementById("Meilleures_produit_vendus_par_point_de_vente_nbr").value;
      var nom_PV = document.getElementById("Meilleures_produit_vendus_par_point_de_vente_pv").value;
      
      $.ajax({
         url: 'Meilleures_produit_vendus_par_point_de_vente_pv.php',
         type: 'POST',
         data: {
            'date1': date1,
            'date2': date2,
            'nbr_Produit': nbr_Produit,
            'nom_PV':nom_PV 
            
         },
         dataType: 'html',
         complete: function(resultat, status) {},
         success: function(codehtml, status) {
            $(codehtml).appendTo("#resultat");
         },
         error: function(resultat, status, err) {}
      });
   });
   /*fonction ajax Meilleures_produit_vendus_par_point_de_vente*/
   /*fonction ajax Montants_TTC*/
   $("#Montants_TTC_btn").click(function() {
      var date1 = document.getElementById("Montants_TTC_date1").value;
      var date2 = document.getElementById("Montants_TTC_date2").value;
  
      var checkedValue = $('.optionsRadios:checked').val();
      

    
      
      $.ajax({
         url: checkedValue+'.php',
         type: 'POST',
         data: {
            'date1': date1,
            'date2': date2
         },
         dataType: 'html',
         complete: function(resultat, status) {},
         success: function(codehtml, status) {
            $(codehtml).appendTo("#resultat");
         },
         error: function(resultat, status, err) {}
      });
   });
   /*fonction ajax Montants_TTC*/
   /*fonction ajax nombre_produits_vendus*/
   $("#nombre_de_ventes_btn").click(function() {
      var date1 = document.getElementById("nombre_de_ventes_date1").value;
      var date2 = document.getElementById("nombre_de_ventes_date2").value;
      var checkedValue = $('.nombre_de_ventes_o:checked').val();
      $.ajax({
         url: checkedValue+'.php',
         type: 'POST',
         data: {
            'date1': date1,
            'date2': date2
         },
         dataType: 'html',
         complete: function(resultat, status) {},
         success: function(codehtml, status) {
            $(codehtml).appendTo("#resultat");
         },
         error: function(resultat, status, err) {}
      });
   });
   /*fonction ajax nombre_produits_vendus*/
   /*fonction ajax nombre_de_ventes_par_pv*/
   $("#nombre_de_ventes_par_pv_btn").click(function() {
      var date1 = document.getElementById("nombre_de_ventes_par_pv_date1").value;
      var date2 = document.getElementById("nombre_de_ventes_par_pv_date2").value;
      $.ajax({
         url: 'nombre_de_ventes_par_pv.php',
         type: 'POST',
         data: {
            'date1': date1,
            'date2': date2
         },
         dataType: 'html',
         complete: function(resultat, status) {},
         success: function(codehtml, status) {
            $(codehtml).appendTo("#resultat");
         },
         error: function(resultat, status, err) {}
      });
   });
   /*fonction ajax nombre_de_ventes_par_pv*/
  
   /*fonction ajax chiffre_affaire*/
   $("#chiffre_affaire_btn").click(function() {
      var date1 = document.getElementById("chiffre_affaire_date1").value;
      var date2 = document.getElementById("chiffre_affaire_date2").value;
      var checkedValue = $('.chiffre_affaire_o:checked').val();
      $.ajax({
         url: checkedValue+'.php',
         type: 'POST',
         data: {
            'date1': date1,
            'date2': date2
         },
         dataType: 'html',
         complete: function(resultat, status) {},
         success: function(codehtml, status) {
            $(codehtml).appendTo("#resultat");
         },
         error: function(resultat, status, err) {}
      });
   });
   /*fonction ajax chiffre_affaire*/
   /*fonction ajax ventes_promotionnelle*/
   $("#ventes_promotionnelle_btn").click(function() {
   
      $.ajax({
         url: 'ventes_promotionnelle.php',
         type: 'POST',
         
         dataType: 'html',
         complete: function(resultat, status) {},
         success: function(codehtml, status) {
            $(codehtml).appendTo("#resultat");
         },
         error: function(resultat, status, err) {}
      });
   });
   /*fonction ajax ventes_promotionnelle*/
   /*fonction ajax quantite_produits_stock*/
   $("#quantite_produits_stock").click(function() {
   
      $.ajax({
         url: 'quantite_produits_stock.php',
         type: 'POST',
         
         dataType: 'html',
         complete: function(resultat, status) {},
         success: function(codehtml, status) {
            $(codehtml).appendTo("#resultat");
         },
         error: function(resultat, status, err) {}
      });
   });
   /*fonction ajax quantite_produits_stock*/
   /*fonction ajax quantite_produits_pv*/
   $("#quantite_produits_pv").click(function() {
   
      $.ajax({
         url: 'quantite_produits_pv.php',
         type: 'POST',
         
         dataType: 'html',
         complete: function(resultat, status) {},
         success: function(codehtml, status) {
            $(codehtml).appendTo("#resultat");
         },
         error: function(resultat, status, err) {}
      });
   });
   /*fonction ajax quantite_produits_pv*/
   /*fonction ajax produits_promotionnelles*/
   $("#produits_promotionnelles_btn").click(function() {
        var date1 = document.getElementById("produits_promotionnelles_date1").value;
      var date2 = document.getElementById("produits_promotionnelles_date2").value;
   
      $.ajax({
         url: 'produits_promotionnelles.php',
         type: 'POST',
      
         dataType: 'html',
         complete: function(resultat, status) {},
         success: function(codehtml, status) {
            $(codehtml).appendTo("#resultat");
         },
         error: function(resultat, status, err) {}
      });
   });
   /*fonction ajax produits_promotionnelles*/
   /*fonction ajax produits_promotionnelles*/
   $("#repartition_des_clients").click(function() {
      
      $.ajax({
         url: 'repartition_des_clients.php',
         type: 'POST',
      
         dataType: 'html',
         complete: function(resultat, status) {},
         success: function(codehtml, status) {
            $(codehtml).appendTo("#resultat");
         },
         error: function(resultat, status, err) {}
      });
   });
   /*fonction ajax produits_promotionnelles*/
    /*fonction ajax repartition_des_clients_vente*/
   $("#repartition_des_clients_vente").click(function() {
      
      $.ajax({
         url: 'repartition_des_clients_vente.php',
         type: 'POST',
      
         dataType: 'html',
         complete: function(resultat, status) {},
         success: function(codehtml, status) {
            $(codehtml).appendTo("#resultat");
         },
         error: function(resultat, status, err) {}
      });
   });
   /*fonction ajax repartition_des_clients_vente*/
     /*fonction ajax abonnes*/
   $("#abonnes").click(function() {
      
      $.ajax({
         url: 'abonnes.php',
         type: 'POST',
      
         dataType: 'html',
         complete: function(resultat, status) {},
         success: function(codehtml, status) {
            $(codehtml).appendTo("#resultat");
         },
         error: function(resultat, status, err) {}
      });
   });
   /*fonction ajax abonnes*/
       /*fonction ajax  methodes_commerciales*/
   $("#methodes_commerciales").click(function() {
      
      $.ajax({
         url: 'methodes_commerciales.php',
         type: 'POST',
      
         dataType: 'html',
         complete: function(resultat, status) {},
         success: function(codehtml, status) {
            $(codehtml).appendTo("#resultat");
         },
         error: function(resultat, status, err) {}
      });
   });
   /*fonction ajax methodes_commerciales*/
    /*fonction ajax  details_ventes*/
   $("#details_ventes").click(function() {
      
      $.ajax({
         url: 'details_ventes.php',
         type: 'POST',
      
         dataType: 'html',
         complete: function(resultat, status) {},
         success: function(codehtml, status) {
            $(codehtml).appendTo("#resultat");
         },
         error: function(resultat, status, err) {}
      });
   });
   /*fonction ajax details_ventes*/
   /*fonction ajax  operations_Caisse*/
   $("#operations_caisse").click(function() {
      
      $.ajax({
         url: 'operations_caisse.php',
         type: 'POST',
      
         dataType: 'html',
         complete: function(resultat, status) {},
         success: function(codehtml, status) {
            $(codehtml).appendTo("#resultat");
         },
         error: function(resultat, status, err) {}
      });
   });
   /*fonction ajax operations_Caisse*/
   /*fonction ajax  suivi_chiffre_affaires*/
   $("#suivi_chiffre_affaires_btn").click(function() {
       var date1 = document.getElementById("suivi_chiffre_affaires_date1").value;
      $.ajax({
         url: 'suivi_chiffre_affaires.php',
         type: 'POST',
             data: {
            'date1': date1
         },
         dataType: 'html',
         complete: function(resultat, status) {},
         success: function(codehtml, status) {
            $(codehtml).appendTo("#resultat");
         },
         error: function(resultat, status, err) {}
      });
   });
   /*fonction ajax suivi_chiffre_affaires*/
    /*fonction ajax  suivi_chiffre_affaires*/
   $("#contactez_nous").click(function() {
      
      $.ajax({
         url: 'contactez_nous.php',
         type: 'POST',
             
       
         dataType: 'html',
         complete: function(resultat, status) {},
         success: function(codehtml, status) {
            $(codehtml).appendTo("#resultat");
         },
         error: function(resultat, status, err) {}
      });
   });
   /*fonction ajax suivi_chiffre_affaires*/



});
  
      
    
      
