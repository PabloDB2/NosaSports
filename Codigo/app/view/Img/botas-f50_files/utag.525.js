//tealium universal tag - utag.525 ut4.0.202501150947, Copyright 2025 Tealium.com Inc. All Rights Reserved.
try{(function(id,loader){var u={"id":id};utag.o[loader].sender[id]=u;if(utag.ut===undefined){utag.ut={};}
var match=/ut\d\.(\d*)\..*/.exec(utag.cfg.v);if(utag.ut.loader===undefined||!match||parseInt(match[1])<41){u.loader=function(o,a,b,c,l,m){utag.DB(o);a=document;if(o.type=="iframe"){m=a.getElementById(o.id);if(m&&m.tagName=="IFRAME"){b=m;}else{b=a.createElement("iframe");}o.attrs=o.attrs||{};utag.ut.merge(o.attrs,{"height":"1","width":"1","style":"display:none"},0);}else if(o.type=="img"){utag.DB("Attach img: "+o.src);b=new Image();}else{b=a.createElement("script");b.language="javascript";b.type="text/javascript";b.async=1;b.charset="utf-8";}if(o.id){b.id=o.id;}for(l in utag.loader.GV(o.attrs)){b.setAttribute(l,o.attrs[l]);}b.setAttribute("src",o.src);if(typeof o.cb=="function"){if(b.addEventListener){b.addEventListener("load",function(){o.cb();},false);}else{b.onreadystatechange=function(){if(this.readyState=="complete"||this.readyState=="loaded"){this.onreadystatechange=null;o.cb();}};}}if(o.type!="img"&&!m){l=o.loc||"head";c=a.getElementsByTagName(l)[0];if(c){utag.DB("Attach to "+l+": "+o.src);if(l=="script"){c.parentNode.insertBefore(b,c);}else{c.appendChild(b);}}}};}else{u.loader=utag.ut.loader;}
if(utag.ut.typeOf===undefined){u.typeOf=function(e){return({}).toString.call(e).match(/\s([a-zA-Z]+)/)[1].toLowerCase();};}else{u.typeOf=utag.ut.typeOf;}
u.ev={"view":1,"link":1};u.toBoolean=function(val){val=val||"";return val===true||val.toLowerCase()==="true"||val.toLowerCase()==="on";};u.clearEmptyKeys=function(object){for(var key in object){if(object[key]===""||object[key]===undefined){delete object[key];}}
return object;};u.isEmptyObject=function(o,a){for(a in o){if(utag.ut.hasOwn(o,a))return false;}
return true;};u.hasgtagjs=function(){window.gtagRename=window.gtagRename||""||"gtag";if(utag.ut.gtagScriptRequested){return true;}
var i,s=document.getElementsByTagName("script");for(i=0;i<s.length;i++){if(s[i].src&&s[i].src.indexOf("gtag.js")>=0&&(s[i].id&&s[i].id.indexOf("utag")>-1)){return true;}}
var data_layer_name=""||"dataLayer";window[data_layer_name]=window[data_layer_name]||[];if(typeof window[window.gtagRename]!=="function"){window[window.gtagRename]=function(){window[data_layer_name].push(arguments);};if(u.data.cross_track_domains!==""){window[window.gtagRename]("set","linker",{domains:u.data.cross_track_domains.split(","),accept_incoming:true});}
window[window.gtagRename]("js",new Date());}
return false;};u.isScriptRequestedInit=false;u.scriptRequestedInit=function(){if(u.isScriptRequestedInit){return}
u.scriptrequested=u.hasgtagjs();u.o=window[window.gtagRename];u.isScriptRequestedInit=true;}
u.map_func=function(arr,obj,item){var i=arr.shift();obj[i]=obj[i]||{};if(arr.length>0){u.map_func(arr,obj[i],item);}else{obj[i]=item;}};u.sites={"ecomm":{"required":["prodid"],"params":["prodid","pagetype","totalvalue","category","pvalue","quantity"],"valuerules":["product","cart","purchase"]},};u.checkRequired=function(siteName,site){var i,valid=false;if(!u.data[siteName]){return valid;}
for(i=0;i<site.required.length;i++){valid=u.data[siteName][site.required[i]]?true:false;}
return valid;};u.getValue=function(paramName,siteName,site){var i;for(i=0;i<site.valuerules.length;i++){if(u.data.pagetype&&u.data.pagetype===site.valuerules[i]){return u.data[siteName][paramName]||u.data.order_subtotal;}}};u.getParams=function(){var siteName,g={},i;for(siteName in u.sites){var site=u.sites[siteName];if(!u.data[siteName]){continue;}
if(u.checkRequired(siteName,site)){for(i=0;i<site.params.length;i++){if(site.params[i]==="totalvalue"){g[siteName+"_"+site.params[i]]=u.getValue(site.params[i],siteName,site);}else if(site.params[i]==="pagetype"){g[siteName+"_"+site.params[i]]=u.data.pagetype;}else{g[siteName+"_"+site.params[i]]=u.data[siteName][site.params[i]];}}}}
return u.clearEmptyKeys(g);};u.getRemarketingItems=function(){var i,item={},items=[],rmkt=u.data.rmkt,len=0,verticalName,vertical,paramName;if(u.data.product_id.length>0&&!rmkt.retail){rmkt.retail={};rmkt.retail.id=u.data.product_id;}
for(verticalName in rmkt){if(!u.isEmptyObject(rmkt[verticalName])){vertical=rmkt[verticalName];if(verticalName.match(/retail|education|hotel_rental|jobs|local|real_estate|custom/i)&&vertical.id){len=vertical.id.length;}
for(i=0;i<len;i++){item={};for(paramName in vertical){if(vertical[paramName][i]){item[paramName]=vertical[paramName][i];}}
if(!u.isEmptyObject(item)){items.push(item);}}}}
return items;};u.getItems=function(len){var item={},i,j,items=[],nextLoop=false;items=u.getRemarketingItems();if(u.data.conversion_label){len=len||u.data.product_id.length;for(i=0;i<len;i++){item={};for(j=0;j<items.length;j++){if(items[j].id===u.data.product_id[i]){items[j].price=(u.data.product_unit_price[i]?u.data.product_unit_price[i]:"");items[j].quantity=(u.data.product_quantity[i]?u.data.product_quantity[i]:"");nextLoop=true;break;}}
if(nextLoop){nextLoop=false;continue;}
item.id=u.data.product_id[i];item.price=(u.data.product_unit_price[i]?u.data.product_unit_price[i]:"");item.quantity=(u.data.product_quantity[i]?u.data.product_quantity[i]:"");items.push(item);}}
return items;};u.map={"adwords_conversion_id":"conversion_id","adwords_conversion_label":"conversion_label","adwords_type":"custom.ecomm_pagetype,pagetype","product_model_id":"custom.ecomm_prodid","_ctotal":"custom.ecomm_totalvalue","product_category":"custom.ecomm_category","product_price":"custom.ecomm_pvalue","product_quantity":"custom.ecomm_quantity","gift_card_order_total":"custom.gift_card_order_total","customer_email_sha256":"user_data.email","order_id":"transaction_id"};u.extend=[function(a,b){try{if(1){var gclid=utag.loader.RC("utag_cl").gclid;if(typeof(gclid)==="string"){var gclid_split=gclid.split(".");if(gclid_split.length===3){u.data=u.data||{};u.data.config=u.data.config||{};u.data.config.gclid=gclid_split[2];}}}}catch(e){utag.DB(e)}},function(a,b){try{if(1){var gclid=utag.loader.RC("utag_cl").gclid,dclid=utag.loader.RC("utag_cl").dclid,domain;if(window.location.hostname.indexOf(".adidas")!==-1){domain=".adidas"+window.location.hostname.split(".adidas")[1];}
if(domain&&!utag.ut.gtagScriptRequested){if(gclid){document.cookie="_gcl_aw="+gclid+"; path=/; domain="+domain;}
if(dclid){document.cookie="_gcl_dc="+dclid+"; path=/; domain="+domain;}}
u.data.error_callback=function(){var gclid=utag.loader.RC("utag_cl").gclid,dclid=utag.loader.RC("utag_cl").dclid;if(window.location.hostname.indexOf(".adidas")!==-1){domain=".adidas"+window.location.hostname.split(".adidas")[1];if(gclid){document.cookie="_gcl_aw=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/; domain="+domain;}
if(dclid){document.cookie="_gcl_dc=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/; domain="+domain;}}};b.event_callback=function(id){var gclid=utag.loader.RC("utag_cl").gclid,dclid=utag.loader.RC("utag_cl").gclid;if(id===b.dfa_src){if(window.location.hostname.indexOf(".adidas")!==-1){domain=".adidas"+window.location.hostname.split(".adidas")[1];if(gclid){document.cookie="_gcl_aw=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/; domain="+domain;}
if(dclid){document.cookie="_gcl_dc=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/; domain="+domain;}}}}}}catch(e){utag.DB(e)}},function(a,b){try{if(1){if(!utag.data.google_consent_mode_run&&!b.marketing_allowed){return false;}}}catch(e){utag.DB(e)}},function(a,b){try{if(1){let allow_enhanced_conversions=(b.country&&(/UK|DE|FR|ES|IT|PL|NL|GR|SE|PT|BE|AT|CZ|DK|IE|CH|SK|NO|FI|IN|TR|CA|AR|BR|CO|CL|MX|PE|AU|NZ/gi).test(b.country));u.data.config.allow_enhanced_conversions=allow_enhanced_conversions;}}catch(e){utag.DB(e)}},function(a,b,c,d,e,f,g){if(1){d=b['country'];if(typeof d=='undefined')return;c=[{'AR':'988746433'},{'BR':'940322831'},{'CA':'948991346'},{'CL':'984693003'},{'CO':'986767286'},{'KW':'988473807'},{'MX':'990146158'},{'MY':'758269536'},{'PE':'988339444'},{'PH':'758275578'},{'RU':'786105260'},{'SG':'758305336'},{'TH':'758291581'},{'US':'986797384'},{'AU':'759309241'},{'NZ':'758294252'},{'TR':'970068326'},{'VN':'758267561'},{'IN':'776830670'},{'KR':'10860416767'},{'NO|CH|DE|FR|UK|NL|ES|IT|AT|IE|BE|PL|DK|FI|SE|SK|CZ|GR|PT':'1006751514'},{'JP':'977719219,977719219,977719219,984647397,784898794,10801332557'}];var m=false;for(e=0;e<c.length;e++){for(f in utag.loader.GV(c[e])){g=new RegExp(f,'i');if(g.test(d)){b['adwords_conversion_id']=c[e][f];m=true};};if(m)break};if(!m)b['adwords_conversion_id']='';}},function(a,b,c,d,e,f,g){if(1){d=b['country'];if(typeof d=='undefined')return;c=[{'BR':'WG2tCLGJ6woQj-CwwAM'},{'RU':'1PlWCNCtk5kBEKyH7PYC'},{'US':'67vQCNnL9mIQyKrF1gM'},{'AR':'p0eoCNvzlVYQwaW81wM'},{'CL':'8LRaCKTI_FUQi_LE1QM'},{'CO':'IsjPCNuonFYQtr_D1gM'},{'MX':'KRh3CLqOmFYQ7tyR2AM'},{'PE':'Q4x5CMiSlFYQ9Lmj1wM'},{'TR':'54_cCJeH_G8Q5qLIzgM'},{'AU':'4-ahCPyyvZcBELnHiOoC'},{'NZ':'7TGxCOavsZcBEOzNyukC'},{'TH':'NpGNCJamvZcBEP24yukC,pHJtCILrhYEDEOCMyekC'},{'SG':'h7TCCPDLsZcBELiky-kC,pHJtCILrhYEDEOCMyekC'},{'MY':'cc4uCOCvsZcBEOCMyekC,pHJtCILrhYEDEOCMyekC'},{'PH':'yOeJCOPWxZcBEPq7yekC,pHJtCILrhYEDEOCMyekC'},{'CA':'_cNUCOnf5WYQ8urBxAM'},{'VN':'129gCMe3sZcBEKn9yOkC,pHJtCILrhYEDEOCMyekC'},{'IN':'H4CPCMCP9ZABEM79tfIC'},{'KR':'jC0XCLD6gqUDEP-d07oo'},{'NO|CH|DE|FR|UK|NL|ES|IT|AT|IE|BE|PL|DK|FI|SE|SK|CZ|GR|PT':'ucN9CJ3MpuIBEJqeh-AD'},{'JP':'gvsiCOrZy3UQs5-b0gM,xHtuCN3LjwkQs5-b0gM,vA2yCPKx-X0Qs5-b0gM,yX4pCOuKwgYQ5Y3C1QM,WkkqCNKdrosBEOq1ovYC,NONE'}];var m=false;for(e=0;e<c.length;e++){for(f in utag.loader.GV(c[e])){g=new RegExp(f,'i');if(g.test(d)){b['adwords_conversion_label']=c[e][f];m=true};};if(m)break};if(!m)b['adwords_conversion_label']='';}},function(a,b,c,d,e,f,g){if(1){d=b['page_type'];if(typeof d=='undefined')return;c=[{'HOME':'home'},{'CLP':'category'},{'SLP':'category'},{'PLP':'productlist'},{'SEARCH':'searchresults'},{'PDP':'product'},{'SHOPPING CART':'cart'},{'CHECKOUT':'purchase'},{'GIFT CARD':'giftcard'}];var m=false;for(e=0;e<c.length;e++){for(f in utag.loader.GV(c[e])){if(d==f){b['adwords_type']=c[e][f];m=true};};if(m)break};if(!m)b['adwords_type']='';}},function(a,b){try{if(1){b._cprod=b.product_model_id;if(b.page_type==='PLP'||b.page_type==='CLP'||b.page_type=='SEARCH'){b.product_model_id=b._cprod='';}}}catch(e){utag.DB(e)}},function(a,b){try{if(1){if(a==="view"){b.adwords_event=['page_view'];}
if(b.tealium_event==="purchase"){b.adwords_event=['conversion'];}
else{b.adwords_conversion_label='';}
if(b.country==="CA"&&b.tealium_event==="email_signup"){b.adwords_event=['conversion'];b.adwords_conversion_label='ENH-CMDl02YQ8urBxAM';b.adwords_conversion_id='948991346';}
if(b.country==='TR'&&b.tealium_event==="raffle_signup"){b.adwords_event=['conversion'];b.adwords_conversion_label='bj1lCILOvokYEOaiyM4D';}
if(!b.adwords_event){return false;}}}catch(e){utag.DB(e)}},function(a,b){try{if(1){try{b['adwords_conversion_id']=(function(){b.adwords_conversion_id=b.adwords_conversion_id.split(',');for(var i=0;i<b.adwords_conversion_id.length;i++){b.adwords_conversion_id[i]='AW-'+b.adwords_conversion_id[i];}return b.adwords_conversion_id;})();}catch(e){};try{b['adwords_conversion_label']=(function(){if(b.adwords_conversion_label){b.adwords_conversion_label=b.adwords_conversion_label.split(',');for(var i=0;i<b.adwords_conversion_label.length;i++){b.adwords_conversion_label[i]=b.adwords_conversion_label[i];}return b.adwords_conversion_label;}})();}catch(e){}}}catch(e){utag.DB(e);}}];u.send=function(a,b){if(u.ev[a]||u.ev.all!==undefined){utag.DB("send:525");utag.DB(b);var c,d,e,f,h,i,j;u.data={"base_url":"https://www.googletagmanager.com/gtag.js","conversion_id":"","conversion_label":"","conversion_value":"","pagetype":"home","remarketing":"true","data_layer_name":"","product_id":[],"product_category":[],"product_quantity":[],"product_unit_price":[],"product_discount":[],"rmkt":{},"config":{allow_enhanced_conversions:u.toBoolean("false")},"event_data":{"items":[]},cross_track_domains:"sgiftcard.com,sgiftcard.eu,adidasrunners.adidas.com,cfg.adidas.com,aura-eu.adidas.com,dev-adidasrunners.adidas.com,m.adidas.com,preview.adidas.com,qa-adidasrunners.adidas.com,signup.adidas.com,staging.adidas.com,update.adidas.com,development.adidas.com,mena.adidas.com,www.adidas.com",user_data:{},"event":[],"custom":{},transaction_id:'',user_id:''};for(c=0;c<u.extend.length;c++){try{d=u.extend[c](a,b);if(d==false)return}catch(e){}};utag.DB("send:525:EXTENSIONS");utag.DB(b);c=[];for(d in utag.loader.GV(u.map)){if(b[d]!==undefined&&b[d]!==""){e=u.map[d].split(",");for(f=0;f<e.length;f++){u.map_func(e[f].split("."),u.data,b[d]);}}else{h=d.split(":");if(h.length===2&&b[h[0]]===h[1]){if(u.map[d]){u.data.event=u.data.event.concat(u.map[d].split(","));}}}}
utag.DB("send:525:MAPPINGS");utag.DB(u.data);u.scriptRequestedInit();u.data.order_id=u.data.order_id||b._corder||u.data.transaction_id||"";u.data.order_subtotal=u.data.conversion_value||u.data.order_subtotal||b._csubtotal||"";u.data.order_currency=u.data.conversion_currency||u.data.order_currency||b._ccurrency||"";if(u.data.product_id.length===0&&b._cprod!==undefined){u.data.product_id=b._cprod.slice(0);}
if(u.data.product_category.length===0&&b._ccat!==undefined){u.data.product_category=b._ccat.slice(0);}
if(u.data.product_quantity.length===0&&b._cquan!==undefined){u.data.product_quantity=b._cquan.slice(0);}
if(u.data.product_unit_price.length===0&&b._cprice!==undefined){u.data.product_unit_price=b._cprice.slice(0);}
if(u.data.product_discount.length===0&&b._cpdisc!==undefined){u.data.product_discount=b._cpdisc.slice(0);}
if(u.data.event.length===0&&b._cevent!==undefined){u.data.event=(u.typeOf(b._cevent)==="array")?b._cevent.slice(0):[b._cevent];}
if(typeof(u.data.conversion_id)==="string"&&u.data.conversion_id!==""){u.data.conversion_id=u.data.conversion_id.replace(/\s/g,"").split(",");}
if(typeof(u.data.conversion_label)==="string"&&u.data.conversion_label!==""){u.data.conversion_label=u.data.conversion_label.replace(/\s/g,"").split(",");}
if(typeof(u.data.conversion_cookie_prefix)==="string"&&u.data.conversion_cookie_prefix!==""){u.data.conversion_cookie_prefix=u.data.conversion_cookie_prefix.replace(/\s/g,"").split(",");}
if(u.data.order_currency!==u.data.order_currency.toUpperCase()){u.data.order_currency=u.data.order_currency.toUpperCase();utag.DB("Currency not supplied in uppercase - automatically converting");}
if(!u.data.conversion_id){utag.DB(u.id+": Tag not fired: Required attribute not populated");return;}
if(u.data.gtag_enable_tcf_support){window["gtag_enable_tcf_support"]=u.toBoolean(u.data.gtag_enable_tcf_support);}
for(i=0;i<u.data.conversion_id.length;i++){if(!/^[a-zA-Z]{2}-/.test(u.data.conversion_id[i])){u.data.conversion_id[i]="AW-"+u.data.conversion_id[i];}}
u.data.base_url+="?id="+u.data.conversion_id[0];if(u.data.data_layer_name){u.data.base_url=u.data.base_url+"&l="+u.data.data_layer_name;}
u.data.conversion_id_dedupe=[...new Set(u.data.conversion_id)];for(i=0;i<u.data.conversion_id_dedupe.length;i++){if(u.data.conversion_cookie_prefix&&u.data.conversion_cookie_prefix[i]){u.data.config.conversion_cookie_prefix=u.data.conversion_cookie_prefix[i];}
u.o("config",u.data.conversion_id_dedupe[i],u.data.config);}
if(u.data.config.allow_enhanced_conversions){u.o('set','user_data',u.data.user_data);}
u.data.event_data=u.getParams();u.data.event_data.items=u.getItems();u.data.event_data.user_id=u.data.user_id;utag.ut.merge(u.data.event_data,u.data.custom,1);if(u.data.custom&&typeof(u.data.custom.event_callback)==="function"){u.data.event_data.event_callback=u.data.custom.event_callback;}
if(u.data.conversion_label){u.data.event_data.send_to=[];for(i=0;i<u.data.conversion_label.length;i++){if(u.data.conversion_label[i]!=="NONE"){u.data.event_data.send_to.push(u.data.conversion_id[i]+"/"+(u.data.conversion_label[i]||u.data.conversion_label[0]));}}
if(u.data.order_subtotal){u.data.event_data.value=u.data.order_subtotal;u.data.event_data.currency=u.data.order_currency;}
u.data.event_data.transaction_id=u.data.order_id;u.data.event_data.aw_merchant_id=u.data.aw_merchant_id;u.data.event_data.aw_feed_country=u.data.aw_feed_country;u.data.event_data.aw_feed_language=u.data.aw_feed_language;u.data.event_data.discount=0;for(j=0;j<u.data.product_discount.length;j++){u.data.event_data.discount+=isNaN(parseFloat(u.data.product_discount[j]))?0:parseFloat(u.data.product_discount[j]);}
var containsConversion=false;for(i=0;i<u.data.event.length;i++){if(u.data.event[i]==="conversion"||u.data.event[i]==="purchase"){containsConversion=true;}}
if(!containsConversion&&!u.data.event.length){u.data.event.push("conversion");}}
if(u.toBoolean(u.data.remarketing)){if(!u.data.event.length){u.data.event_data.send_to=[...new Set(u.data.conversion_id)];u.data.event.push("page_view");}}
for(i=0;i<u.data.event.length;i++){if(!u.data.event_data.send_to){u.data.event_data.send_to=u.data.conversion_id;}
utag.ut.merge(u.data.event_data,u.data[u.data.event[i]],1);u.o("event",u.data.event[i],u.clearEmptyKeys(u.data.event_data));}
if(!u.hasgtagjs()){u.scriptrequested=true;utag.ut.gtagScriptRequested=true;u.loader({"type":"script","src":u.data.base_url,"cb":null,"cbe":u.data.error_callback,"loc":"script","id":"utag_525","attrs":{}});}
utag.DB("send:525:COMPLETE");}};utag.o[loader].loader.LOAD(id);}("525","adidas.adidasglobal"));}catch(error){utag.DB(error);}