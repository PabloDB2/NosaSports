var tealiumiq_currency = {
    ts:"202409270100",
    rates:{"FKP":0.74636,"XAU":0.00037456,"DOP":60.147409,"IMP":0.74636,"CRC":520.374028,"ARS":967.2631,"KGS":84.2,"XPF":106.840102,"CZK":22.5056,"MXN":19.61901,"SEK":10.137546,"EGP":48.3733,"MNT":3398,"COP":4191.242198,"BRL":5.4382,"OMR":0.384956,"AMD":386.908226,"RWF":1351.79403,"BBD":2,"TRY":34.178385,"GNF":8637.145591,"NOK":10.555646,"AZN":1.7,"JMD":157.026394,"SCR":13.454075,"AED":3.673,"BWP":13.082151,"TOP":2.34128,"XCD":2.70255,"KHR":4063.631294,"MOP":8.014633,"USD":1,"NGN":1653.4,"MGA":4525.437168,"XPT":0.00099343,"WST":2.8,"IDR":15118,"PYG":7811.679482,"GGP":0.74636,"RSD":104.809,"MRU":39.566559,"STD":22281.8,"KZT":479.022617,"NIO":36.80789,"CDF":2846.341709,"ISK":134.92,"CUC":1,"CLP":905.9,"SZL":17.189714,"HUF":354.580257,"PLN":3.827204,"JOD":0.7087,"ALL":88.678866,"ERN":15,"SVC":8.751087,"LBP":89563.84801,"HNL":24.845328,"MYR":4.1205,"IRR":42105,"EUR":0.89532,"RUB":92.62122,"BTC":1.5324178e-05,"SAR":3.750638,"PGK":3.974858,"CAD":1.348492,"CVE":98.866677,"DZD":132.48115,"TTD":6.788612,"INR":83.629143,"MMK":2098,"XAG":0.03133137,"HKD":7.779293,"AUD":1.451979,"LSL":17.197515,"KPW":900,"YER":250.349961,"GBP":0.74636,"CHF":0.847466,"XAF":587.291457,"AFN":68.450406,"SLL":20969.5,"BIF":2900.229816,"SYP":2512.53,"MAD":9.67335,"BHD":0.376907,"HRK":6.744718,"PAB":1,"LAK":22084.665355,"TJS":10.63645,"STN":21.967972,"ZAR":17.200127,"SBD":8.302717,"TZS":2736.859,"ILS":3.691228,"MDL":17.350663,"MKD":55.082128,"BOB":6.910558,"FJD":2.1873,"UZS":12759.303094,"UYU":41.934501,"RON":4.4546,"KYD":0.833438,"JPY":145.4622,"GEL":2.725,"THB":32.454,"LKR":299.786454,"PEN":3.751592,"BTN":83.7128,"UAH":41.174403,"CUP":25.75,"SGD":1.284822,"ZWL":322,"ZMW":26.328625,"GYD":209.244531,"KES":129,"VND":24624.482702,"BZD":2.015961,"MWK":1734.2334,"VES":36.804646,"PKR":277.734959,"NAD":17.197515,"MVR":15.35,"LRD":194.026505,"KRW":1320.528058,"LYD":4.734195,"NPR":133.939197,"SDG":601.5,"UGX":3693.324505,"CNY":7.0097,"GTQ":7.730932,"BAM":1.753656,"CLF":0.032831,"TND":3.040457,"BSD":1,"GHS":15.778525,"SSP":130.26,"TMT":3.51,"BYN":3.272511,"SOS":571.615889,"DJF":177.827972,"BGN":1.749925,"GIP":0.74636,"SHP":0.74636,"NZD":1.582354,"GMD":68.5,"ETB":119.495281,"IQD":1310.188939,"XPD":0.00096031,"ANG":1.80245,"JEP":0.74636,"DKK":6.67628,"MZN":63.899987,"BMD":1,"XDR":0.739917,"SRD":30.5435,"KMF":442.12504,"BDT":119.511522,"AWG":1.8025,"AOA":934.682333,"MUR":45.79,"QAR":3.645363,"CNH":6.984597,"XOF":587.291457,"HTG":132.112684,"PHP":55.925003,"VUV":118.722,"BND":1.285171,"KWD":0.305217,"TWD":31.7095},
    convert:function(a,f,t){
		// Convert that value to an array
		var isString = typeof a == "string",
			converted = isString ? [a] : a;

		// Iterate over the values to convert each one
		for (var i=0; i<converted.length; i++) {
			converted[i] = parseFloat(converted[i]);
			f = f.toUpperCase();
			t = t.toUpperCase();
			if (converted[i] > 0 && this.rates[f] > 0 && this.rates[t] > 0){
				var v = converted[i] / this.rates[f] * this.rates[t];
				converted[i] = v.toFixed(2);
			}
		}

		// Return the value we accepted
		if (isString) return converted[0];
		else return converted;
    }
}