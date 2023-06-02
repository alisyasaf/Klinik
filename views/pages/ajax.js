function getXMLHTTPRequest(){
    if (window.XMLHttpRequest){
        return new XMLHttpRequest();
    }
    else{
        return new ActiveXObject("Microsoft.XMLHTTP");
    }
}

function edit_pasien(){
    var xmlhttp = getXMLHTTPRequest();
    var page = 'edit_pasien.php';
    xmlhttp.open("GET", page, true);
    xmlhttp.onreadystatechange = function() {
        document.getElementById('page').innerHTML = '<img src="images/ajax_loader.png"/>';
        if ((xmlhttp.readyState == 4) && (xmlhttp.status == 200)){
            document.getElementById('page').innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.send(null);
}

function view_jadwal(){
    var xmlhttp = getXMLHTTPRequest();
    var page = 'view_jadwal.php';
    xmlhttp.open("GET", page, true);
    xmlhttp.onreadystatechange = function() {
        document.getElementById('page').innerHTML = '<img src="images/ajax_loader.png"/>';
        if ((xmlhttp.readyState == 4) && (xmlhttp.status == 200)){
            document.getElementById('page').innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.send(null);
}

function form_daftar(){
    var xmlhttp = getXMLHTTPRequest();
    var page = 'form_daftar.php';
    xmlhttp.open("GET", page, true);
    xmlhttp.onreadystatechange = function() {
        document.getElementById('page').innerHTML = '<img src="images/ajax_loader.png"/>';
        if ((xmlhttp.readyState == 4) && (xmlhttp.status == 200)){
            document.getElementById('page').innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.send(null);
}

function view_dokter(){
    var xmlhttp = getXMLHTTPRequest();
    var page = 'view_dokter.php';
    xmlhttp.open("GET", page, true);
    xmlhttp.onreadystatechange = function() {
        document.getElementById('page').innerHTML = '<img src="images/ajax_loader.png"/>';
        if ((xmlhttp.readyState == 4) && (xmlhttp.status == 200)){
            document.getElementById('page').innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.send(null);
}

function add_pasien_post(){
    var xmlhttp = getXMLHTTPRequest();
    var nama = encodeURI(document.getElementById('nama').value);
    var umur = encodeURI(document.getElementById('umur').value);
    var alamat = encodeURI(document.getElementById('alamat').value);
    var notelp = encodeURI(document.getElementById('notelp').value);
    var email = encodeURI(document.getElementById('email').value);

    if(nama != '' && alamat != '' && umur != '' && notelp != '' && email != ''){
        var url = "add_pasien_post.php";
        var inner = "add_response";
        var params = "nama="+nama+"&umur="+umur+"&alamat="+alamat+"&notelp="+notelp+"&email="+email;

        xmlhttp.open('POST',url, true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.onreadystatechange = function(){
            document.getElementById(inner).innerHTML = '<img src="images/ajax_loader.png"/>';
            if((xmlhttp.readyState == 4) && (xmlhttp.status == 200)){
                document.getElementById(inner).innerHTML = xmlhttp.responseText;
            }
            return false;
        }
        xmlhttp.send(params);
    }
    else{
        alert("Please fill all the fields");
    }
}

function add_jadwal_post(){
    var xmlhttp = getXMLHTTPRequest();
    var hari = encodeURI(document.getElementById('hari').value);
    var waktu = encodeURI(document.getElementById('waktu').value);
    var dokter = encodeURI(document.getElementById('dokter').value);

    if(hari != '' && waktu != '' && dokter != ''){
        var url = "add_jadwal_post.php";
        var inner = "add_response";
        var params = "hari="+hari+"&waktu="+waktu+"&dokter="+dokter;

        xmlhttp.open('POST',url, true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.onreadystatechange = function(){
            document.getElementById(inner).innerHTML = '<img src="images/ajax_loader.png"/>';
            if((xmlhttp.readyState == 4) && (xmlhttp.status == 200)){
                document.getElementById(inner).innerHTML = xmlhttp.responseText;
            }
            return false;
        }
        xmlhttp.send(params);
    }
    else{
        alert("Please fill all the fields");
    }
}

function add_dokter_post(){
    var xmlhttp = getXMLHTTPRequest();
    var nama= encodeURI(document.getElementById('nama').value);
    var notelp = encodeURI(document.getElementById('notelp').value);

    if(nama != '' && notelp != '' ){
        var url = "add_dokter_post.php";
        var inner = "add_response";
        var params = "nama="+nama+"&notelp="+notelp;

        xmlhttp.open('POST',url, true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.onreadystatechange = function(){
            document.getElementById(inner).innerHTML = '<img src="images/ajax_loader.png"/>';
            if((xmlhttp.readyState == 4) && (xmlhttp.status == 200)){
                document.getElementById(inner).innerHTML = xmlhttp.responseText;
            }
            return false;
        }
        xmlhttp.send(params);
    }
    else{
        alert("Please fill all the fields");
    }
}

function search_pasien(){
    var xmlhttp = getXMLHTTPRequest();
    var keyword = encodeURI(document.getElementById('search').value)

        var url = "search_pasien.php";
        var inner = "tabel";
        var params = "keyword="+keyword;

        xmlhttp.open('POST',url, true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.onreadystatechange = function(){
            document.getElementById(inner).innerHTML = '<img src="images/ajax_loader.png"/>';
            if((xmlhttp.readyState == 4) && (xmlhttp.status == 200)){
                document.getElementById(inner).innerHTML = xmlhttp.responseText;
            }
            return false;
        }
        xmlhttp.send(params);

}

function search_jadwal(){
    var xmlhttp = getXMLHTTPRequest();
    var keyword = encodeURI(document.getElementById('search').value)

    if(keyword != ''){
        var url = "search_jadwal.php";
        var inner = "tabel";
        var params = "keyword="+keyword;

        xmlhttp.open('POST',url, true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.onreadystatechange = function(){
            document.getElementById(inner).innerHTML = '<img src="images/ajax_loader.png"/>';
            if((xmlhttp.readyState == 4) && (xmlhttp.status == 200)){
                document.getElementById(inner).innerHTML = xmlhttp.responseText;
            }
            return false;
        }
        xmlhttp.send(params);
        }
        else{
            alert("Please fill the search field");
        }

}

function search_dokter(){
    var xmlhttp = getXMLHTTPRequest();
    var keyword = encodeURI(document.getElementById('search').value)

    if(keyword != ''){
        var url = "search_dokter.php";
        var inner = "tabel";
        var params = "keyword="+keyword;

        xmlhttp.open('POST',url, true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.onreadystatechange = function(){
            document.getElementById(inner).innerHTML = '<img src="images/ajax_loader.png"/>';
            if((xmlhttp.readyState == 4) && (xmlhttp.status == 200)){
                document.getElementById(inner).innerHTML = xmlhttp.responseText;
            }
            return false;
        }
        xmlhttp.send(params);
        }
        else{
            alert("Please fill the search field");
        }

}