const Data = {
	ip: getCookie('ip_addr'),
	kota: document.querySelector('#kota'),
	tgl: {
		greg: document.querySelector('#greg'),
		hijri: document.querySelector('#hijri')
	},
	adzan: document.querySelector('#waktu-adzan'),
	api: {
		shalat: 'https://api.pray.zone/v2/times/today.json?',
		geo: 'https://ipapi.co/'
	}
}

setIP('https://api.ipify.org/?format=json')
.then( res => res.json())
.then( res => {
	const ip = res.ip
	setCookie('ip', ip, 1)
})

const ip_addr = getCookie('ip')
geoLocation(Data.api.geo, ip_addr, '/json')
.then(res => res.json())
.then( res => {
	setCookie('city', res.city, 1)
})

const city = getCookie('city')

jadwalShalat(Data.api.shalat, `city=${city}`)
.then( res => res.json())
.then( res => {
	const dataShalat = [
		{city: city},
		{data: res.results.datetime[0]}
	]
	showJadwalShalat(dataShalat)
})