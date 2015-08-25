	setTimeout(
		function() {
			$(".caption").click(function () {
				var bid = $(this).attr("id").split('#');
				$('.portfolio-modal.modal.fade.bejegyzes').attr('id',bid[1]);
				console.log("asd: "+bid[1] );
 				$.ajax({ url: '/post.php',
					data: {bid: bid[1]},
					type: 'post',
					success: function(output) {
						$(".modal-body").html(output);
					}
				});	
				window.history.pushState("object or string", "Title", "/#"+bid[1]); // Ha bejegyzésre kattint, url -t beteszi
			});
			$(".close-modal").click(function () {
				window.history.pushState("object or string", "Title", "/"); // Bejegyzés, oldal X = url ürít
			});			
			$(".portfolio-lin2k").click(function () {
				var link = $(this).attr("href");
				window.history.pushState("object or string", "Title", "/"+link); // Ha oldalra kattint, url -t beteszi
			});
			var url = document.URL.split('#');
			url = url[1];
			if(url!=null){
				$( '.caption.'+url ).click (); // Ha url -ből nyitja meg, betölti a bejegyzést
				$( '#page-'+url ).click (); // url -ből oldal betölt
			}
 			return false;
		}, 500);