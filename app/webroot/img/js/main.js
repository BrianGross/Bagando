progressBar = {
    countElmt: 0,
    loadedElmt: 0,

    init: function () {
        var that = this;
        this.countElmt = $('img').length;


        // Ajout container d'éléments
        var $container = $('<div/>').attr('id', 'progress-bar-elements');
        $container.appendTo($('body'));

        // Parcours des éléments à prendre en compte pour le chargement
        $('img').each(function () {
            $('<img/>')
                .attr('src', $(this).attr('src'))
                .on('load error', function () {
                that.loadedElmt++;
                that.updateProgressBar();
            })
                .appendTo($container);
        });
    },

    updateProgressBar: function () {
        $('.meter').stop().animate({
            'width': (progressBar.loadedElmt / progressBar.countElmt) * 100 + '%'
    }, function(){
    	if (progressBar.loadedElmt == progressBar.countElmt) {
    		setTimeout(function(){
    			$('.progress').animate({
    				'top' : '-8px'
    			},function(){
    				$('.progress').remove();
    				$('#progress-bar-elements').remove();

    		});
    		}, 500);
    	}
    	});
    }
};

progressBar.init();