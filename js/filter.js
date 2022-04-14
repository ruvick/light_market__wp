const filterParamLoad = document.location.protocol+'//'+document.location.host+'/wp-json/gensvet/v2/get_filter_q'

function chengeSort(param) {
    sortFormFilter.value = param;
    categoryFilterForm.submit();
}

function clearFilter() {
    document.location.href = document.location.protocol+'//'+document.location.host+document.location.pathname
}

function getRequests() {
    var s1 = location.search.substring(1, location.search.length).split('&'),
        r = {}, s2, i;
    for (i = 0; i < s1.length; i += 1) {
        s2 = s1[i].split('=');
        let arrayIndex = decodeURIComponent(s2[0]).toLowerCase();
        if (arrayIndex.indexOf('[') == -1)
            {
                r[arrayIndex] = decodeURIComponent(s2[1]);
            } else {
                arrayIndex = arrayIndex.substring(0, arrayIndex.indexOf('['));
                if (typeof r[arrayIndex] === 'object')
                    r[arrayIndex].push(decodeURIComponent(s2[1]).replaceAll('+', ' '))
                else 
                    r[arrayIndex] = [decodeURIComponent(s2[1]).replaceAll('+', ' ')]
            }
    }
    return r;
};

function get_color_name(color) { 
    if ( color == '#000000') return "Черный";
	if ( color == '#EC1C24') return "Красный";
	if ( color == '#39B44A')  return "Зеленый";
	if ( color == '#7d0000')  return "Бордовый";
	if ( color == '##00ADEE')  return "Синий";
	if ( color == '#FFFF00')  return "Желтый";
	if ( color == '#6f00cc')  return "Фиолетовый";
	if ( color == '#D9A52A')  return "Золотой";
	if ( color == '#C0C0C0')  return "Серебристый";

    return ""
}

document.addEventListener("DOMContentLoaded", () => {

    let qParam = getRequests();

    if (qParam.sort == "price_ub")  {
        price_ub.checked  = true;
    }

    if (qParam.sort == "price_vozr")  {
        price_vozr.checked  = true;
    }

    

    if (document.getElementById('tovarCategoryId') == null) return;
    
    let category = tovarCategoryId.dataset.id;
    
    console.log(category);

    const xhr = new XMLHttpRequest()

    xhr.open('GET', filterParamLoad+"?catid="+category)
    xhr.responseType='json'
    xhr.setRequestHeader('Content-Type', 'application/json')

    xhr.onload = () => {
        console.log(xhr.response);
        
        // Стиль
        let uStr = ""
        xhr.response.offer_style.forEach((element, index) => {
            
            let checed = (qParam.style != undefined && qParam.style.includes(element[0]) )?"checked":"";

            uStr += '<li><label><input type="checkbox" name="style[]" '+checed+' value = "'+element[0]+'">'+element[0]+'</label></li>';

        });
        if (document.getElementById("tov_style")) tov_style.innerHTML = uStr;

        // Форма
        let uStr1 = ""

        xhr.response.offer_forma.forEach((element, index) => {

            let checed = (qParam.forma != undefined && qParam.forma.includes(element[0]) )?"checked":"";
            
            uStr1 += '<li><label><input type="checkbox" name="forma[]" '+checed+' value = "'+element[0]+'">'+element[0]+'</label></li>';

        });

        if (document.getElementById("tov_forma")) tov_forma.innerHTML = uStr1;

    
        

        // check_nal.checked  = (qParam.nal == undefined)?false:true;
        
        if (document.getElementById("price_ot")) price_ot.value = (qParam.price_ot == undefined)?xhr.response.offer_price_min:qParam.price_ot;
        if (document.getElementById("price_do")) price_do.value = (qParam.price_do == undefined)?xhr.response.offer_price_max:qParam.price_do;


        if (document.getElementById("categoryFilterLoader")) categoryFilterLoader.style.display = "none";
        if (document.getElementById("categoryFilterForm")) categoryFilterForm.style.display = "block";

        console.log(xhr.response.time);
        // let selects = document.getElementsByTagName('select');
        // if (selects.length > 0) {
        //   selects_init(selects);
        // }

    }

    xhr.send();

});