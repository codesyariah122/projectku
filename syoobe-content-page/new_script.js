new Vue({
	el: '#footer-data',
	data: {
		date: new Date(),
		footer: {
			logo: "public/images/vector_image/logo_syoobe_become_seller.jpg",
			year: "",
			content: "",
			style: {
				'font-size': '16px',
				'margin-top': '-2.5rem',
				'color': '#000',
				'text-align': 'left'
			}
		}
	},

	created(){
		this.footerData(),
		this.scrollFunction()
	},

	methods: {
		footerData(){
			this.footer.year = this.date.getFullYear()
			this.footer.content = "Hak Cipta Terpelihara PT Syoobe"
		},

		backToTop(){
			document.body.scrollTop = 0;
			document.documentElement.scrollTop = 0;
		}, 

		scrollFunction(){
			window.document.body.onscroll=function(){
				const scrollTop = $(this).scrollTop()
				const mybutton = document.querySelector('#myBtn');
				if (scrollTop > 20 || document.documentElement.scrollTop > 20) {
					mybutton.style.display = "block";
				} else {
					mybutton.style.display = "none";
				}
			}
		}
	}
})

new Vue({
	el: '#header-data',
	data: {
		jumbotron: {
			style: {
				'background-image': 'url(https://syoobe.netlify.app/public/images/header/jumbotron2.jpg)'
			},
			data: {
				header: "Mengapa pilih Syoobe",
				logo: "https://www.syoobe.co.id/image/site_logo/www.syoobe5.jpg",
				brand: "Syoobe",
				context: {
					intro: "adalah market place yang menawarkan penjualan produk fisik dan produk digital,",
					focus: " Produk Fisik adalah produk yang sudah umum dan dikenal serta memerlukan pengiriman, sedangkan Produk Digital terdiri dari 2 hal yaitu unduh instan dan layanan jasa. Kami hadir untuk anda yang memiliki hal-hal luarbiasa untuk terus dikembangkan dan menjadi bagian dari masyarakat yang besar."
				}
			}
		}
	},

})


// new Vue({
// 	el: '#app',
// 	data: {
// 		fonts: [
// 			{id:1, family: 'family=Poiret+One&family=Poppins:wght@900&family=Quicksand:wght@500&display=swap'},
// 			{id:2, family: 'family=Anton&display=swap'},
// 			{id:3, family: 'family=Frank+Ruhl+Libre|Roboto'}
// 		],
// 		home: {
// 			title: 'Syoobe Become A Seller'
// 		},
// 		ponsels: [],
// 		electronics: [],
// 		jumbotron1: {
// 			style: {
// 				'background-image': 'url(https://syoobe.netlify.app/public/images/header/jumbotron2.jpg)'
// 			}
// 		}

// 	},

// 	mounted(){
// 		this.getPonsel()
// 	},

// 	methods: {
// 		getPonsel(){
// 			this.ponsels = [
// 				"hallo world"
// 			]
// 		}
// 	}

// })

// new Vue({
// 	el: '#app',
// 	data: {
// 		date: new Date(),
// 		footer: {
// 			content: '',
// 			year: ''
// 		},
// 		jumbotron: {
// 			style: {
// 				'background-image': 'url(https://syoobe.netlify.app/public/images/header/jumbotron2.jpg)'
// 			}
// 		}
// 	},

// 	mounted(){
// 		this.getFooter(),
// 		this.animated(),
// 		this.scrollspy(),
// 		this.scrollNav(),
// 		this.smooth(),
// 		this.tableFixed()
// 	},

// 	methods: {
// 		getFooter(){
// 			this.footer.content = "Syoobe"
// 			this.footer.year =  this.date.getFullYear()
// 		},
// 		animated(){
// 			AOS.init()
// 		},

// 		scrollspy(){
// 			window.addEventListener('DOMContentLoaded', () => {
// 				const observer = new IntersectionObserver(entries => {
// 					entries.forEach(entry => {
// 						const id = entry.target.getAttribute('id');
// 						if (entry.intersectionRatio > 0) {
// 							document.querySelector(`nav li a[href="#${id}"]`).parentElement.classList.add('active');
// 						} else {
// 							document.querySelector(`nav li a[href="#${id}"]`).parentElement.classList.remove('active');
// 						}
// 					});
// 				});

// 			  // Track all sections that have an `id` applied
// 			  document.querySelectorAll('section[id]').forEach((section) => {
// 			  	observer.observe(section);
// 			  });
			  
// 			});
// 		},

// 		scrollNav(){
// 			$('.introduce').hide('slow').slideUp(1000)
// 			$('.product').hide('slow').slideUp(1000)
// 			$(window).on('scroll', function(){
// 				const scrollTop = $(this).scrollTop()
// 				// console.log(scrollTop)
// 				if(scrollTop > 50){
// 					const heightVl = $('.introduce').height()
// 					$('.introduce').show('slow').slideDown(1000)
// 					$('.introduce').addClass('active')
// 					$('.introduce').addClass('active-path')
// 					$('.active-path').css({
// 						'height': heightVl+'px'
// 					})
// 					// console.log($('.introduce').height())
// 				}else{
// 					$('.introduce').hide('slow').slideUp(1000)
// 					$('.introduce').removeClass('active-path')
// 					$('.introduce').removeClass('active')
// 				}

// 				if(scrollTop > 3000){
// 					const heightVl = $('.product').height()
// 					const categoryVl = $('.category').height()
// 					// console.log("Height product = "+$('.product').height())
// 					$('.introduce').removeClass('active-path')
// 					$('.introduce').removeClass('active')
// 					$('.product').show('slow').slideDown(1000)
// 					$('.product').addClass('active')
// 					$('.product').addClass('active-path')
// 					$('.active-path').css({
// 						'height': heightVl + categoryVl +'px'
// 					})
// 				}else{
// 					$('.product').hide('slow').slideUp(1000)
// 					$('.product').removeClass('active-path')
// 					$('.product').removeClass('active')
// 				}
// 			})
// 		},

// 		smoot(){
// 			$('.page-scroll').on('click', function(e){
// 				let go = $(this).attr('href')
// 				let elemGo = $(go)

// 				$('body').animate({
// 					scrollTop: elemGo.offset().top - 50
// 				}, 2500, 'easeInOutExpo')

// 				e.preventDefault()
// 			})
// 		},

// 		tableFixed(){
// 			$(document).ready(function(){
// 				$(window).on('scroll', function(){
// 					let isDesktop = window.matchMedia('only screen and (min-width: 992px)').matches;
// 					let scrollTop = $(this).scrollTop()
// 					if(!isDesktop){
// 						this.mobileScroll(scrollTop)
// 					}else{
// 						this.desktopScroll(scrollTop)
// 					}
// 				})
// 			})
// 		},

// 		mobileScroll(scrollTop){
// 		// console.log(scrollTop)

// 		if(scrollTop > 6557){
// 			// console.log(scrollTop)
// 			$('#points--ponsel').addClass('td-fixed')
// 			$('#kondisi').addClass('td-fixed')
// 			$('#points--layanan-jasa').css({
// 				'position': '',
// 				'top': 0
// 			})

// 			if(scrollTop > 7300){
// 				$('#points--ponsel').removeClass('td-fixed')
// 				$('#points--elektronik').addClass('td-fixed')
// 				$('#points--layanan-jasa').css({
// 					'position': '',
// 					'top': 0
// 				})
// 				if(scrollTop > 11400){
// 					$('#points--elektronik').removeClass('td-fixed')
// 					$('#points--otomotif').addClass('td-fixed')
// 					$('#points--layanan-jasa').css({
// 						'position': '',
// 						'top': 0
// 					})
// 					if(scrollTop > 12655){
// 						$('#points--otomotif').removeClass('td-fixed')
// 						$('#points--anekaproduk').addClass('td-fixed')
// 						$('#points--layanan-jasa').css({
// 							'position': '',
// 							'top': 0
// 						})
// 						if(scrollTop > 23072){
// 							$('#points--anekaproduk').removeClass('td-fixed')
// 							$('#points--unduh-instant').addClass('td-fixed')
// 							$('#points--layanan-jasa').css({
// 								'position': '',
// 								'top': 0
// 							})
// 							if(scrollTop > 23599){
// 								$('#points--unduh-instant').removeClass('td-fixed')
// 								$('#points--layanan-jasa').css({
// 									'position': 'fixed',
// 									'top': 40
// 								})
// 							}

// 							if(scrollTop > 26573){
// 								$('#points--layanan-jasa').css({
// 									'position': '',
// 									'top': 0
// 								})
// 							}
// 						}
// 					}
// 				}
// 			}
// 		}
// 	},

// 	desktopScroll(scrollTop){
// 		// console.log(scrollTop)
// 		if(scrollTop > 5517){
// 			$('#points--ponsel').addClass('td-fixed')
// 			$('#kondisi').addClass('td-fixed')
// 			if(scrollTop > 6016 ){
// 				$('#points--ponsel').removeClass('td-fixed')
// 				$('#points--elektronik').addClass('td-fixed')
// 				if(scrollTop > 9699){
// 					$('#points--elektronik').removeClass('td-fixed')
// 					$('#points--otomotif').addClass('td-fixed')
// 					$('#points--layanan-jasa').css({
// 						'position': '',
// 						'top': 0
// 					})
// 					if(scrollTop > 10600){
// 						$('#points--otomotif').removeClass('td-fixed')
// 						$('#points--anekaproduk').addClass('td-fixed')
// 						$('#points--layanan-jasa').css({
// 							'position': '',
// 							'top': 0
// 						})

// 						if(scrollTop > 21000){
// 							$('#points--anekaproduk').removeClass('td-fixed')
// 							$('#points--unduh-instant').addClass('td-fixed')
// 							$('#points--layanan-jasa').css({
// 								'position': '',
// 								'top': 0
// 							})
// 							if(scrollTop > 23526){
// 								$('#points--unduh-instant').removeClass('td-fixed')
// 								$('#points--layanan-jasa').css({
// 									'position': 'fixed',
// 									'top': 40
// 								})
// 								if(scrollTop > 24511){
// 											// console.log("Ok")
// 											$('#points--layanan-jasa').css({
// 												'position': '',
// 												'top': 0
// 											})
// 										}
// 									}
// 								}
// 							}
// 						}
// 					}
// 				}
// 			}
// 	}
// })
