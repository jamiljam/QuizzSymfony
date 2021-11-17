console.log('hello main')
document.querySelectorAll('.sujet').forEach(function(el){
    let path = el.getAttribute('pathBg')
    el.style.backgroundImage = "url('"+ path +"')"
})
document.querySelectorAll('.possibilite').forEach(function(el){
    el.addEventListener('change', function(){
        if(el.style.background === "white" || el.style.background === ''){
            el.parentElement.querySelectorAll('input').forEach(function(el2){

                el2.parentElement.style.background = "white";
            })
            el.style.background = "orange";
        }
    })
})





 ////////// jQuery /////////

const $ = require('jquery');
$(function(){
    // Get the ul that holds the collection of tags
    $collectionHolder2 = $('ul.reponses');

    // add a delete link to all of the existing tag form li elements

    $collectionHolder2.find('li').each(function() {
        addReponseFormDeleteLink($(this));
    });

    // ... the rest of the block from above
    // Get the ul that holds the collection of tags
    var $reponsesCollectionHolder = $('ul.reponses');
    // count the current form inputs we have (e.g. 2), use that as the new
    // index when inserting a new item (e.g. 2)
    $reponsesCollectionHolder.data('index', $reponsesCollectionHolder.find('input').length);
    $('body').on('click', '.add_item_link', function(e) {
        var $collectionHolderClass = $(e.currentTarget).data('collectionHolderClass');
        // add a new tag form (see next code block)
        addFormToCollection($collectionHolderClass);
    })
})
// $(document).ready(function() { //Pourquoi ready déprécié ?
   
// });

function addFormToCollection($collectionHolderClass) {
    
    var $collectionHolder = $('.' + $collectionHolderClass);
    var prototype = $collectionHolder.data('prototype');
    var index = $collectionHolder.data('index');
    var newForm = prototype;
 
    newForm = newForm.replace(/__name__/g, index);

    $collectionHolder.data('index', index + 1);

    
    var $newFormLi = $('<li></li>').append(newForm);
    
    $collectionHolder.append($newFormLi);

    addReponseFormDeleteLink($newFormLi);
}

function addReponseFormDeleteLink($reponseFormLi) {
    var $removeFormButton = $('<button type="button">Supprimer la réponse</button>');
    $reponseFormLi.append($removeFormButton);

    $removeFormButton.on('click', function(e) {
        // remove the li for the tag form
        $reponseFormLi.remove();
    });
}
