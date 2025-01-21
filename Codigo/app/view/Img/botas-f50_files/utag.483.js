//tealium universal tag - utag.483 ut4.0.202501150947, Copyright 2025 Tealium.com Inc. All Rights Reserved.
if(typeof JSON!=='object'){JSON={};}
(function(){'use strict';var rx_one=/^[\],:{}\s]*$/,rx_two=/\\(?:["\\\/bfnrt]|u[0-9a-fA-F]{4})/g,rx_three=/"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g,rx_four=/(?:^|:|,)(?:\s*\[)+/g,rx_escapable=/[\\\"\u0000-\u001f\u007f-\u009f\u00ad\u0600-\u0604\u070f\u17b4\u17b5\u200c-\u200f\u2028-\u202f\u2060-\u206f\ufeff\ufff0-\uffff]/g,rx_dangerous=/[\u0000\u00ad\u0600-\u0604\u070f\u17b4\u17b5\u200c-\u200f\u2028-\u202f\u2060-\u206f\ufeff\ufff0-\uffff]/g;function f(n){return n<10?'0'+n:n;}
function this_value(){return this.valueOf();}
if(typeof Date.prototype.toJSON!=='function'){Date.prototype.toJSON=function(){return isFinite(this.valueOf())?this.getUTCFullYear()+'-'+
f(this.getUTCMonth()+1)+'-'+f(this.getUTCDate())+'T'+f(this.getUTCHours())+':'+f(this.getUTCMinutes())+':'+
f(this.getUTCSeconds())+'Z':null;};Boolean.prototype.toJSON=this_value;Number.prototype.toJSON=this_value;String.prototype.toJSON=this_value;}
var gap,indent,meta,rep;function quote(string){rx_escapable.lastIndex=0;return rx_escapable.test(string)?'"'+string.replace(rx_escapable,function(a){var c=meta[a];return typeof c==='string'?c:'\\u'+('0000'+a.charCodeAt(0).toString(16)).slice(-4);})+'"':'"'+string+'"';}
function str(key,holder){var i,k,v,length,mind=gap,partial,value=holder[key];if(value&&typeof value==='object'&&typeof value.toJSON==='function'){value=value.toJSON(key);}
if(typeof rep==='function'){value=rep.call(holder,key,value);}
switch(typeof value){case'string':return quote(value);case'number':return isFinite(value)?String(value):'null';case'boolean':case'null':return String(value);case'object':if(!value){return'null';}
gap+=indent;partial=[];if(Object.prototype.toString.apply(value)==='[object Array]'){length=value.length;for(i=0;i<length;i+=1){partial[i]=str(i,value)||'null';}
v=partial.length===0?'[]':gap?'[\n'+gap+partial.join(',\n'+gap)+'\n'+mind+']':'['+partial.join(',')+']';gap=mind;return v;}
if(rep&&typeof rep==='object'){length=rep.length;for(i=0;i<length;i+=1){if(typeof rep[i]==='string'){k=rep[i];v=str(k,value);if(v){partial.push(quote(k)+(gap?': ':':')+v);}}}}else{for(k in value){if(Object.prototype.hasOwnProperty.call(value,k)){v=str(k,value);if(v){partial.push(quote(k)+(gap?': ':':')+v);}}}}
v=partial.length===0?'{}':gap?'{\n'+gap+partial.join(',\n'+gap)+'\n'+mind+'}':'{'+partial.join(',')+'}';gap=mind;return v;}}
if(typeof JSON.stringify!=='function'){meta={'\b':'\\b','\t':'\\t','\n':'\\n','\f':'\\f','\r':'\\r','"':'\\"','\\':'\\\\'};JSON.stringify=function(value,replacer,space){var i;gap='';indent='';if(typeof space==='number'){for(i=0;i<space;i+=1){indent+=' ';}}else if(typeof space==='string'){indent=space;}
rep=replacer;if(replacer&&typeof replacer!=='function'&&(typeof replacer!=='object'||typeof replacer.length!=='number')){throw new Error('JSON.stringify');}
return str('',{'':value});};}}());try{(function(id,loader,u){try{u=utag.o[loader].sender[id]={"id":id};}catch(e){u=utag.sender[id];}
utag.globals=window.utag.globals||{};u.toBoolean=function(val){val=String(val)||"";return val===true||val.toLowerCase()==="true"||val.toLowerCase()==="on";};u.ev={"all":1};u.server_domain="tealiumiq.com";u.server_prefix="";u.tag_config_server="";u.tag_config_sampling="100"||"100";if(utag.cfg.utagdb){u.tag_config_sampling="100";}
u.tag_config_region="eu-west-1"||"default";u.region="";u.performance_timing_count=0;u.event_url='//collect.tealiumiq.com/event';u.account=utag.cfg.utid.split("/")[0];u.data_source="";u.profile="testcdpadidaseu"||utag.cfg.utid.split("/")[1];u.visitor_service_override='';u.request_increment=1;u.iab_v20_compliance=true;u.tc_string="";u.use_sendBeacon='true';u.use_event_endpoint='false';u.use_event_endpoint=u.toBoolean(u.use_event_endpoint);u.tealium_cookie_domain='';u.tealium_cookie_expiry='';if(u.tag_config_server.indexOf("-collect."+u.server_domain)>1){u.server_prefix=u.tag_config_server.split("collect."+u.server_domain)[0];if(u.tag_config_server.indexOf("/i.gif")<0){u.tag_config_server="https://"+[u.server_prefix+"collect."+u.server_domain,u.account,u.profile,"2","i.gif"].join("/");}}
if(u.tag_config_server===""){if(u.use_event_endpoint){u.tag_config_server=u.event_url;}else if(u.tag_config_region==="default"){u.tag_config_server="https://"+[u.server_prefix+"collect."+u.server_domain,u.account,u.profile,"2","i.gif"].join("/");}else{u.tag_config_server="https://"+[u.server_prefix+"collect-"+u.tag_config_region+"."+u.server_domain,u.account,u.profile,"2","i.gif"].join("/");}}
if(u.tag_config_server.indexOf("-collect-")>-1){u.server_prefix=u.tag_config_server.split("collect-")[0];}
if(u.tag_config_region!=="default"&&u.tag_config_server.indexOf(u.server_prefix+"collect."+u.server_domain)>0){u.tag_config_server=u.tag_config_server.replace(u.server_prefix+"collect."+u.server_domain,u.server_prefix+"collect-"+u.tag_config_region+"."+u.server_domain);u.region=u.tag_config_region;}
u.data_enrichment="frequent";u.profile_specific_vid=0;u.enrichment_polling=1;u.enrichment_polling_delay=500;u.do_enrichment=function(){};u.deepCopy=function(input){var key,copy;if(typeof input==="object"&&input!==null){if(utag.ut.typeOf(input)==="array"){copy=[];}else{copy={};}
for(key in input){if(typeof input[key]==="object"){copy[key]=u.deepCopy(input[key]);}else{copy[key]=input[key];}}}else{copy=input;}
return copy;}
var q=u.tag_config_server.indexOf("?");if(q>0&&(q+1)==u.tag_config_server.length){u.tag_config_server=u.tag_config_server.replace("?","");}
u.server_list=u.tag_config_server.split("|");u.enrichment_enabled={};u.use_sendBeacon=u.toBoolean(u.use_sendBeacon);u.get_account_profile=function(s){var p;if(u.visitor_service_override||u.tag_config_server.indexOf("tealiumiq.com")===-1){p=[u.tag_config_server.split("//")[1],u.account,u.profile]}else{p=s.substring(s.indexOf(u.server_domain)).split("/");}
return p;};function infixParameters(url,params){var updated_url,url_parts=url.split("?");if(params){if(url_parts[1]===undefined){updated_url=url+"?"+params;}else if(url_parts[1]===""){updated_url=url+params;}else{updated_url=url_parts[0]+"?"+params+"&"+url_parts[1];}}else{updated_url=url;}
return updated_url;}
u.is_in_sample_group=function(b){var group="100";if(u.tag_config_sampling===""||u.tag_config_sampling==="100"){return true;}
if(b["cp.utag_main_dc_group"]){group=b["cp.utag_main_dc_group"];}else{group=Math.floor(Math.random()*100)+1;utag.loader.SC("utag_main",{"dc_group":group});}
if(parseInt(group)<=parseInt(u.tag_config_sampling)){return true;}else{return false;}};u.get_performance_timing=function(b){var t,timing;var data={};function subtract(val1,val2){var difference=0;if(val1>val2){difference=val1-val2;}
return difference;}
try{timing=localStorage.getItem("tealium_timing");t=window.performance.timing;if(timing!==null&&timing!=="{}"&&typeof b!=="undefined"&&u.performance_timing_count===0){utag.ut.merge(b,utag.ut.flatten({timing:JSON.parse(timing)}),1);}}catch(e){utag.DB(e);return;}
u.performance_timing_count++;for(var k in t){if((k.indexOf("dom")===0||k.indexOf("load")===0)&&t[k]===0&&u.performance_timing_count<20){setTimeout(u.get_performance_timing,1000);}}
data["domain"]=location.hostname+"";data["pathname"]=location.pathname+"";data["query_string"]=(""+location.search).substring(1);data["timestamp"]=(new Date()).getTime();data["dns"]=subtract(t.domainLookupEnd,t.domainLookupStart);data["connect"]=subtract(t.connectEnd,t.connectStart);data["response"]=subtract(t.responseEnd,t.responseStart);data["dom_loading_to_interactive"]=subtract(t.domInteractive,t.domLoading);data["dom_interactive_to_complete"]=subtract(t.domComplete,t.domInteractive);data["load"]=subtract(t.loadEventEnd,t.loadEventStart);data["time_to_first_byte"]=subtract(t.responseStart,t.connectEnd);data["front_end"]=subtract(t.loadEventStart,t.responseEnd);data["fetch_to_response"]=subtract(t.responseStart,t.fetchStart);data["fetch_to_complete"]=subtract(t.domComplete,t.fetchStart);data["fetch_to_interactive"]=subtract(t.domInteractive,t.fetchStart);try{localStorage.setItem("tealium_timing",JSON.stringify(data));}catch(e){utag.DB(e);}};u.validateProtocol=function(address,force_ssl){if(/^https?:\/\//i.test(address)){if(force_ssl){if(/^http:\/\//i.test(address)){address=address.toLowerCase().replace("http","https");}}}else{if(/^\/\//.test(address)){if(force_ssl){address="https:"+address;}else{address=location.protocol+address;}
}else{if(force_ssl){address="https://"+address;}else{address=location.protocol+"//"+address;}}}
return address;}
u.map={};u.extend=[function(a,b){try{if(1){try{b['window_innerHeight']=window.innerHeight}catch(e){};try{b['window_innerWidth']=window.innerWidth}catch(e){}}}catch(e){utag.DB(e);}},function(a,b,c,d,e,f,g){if(1){d=b['country'];if(typeof d=='undefined')return;c=[{'AT':'76998'},{'BE':'77000'},{'CH':'77002'},{'CZ':'77030'},{'DE':'77004'},{'DK':'77028'},{'ES':'77008'},{'FI':'77034'},{'FR':'77010'},{'IE':'77012'},{'IT':'77014'},{'NL':'77016'},{'NO':'77032'},{'PL':'77006'},{'PT':'77026'},{'SE':'77020'},{'SK':'77024'},{'UK':'77022'},{'BR':'79916'},{'CL':'79922'},{'CO':'79924'},{'MX':'79918'},{'AU':'87085'},{'NZ':'87087'},{'TR':'107377'}];var m=false;for(e=0;e<c.length;e++){for(f in utag.loader.GV(c[e])){if(d==f){b['awin_tag_id']=c[e][f];m=true};};if(m)break};if(!m)b['awin_tag_id']='77018';}},function(a,b){try{if(1){let account_id;if(b['qp.merchantid']||b['cp.awin_merchantid']){account_id=b['qp.merchantid']||b['cp.awin_merchantid'];}
b.awin_tag_id=account_id||b.awin_tag_id;b.awin_click_id=b['qp.awc']||b['cp._aw_m_'+b.awin_tag_id]||b['cp._aw_sn_'+b.awin_tag_id]||b.awin_click_id;if(b['cp.channelcloser']=='awin'){b.channel_closer='aw';}else{b.channel_closer=b['cp.channelcloser']=='nonpaid'?b['cp.channelcloser']:'other';}
if(b.tealium_event=='purchase'&&Array.isArray(b.product_price_type)&&Array.isArray(b.product_prorated_discount)){b.awin_product_price_type=[];for(let index=0;index<b.product_id.length;index++){if(b.product_is_outlet[index]==='OUTLET'){b.awin_product_price_type[index]=b.product_is_outlet[index];}
if(b.product_price_type[index]==='MEMBERSHIP'){b.product_price_type[index]='ON SALE';}
if(b.promo_code&&(b.product_prorated_discount[index]&&Number(b.product_prorated_discount[index])>0)){if(b.product_price_type[index]==="FULL PRICE"||(b.product_id.length===1&&b.product_price_type[index]!=="FULL PRICE")){b.awin_product_price_type[index]=b.product_price_type[index]+' WITH VOUCHER';}else{b.awin_product_price_type[index]=b.product_price_type[index]+' VOUCHER UNKNOWN';}}else{b.awin_product_price_type[index]=b.product_price_type[index]+' WITHOUT VOUCHER';}}
if(b.awin_product_price_type){b.awin_commission_group=[];const commissionGroups={"FULL PRICE WITH VOUCHER":"FULL_PRICE_VOUCHER","FULL PRICE WITHOUT VOUCHER":"FULL_PRICE","ON SALE WITHOUT VOUCHER":"SALE","ON SALE WITH VOUCHER":"SALE_VOUCHER","ON SALE VOUCHER UNKNOWN":"SALE_UNKNOWN","OUTLET WITHOUT VOUCHER":"OUTLET","OUTLET WITH VOUCHER":"OUTLET_VOUCHER","OUTLET VOUCHER UNKNOWN":"OUTLET_UKNOWN"}
for(let index=0;index<b.awin_product_price_type.length;index++){let curPriceType=b.awin_product_price_type[index];b.awin_commission_group.push(commissionGroups[curPriceType]);}
let saleParts=[];for(let index=0;index<b.awin_commission_group.length;index++){let curPrice=parseFloat(b.product_price[index])*parseInt(b.product_quantity[index]);let curCommissionGroup=b.awin_commission_group[index];saleParts.push(curCommissionGroup+':'+curPrice);}
b.awin_sale_parts=saleParts.join('|');}}
if(b.tealium_event=='purchase'&&b.product_sku&&b.product_sku.length&&b.product_campaign_ids&&b.product_campaign_ids.length){b.product_sku_campaign_ids=[]
for(let index=0;index<b.product_sku.length;index++){let cur_product_sku_campaign=[b.product_sku[index],(b.product_campaign_ids[index]||'NO CAMPAIGN')].join('|');b.product_sku_campaign_ids.push(cur_product_sku_campaign);}
b.product_sku_campaign_ids=b.product_sku_campaign_ids.join();}}}catch(e){utag.DB(e)}},function(a,b){try{if(1){try{if(b.product_price&&b.product_quantity){b.product_price_numbers=b.product_price.map(price=>{return Number(price);});b.product_quantity_numbers=b.product_quantity.map(price=>{return Number(price);})
b.product_content_type=b.product_price.map(price=>{return"product";})}}catch(error){utag.DB(error);}}}catch(e){utag.DB(e)}},function(a,b){try{if(1){if(!['view','kill_visitor_session'].includes(a)){if(!(['user_register','search','waitlist_add','wishlist_add','wishlist_remove','cart_add'].includes(b.tealium_event)||b.event_name=='CHANGE PREFERENCES')){return false;}}
var keys_to_delete=['customer_phone_number','customer_phone_number_normalized','customer_email','customer_encrypted_email','customer_first_name','customer_last_name','cp.geo_ip','cp.pagecontext_cookies','cp.pagecontext_secure_cookies'];for(var i=0;i<keys_to_delete.length;i++){if(b[keys_to_delete[i]]){b[keys_to_delete[i]]=undefined;}}
if(b['cp.notice_preferences']&&/\d/.test(b['cp.notice_preferences'])){b['cp.notice_preferences']=JSON.parse(b['cp.notice_preferences']);b['cp.notice_preferences']=!Array.isArray(b['cp.notice_preferences'])?[b['cp.notice_preferences']]:b['cp.notice_preferences'];for(var i=0;i<b['cp.notice_preferences'].length;i++){b['cp.notice_preferences'][i]=parseInt(b['cp.notice_preferences'][i]);}
var fill_up_to=Math.max(...b['cp.notice_preferences']);b['cp.notice_preferences']=new Array(fill_up_to+1);for(var i=0;i<=fill_up_to;i++){b['cp.notice_preferences'][i]=i;}}
const regex=/(^[0-9a-f]{8}\-[0-9a-f]{4}\-[0-9a-f]{4}\-[0-9a-f]{4}\-[0-9a-f]{12}$)|(^[0-9A-Z]{16}$)/g;if(b.euci&&!b.euci.match(regex)){b.euci=null;}
if(b.page_type=='PDP'||b.tealium_event=='wishlist_add'){for(var key of Object.keys(b)){if(key.indexOf('product_')==0){b[key+'_str']=b[key].toString();}}}
if(b.product_price_str){try{b.product_price_number=parseFloat(b.product_price_str);}
catch(e){b.product_price_number=b.product_price_str;}}}}catch(e){utag.DB(e)}},function(a,b){try{if(1){var event_dict={"product_view":"ViewContent","purchase":"Purchase","cart_add":"AddToCart"}
var event_val=event_dict[b.tealium_event];if(event_val){b.fb_event=event_val;}
else if(a==="view"){b.fb_event="PageView";}}}catch(e){utag.DB(e)}},function(a,b){try{if(1){var profiles={us:{tag_region:"us-east-1",profile:(b.environment=="PRODUCTION"?"":"test")+"cdpadidasus",region:"us-east-1",data_source:b.environment=="PRODUCTION"?"jqvmhl":"zhyr4k"
},eu:{tag_region:"eu-west-1",profile:(b.environment=="PRODUCTION"?"":"test")+"cdpadidaseu",region:"eu-west-1",data_source:b.environment=="PRODUCTION"?"gp8v5u":"zpe0vh"
},slam:{tag_region:"eu-west-1",profile:b.environment=="PRODUCTION"?"cdpadidaslatam":"testcdpadidaslatam",region:"eu-central-1",data_source:b.environment=="PRODUCTION"?"umc5bw":"tj2be3"
},ca:{tag_region:"eu-west-1",profile:b.environment=="PRODUCTION"?"cdpadidasca":"testcdpadidaseu",region:"eu-west-1",data_source:b.environment=="PRODUCTION"?"xqndnm":"zpe0vh"
},sea:{tag_region:"eu-west-1",profile:b.environment=="PRODUCTION"?"cdpadidasrow":"testcdpadidaseu",region:"eu-west-1",data_source:b.environment=="PRODUCTION"?"izyu9c":"zpe0vh"
},em:{tag_region:"eu-west-1",profile:b.environment=="PRODUCTION"?"cdpadidasrow":"testcdpadidaseu",region:"eu-west-1",data_source:b.environment=="PRODUCTION"?"izyu9c":"zpe0vh"
},pacific:{tag_region:"ap-southeast-2",profile:b.environment=="PRODUCTION"?"cdpadidaspac":"testcdpadidaspac",region:"ap-southeast-2",data_source:b.environment=="PRODUCTION"?"426f45":"qyv2s7"
},kr:{tag_region:"ap-southeast-2",profile:b.environment=="PRODUCTION"?"cdpadidaskr":"testcdpadidaskr",region:"ap-southeast-2",data_source:b.environment=="PRODUCTION"?"ihc2p3":"vk9iwt"},jp:{tag_region:"ap-northeast-1",profile:b.environment=="PRODUCTION"?"cdpadidasjp":null,region:"ap-northeast-1",data_source:b.environment=="PRODUCTION"?"i0409w":null}};if(b.country=='CA'){b.region='ca';}
else if(b.country=='KR'){b.region='kr';u.account="adidaskorea";}
else if(b.country=='JP'){b.region='jp';if(b.environment!=="PRODUCTION"){return false;}}
b.region=b.country=='CA'?'ca':b.region;if(b.region&&profiles[b.region]){u.tag_config_region=profiles[b.region].tag_region;u.profile=profiles[b.region].profile;u.region=profiles[b.region].region;b["tealium_datasource"]=profiles[b.region].data_source;u.tag_config_server="https://"+[u.server_prefix+"collect-"+u.tag_config_region+"."+u.server_domain,u.account,u.profile,"2","i.gif"].join("/");u.server_list=u.tag_config_server.split("|");}}}catch(e){utag.DB(e)}},function(a,b){try{if(b['country']=='US'){var utag_cl=utag.loader.RC('utag_cl');b.impact_clickid=b['qp.clickId']||b['qp.clickid']||b['cp.impact_clickid']||utag_cl.clickId||utag_cl.clickid||'';b.date_iso_string=new Date().toISOString().slice(0,10);if(typeof(b.product_id)=='object'&&b.product_id.length>0){let current_item_quantity=1;b.product_subtotal=[];for(var i=0;i<b.product_id.length;i++){current_item_quantity=typeof(b.product_quantity)=='object'?b.product_quantity[i]:'1';b.product_subtotal[i]=typeof(b.product_price)=='object'?(parseInt(current_item_quantity)*parseFloat(b.product_price[i])).toString():'';}}}}catch(e){utag.DB(e)}},function(a,b){try{if(1){var profiles={us:{profile:(b.environment=="PRODUCTION"?"":"test")+"cdpadidasus",},eu:{profile:(b.environment=="PRODUCTION"?"":"test")+"cdpadidaseu",},slam:{profile:b.environment=="PRODUCTION"?"cdpadidaslatam":"testcdpadidaseu"},ca:{profile:b.environment=="PRODUCTION"?"cdpadidasca":"testcdpadidaseu"}}
b.region=b.country=='CA'?'ca':b.region;if(b.region&&profiles[b.region]){b.tag_id=profiles[b.region].profile;}}}catch(e){utag.DB(e)}},function(a,b){try{if(1){var f;if(b.tealium_account&&b.tag_id){f=b.tealium_account+b.tag_id;}
if(f){if(b['tealium_visitor_id']){b['tealium_visitor_id']=b['tealium_visitor_id']+f;}
if(b['_t_visitor_id']){b['_t_visitor_id']=b['_t_visitor_id']+f;}
if(b['cp.utag_main_v_id']){b['cp.utag_main_v_id']=b['cp.utag_main_v_id']+f;}
if(b['ut.visitor_id']){b['ut.visitor_id']=b['ut.visitor_id']+f;}}}}catch(e){utag.DB(e)}},function(a,b){try{if(1){b.snap_event=[];if(a=='view'){b.snap_event.push('PAGE_VIEW');if(b.page_type=='SEARCH'){b.snap_event.push('SEARCH');}else if(b.page_type=='PDP'){b.snap_event.push('VIEW_CONTENT');}}else if(a=='link'){if(b.event_name=='ADD TO CART'){b.snap_event.push('ADD_CART')}else if(b.signup_step=='SUCCESS'||(b.event_category=='ACCOUNT CREATION'&&b.event_name=='SUCCESS')){b.snap_event.push('SIGN_UP');}}}}catch(e){utag.DB(e)}},function(a,b){try{if(1){var pinterest_event_dict={category_view:"ViewCategory",category_landing_view:"ViewCategory",search_view:"Search",cart_add:"AddToCart",user_register:"Signup",purchase:"checkout"};b.pinterest_event=pinterest_event_dict[b.tealium_event];if(!b.pinterest_event){if(a==="view"){b.pinterest_event='PageVisit';}
else if(b.video_event=='video_complete'){b.pinterest_event='WatchVideo';}}
try{if(Array.isArray(b.tags_on_event)&&b.tags_on_event.includes('345')&&b.pinterest_event){generateEventID=function(event,lookup_id){var hash_input=b["tealium_timestamp_epoch"]
+"-"+lookup_id+"-"+event,event_id=utag.ut.md5.MD5(hash_input).toString();return event_id;};var lookup_id=b.tealium_random;window.utag.globals=window.utag.globals||{};window.utag.globals[lookup_id]=window.utag.globals[lookup_id]||{};var key="pinterest_event_id_"+b.pinterest_event;if(!window.utag.globals[lookup_id][key]){var event_id=generateEventID(b.pinterest_event,lookup_id);window.utag.globals[lookup_id][key]=event_id;}}}
catch(e){utag.DB(e);}}}catch(e){utag.DB(e)}}];u.send=function(a,b){var c,d,i;if(u.ev[a]||typeof u.ev["all"]!=="undefined"){if(a==="remote_api"){utag.DB("Remote API event suppressed.");return;}
if(a==='update_consent_cookie'){utag.DB('Update Consent Cookie event supressed.');return;}
if(u.tealium_cookie_domain){b.tealium_cookie_domain=u.tealium_cookie_domain;}
if(u.tealium_cookie_expiry){b.tealium_cookie_expiry=parseInt(u.tealium_cookie_expiry);}
if(u.iab_v20_compliance===true||u.iab_v20_compliance==="true"){if(typeof __tcfapi==="function"){__tcfapi("getTCData",2,function(tcData,success){if(success){u.tc_string="gdpr=";if(tcData.gdprApplies===true){u.tc_string+="1";}else if(tcData.gdprApplies===false){u.tc_string+="0";}else{u.tc_string+=String(tcData.gdprApplies);}
u.tc_string+="&gdpr_consent="+tcData.tcString;execute_send();}});}else{var frame=window;var cmpFrame;var cmpCallbacks={};while(frame){try{if(frame.frames["__tcfapiLocator"]){cmpFrame=frame;break;}}catch(error){utag.DB(error);}
if(frame===window.top){break;}
frame=frame.parent;}
if(!cmpFrame){execute_send();}else{window.__tcfapi=function(cmd,version,callback,arg){var callId=String(Math.random());var msg={__tcfapiCall:{command:cmd,parameter:arg,version:version,callId:callId}};cmpCallbacks[callId]=callback;cmpFrame.postMessage(msg,"*");};window.tealiumiabPostMessageHandler=function(event){var json={};try{json=typeof event.data==="string"?JSON.parse(event.data):event.data;}catch(error){utag.DB(error);}
var payload=json.__tcfapiReturn;if(payload){if(typeof cmpCallbacks[payload.callId]==="function"){cmpCallbacks[payload.callId](payload.returnValue,payload.success);cmpCallbacks[payload.callId]=null;}}};window.addEventListener("message",tealiumiabPostMessageHandler,false);__tcfapi("getTCData",2,function(tcData,success){if(success){u.tc_string="gdpr=";if(tcData.gdprApplies===true){u.tc_string+="1";}else if(tcData.gdprApplies===false){u.tc_string+="0";}else{u.tc_string+=String(tcData.gdprApplies);}
u.tc_string+="&gdpr_consent="+tcData.tcString;execute_send();}});}}}else{execute_send();}
function execute_send(){if(u.data_source){b.tealium_datasource=u.data_source;}
u.make_enrichment_request=false;for(c=0;c<u.extend.length;c++){try{d=u.extend[c](a,b);if(d==false)return}catch(e){}};if(!u.is_in_sample_group(b)){return false;}
u.get_performance_timing(b);for(i=0;i<u.server_list.length;i++){if(u.server_list[i].toLowerCase().indexOf("http")===-1){u.server_list[i]=u.validateProtocol(u.server_list[i],true);}
if(u.enrichment_enabled[i]!==false){u.enrichment_enabled[u.server_list[i]]=true;}}
if(u.server_list.length>1){u.profile_specific_vid=1;}
u.data=utag.datacloud||{};u.data["loader.cfg"]={};for(d in utag.loader.GV(utag.loader.cfg)){if(utag.loader.cfg[d].load&&utag.loader.cfg[d].send){utag.loader.cfg[d].executed=1;}else{utag.loader.cfg[d].executed=0;}
u.data["loader.cfg"][d]=utag.loader.GV(utag.loader.cfg[d]);}
u.data.data=b;for(d in u.data.data){if((d+'').indexOf("qp.")===0){u.data.data[d]=encodeURIComponent(u.data.data[d]);}else if((d+'').indexOf("va.")===0){delete u.data.data[d];}}
if(!b["cp.utag_main_dc_event"]){b["cp.utag_main_dc_visit"]=(1+(b["cp.utag_main_dc_visit"]?parseInt(b["cp.utag_main_dc_visit"]):0))+"";}
b["cp.utag_main_dc_event"]=(1+(b["cp.utag_main_dc_event"]?parseInt(b["cp.utag_main_dc_event"]):0))+"";utag.loader.SC("utag_main",{"dc_visit":b["cp.utag_main_dc_visit"],"dc_event":b["cp.utag_main_dc_event"]+";exp-session"});utag.data["cp.utag_main_dc_visit"]=b["cp.utag_main_dc_visit"];utag.data["cp.utag_main_dc_event"]=b["cp.utag_main_dc_event"];var dt=new Date();u.data.browser={};try{u.data.browser["height"]=window.innerHeight||document.body.clientHeight;u.data.browser["width"]=window.innerWidth||document.body.clientWidth;u.data.browser["screen_height"]=screen.height;u.data.browser["screen_width"]=screen.width;u.data.browser["timezone_offset"]=dt.getTimezoneOffset();}catch(e){utag.DB(e);}
u.data["event"]=a+'';u.data["post_time"]=dt.getTime();if(u.data_enrichment==="frequent"||u.data_enrichment==="infrequent"){u.visit_num=b["cp.utag_main_dc_visit"];if(parseInt(u.visit_num)>1&&b["cp.utag_main_dc_event"]==="1"){u.enrichment_polling=2;}
try{u.va_update=parseInt(localStorage.getItem("tealium_va_update")||0);}catch(e){utag.DB(e);}
u.visitor_id=u.visitor_id||b.tealium_visitor_id||b["cp.utag_main_v_id"];if(u.data_enrichment==="frequent"||(u.data_enrichment==="infrequent"&&parseInt(u.visit_num)>1&&parseInt(b["cp.utag_main_dc_event"])<=5&&u.visit_num!==u.va_update)){u.make_enrichment_request=true;}
u.visitor_service_request=function(t,server){var s,p=u.get_account_profile(server);if(u.visitor_service_override){s=u.validateProtocol(u.visitor_service_override,true);}else{s=u.validateProtocol(u.server_prefix,true)+"visitor-service"+(u.region?"-"+u.region:"").replace(/[^-A-Za-z0-9+_.]/g,"")+"."+u.server_domain;}
(function(p){var prefix="tealium_va";var key="_"+p[1]+"_"+p[2];utag.ut["writeva"+p[2]]=function(o){utag.DB("Visitor Attributes: "+prefix+key);utag.DB(o);var str=JSON.stringify(o);if(str!=="{}"&&str!==""){try{localStorage.setItem("tealium_va_update",utag.data["cp.utag_main_dc_visit"]);localStorage.setItem(prefix,str);localStorage.setItem(prefix+key,str);}catch(e){utag.DB(e);}
if(typeof tealium_enrichment==="function"){tealium_enrichment(o,prefix+key);}}};}(p.slice(0)));var vid=u.visitor_id;if(u.profile_specific_vid===1){vid+=p[2];}
var srcUrl=s+'/'+p[1]+'/'+p[2]+'/'+vid.replace(/[\?\&]callback=.*/g,'')+'?callback=utag.ut%5B%22writeva'+p[2]+'%22%5D&rnd='+t;if(b.tealium_cookie_domain){srcUrl=srcUrl+'&tealium_cookie_domain='+b.tealium_cookie_domain
if(b.tealium_cookie_expiry){srcUrl=srcUrl+'&tealium_cookie_expiry='+b.tealium_cookie_expiry}}
utag.ut.loader({id:'tealium_visitor_service_483'+p[2]+'_'+u.request_increment++,src:srcUrl});};u.do_enrichment=function(server,enrichment_polling,enrichment_polling_delay){if(typeof utag.ut.loader!="undefined"){for(i=0;i<enrichment_polling;i++){setTimeout(function(){u.visitor_service_request((new Date).getTime(),server);},i*enrichment_polling_delay+1);}}};}
var json_string,regExpReplace=new RegExp(u.visitor_id,"g");if(b.tealium_random&&typeof utag.globals[b.tealium_random]==="object"){for(var downstream_param in utag.globals[b.tealium_random]){u.data.data[downstream_param]=u.deepCopy(utag.globals[b.tealium_random][downstream_param]);}}
function getSendData(useEventData,server){var dataStringify=u.data;if(useEventData){dataStringify=u.data.data;u.data.data.tealium_profile=u.profile;}
json_string=JSON.stringify(dataStringify);if(u.profile_specific_vid===1&&u.visitor_id){json_string=json_string.replace(regExpReplace,u.visitor_id+u.get_account_profile(server)[2]);}
if(useEventData){return json_string;}
var formData=new FormData();formData.append("data",json_string);return formData;}
function postData(server_index,enrichment_polling,enrichment_polling_delay,useEventData){if(server_index+1>u.server_list.length){return;}
var xhr=new XMLHttpRequest();var server=u.validateProtocol(u.server_list[server_index],true);var data=getSendData(useEventData,server);u.region=utag.loader.RC("utag_main")["dc_region"]||u.region||"";if(typeof navigator.sendBeacon==='function'&&u.region!==""&&u.use_sendBeacon){u.server_list.forEach(function(serverItem){navigator.sendBeacon(infixParameters(serverItem,u.tc_string),data);if(u.make_enrichment_request&&u.enrichment_enabled[serverItem]){u.do_enrichment(serverItem,enrichment_polling,enrichment_polling_delay);}});utag.DB("Data sent using sendBeacon");return;}
xhr.addEventListener("readystatechange",function(){if(xhr.readyState===3){try{u.region=xhr.getResponseHeader("X-Region")||u.region||"";}catch(res_error){utag.DB(res_error);u.region=u.region||"";}
if(u.region)utag.loader.SC("utag_main",{"dc_region":u.region+";exp-session"});utag.DB("dc_region:"+u.region);}else if(xhr.readyState===4){postData(server_index+1,enrichment_polling,enrichment_polling_delay,useEventData);if(u.make_enrichment_request&&u.enrichment_enabled[server]){u.do_enrichment(server,enrichment_polling,enrichment_polling_delay);}}});if(u.server_list[server_index].toLowerCase().indexOf("http")!==0){u.server_list[server_index]=u.validateProtocol(u.server_list[server_index],true);}
var serverUrl=infixParameters(u.server_list[server_index],u.tc_string);xhr.open("post",serverUrl,true);xhr.withCredentials=true;xhr.send(data);}
if(u.use_event_endpoint&&(u.tag_config_server===u.event_url||u.tag_config_region!=="default")&&window.FormData){postData(0,u.enrichment_polling,u.enrichment_polling_delay,true);}else if(window.FormData){postData(0,u.enrichment_polling,u.enrichment_polling_delay,false);}else{for(i=0;i<u.server_list.length;i++){(function(i,enrichment_polling,enrichment_polling_delay){var server=u.server_list[i];setTimeout(function(){json_string=JSON.stringify(u.data);if(u.profile_specific_vid==1&&u.visitor_id){json_string=json_string.replace(regExpReplace,u.visitor_id+u.get_account_profile(server)[2]);}
var img=new Image();img.src=server+"?"+(u.tc_string?u.tc_string+"&":"")+"data="+encodeURIComponent(json_string);if(u.make_enrichment_request&&u.enrichment_enabled[server]){u.do_enrichment(server,enrichment_polling,enrichment_polling_delay);}},i*700);}(i,u.enrichment_polling,u.enrichment_polling_delay));}}}}};try{utag.o[loader].loader.LOAD(id);}catch(e){utag.loader.LOAD(id);}})("483","adidas.adidasglobal");}catch(e){utag.DB(e);}