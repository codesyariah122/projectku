class AlQuran {
	constructor(proxy, url, param, data, id){
		this.proxy = proxy
		this.url = url
		this.param = param
		this.data = data
		this.id = id 
	}

	async getSelectSurah() {
		try {
			let response = await fetch(`${this.proxy}${this.url}${this.param}`)
			let results = await response.json()
			// console.log(results.data)
			return results
		} catch(err) {
			return err
		}
	}

	async getSelectAyat() {
		try {
			let response = await fetch(`${this.proxy}${this.url}${this.param}${this.data}`)
			let results = await response.json()
			return results
		} catch(err) {
			return err
		}	
	}

	async getSurahAyat() {
		try {
			let response = await fetch(`${this.proxy}${this.url}${this.param}${this.data}/${this.id}`)
			let results = await response.json()
			return results
		} catch(err) {
			return err
		}
	}

	getReadAyat(proxy, url, param, data, id, success, error) {
		let req = new XMLHttpRequest()
		req.open('GET', `${proxy}${url}${param}${data}/${id}`)
		req.onload = () => {
			if(req.readyState === 4) {
				if(req.status === 200) {
					success(req.response)
				}else if(req.status === 404) {
					return error()
				}
			}
		}

		req.onerror = (err) => {
			console.log(err)
		}

		req.send()
	}

}


// const SelectSurah = async(proxy, url, req) => {
// 	try {
// 		let resp = await fetch(`${proxy}${url}${req}`)
// 		let result = await resp.json()
// 		return result
// 	}catch(err) {
// 		console.log('error fetch : ', err)
// 	}
// }

// const SelectAyat = async(proxy, url, req, data) => {
// 	let resp = await fetch(`${proxy}${url}${req}/${data}`)
// 	let result = await resp.json()
// 	return result
// }

// const ViewSurah = async(proxy, url, req) => {
// 	let resp = await fetch(`${proxy}${url}surah/${req}`)
// 	let data = await resp.json()
// 	return data
// }

// const ViewSurahAyat = async(proxy, url, req, surah, ayat) => {
// 	let resp = await fetch(`${proxy}${url}${req}${surah}${ayat}`)
// 	let data = await resp.json()
// 	return data
// }


// const ReadAyat = (url, key, data, id, success, error) => {
	
// 	let req = new XMLHttpRequest()

// 	req.open('GET', `${url}${key}/${data}/${id}`, true)
	
// 	req.onload = () => {
// 		if(req.readyState === 4) {
// 			if(req.status === 200) {
// 				success(req.response)
// 			}else if(req.status === 404) {
// 				error()
// 			}
// 		}
// 	}

// 	req.onerror = (err) => {
// 		console.log(err)
// 	}

// 	req.send()
	
// }

// function ipAddr(url, success, error){
//     $.getJSON(`${ObjData.baseAPI.ip}`, function(e) {
//         // $('#show-ip').text(e.ip);
//         const dataIp = {
//             'host' : e.ip
//         };
//         $.ajax({
//             url: `${ObjData.baseAPI.proxy}${url}`,
//             type: 'get',
//             data: dataIp,
//             success: function(res){
//                 const result = {
//                     'ip': res.data.geo.host,
//                     'isp': res.data.geo.isp,
//                     'country': res.data.geo.country_name,
//                     'country_code':res.data.geo.country_code,
//                     'region': res.data.geo.region_name,
//                     'city': res.data.geo.city,
//                     'lat' : res.data.geo.latitude,
//                     'lng' : res.data.geo.longitude
//                 };

//                 Cookies.set('lat', result.lat, {expires: 1});
//                 Cookies.set('lng', result.lng, {expires: 1});
//                 Cookies.set('city', result.city, {expires: 30});

//                 Cookies.set('country_code', result.country_code, {expires: 1});

//                 $('#your-location').append(`
//                     <h5 class="text-primary">Your Location : <img src="https://newsapi.org/images/flags/${result.country_code}.svg" width="20" height="50" style="backgound:rgba(0, 0, 0, 0.8);"/> | ${result.city} - ${result.region}</h5>
//                     <h6 class="text-danger">Your Ip Address : ${result.ip}</h6>
//                `);
//             } 
//         });

//     });
// }



// const Realip = (proxy, url, success, err) => {
// 	let req = new XMLHttpRequest()
// 	req.open('GET', `${proxy}${url}`, true);

// 	req.onload = () => {
// 		if(req.readyState === 4) {
// 			if(req.status === 200){
// 				success(req.response);
// 			}else if(req.status === 404){
// 				err();
// 			}
// 		}
// 	}

// 	req.send();
// }

// const getLocation = (proxy, url, req) => {
// 	const dataIp = {
// 		'host': req
// 	};
// 	$.ajax({
//         url: `${proxy}${url}`,
//         type: 'get',
//         data: dataIp,
//         success: function(res){
//         	console.log(res)
//         }
//     })
// }

// const getLocation = async (proxy, url, req) => {
// 	let resp = await fetch(`${proxy}${url}${req}`)
// 	let result = await resp.json()
// 	return result
// }

// const getLocation = (proxy, url, req, success, err) => {
// 	let request = new XMLHttpRequest()
// 	request.open('GET', `${proxy}${url}${req}`, true)

// 	request.onreadystatechange = () => {
// 		if(request.readyState === 4) {
// 			if(request.status === 200){
// 				success(request.response);
// 			}else if(request.status === 404){
// 				err();
// 			}
// 		}	
// 	}
// 	request.send()
// }


// const NewsMedia = async(url, req, key) => {
// 	let resp = await fetch(`${url}?country=${req}&apiKey=${key}`)
// 	let result = await resp.json()
// 	return result
// }

// const GetNews = async(proxy, url, req, key) => {
// 	let resp = await fetch(`${proxy}${url}?country=${req}&apiKey=${key}`)
// 	let result = await resp.json()
// 	return result
// }



