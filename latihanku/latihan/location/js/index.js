const getLocation = async(data) => {
	let req = await fetch(`http://ip-api.com/json/${data}`)
	let res = await req.json()

	return res
}

const LookUp = async(data, success, err) => {
	const req = await fetch(`https://api.ipify.org/?format=${data}`)
	const res = await req.json()

	const ip = res.ip

	getLocation(ip).then(res => {
		
		console.log('Response success : ', res)

		Cookies.set('code', res.countryCode, {expires: 30})
		Cookies.set('country', res.country, {expires: 30})
		Cookies.set('lat', res.lat, {expires: 30})
		Cookies.set('lng', res.lon, {expires: 30})

		const newEl = document.createElement('div')
		newEl.className = 'card mt-5 mb-2'
		newEl.setAttribute('style', 'width: 18rem;')
		newEl.innerHTML = `
			  <ul class="list-group list-group-flush">
			    <li class="list-group-item">Your ip address = <b> ${res.query} </b></li>
			    <li class="list-group-item">Country = <b>${res.country}</b> <img src="https://www.countryflags.io/${res.countryCode}/shiny/64.png" class="img-responsive circle"> </li>
			    <li class="list-group-item">Region Name = <b>${res.regionName}</b></li>
			    <li class="list-group-item">City = <b>${res.city}</b></li>
			  </ul>
		`
		document.querySelector('#result').appendChild(newEl)

	}).catch(err => {
		console.log(`Error results : ${err}`)
	})

}


document.querySelector('#lookup').addEventListener('click', () => {
	document.querySelector('#result').innerHTML=''
	console.log('start')

	LookUp("json", res => {
		console.log("Success fetch ", res)
	}, (err) => {
		console.log("Error fetch, ", err)
	})

	console.log('finish')
})



const data = null;

const xhr = new XMLHttpRequest();
xhr.withCredentials = true;

xhr.addEventListener("readystatechange", function () {
	if (this.readyState === this.DONE) {
		console.log(this.responseText);
	}
});

xhr.open("GET", "https://google-maps-geocoding.p.rapidapi.com/geocode/json?latlng=40.714224%2C-73.96145&language=en");
xhr.setRequestHeader("x-rapidapi-key", "27bd9a3d0bmshb459a56fb843892p105ab4jsn586dae0c9415");
xhr.setRequestHeader("x-rapidapi-host", "google-maps-geocoding.p.rapidapi.com");

xhr.send(data);