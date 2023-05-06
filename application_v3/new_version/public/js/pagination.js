const feedPagination = async () => {
	try {
    $(function() {
      (function(name) {
        var container = $('#pagination-' + name);
        if (!container.length) return;
        var sources = function () {
          let list = tmpRssList.rssList;
          if(!(list && list.length > 0)) list = rssCacheList;
    
          return list;
        }();
        var options = {
          dataSource: sources,
          callback: function (response, pagination) {
            window.console && console.log(response, pagination);
            let i = 0;
            var dataHtml = '';
            const lastElement = sources[sources.length - 1];
    
            $.each(response, function (index, item) {
              if (i === 0) {
                if (item === lastElement) {
                  dataHtml += "<div class='col-lg-6'>";
                } else {
                  dataHtml += "<div class='card-group'>";
                }
              }
              dataHtml += "<div class='card mb-4'>"+
			        "<a href='"+ item.permalink +"' title='"+ item.title +"'><img class='card-img-top' alt='"+ item.title +"' src="+ item.image +" /></a>"+
			        "<div class='card-body'>"+
				      "<div class='small text-muted'>"+ item.date +"</div>"+
				      "<a href='"+ item.permalink +"' title='"+ item.title +"'><h2 class='card-title cut-title h4'>"+ item.title +"</h2></a>"+
				      "<p class='card-text cut-text'>"+ item.description +"</p>"
              if (item.categories) {
                dataHtml += "<a onclick='searchCategory(\""+ item.categories +"\");'>"+
						    "<div class='btn badge bg-primary bg-gradient mb-2'>"+ item.categories +"</div>"+
					      "</a>"
              }
              dataHtml += "</div> <div class='card-footer bg-transparent border-top-0'> <a class='btn btn-primary' href='"+ item.permalink +"'>Read more</a> </div> </div>";
              if (i === 1) {
                dataHtml +="</div>";
                i = 0;
              } else {
                i++;
              }
            });
            container.prev().html(dataHtml);
          }
        };
    
        //$.pagination(container, options);
    
        container.addHook('beforeInit', function () {
          window.console && console.log('beforeInit...');
        });
        container.pagination(options);
    
        container.addHook('beforePageOnClick', function () {
          window.console && console.log('beforePageOnClick...');
          //return false
        });
        })('list');
      })	
	} catch (error) {
		console.error(error);
	}
};