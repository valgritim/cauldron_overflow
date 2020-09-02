/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import '../css/app.css';

// Need jQuery? Install it with "yarn add jquery", then uncomment to import it.
import $ from 'jquery';

var $container = $(".js-vote-arrows");

$container.find('a').on('click', function(e){
    e.preventDefault();

    var $link = $(e.currentTarget);

    $.ajax({
        method: "POST",
        url: "/comments/10/vote/"+$link.data('direction'),        
    }).then(function(data){
        $container.find('.js-vote-total').text(data.votes); //votes est la clé du fichier json
    });

});
console.log('Hello Webpack Encore! Edit me in assets/js/app.js');
