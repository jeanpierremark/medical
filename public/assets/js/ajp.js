
 let add_button=document.getElementById('add_button');
    let conteneur=document.getElementById('nv');
    var i=1;
    add_button.onclick=function(){
       
        let nvp=document.createElement('input');
        nvp.setAttribute('type','text');
        nvp.setAttribute('name','libelle'+i);        
        
        
        nvp.setAttribute('class','form-control');
        nvp.setAttribute('placeholder','Libellé');
        nvp.setAttribute('style','width:400px');
        conteneur.appendChild(nvp);
        let zp=document.createElement('br');
        conteneur.appendChild(zp);
        let nvq=document.createElement('input');
        nvq.setAttribute('type','number');
        nvq.setAttribute('name','quantite');
        
        nvq.setAttribute('class','form-control');
        nvq.setAttribute('placeholder','Quantité');
        nvq.setAttribute('style','width:400px');
        conteneur.appendChild(nvq);
        let z=document.createElement('br');
        conteneur.appendChild(z);
       
        i++;
        
    }

    let rm=document.getElementById('rmb');
    rm.onclick=function(){
        
        let iptag=conteneur.getElementsByTagName('input');
        let saut=conteneur.getElementsByTagName('br');
            conteneur.removeChild(iptag[(iptag.length)-1]);
            conteneur.removeChild(saut[(saut.length)-1]);
         
       
    }