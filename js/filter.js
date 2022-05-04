const filterParamLoad = document.location.protocol+'//'+document.location.host+'/wp-json/gensvet/v2/get_filter_count'

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


function repaint_filter(element) {

    if (document.getElementById('tovarCategoryId') == null) return;

    var form = document.getElementById('categoryFilterForm');
    var data = new FormData(form);
    var qParam = {};
    data.forEach(function(value, key){
        let keykey = key.replace("[]","")
        let isArrayParam = (key.indexOf("[]") > 0)?true:false;

        if(!Reflect.has(qParam, keykey)){
            if (isArrayParam){ 
                qParam[keykey] = [] 
                qParam[keykey].push(value) 
            }
            else qParam[keykey] = value

            return;
        }

        qParam[keykey].push(value);
        
    });
    
   
    
    let category = tovarCategoryId.dataset.id;
    
    const xhr = new XMLHttpRequest()

    xhr.open('GET', filterParamLoad+"?catid="+category+"&filter_param="+JSON.stringify(qParam))
    xhr.responseType='json'
    xhr.setRequestHeader('Content-Type', 'application/json')

    xhr.onload = () => {
        Object.keys(xhr.response.offer_brend).forEach(key => {
            let e_value = xhr.response.offer_brend[key]

            let countEl = document.querySelector('.fp_count[data-vals="'+key+'"]')
            if (countEl) countEl.innerHTML = e_value
        });

        if (document.getElementById("flter_pods")) {
            let inp = element.getBoundingClientRect();
            let win = document.getElementById("categoryFilterForm").getBoundingClientRect();
            console.log(inp.top)
            console.log(win.top)
            flter_pods.style.top = (inp.top - win.top)+"px"
            flter_pods.style.display = "block"
            flter_pods.innerHTML = "Найдено: <br/>"+xhr.response.count

        }
        console.log(xhr.response.count)
    }

    xhr.send();
}

function acsept_filter(category, qParam) {
    console.log(qParam);

    const xhr = new XMLHttpRequest()

    xhr.open('GET', filterParamLoad+"?catid="+category+"&filter_param="+JSON.stringify(qParam))
    xhr.responseType='json'
    xhr.setRequestHeader('Content-Type', 'application/json')

    xhr.onload = () => {
        
        console.log(xhr.response);
        
        // Бренд
        let uStr = ""
        Object.keys(xhr.response.offer_brend).forEach(key => {
            let e_value = xhr.response.offer_brend[key];
            
                let disabled = (e_value == 0)?"disabled":""; 
                let checed = (qParam.brand != undefined && qParam.brand.includes(key) )?"checked":"";
                uStr += '<li><label><input '+disabled+' data-vals = "'+key+'" onclick = "repaint_filter(this)" type="checkbox" name="brand[]" '+checed+' value = "'+key+'"><span class = "fp_key">'+key+'</span> <span data-vals = "'+key+'" class = "fp_count">('+e_value+')</span></label></li>';
        });
        if (document.getElementById("tov_brand")) tov_brand.innerHTML = uStr;


        // Стиль
        uStr = ""
        Object.keys(xhr.response.offer_style).forEach(key => {
            let e_value = xhr.response.offer_style[key];

                let disabled = (e_value == 0)?"disabled":"";
                let checed = (qParam.style != undefined && qParam.style.includes(key) )?"checked":"";
                uStr += '<li><label><input '+disabled+' data-vals = "'+key+'" type="checkbox" name="style[]" '+checed+' value = "'+key+'"><span class = "fp_key">'+key+'</span> <span class = "fp_count">('+e_value+')</span></label></li>';
            
        });
        if (document.getElementById("tov_style")) tov_style.innerHTML = uStr;

        // Форма
        uStr = ""
        Object.keys(xhr.response.offer_forma).forEach(key => {
            let e_value = xhr.response.offer_forma[key];

                let disabled = (e_value == 0)?"disabled":"";
                let checed = (qParam.forma != undefined && qParam.forma.includes(key) )?"checked":"";
                uStr += '<li><label><input '+disabled+' data-vals = "'+key+'" type="checkbox" name="forma[]" '+checed+' value = "'+key+'"><span class = "fp_key">'+key+'</span> <span class = "fp_count">('+e_value+')</span></label></li>';
            
        });
        if (document.getElementById("tov_forma")) tov_forma.innerHTML = uStr;


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
    
    acsept_filter(category, qParam);
    


});