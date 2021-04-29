$(document).ready(function(){
	$(window).on('scroll', function(){
		let isDesktop = window.matchMedia('only screen and (min-width: 992px)').matches;
		let scrollTop = $(this).scrollTop()
		if(!isDesktop){
			// console.log("its mobile device")
			// console.log(scrollTop)
			mobileScroll(scrollTop)
		}else{
			// console.log("its isDesktop")
			// console.log(scrollTop)
			desktopScroll(scrollTop)
		}
	})
})

function mobileScroll(scrollTop){
	// console.log(scrollTop)

	if(scrollTop > 6557){
		// console.log(scrollTop)
		$('#points--ponsel').addClass('td-fixed')
		$('#kondisi').addClass('td-fixed')
		$('#points--layanan-jasa').css({
			'position': '',
			'top': 0
		})

		if(scrollTop > 7300){
			$('#points--ponsel').removeClass('td-fixed')
			$('#points--elektronik').addClass('td-fixed')
			$('#points--layanan-jasa').css({
				'position': '',
				'top': 0
			})
			if(scrollTop > 11400){
				$('#points--elektronik').removeClass('td-fixed')
				$('#points--otomotif').addClass('td-fixed')
				$('#points--layanan-jasa').css({
					'position': '',
					'top': 0
				})
				if(scrollTop > 12655){
					$('#points--otomotif').removeClass('td-fixed')
					$('#points--anekaproduk').addClass('td-fixed')
					$('#points--layanan-jasa').css({
						'position': '',
						'top': 0
					})
					if(scrollTop > 23072){
						$('#points--anekaproduk').removeClass('td-fixed')
						$('#points--unduh-instant').addClass('td-fixed')
						$('#points--layanan-jasa').css({
							'position': '',
							'top': 0
						})
						if(scrollTop > 23599){
							$('#points--unduh-instant').removeClass('td-fixed')
							$('#points--layanan-jasa').css({
								'position': 'fixed',
								'top': 40
							})
						}

						if(scrollTop > 26573){
							$('#points--layanan-jasa').css({
								'position': '',
								'top': 0
							})
						}
					}
				}
			}
		}
	}
}

function desktopScroll(scrollTop){
	// console.log(scrollTop)
	if(scrollTop > 5517){
		$('#points--ponsel').addClass('td-fixed')
		$('#kondisi').addClass('td-fixed')
		if(scrollTop > 6016 ){
			$('#points--ponsel').removeClass('td-fixed')
			$('#points--elektronik').addClass('td-fixed')
			if(scrollTop > 9699){
				$('#points--elektronik').removeClass('td-fixed')
				$('#points--otomotif').addClass('td-fixed')
				$('#points--layanan-jasa').css({
					'position': '',
					'top': 0
				})
				if(scrollTop > 10600){
					$('#points--otomotif').removeClass('td-fixed')
					$('#points--anekaproduk').addClass('td-fixed')
					$('#points--layanan-jasa').css({
						'position': '',
						'top': 0
					})

					if(scrollTop > 21000){
						$('#points--anekaproduk').removeClass('td-fixed')
						$('#points--unduh-instant').addClass('td-fixed')
						$('#points--layanan-jasa').css({
							'position': '',
							'top': 0
						})
						if(scrollTop > 22100){
							$('#points--unduh-instant').removeClass('td-fixed')
							$('#points--layanan-jasa').css({
								'position': 'fixed',
								'top': 40
							})
							if(scrollTop > 24511){
										// console.log("Ok")
										$('#points--layanan-jasa').css({
											'position': '',
											'top': 0
										})
									}
								}
							}
						}
					}
				}
			}
		}
