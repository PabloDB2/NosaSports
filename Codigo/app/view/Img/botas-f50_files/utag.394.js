//tealium universal tag - utag.394 ut4.0.202501150947, Copyright 2025 Tealium.com Inc. All Rights Reserved.
try{(function(id,loader){var u={};utag.o[loader].sender[id]=u;if(utag===undefined){utag={};}if(utag.ut===undefined){utag.ut={};}if(utag.ut.loader===undefined){u.loader=function(o){var a,b,c,l;a=document;if(o.type==="iframe"){b=a.createElement("iframe");b.setAttribute("height","1");b.setAttribute("width","1");b.setAttribute("style","display:none");b.setAttribute("src",o.src);}else if(o.type==="img"){utag.DB("Attach img: "+o.src);b=new Image();b.src=o.src;return;}else{b=a.createElement("script");b.language="javascript";b.type="text/javascript";b.async=1;b.charset="utf-8";b.src=o.src;}if(o.id){b.id=o.id;}if(typeof o.cb==="function"){if(b.addEventListener){b.addEventListener("load",function(){o.cb();},false);}else{b.onreadystatechange=function(){if(this.readyState==="complete"||this.readyState==="loaded"){this.onreadystatechange=null;o.cb();}};}}l=o.loc||"head";c=a.getElementsByTagName(l)[0];if(c){utag.DB("Attach to "+l+": "+o.src);if(l==="script"){c.parentNode.insertBefore(b,c);}else{c.appendChild(b);}}};}else{u.loader=utag.ut.loader;}
u.ev={'view':1,'link':1};u.initialized=false;u.map={"page_type":"page_type","page_name":"page_name","euci":"euci","product_id":"product_id","smc_product_list":"smc_product_list","order_id":"order_id","country":"country","tag_url":"base_url","tag_id":"orgId","product_sku_market":"product_sku_market"};u.extend=[function(a,b){try{if(1){if(b.country.match(/US/gi)!==null){orgId='10973357';}else if(b.country.match(/CA/gi)!==null){orgId='10977585';}else if(b.country.match(/AU|NZ/gi)!==null){orgId='10979661';}else if(b.country.match(/RU/gi)!==null){orgId='10979435';}else if(b.country.match(/AR|BR|CL|CO|MX|PE/gi)!==null){orgId='10977635';}else if(b.country.match(/AT|BE|CH|CZ|DE|DK|ES|FI|FR|GR|IE|IT|NL|NO|PL|PT|SE|SK|UK/gi)!==null){orgId='10964987';}else if(b.country.match(/MY|PH|SG|TH|VN/gi)!==null){orgId='10980052';}else if(b.country.match(/KR/gi)!==null){orgId='524006075';}else if(b.country.match(/IN|TR/gi)!==null){orgId='10981232';}
else if(b.country==="JP"){orgId='10980345';}
b.tag_url="https://"+orgId+".collect.igodigital.com/collect.js";b.tag_id=orgId;b.country=b.country=='UK'?b.country='GB':b.country;}}catch(e){utag.DB(e)}},function(a,b){try{if(1){if(b.country!='US'&&b.country!='CA'&&b.country!='RU'&&b.product_sku){b.product_sku_market=[];for(var i=0;i<b.product_sku.length;i++){b.product_sku_market.push(b.product_sku[i]+'_'+b.country);}}}}catch(e){utag.DB(e)}},function(a,b){try{if(1){if(b.product_id){b.smc_product_list=(function(){var a=[];for(var i=0;i<b.product_id.length;i++){a.push({"item":b.product_id[i]||'',"quantity":b.product_quantity?b.product_quantity[i]:'',"price":b.product_price_vat?b.product_price_vat[i]:'',"unique_id":b.product_sku_market?b.product_sku_market[i]:(b.product_sku?b.product_sku[i]:'')})};return a;})();}}}catch(e){utag.DB(e)}},function(a,b){try{if(1){window._etmc=window._etmc||[];if(window._etmc&&_etmc.user_info&&b.euci){_etmc.user_info.email=b.euci;}
if(b.tealium_event.indexOf('wishlist')>-1){var cookie_name=b.country.match(/PT|GR/gi)!=null?'wishlist'+'_'+b.language.toLowerCase()+'_'+b.country:'wishlist';if(utag.loader.RC(cookie_name)){var wishlist=utag.loader.RC(cookie_name);wishlist=wishlist.replace(/(\[|\]|\")/gi,'').split(',');if(b.country!='US'&&b.country!='CA'&&b.country!='RU'){for(var i=0;i<wishlist.length;i++){if(wishlist[i]!=''){wishlist[i]=wishlist[i]+'_'+b.country;}else{wishlist.splice(i,1);}}}
_etmc.push(["trackWishlist",{"items":wishlist}]);}}
}}catch(e){utag.DB(e)}}];u.send=function(a,b){if(u.ev[a]||u.ev.all!==undefined){var c,d,e,f,i;u.data={};for(c=0;c<u.extend.length;c++){try{d=u.extend[c](a,b);if(d==false)return}catch(e){}};for(d in utag.loader.GV(u.map)){if(b[d]!==undefined&&b[d]!==""){e=u.map[d].split(",");for(f=0;f<e.length;f++){u.data[e[f]]=b[d];}}}
u.loader_cb=function(){window._etmc=window._etmc||[];if(window._etmc){u.initialized=true;var u_p=(Array.isArray(_etmc)&&_etmc.length>0?"unshift":"push");_etmc[u_p](["setOrgId",u.data.orgId]);_etmc[u_p](["setUserInfo",{"email":u.data.euci||'',"details":{"country_code":u.data.country}}]);if(u_p==="unshift"){_etmc[u_p](_etmc[1]);delete _etmc[2];_etmc=_etmc.filter((entry)=>!!entry);}
if(a=='view'){if(['CLP','PLP','PDP'].indexOf(u.data.page_type)===-1){_etmc.push(["trackPageView"]);}else if(['CLP','PLP'].indexOf(u.data.page_type)!==-1){_etmc.push(["trackPageView",{"category":u.data.page_type}]);}else if(['PDP'].indexOf(u.data.page_type)!==-1){_etmc.push(["trackPageView",{"category":u.data.page_type,"item":u.data.product_id[0]}]);}
if(['SHOPPING CART'].indexOf(u.data.page_type)!==-1&&u.data.product_id){_etmc.push(["trackCart",{"cart":u.data.smc_product_list}]);}else if(['SHOPPING CART'].indexOf(u.data.page_type)!==-1&&!u.data.product_id){_etmc.push(["trackCart",{"clear_cart":true}]);}else if(['CHECKOUT'].indexOf(u.data.page_type)!==-1&&['COMPLETE'].indexOf(u.data.page_name)!==-1){_etmc.push(["trackConversion",{"cart":u.data.smc_product_list,"order_number":u.data.order_id}])}
}}
};if(!u.initialized){u.loader({"type":"script","src":u.data.base_url,"cb":u.loader_cb,"loc":"script","id":'utag_394'});}else{u.loader_cb();}
}};utag.o[loader].loader.LOAD(id);})("394","adidas.adidasglobal");}catch(error){utag.DB(error);}