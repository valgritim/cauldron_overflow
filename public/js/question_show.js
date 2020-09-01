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