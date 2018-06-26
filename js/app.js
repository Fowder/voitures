UIkit.switcher();
UIkit.tooltip();

var recherche = $('#recherche');
var content = $('#content-ajax');
var favoris = $('#heart');
var addCars = $('#add-cars');
var marqueSelect = $('#marque-select');
var inputDisabled = $('#input-disabled');

recherche.keyup(test);
favoris.click(veriffavoris);
addCars.click(changeDatabase);
marqueSelect.click(disableInput);

function test(){
    $.ajax({
        url : '/voitures/ajax/recherche.php?marque='+recherche.val(),
        type : 'GET',
        dataType : 'html',
        success : function(data){
            if(recherche.val() != ""){
                var voiture = data.split(',');
                content.html(voiture[0]);
                content.attr('value', voiture[0]);
            }else{
                content.html('');
            }
        },
        error : function(){
            
        }
     });
}

function veriffavoris(){
    if(favoris[0].attributes[3].nodeValue == 'yes'){
        removefavoris();
        favoris.attr('class', 'white uk-icon');
        UIkit.notification({
            message: 'Voiture bien retirée des favoris.',
            status: 'danger',
            pos: 'top-center',
            timeout: 5000
        });
    }else{
        addfavoris();
        favoris.attr('class', 'red uk-icon');
        UIkit.notification({
            message: 'Voiture bien ajoutée aux favoris.',
            status: 'success',
            pos: 'top-center',
            timeout: 5000
        });
    }
}

function addfavoris(){
    $.ajax({
        url : '/voitures/ajax/favoris.php?id='+favoris[0].attributes[0].value,
        type : 'GET',
        dataType : 'html',
        success : function(){
            favoris.attr('heart', 'yes');
        },
        error : function(){
            
        }
     });
}

function removefavoris(){
    $.ajax({
        url : '/voitures/ajax/removefavoris.php?id='+favoris[0].attributes[0].value,
        type : 'GET',
        dataType : 'html',
        success : function(){
            favoris.attr('heart', 'no');
        },
        error : function(){
            
        }
     });
}

function changeDatabase(){
    $.ajax({
        url : '/voitures/ajax/add-cars-account.php?id='+addCars[0].attributes[1].nodeValue,
        type : 'GET',
        dataType : 'html',
        success : function(){
            window.location.href = '/voitures/list.php';
        },
        error : function(){
            
        }
     });
}

function disableInput(){
    if(marqueSelect.val() == "none"){
        inputDisabled.removeAttr('disabled');
    }else{
        inputDisabled.attr('disabled', '');
    }
}